<?php
/**
 * Admin Login Page
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection and security functions
require_once '../includes/database.php';
require_once '../includes/security.php';
require_once '../includes/recaptcha_config.php';

// Set security headers
set_security_headers();

// Configure secure session
secure_session_config();

// Check if user is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

// Initialize variables
$error = '';
$username = '';

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
        $error = 'Security token invalid or expired. Please refresh the page and try again.';
    } else {
        // Create database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        // Get form data and sanitize
        $username = sanitize_input(trim($_POST['username'] ?? ''));
        $password = trim($_POST['password'] ?? '');
        
        // Validate form data
        if (empty($username) || empty($password)) {
            $error = 'Please enter both username and password';
        } elseif (!isset($_POST['g-recaptcha-response']) || !validate_recaptcha($_POST['g-recaptcha-response'])) {
            $error = 'Please complete the reCAPTCHA verification';
        } else {
            // Check user credentials using prepared statement
            $sql = "SELECT id, username, password FROM users WHERE username = ? AND role = 'admin' LIMIT 1";
            $stmt = $conn->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();
                    
                    // Verify password
                    if (password_verify($password, $user['password'])) {
                        // Set session variables
                        $_SESSION['admin_logged_in'] = true;
                        $_SESSION['admin_id'] = $user['id'];
                        $_SESSION['admin_username'] = $user['username'];
                        $_SESSION['last_activity'] = time();
                        
                        // Track session to prevent multiple logins
                        track_user_session($user['id']);
                        
                        // Update last login time (with error handling)
                        try {
                            $updateSql = "UPDATE users SET last_login = NOW() WHERE id = ?";
                            $updateStmt = $conn->prepare($updateSql);
                            if ($updateStmt) {
                                $updateStmt->bind_param('i', $user['id']);
                                $updateStmt->execute();
                                $updateStmt->close();
                            }
                        } catch (Exception $e) {
                            // Log error but don't break login process
                            error_log("Failed to update last login: " . $e->getMessage());
                        }
                        
                        // Close statements
                        $stmt->close();
                        
                        // Redirect to admin dashboard
                        header('Location: index.php');
                        exit;
                    } else {
                        $error = 'Invalid username or password';
                    }
                } else {
                    $error = 'Invalid username or password';
                }
                
                // Close statement
                $stmt->close();
            } else {
                $error = 'Database error. Please try again.';
            }
        }
    }
    
    // Close database connection
    $db->closeConnection();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneClick Insurance - Admin Login</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- reCAPTCHA Script -->
    <?php echo recaptcha_script(); ?>
    
    <style>
        :root {
            --oci-primary: #6f42c1;
            --oci-secondary: #20c997;
            --oci-dark: #343a40;
            --oci-light: #f8f9fa;
            --oci-gradient-purple: linear-gradient(135deg, #6f42c1 0%, #4582ec 100%);
        }
        
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
        }
        
        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }
        
        .card-header {
            background: var(--oci-gradient-purple);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            border-bottom: none;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .btn-primary {
            background: var(--oci-gradient-purple);
            border: none;
            padding: 0.75rem;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(111, 66, 193, 0.3);
        }
        
        .form-control {
            padding: 0.75rem 0.75rem;
            border: 1px solid #e1e5eb;
        }
        
        .form-control:focus {
            border-color: var(--oci-primary);
            box-shadow: 0 0 0 0.25rem rgba(111, 66, 193, 0.25);
        }
        
        .input-group-text {
            background-color: #f8f9fa;
            border-color: #e1e5eb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <div class="logo">OneClick Insurance</div>
                <p class="mb-0">Admin Panel Login</p>
            </div>
            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <!-- Login Form -->
                <form action="login.php" method="POST" class="needs-validation" novalidate>
                    <!-- CSRF Token -->
                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                    
                    <div class="mb-3">
                        <label for="username" class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    
                    <!-- reCAPTCHA -->
                    <div class="mb-4">
                        <?php echo render_recaptcha(); ?>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <a href="../index.php" class="text-decoration-none">
                    <i class="fas fa-arrow-left me-1"></i> Back to Website
                </a>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>