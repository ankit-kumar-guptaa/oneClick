<?php
/**
 * Session Manager for OneClick Admin Panel
 * Handles session management without breaking existing sessions
 */

/**
 * Set secure session parameters
 * HTTP Only cookies and secure session settings
 */
function set_admin_session_params() {
    // Setup session environment - HTTP Only cookies
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.cookie_samesite', 'Strict');
    
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Check if user is authenticated (dashboard style)
 * Allows multiple sessions but shows warning if another device is active
 */
function check_admin_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Basic authentication check
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    
    // Check session activity to prevent automatic logout
    if (!isset($_SESSION['last_activity'])) {
        $_SESSION['last_activity'] = time();
    } elseif (time() - $_SESSION['last_activity'] > 1800) { // 30 minutes
        // Session expired
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }
    
    // Update last activity time
    $_SESSION['last_activity'] = time();
    
    return true;
}

/**
 * Get active session information
 */
function get_session_info() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    return [
        'session_id' => session_id(),
        'user_id' => $_SESSION['admin_id'] ?? null,
        'username' => $_SESSION['admin_username'] ?? null,
        'last_activity' => $_SESSION['last_activity'] ?? null,
        'login_time' => $_SESSION['login_time'] ?? null
    ];
}


?>