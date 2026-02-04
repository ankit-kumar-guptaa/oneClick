<?php
/**
 * Admin Logout
 */

// Include security functions
require_once '../includes/security.php';

// Set security headers
set_security_headers();

// Configure secure session
secure_session_config();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header('Location: login.php');
exit;
?>