<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test database connection
require_once 'includes/database.php';

try {
    $db = new Database();
    $conn = $db->getConnection();
    echo "Database connection successful!<br>";
    
    // Check if sessions table exists
    $result = $conn->query("SHOW TABLES LIKE 'sessions'");
    if ($result->num_rows > 0) {
        echo "Sessions table exists!<br>";
    } else {
        echo "Sessions table does NOT exist!<br>";
        // Let's try to create it
        $createTable = "CREATE TABLE IF NOT EXISTS sessions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            session_id VARCHAR(128) NOT NULL,
            ip_address VARCHAR(45) NOT NULL,
            user_agent TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY unique_session (user_id, session_id)
        )";
        
        if ($conn->query($createTable)) {
            echo "Sessions table created successfully!<br>";
        } else {
            echo "Error creating sessions table: " . $conn->error . "<br>";
        }
    }
    
    $db->closeConnection();
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage() . "<br>";
}

// Test security functions
require_once 'includes/security.php';

echo "Security functions loaded successfully!<br>";
?>