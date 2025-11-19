<?php
require_once 'includes/session-handler.php';
require_once 'includes/config.php';
require_once 'includes/database.php';
require_once 'includes/schema.php';
require_once 'includes/auth.php';

// Redirect if already logged in
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: /dashboard");
    exit();
}

// Initialize DB and ensure schema
$db = new Database();
$conn = $db->getConnection();
ensure_app_schema($conn);

$error = '';
$success = '';
$verify_required = false;

// Handle Sign In
if (isset($_POST['signin'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        $error = 'Please enter both email and password';
    } else {
        $res = login_user($conn, $email, $password);
        if (!empty($res['verify_required'])) {
            $verify_required = true;
            $error = $res['message'];
        } elseif ($res['success']) {
            header("Location: /dashboard");
            exit();
        } else {
            $error = $res['message'] ?? 'Login failed';
        }
    }
}

// Handle Sign Up
if (isset($_POST['signup'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['signup_email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = trim($_POST['signup_password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if ($name === '' || $email === '' || $phone === '' || $password === '' || $confirm_password === '') {
        $error = 'Please fill all fields';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } else {
        $res = create_user($conn, $name, $email, $phone, $password);
        if ($res['success']) {
            $success = 'Account created. Please verify your email using the OTP sent.';
            $verify_required = true;
        } else {
            $error = $res['message'] ?? 'Error creating account. Please try again.';
        }
    }
}

// Handle OTP Verification
if (isset($_POST['verify_otp'])) {
    $email = trim($_POST['verify_email'] ?? ($_SESSION['pending_verification_email'] ?? ''));
    $code = trim($_POST['otp_code'] ?? '');
    if ($email === '' || $code === '') {
        $error = 'Please enter the OTP code.';
        $verify_required = true;
    } else {
        $res = verify_otp($conn, $email, $code);
        if ($res['success']) {
            header("Location: /dashboard");
            exit();
        } else {
            $error = $res['message'] ?? 'Invalid OTP';
            $verify_required = true;
        }
    }
}

// Resend OTP
if (isset($_POST['resend_otp'])) {
    $email = trim($_POST['verify_email'] ?? ($_SESSION['pending_verification_email'] ?? ''));
    if ($email !== '') {
        $res = resend_otp($conn, $email);
        $success = $res['success'] ? 'OTP sent again to your email.' : ($res['message'] ?? 'Failed to resend OTP');
        $verify_required = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - OneClick Insurance</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --bg-light: #f9fafb;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--text-primary);
            line-height: 1.6;
        }
        
        .auth-container {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            width: 100%;
            max-width: 440px;
        }
        
        .auth-header {
            padding: 32px 32px 24px;
            text-align: center;
            border-bottom: 1px solid var(--border-color);
        }
        
        .auth-logo {
            width: 100px;
            margin-bottom: 20px;
        }
        
        .auth-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-primary);
        }
        
        .auth-subtitle {
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-bottom: 0;
        }
        
        .auth-content {
            padding: 32px;
        }
        
        .auth-tabs {
            margin-bottom: 24px;
        }
        
        .nav-pills {
            background: var(--bg-light);
            border-radius: 8px;
            padding: 4px;
        }
        
        .nav-pills .nav-link {
            padding: 8px 16px;
            font-weight: 500;
            border-radius: 6px;
            color: var(--text-secondary);
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }
        
        .nav-pills .nav-link.active {
            background: white;
            color: var(--primary-color);
            box-shadow: var(--shadow-sm);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 8px;
            font-size: 0.875rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: white;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .form-control::placeholder {
            color: var(--text-secondary);
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .btn-primary {
            width: 100%;
            padding: 12px 20px;
            background: var(--primary-color);
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }
        
        .alert-danger {
            background: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
        }
        
        .alert-success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #16a34a;
        }
        
        .auth-footer {
            padding: 24px 32px;
            text-align: center;
            border-top: 1px solid var(--border-color);
            background: var(--bg-light);
        }
        
        .auth-footer-text {
            font-size: 0.75rem;
            color: var(--text-secondary);
        }
        
        .auth-footer-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .auth-footer-link:hover {
            text-decoration: underline;
        }
        
        .position-relative {
            position: relative;
        }
        
        @media (max-width: 480px) {
            .auth-container {
                border-radius: 8px;
            }
            
            .auth-header,
            .auth-content {
                padding: 24px;
            }
            
            .auth-footer {
                padding: 20px 24px;
            }
        }
    </style>
</head>
<body>
    
    <div class="auth-container">
        <!-- Header -->
        <div class="auth-header">
            <img src="assets/img/logo.jpg" alt="OneClick Insurance" class="auth-logo">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Sign in to your account to continue</p>
        </div>
        
        <!-- Content -->
        <div class="auth-content">
            <!-- Tabs -->
            <ul class="nav nav-pills auth-tabs" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="signin-tab" data-bs-toggle="pill" data-bs-target="#signin" type="button" role="tab" aria-controls="signin" aria-selected="true">
                        Sign In
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="signup-tab" data-bs-toggle="pill" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">
                        Sign Up
                    </button>
                </li>
            </ul>
            
            <!-- Alerts -->
            <?php if ($error): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <?php if ($verify_required || isset($_SESSION['pending_verification_email'])): ?>
                <div class="alert alert-success" style="background:#eff6ff;border-color:#dbeafe;color:#1d4ed8;">
                    An OTP has been sent to <?php echo htmlspecialchars($_SESSION['pending_verification_email'] ?? 'your email'); ?>. Please enter it below to verify.
                </div>
                <form method="POST" action="" class="mb-3">
                    <input type="hidden" name="verify_email" value="<?php echo htmlspecialchars($_SESSION['pending_verification_email'] ?? ($email ?? '')); ?>">
                    <div class="form-group">
                        <label for="otp_code" class="form-label">OTP Code</label>
                        <input type="text" class="form-control" id="otp_code" name="otp_code" placeholder="6-digit code" pattern="\d{6}" maxlength="6" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="verify_otp" class="btn btn-primary">Verify Email</button>
                    </div>
                </form>
                <form method="POST" action="">
                    <input type="hidden" name="verify_email" value="<?php echo htmlspecialchars($_SESSION['pending_verification_email'] ?? ($email ?? '')); ?>">
                    <button type="submit" name="resend_otp" class="btn btn-secondary" style="width:100%;">Resend OTP</button>
                </form>
            <?php endif; ?>
            
            <!-- Tab Content -->
            <div class="tab-content" id="authTabsContent">
                <!-- Sign In Form -->
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                <span class="password-toggle" onclick="togglePassword('password')">
                                    Show
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="signin" class="btn btn-primary">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Sign Up Form -->
                <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="signup_email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="signup_email" name="signup_email" placeholder="Enter your email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="signup_password" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="signup_password" name="signup_password" placeholder="Create password" required>
                                <span class="password-toggle" onclick="togglePassword('signup_password')">
                                    Show
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                                <span class="password-toggle" onclick="togglePassword('confirm_password')">
                                    Show
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="signup" class="btn btn-primary">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="auth-footer">
            <p class="auth-footer-text">
                By continuing, you agree to our 
                <a href="#" class="auth-footer-link">Terms of Service</a> and 
                <a href="#" class="auth-footer-link">Privacy Policy</a>
            </p>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const toggle = input.parentNode.querySelector('.password-toggle');
            
            if (input.type === 'password') {
                input.type = 'text';
                toggle.textContent = 'Hide';
            } else {
                input.type = 'password';
                toggle.textContent = 'Show';
            }
        }
        
        // Smooth tab transitions
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('[data-bs-toggle="pill"]');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Add smooth transition effect
                    const forms = document.querySelectorAll('.tab-pane');
                    forms.forEach(form => {
                        form.style.opacity = '0';
                        form.style.transform = 'translateY(10px)';
                    });
                    
                    setTimeout(() => {
                        const activeForm = document.querySelector('.tab-pane.active');
                        if (activeForm) {
                            activeForm.style.opacity = '1';
                            activeForm.style.transform = 'translateY(0)';
                        }
                    }, 150);
                });
            });
        });
    </script>
</body>
</html>