<?php
// Simple test to check if PHP is working
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "PHP is working!<br>";

// Test basic session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo "Session started successfully!<br>";

// Test database connection
try {
    require_once 'includes/database.php';
    $db = new Database();
    $conn = $db->getConnection();
    echo "Database connection successful!<br>";
    $db->closeConnection();
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage() . "<br>";
}

// Test security functions
try {
    require_once 'includes/security.php';
    echo "Security functions loaded!<br>";
    
    // Test basic authentication
    $result = is_authenticated();
    echo "is_authenticated() returned: " . ($result ? 'true' : 'false') . "<br>";
    
} catch (Exception $e) {
    echo "Security functions error: " . $e->getMessage() . "<br>";
}

echo "All tests completed successfully!<br>";
?>