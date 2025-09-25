<?php
/**
 * Process Enquiry Form Submission
 * Handles form validation and database storage
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require_once 'database.php';

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Create database connection
    $db = new Database();
    $conn = $db->getConnection();
    
    // Get form data and sanitize
    $fullName = $db->escapeString(trim($_POST['fullName'] ?? ''));
    $email = $db->escapeString(trim($_POST['emailAddress'] ?? ''));
    $phone = $db->escapeString(trim($_POST['phoneNumber'] ?? ''));
    $insuranceType = $db->escapeString(trim($_POST['insuranceType'] ?? ''));
    $message = $db->escapeString(trim($_POST['message'] ?? ''));
    
    // Validate form data
    $errors = [];
    
    if (empty($fullName)) {
        $errors[] = 'Full name is required';
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
    
    if (empty($insuranceType)) {
        $errors[] = 'Please select an insurance type';
    }
    
    // If no validation errors, save to database
    if (empty($errors)) {
        $sql = "INSERT INTO enquiries (full_name, email, phone, insurance_type, message) 
                VALUES ('$fullName', '$email', '$phone', '$insuranceType', '$message')";
        
        if ($conn->query($sql)) {
            $response['success'] = true;
            $response['message'] = 'Thank you for your enquiry! Our team will contact you shortly.';
            
            // Set success message in session for page redirect
            $_SESSION['enquiry_success'] = true;
            $_SESSION['enquiry_message'] = $response['message'];
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
            $_SESSION['enquiry_errors'] = $response['errors'];
            $_SESSION['form_data'] = $_POST;
            
            $redirect = $_SERVER['HTTP_REFERER'] ?? 'index.php';
            header("Location: $redirect");
            exit;
        }
    }
}
?>