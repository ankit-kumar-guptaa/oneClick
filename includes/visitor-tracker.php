<?php
/**
 * Visitor Tracking System
 * Tracks website visitors and maintains statistics
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require_once 'database.php';

class VisitorTracker {
    private $db;
    private $conn;
    
    /**
     * Constructor - Initialize database connection
     */
    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
        
        // Ensure tables exist
        $this->createTablesIfNotExist();
    }
    
    /**
     * Create necessary tables if they don't exist
     */
    private function createTablesIfNotExist() {
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
        
        // Create visitor_stats table
        $visitorStatsTable = "CREATE TABLE IF NOT EXISTS visitor_stats (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            page_url VARCHAR(255) NOT NULL,
            total_visits INT(11) DEFAULT 0,
            unique_visits INT(11) DEFAULT 0,
            UNIQUE KEY date_page (date, page_url)
        )";
        
        // Execute table creation queries
        $this->conn->query($visitorTable);
        $this->conn->query($visitorStatsTable);
    }
    
    /**
     * Track visitor
     */
    public function trackVisit() {
        // Get visitor information
        $ipAddress = $this->getIpAddress();
        $userAgent = $this->db->escapeString($_SERVER['HTTP_USER_AGENT'] ?? '');
        $pageVisited = $this->db->escapeString($_SERVER['REQUEST_URI'] ?? '');
        $referrerUrl = $this->db->escapeString($_SERVER['HTTP_REFERER'] ?? '');
        
        // Generate or get session ID
        if (!isset($_SESSION['visitor_session_id'])) {
            $_SESSION['visitor_session_id'] = session_id() . '_' . time();
        }
        $sessionId = $this->db->escapeString($_SESSION['visitor_session_id']);
        
        // Check if this is a unique visit (new session)
        $isUnique = $this->isUniqueVisit($sessionId, $ipAddress) ? 1 : 0;
        
        // Record visit in database
        $sql = "INSERT INTO visitors (ip_address, user_agent, page_visited, referrer_url, session_id, is_unique) 
                VALUES ('$ipAddress', '$userAgent', '$pageVisited', '$referrerUrl', '$sessionId', $isUnique)";
        
        $this->conn->query($sql);
        
        // Update daily statistics
        $this->updateDailyStats($pageVisited, $isUnique);
    }
    
    /**
     * Check if this is a unique visit
     */
    private function isUniqueVisit($sessionId, $ipAddress) {
        // Check if this session has been recorded today
        $today = date('Y-m-d');
        $sql = "SELECT id FROM visitors 
                WHERE session_id = '$sessionId' 
                AND DATE(visit_time) = '$today' 
                LIMIT 1";
        
        $result = $this->conn->query($sql);
        
        return ($result->num_rows == 0);
    }
    
    /**
     * Update daily visitor statistics
     */
    private function updateDailyStats($pageUrl, $isUnique) {
        $today = date('Y-m-d');
        
        // Check if we have a record for today and this page
        $sql = "SELECT id, total_visits, unique_visits FROM visitor_stats 
                WHERE date = '$today' AND page_url = '$pageUrl'";
        
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Update existing record
            $row = $result->fetch_assoc();
            $totalVisits = $row['total_visits'] + 1;
            $uniqueVisits = $row['unique_visits'] + $isUnique;
            
            $updateSql = "UPDATE visitor_stats 
                          SET total_visits = $totalVisits, unique_visits = $uniqueVisits 
                          WHERE id = " . $row['id'];
            
            $this->conn->query($updateSql);
        } else {
            // Create new record
            $insertSql = "INSERT INTO visitor_stats (date, page_url, total_visits, unique_visits) 
                          VALUES ('$today', '$pageUrl', 1, $isUnique)";
            
            $this->conn->query($insertSql);
        }
    }
    
    /**
     * Get visitor's IP address
     */
    private function getIpAddress() {
        // Get real IP address even if behind proxy
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        }
        
        return $this->db->escapeString($ip);
    }
    
    /**
     * Get visitor statistics for a date range
     */
    public function getVisitorStats($startDate, $endDate) {
        $startDate = $this->db->escapeString($startDate);
        $endDate = $this->db->escapeString($endDate);
        
        $sql = "SELECT SUM(total_visits) as total_visits, SUM(unique_visits) as unique_visits 
                FROM visitor_stats 
                WHERE date BETWEEN '$startDate' AND '$endDate'";
        
        $result = $this->conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        
        return ['total_visits' => 0, 'unique_visits' => 0];
    }
    
    /**
     * Get page-specific visitor statistics
     */
    public function getPageStats($startDate, $endDate) {
        $startDate = $this->db->escapeString($startDate);
        $endDate = $this->db->escapeString($endDate);
        
        $sql = "SELECT page_url, SUM(total_visits) as total_visits, SUM(unique_visits) as unique_visits 
                FROM visitor_stats 
                WHERE date BETWEEN '$startDate' AND '$endDate' 
                GROUP BY page_url 
                ORDER BY total_visits DESC";
        
        $result = $this->conn->query($sql);
        $stats = [];
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stats[] = $row;
            }
        }
        
        return $stats;
    }
    
    /**
     * Close database connection
     */
    public function __destruct() {
        $this->db->closeConnection();
    }
}

// Initialize visitor tracking if not in admin area
$currentPage = basename($_SERVER['PHP_SELF']);
if (!strpos($currentPage, 'admin')) {
    $tracker = new VisitorTracker();
    $tracker->trackVisit();
}
?>