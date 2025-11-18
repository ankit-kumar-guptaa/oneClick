<?php
/**
 * Process Partner Form Submission
 * Handles partner form validation, database storage, and email sending via SMTP
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection and PHPMailer
require_once 'database.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['partner_form'])) {
    
    // Create database connection
    $db = new Database();
    $conn = $db->getConnection();
    
    // Get form data and sanitize
    $contactPerson = $db->escapeString(trim($_POST['contactPerson'] ?? ''));
    $email = $db->escapeString(trim($_POST['email'] ?? ''));
    $phone = $db->escapeString(trim($_POST['phone'] ?? ''));
    $message = $db->escapeString(trim($_POST['message'] ?? ''));
    
    // Validate form data
    $errors = [];
    
    if (empty($contactPerson)) {
        $errors[] = 'Contact person name is required';
    }
    
    if (empty($email)) {
        $errors[] = 'Email address is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    
    if (empty($phone)) {
        $errors[] = 'Phone number is required';
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = 'Please enter a valid 10-digit phone number';
    }
    
    // If no validation errors, save to database and send email
    if (empty($errors)) {
        $sql = "INSERT INTO partner_enquiries (contact_person, email, phone, message) 
                VALUES ('$contactPerson', '$email', '$phone', '$message')";
        
        // First check if table exists, if not create it
        $tableCheck = $conn->query("SHOW TABLES LIKE 'partner_enquiries'");
        if ($tableCheck->num_rows == 0) {
            // Create the table
            $createTableSQL = "
                CREATE TABLE partner_enquiries (
                    id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    contact_person VARCHAR(255) NOT NULL,
                    email VARCHAR(255) NOT NULL,
                    phone VARCHAR(20) NOT NULL,
                    message TEXT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    status ENUM('new', 'contacted', 'rejected', 'accepted') DEFAULT 'new'
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
            ";
            
            if (!$conn->query($createTableSQL)) {
                $response['message'] = 'Database setup error. Please contact administrator.';
                $errors[] = 'Table creation failed: ' . $conn->error;
                $response['errors'] = $errors;
                
                // Close connection and return
                $db->closeConnection();
                
                // Return JSON response for AJAX or redirect for regular form
                if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['partner_errors'] = $response['errors'];
                    $_SESSION['partner_form_data'] = $_POST;
                    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
                    exit;
                }
            }
        }
        
        // Now insert the data
        if ($conn->query($sql)) {
            $response['success'] = true;
            $response['message'] = 'Thank you for your partnership interest! Our team will contact you shortly.';
            
            // Send email notification
            sendPartnerEmail($contactPerson, $email, $phone, $message);
            
            // Set success message in session for page redirect
            $_SESSION['partner_success'] = true;
            $_SESSION['partner_message'] = $response['message'];
        } else {
            $response['message'] = 'Sorry, there was an error processing your request. Please try again.';
            $errors[] = 'Database error: ' . $conn->error;
            $response['errors'] = $errors;
        }
    } else {
        $response['message'] = 'Please correct the errors below';
        $response['errors'] = $errors;
    }
    
    // Close database connection
    $db->closeConnection();
    
    // If it's an AJAX request, return JSON response
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    } else {
        // If it's a regular form submission, redirect back to the form page
        if ($response['success']) {
            // Redirect to the referring page or home page
            $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php';
            header("Location: $redirect");
            exit;
        } else {
            // Store errors in session and redirect back
            $_SESSION['partner_errors'] = $response['errors'];
            $_SESSION['partner_form_data'] = $_POST;
            
            $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php';
            header("Location: $redirect");
            exit;
        }
    }
}

/**
 * Send email notification for partner enquiry
 */
function sendPartnerEmail($contactPerson, $email, $phone, $message) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@oneclickinsurer.com';
        $mail->Password = 'Raja@123321@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        
        // Recipients
        $mail->setFrom('no-reply@oneclickinsurer.com', 'OneClick Insurance');
        $mail->addAddress('theankitkumarg@gmail.com', 'Support Team');
        $mail->addReplyTo($email, $contactPerson);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Partnership Enquiry - ' . $contactPerson;
        
        $emailBody = "
            <h2>New Partnership Enquiry Received</h2>
            <p><strong>Contact Person:</strong> {$contactPerson}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
            <hr>
            <p><em>This email was sent from the partnership form on OneClick Insurance website.</em></p>
        ";
        
        $mail->Body = $emailBody;
        $mail->AltBody = strip_tags($emailBody);
        
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log error but don't show to user
        error_log("Email sending failed: " . $mail->ErrorInfo);
        return false;
    }
}

?>