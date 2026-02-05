<?php
/**
 * Security Helper Functions
 * CSRF protection and security utilities for OneClick Insurance
 */

/**
 * Generate CSRF token and store in session
 */
function generate_csrf_token() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    
    return $token;
}

/**
 * Validate CSRF token
 */
function validate_csrf_token($token) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Check if token exists and matches
    if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
        return false;
    }
    
    // Check token expiration (1 hour)
    if (!isset($_SESSION['csrf_token_time']) || (time() - $_SESSION['csrf_token_time']) > 3600) {
        unset($_SESSION['csrf_token']);
        unset($_SESSION['csrf_token_time']);
        return false;
    }
    
    return true;
}

/**
 * Secure session configuration
 */
function secure_session_config() {
    // Only set session ini settings if session is not already active
    if (session_status() === PHP_SESSION_NONE) {
        // Set secure session parameters
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', 1);
        ini_set('session.cookie_samesite', 'Strict');
        ini_set('session.use_strict_mode', 1);
        ini_set('session.gc_maxlifetime', 1800); // 30 minutes
    }
    
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Regenerate session ID periodically
    if (!isset($_SESSION['last_regeneration'])) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    } elseif (time() - $_SESSION['last_regeneration'] > 300) { // 5 minutes
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}

/**
 * Check if user is authenticated with proper session
 */
function is_authenticated() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Check if user is logged in and session is valid
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        return false;
    }
    
    // Check session expiration (30 minutes)
    if (!isset($_SESSION['last_activity']) || (time() - $_SESSION['last_activity']) > 1800) {
        session_unset();
        session_destroy();
        return false;
    }
    
    // Update last activity time
    $_SESSION['last_activity'] = time();
    
    return true;
}

/**
 * Track user session in database to prevent multiple logins
 */
function track_user_session($user_id) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    try {
        require_once 'database.php';
        $db = new Database();
        $conn = $db->getConnection();
        
        // Get current session information
        $session_id = session_id();
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        // Remove any existing sessions for this user
        $deleteSql = "DELETE FROM sessions WHERE user_id = ?";
        $stmt = $conn->prepare($deleteSql);
        if ($stmt) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->close();
        }
        
        // Insert new session
        $insertSql = "INSERT INTO sessions (user_id, session_id, ip_address, user_agent) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        if ($stmt) {
            $stmt->bind_param('isss', $user_id, $session_id, $ip_address, $user_agent);
            $stmt->execute();
            $stmt->close();
        }
        
        // Store session ID in user session
        $_SESSION['db_session_id'] = $session_id;
        
        $db->closeConnection();
    } catch (Exception $e) {
        // If session tracking fails, continue without it to prevent login issues
        error_log("Session tracking error: " . $e->getMessage());
    }
}

/**
 * Validate if session is still active (not logged in from another device)
 */
function validate_session_ownership() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        return false;
    }
    
    if (!isset($_SESSION['db_session_id'])) {
        return false;
    }
    
    try {
        require_once 'database.php';
        $db = new Database();
        $conn = $db->getConnection();
        
        $session_id = session_id();
        $user_id = $_SESSION['admin_id'];
        
        // Check if session exists in database
        $checkSql = "SELECT session_id FROM sessions WHERE user_id = ? AND session_id = ?";
        $stmt = $conn->prepare($checkSql);
        if ($stmt) {
            $stmt->bind_param('is', $user_id, $session_id);
            $stmt->execute();
            $stmt->store_result();
            
            $is_valid = $stmt->num_rows === 1;
            
            $stmt->close();
            $db->closeConnection();
            
            return $is_valid;
        }
    } catch (Exception $e) {
        // If session validation fails, assume session is valid to prevent login issues
        error_log("Session validation error: " . $e->getMessage());
    }
    
    return true; // Fallback to allow access if session validation fails
}

/**
 * Enhanced authentication check with session ownership validation
 */
function is_authenticated_secure() {
    if (!is_authenticated()) {
        return false;
    }
    
    // Check if session is still owned by this user (not logged in from another device)
    if (!validate_session_ownership()) {
        // Session was taken over by another login
        session_unset();
        session_destroy();
        return false;
    }
    
    return true;
}

/**
 * Logout user from all devices
 */
function logout_all_sessions($user_id) {
    require_once 'database.php';
    $db = new Database();
    $conn = $db->getConnection();
    
    $deleteSql = "DELETE FROM sessions WHERE user_id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();
    
    $db->closeConnection();
}

/**
 * Set security headers
 */
function set_security_headers() {
    header('X-Frame-Options: DENY');
    header('X-XSS-Protection: 1; mode=block');
    header('X-Content-Type-Options: nosniff');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
}

/**
 * Sanitize input data
 */
function sanitize_input($data) {
    if (is_array($data)) {
        return array_map('sanitize_input', $data);
    }
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    
    return $data;
}

/**
 * Validate email format
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number format
 */
function validate_phone($phone) {
    return preg_match('/^[0-9]{10,15}$/', $phone) === 1;
}
?>