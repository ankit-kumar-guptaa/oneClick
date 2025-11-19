<?php
session_start();
require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - OneClick Insurance | Get in Touch With Our Team</title>
    <meta name="description" content="Contact OneClick Insurance for any queries, support or feedback. Our team is available 24/7 to assist you with all your insurance needs.">
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Leaflet CSS for Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    
    <style>
        /* Contact Page Specific Styles */
        .contact-card {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-top: 4px solid #4e73df;
            height: 100%;
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        
        .contact-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
        }
        
        .contact-form .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .contact-form .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
        }
        
        .contact-form label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .map-container {
            height: 400px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        #contact-map {
            height: 100%;
            width: 100%;
        }
        
        .floating-info-card {
            position: absolute;
            top: 50%;
            right: 30px;
            transform: translateY(-50%);
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            z-index: 999;
        }
        
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
        }
        
        .contact-info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(78, 115, 223, 0.1);
            color: #4e73df;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .social-links {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4e73df;
            transition: all 0.3s;
        }
        
        .social-link:hover {
            background: #4e73df;
            color: white;
            transform: translateY(-3px);
        }
        
        .contact-cta {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border-radius: 16px;
            padding: 60px 0;
            position: relative;
            overflow: hidden;
        }
        
        .contact-cta::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            top: -100px;
            right: -100px;
        }
        
        .contact-cta::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            bottom: -50px;
            left: -50px;
        }
        
        .pulse-btn {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
            }
        }
        
        .faq-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .faq-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .faq-card .card-header {
            background: white;
            border-bottom: none;
            padding: 20px;
        }
        
        .faq-card .btn-link {
            color: #212529;
            text-decoration: none;
            font-weight: 600;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .faq-card .btn-link:hover, .faq-card .btn-link:focus {
            color: #4e73df;
            text-decoration: none;
        }
        
        .faq-card .card-body {
            padding: 0 20px 20px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .floating-info-card {
                position: static;
                transform: none;
                margin-top: 20px;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Page Header -->
    <section class="oci-page-header bg-gradient-primary">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <nav class="oci-breadcrumb">
                        <a href="index.php">Home</a>
                        <span>/</span>
                        <span>Contact Us</span>
                    </nav>
                    <h1 class="page-title text-white animate__animated animate__fadeInUp">Get In Touch</h1>
                    <p class="page-subtitle text-white opacity-75 animate__animated animate__fadeInUp animate__delay-1s">We're here to help with all your insurance needs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <h3 class="h4 mb-3">Call Us</h3>
                        <p class="mb-2">Customer Support</p>
                        <a href="tel:+918000800080" class="h5 text-primary text-decoration-none">+91 8000 800 080</a>
                        <p class="text-muted mt-3 mb-0">Available 24/7 for your queries</p>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="h4 mb-3">Email Us</h3>
                        <p class="mb-2">For Support & Inquiries</p>
                        <a href="mailto:support@oneclickinsurance.com" class="h5 text-primary text-decoration-none">support@oneclickinsurance.com</a>
                        <p class="text-muted mt-3 mb-0">We'll respond within 24 hours</p>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="contact-card text-center p-4">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="h4 mb-3">Visit Us</h3>
                        <p class="mb-2">Corporate Headquarters</p>
                        <address class="h5 text-primary mb-0 fw-normal">OneClick Tower, Cyber City<br>Gurugram, Haryana 122002</address>
                        <p class="text-muted mt-3 mb-0">Mon-Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <span class="oneclick-section-label animate__animated animate__fadeIn">Reach Out</span>
                    <h2 class="oneclick-section-title animate__animated animate__fadeInUp">Send Us a Message</h2>
                    <p class="section-subtitle mx-auto animate__animated animate__fadeInUp animate__delay-1s">Have questions or need assistance? Fill out the form below and our team will get back to you shortly.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6 animate__animated animate__fadeInLeft">
                    <div class="contact-form bg-white p-4 p-lg-5 rounded-4 shadow-sm">
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Your Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <select class="form-control" id="subject" required>
                                            <option value="" selected disabled>Select a subject</option>
                                            <option value="General Inquiry">General Inquiry</option>
                                            <option value="Policy Support">Policy Support</option>
                                            <option value="Claims Assistance">Claims Assistance</option>
                                            <option value="Feedback">Feedback</option>
                                            <option value="Partnership">Partnership Opportunity</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Your Message</label>
                                        <textarea class="form-control" id="message" rows="5" placeholder="Type your message here..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                        <label class="form-check-label" for="agreeTerms">
                                            I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 animate__animated animate__fadeInRight">
                    <div class="map-container position-relative">
                        <div id="contact-map"></div>
                        <div class="floating-info-card d-none d-lg-block">
                            <h4 class="mb-4">Contact Information</h4>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="h6 mb-1">Our Location</h5>
                                    <p class="mb-0">OneClick Tower, Cyber City, Gurugram, Haryana 122002</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="h6 mb-1">Email Address</h5>
                                    <p class="mb-0">support@oneclickinsurance.com</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h5 class="h6 mb-1">Phone Number</h5>
                                    <p class="mb-0">+91 8000 800 080</p>
                                </div>
                            </div>
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <span class="oneclick-section-label animate__animated animate__fadeIn">FAQs</span>
                    <h2 class="oneclick-section-title animate__animated animate__fadeInUp">Frequently Asked Questions</h2>
                    <p class="section-subtitle mx-auto animate__animated animate__fadeInUp animate__delay-1s">Find quick answers to common questions about contacting us and our support services</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="contactFAQ">
                        <div class="faq-card card mb-3 animate__animated animate__fadeInUp">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        What are your customer support hours?
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#contactFAQ">
                                <div class="card-body">
                                    Our customer support team is available 24/7 to assist you with any queries or concerns. You can reach us via phone, email, or the contact form on this page at any time, and we'll respond promptly.
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card mb-3 animate__animated animate__fadeInUp animate__delay-1s">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        How quickly will I receive a response to my inquiry?
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFAQ">
                                <div class="card-body">
                                    We strive to respond to all inquiries within 24 hours. For urgent matters, we recommend calling our customer support line for immediate assistance. Email and contact form submissions are typically addressed within one business day.
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card mb-3 animate__animated animate__fadeInUp animate__delay-2s">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How can I file an insurance claim?
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#contactFAQ">
                                <div class="card-body">
                                    To file an insurance claim, you can call our dedicated claims hotline at +91 8000 800 090, email us at claims@oneclickinsurance.com, or use the claims section in your OneClick Insurance account. Our claims team will guide you through the process and help you submit all necessary documentation.
                                </div>
                            </div>
                        </div>
                        <div class="faq-card card animate__animated animate__fadeInUp animate__delay-3s">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Can I visit your office for in-person assistance?
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#contactFAQ">
                                <div class="card-body">
                                    Yes, you're welcome to visit our corporate headquarters in Gurugram for in-person assistance. Our office is open Monday through Friday from 9:00 AM to 6:00 PM. We recommend scheduling an appointment in advance to ensure that a representative is available to assist you with your specific needs.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="contact-cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="display-5 fw-bold mb-4 animate__animated animate__fadeInUp">Need Immediate Assistance?</h2>
                    <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">Our insurance experts are just a call away. Get personalized support for all your insurance needs.</p>
                    <a href="tel:+918000800080" class="btn btn-light btn-lg pulse-btn animate__animated animate__fadeInUp animate__delay-2s">
                        <i class="fas fa-phone-alt me-2"></i> Call Us Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS for Map -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Custom JS -->
    <script>
        // Initialize the map
        document.addEventListener('DOMContentLoaded', function() {
            // Create map
            const map = L.map('contact-map').setView([28.4595, 77.0266], 15); // Gurugram coordinates
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Add marker for office location
            const officeIcon = L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/npm/leaflet@1.9.4/dist/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34]
            });
            
            const marker = L.marker([28.4595, 77.0266], {icon: officeIcon}).addTo(map);
            marker.bindPopup("<b>OneClick Insurance</b><br>Corporate Headquarters").openPopup();
            
            // Form submission
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Here you would normally send the form data to your server
                    // For demo purposes, we'll just show an alert
                    alert('Thank you for your message! We will get back to you shortly.');
                    contactForm.reset();
                });
            }
            
            // Animate elements when they come into view
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.animate__animated');
                elements.forEach(element => {
                    const position = element.getBoundingClientRect();
                    // Check if element is in viewport
                    if(position.top < window.innerHeight && position.bottom >= 0) {
                        element.classList.add('animate__fadeInUp');
                    }
                });
            };
            
            // Run on scroll
            window.addEventListener('scroll', animateOnScroll);
            // Run once on page load
            animateOnScroll();
        });
    </script>
</body>
</html>