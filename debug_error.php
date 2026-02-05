<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test session and security functions
require_once 'includes/security.php';

echo "Testing security functions...<br>";

// Test secure session config
try {
    secure_session_config();
    echo "secure_session_config() successful<br>";
} catch (Exception $e) {
    echo "secure_session_config() error: " . $e->getMessage() . "<br>";
}

// Test is_authenticated_secure
try {
    $result = is_authenticated_secure();
    echo "is_authenticated_secure() returned: " . ($result ? 'true' : 'false') . "<br>";
} catch (Exception $e) {
    echo "is_authenticated_secure() error: " . $e->getMessage() . "<br>";
}

// Test session ownership validation
try {
    $result = validate_session_ownership();
    echo "validate_session_ownership() returned: " . ($result ? 'true' : 'false') . "<br>";
} catch (Exception $e) {
    echo "validate_session_ownership() error: " . $e->getMessage() . "<br>";
}

echo "All tests completed!<br>";
?>