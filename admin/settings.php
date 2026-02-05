<?php
// Include security functions
require_once '../includes/security.php';

// Configure secure session FIRST (before any output)
secure_session_config();

// Set security headers
set_security_headers();

require_once '../includes/config.php';
require_once '../includes/database.php';

// Check if user is authenticated (temporary fix - disable session validation)
if (!is_authenticated()) {
    header('Location: login.php');
    exit;
}

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Handle form submission for general settings
if (isset($_POST['update_general_settings'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
        $error_message = 'Security token invalid or expired. Please refresh the page and try again.';
    } else {
        $site_title = $conn->real_escape_string($_POST['site_title']);
        $site_email = $conn->real_escape_string($_POST['site_email']);
        $contact_phone = $conn->real_escape_string($_POST['contact_phone']);
    $contact_address = $conn->real_escape_string($_POST['contact_address']);
    
    // Check if settings table exists, if not create it
    $conn->query("CREATE TABLE IF NOT EXISTS settings (
        id INT(11) NOT NULL AUTO_INCREMENT,
        setting_name VARCHAR(255) NOT NULL,
        setting_value TEXT NOT NULL,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY (setting_name)
    )");
    
    // Update or insert settings
    $settings = [
        'site_title' => $site_title,
        'site_email' => $site_email,
        'contact_phone' => $contact_phone,
        'contact_address' => $contact_address
    ];
    
    foreach ($settings as $name => $value) {
        $stmt = $conn->prepare("INSERT INTO settings (setting_name, setting_value) VALUES (?, ?) 
                               ON DUPLICATE KEY UPDATE setting_value = ?");
        $stmt->bind_param("sss", $name, $value, $value);
        $stmt->execute();
        $stmt->close();
    }
    
        $success_message = "General settings updated successfully!";
    }
}

// Handle password change
if (isset($_POST['change_password'])) {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
        $error_message = 'Security token invalid or expired. Please refresh the page and try again.';
    } else {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    
    // Validate input
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $password_error = "All password fields are required";
    } elseif ($new_password !== $confirm_password) {
        $password_error = "New passwords do not match";
    } elseif (strlen($new_password) < 8) {
        $password_error = "Password must be at least 8 characters long";
    } else {
        // Verify current password
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();
        
        if (password_verify($current_password, $hashed_password)) {
            // Update password
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $new_hashed_password, $user_id);
            $stmt->execute();
            $stmt->close();
            
            $password_success = "Password changed successfully!";
        } else {
            $password_error = "Current password is incorrect";
        }
    }
    }
}

// Get current settings
$settings = [
    'site_name' => 'OneClick Insurance',
    'site_email' => 'info@oneclickinsurance.com',
    'contact_phone' => '+91 9876543210',
    'enable_notifications' => '1',
    'maintenance_mode' => '0'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - OneClick Insurance Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="assets/css/admin-style.css" rel="stylesheet">
    
    <style>
        .nav-tabs .nav-link {
            color: #495057;
        }
        .nav-tabs .nav-link.active {
            font-weight: bold;
            border-bottom: 3px solid #0d6efd;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Settings</h1>
                </div>
                
                <!-- Settings Tabs -->
                <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">
                            <i class="fas fa-cog me-2"></i>General Settings
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                            <i class="fas fa-lock me-2"></i>Security
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab" aria-controls="notifications" aria-selected="false">
                            <i class="fas fa-bell me-2"></i>Notifications
                        </button>
                    </li>
                </ul>
                
                <!-- Tab Content -->
                <div class="tab-content" id="settingsTabsContent">
                    <!-- General Settings Tab -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">General Settings</h5>
                            </div>
                            <div class="card-body">
                                <?php if (isset($success_message)): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $success_message; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                
                                <form method="post" action="">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                                    
                                    <div class="mb-3">
                                        <label for="site_title" class="form-label">Site Title</label>
                                        <input type="text" class="form-control" id="site_title" name="site_title" value="<?php echo htmlspecialchars($settings['site_title'] ?? 'OneClick Insurance'); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="site_email" class="form-label">Site Email</label>
                                        <input type="email" class="form-control" id="site_email" name="site_email" value="<?php echo htmlspecialchars($settings['site_email'] ?? 'info@oneclickinsurance.com'); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact_phone" class="form-label">Contact Phone</label>
                                        <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo htmlspecialchars($settings['contact_phone'] ?? '+91 9876543210'); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="contact_address" class="form-label">Contact Address</label>
                                        <textarea class="form-control" id="contact_address" name="contact_address" rows="3"><?php echo htmlspecialchars($settings['contact_address'] ?? '123 Insurance Street, Mumbai, India'); ?></textarea>
                                    </div>
                                    <button type="submit" name="update_general_settings" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security Tab -->
                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Change Password</h5>
                            </div>
                            <div class="card-body">
                                <?php if (isset($password_error)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $password_error; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (isset($password_success)): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo $password_success; ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php endif; ?>
                                
                                <form method="post" action="">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                                    
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                    </div>
                                    <button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card mt-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Two-Factor Authentication</h5>
                            </div>
                            <div class="card-body">
                                <p>Enable two-factor authentication for enhanced security.</p>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="enable2FA">
                                    <label class="form-check-label" for="enable2FA">Enable Two-Factor Authentication</label>
                                </div>
                                <div class="mt-3" id="2fa-setup" style="display: none;">
                                    <p>Scan this QR code with your authenticator app:</p>
                                    <div class="text-center mb-3">
                                        <img src="https://via.placeholder.com/150" alt="QR Code" class="img-thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="verification_code" class="form-label">Verification Code</label>
                                        <input type="text" class="form-control" id="verification_code">
                                    </div>
                                    <button type="button" class="btn btn-primary">Verify & Enable</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notifications Tab -->
                    <div class="tab-pane fade" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Email Notifications</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="newInquiryNotification" checked>
                                            <label class="form-check-label" for="newInquiryNotification">New Inquiry Notifications</label>
                                        </div>
                                        <div class="form-text">Receive email notifications when new inquiries are submitted.</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="loginNotification" checked>
                                            <label class="form-check-label" for="loginNotification">Login Notifications</label>
                                        </div>
                                        <div class="form-text">Receive email notifications when someone logs into your account.</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="weeklyReportNotification">
                                            <label class="form-check-label" for="weeklyReportNotification">Weekly Report</label>
                                        </div>
                                        <div class="form-text">Receive weekly summary reports of website activity.</div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save Notification Settings</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Two-Factor Authentication toggle
        document.getElementById('enable2FA').addEventListener('change', function() {
            const setup = document.getElementById('2fa-setup');
            if (this.checked) {
                setup.style.display = 'block';
            } else {
                setup.style.display = 'none';
            }
        });
    </script>
</body>
</html>