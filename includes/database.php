<?php
/**
 * Database Connection Class
 * Handles database connection and operations for OneClick Insurance
 */
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "oneclick";
    private $conn;
    // private $host = "localhost";
    // private $username = "u511651506_oneclick";
    // private $password = "Raja@123321@";
    // private $database = "u511651506_oneclick";
    // private $conn;

    /**
     * Constructor - Establishes database connection
     */
    public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            
            $this->conn->set_charset("utf8mb4");
        } catch (Exception $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            // Create database if it doesn't exist
            $this->createDatabase();
        }
    }

    /**
     * Create database if it doesn't exist
     */
    private function createDatabase() {
        try {
            $tempConn = new mysqli($this->host, $this->username, $this->password);
            
            if ($tempConn->connect_error) {
                throw new Exception("Connection failed: " . $tempConn->connect_error);
            }
            
            $sql = "CREATE DATABASE IF NOT EXISTS " . $this->database;
            if ($tempConn->query($sql) === TRUE) {
                $tempConn->close();
                
                // Connect to the newly created database
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
                $this->conn->set_charset("utf8mb4");
                
                // Create necessary tables
                $this->createTables();
            } else {
                throw new Exception("Error creating database: " . $tempConn->error);
            }
        } catch (Exception $e) {
            die("Database Setup Error: " . $e->getMessage());
        }
    }

    /**
     * Create necessary tables for the application
     */
    private function createTables() {
        // Create users table
        $userTable = "CREATE TABLE IF NOT EXISTS users (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            full_name VARCHAR(100) NOT NULL,
            role ENUM('admin', 'manager', 'staff') NOT NULL DEFAULT 'staff',
            last_login DATETIME NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        // Create enquiries table
        $enquiryTable = "CREATE TABLE IF NOT EXISTS enquiries (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            insurance_type VARCHAR(50) NOT NULL,
            message TEXT,
            status ENUM('new', 'in_progress', 'contacted', 'converted', 'closed') NOT NULL DEFAULT 'new',
            assigned_to INT(11) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
        )";
        
        // Create visitors table
        $visitorTable = "CREATE TABLE IF NOT EXISTS visitors (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            ip_address VARCHAR(45) NOT NULL,
            user_agent TEXT,
            page_visited VARCHAR(255) NOT NULL,
            referrer_url TEXT,
            visit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            session_id VARCHAR(255) NOT NULL,
            is_unique TINYINT(1) DEFAULT 1
        )";
        
        // Create visitor_stats table for aggregated data
        $visitorStatsTable = "CREATE TABLE IF NOT EXISTS visitor_stats (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            page_url VARCHAR(255) NOT NULL,
            total_visits INT(11) DEFAULT 0,
            unique_visits INT(11) DEFAULT 0,
            UNIQUE KEY date_page (date, page_url)
        )";
        
        // Create enquiry_notes table
        $enquiryNotesTable = "CREATE TABLE IF NOT EXISTS enquiry_notes (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            enquiry_id INT(11) NOT NULL,
            user_id INT(11) NOT NULL,
            note TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (enquiry_id) REFERENCES enquiries(id) ON DELETE CASCADE,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        // Execute table creation queries
        $this->conn->query($userTable);
        $this->conn->query($enquiryTable);
        $this->conn->query($visitorTable);
        $this->conn->query($visitorStatsTable);
        $this->conn->query($enquiryNotesTable);
        
        // Create default admin user
        $this->createDefaultAdmin();
    }

    /**
     * Create default admin user
     */
    private function createDefaultAdmin() {
        $username = "admin";
        $password = password_hash("admin123", PASSWORD_DEFAULT);
        $email = "admin@oneclick.com";
        $fullName = "Admin User";
        
        $checkAdmin = "SELECT id FROM users WHERE username = 'admin' LIMIT 1";
        $result = $this->conn->query($checkAdmin);
        
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO users (username, password, email, full_name, role) 
                    VALUES ('$username', '$password', '$email', '$fullName', 'admin')";
            $this->conn->query($sql);
        }
    }

    /**
     * Get database connection
     */
    public function getConnection() {
        return $this->conn;
    }

    /**
     * Close database connection
     */
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    /**
     * Execute a query
     */
    public function query($sql) {
        return $this->conn->query($sql);
    }

    /**
     * Get last inserted ID
     */
    public function getLastId() {
        return $this->conn->insert_id;
    }

    /**
     * Escape string to prevent SQL injection
     */
    public function escapeString($string) {
        return $this->conn->real_escape_string($string);
    }
}
?>