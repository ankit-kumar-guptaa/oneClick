<?php
session_start();
require_once 'includes/config.php';
require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - OneClick Insurance | India's Most Trusted Insurance Platform</title>
    <meta name="description" content="Learn about OneClick Insurance - India's leading insurance comparison platform. Our mission to make insurance simple and affordable for everyone.">
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
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
                        <span>About Us</span>
                    </nav>
                    <h1 class="page-title text-white">About OneClick Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">India's Most Trusted Insurance Comparison Platform</p>
                </div>
            </div>
        </div>
    </section>
    <?php include 'includes/enquiry-form.php'; ?>
    <!-- About Hero Section -->
    <section class="oci-about-hero py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="oneclick-section-label">Our Story</span>
                        <h2 class="about-title display-4 fw-bold mb-4">Making Insurance <span class="text-gradient">Simple & Affordable</span></h2>
                        <p class="about-desc lead mb-4">
                            OneClick Insurance is India's leading digital insurance platform, helping millions 
                            of customers compare and buy the best insurance policies online. We believe insurance 
                            should be simple, transparent, and accessible to everyone.
                        </p>
                        <div class="about-stats d-flex flex-wrap gap-4 mt-5">
                            <div class="stat-item text-center p-4 rounded-4 shadow-sm">
                                <h3 class="display-5 fw-bold text-gradient mb-2">5M+</h3>
                                <p class="mb-0 text-muted">Happy Customers</p>
                            </div>
                            <div class="stat-item text-center p-4 rounded-4 shadow-sm">
                                <h3 class="display-5 fw-bold text-gradient mb-2">50+</h3>
                                <p class="mb-0 text-muted">Insurance Partners</p>
                            </div>
                            <div class="stat-item text-center p-4 rounded-4 shadow-sm">
                                <h3 class="display-5 fw-bold text-gradient mb-2">12M+</h3>
                                <p class="mb-0 text-muted">Policies Sold</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image position-relative">
                        <div class="image-shape-bg"></div>
                        <img src="https://images.unsplash.com/photo-1560472355-536de3962603?w=600&h=400&fit=crop" 
                             alt="OneClick Insurance Team" class="img-fluid rounded-lg shadow-lg position-relative">
                        <div class="experience-badge">
                            <span class="years">10+</span>
                            <span class="text">Years of Excellence</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Vision Values -->
    <section class="oci-mvv-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <span class="oneclick-section-label">What Drives Us</span>
                    <h2 class="oneclick-section-title">Our Foundation</h2>
                    <p class="section-subtitle mx-auto">The core principles that guide everything we do at OneClick Insurance</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="mvv-card h-100 p-4 rounded-4 shadow-sm border-top border-primary border-3 transition-hover">
                        <div class="mvv-icon mb-4 rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex">
                            <i class="fas fa-bullseye fa-2x text-primary"></i>
                        </div>
                        <h4 class="mb-3 fw-bold">Our Mission</h4>
                        <p class="text-muted">To democratize insurance in India by making it simple, transparent, and accessible to every individual and family through technology-driven solutions.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mvv-card h-100 p-4 rounded-4 shadow-sm border-top border-primary border-3 transition-hover">
                        <div class="mvv-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4>Our Vision</h4>
                        <p>To become India's most trusted insurance platform, empowering millions to make informed insurance decisions and secure their financial future.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mvv-card">
                        <div class="mvv-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Our Values</h4>
                        <ul class="values-list">
                            <li>Customer First</li>
                            <li>Transparency</li>
                            <li>Innovation</li>
                            <li>Integrity</li>
                            <li>Excellence</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="oci-why-choose py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Why Choose OneClick Insurance?</h2>
                    <p class="section-subtitle">What makes us India's most trusted insurance platform</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h5>Easy Comparison</h5>
                        <p>Compare 50+ insurance companies in one place and find the best deal for you.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h5>Best Prices</h5>
                        <p>Get exclusive discounts and lowest premium rates guaranteed.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h5>Quick Process</h5>
                        <p>Buy insurance in just 2 minutes with our simple online process.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5>24/7 Support</h5>
                        <p>Expert assistance available round the clock for all your queries.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards & Certifications -->
    <section class="oci-awards py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title">Awards & Recognition</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4 text-center">
                        <div class="col-md-3 col-6">
                            <div class="award-item">
                                <div class="award-icon">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <h6>Best Insurance Platform</h6>
                                <p>Digital India Awards 2024</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="award-item">
                                <div class="award-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h6>Customer Choice Award</h6>
                                <p>Insurance Industry 2024</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="award-item">
                                <div class="award-icon">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <h6>IRDAI Certified</h6>
                                <p>Licensed Insurance Broker</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="award-item">
                                <div class="award-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h6>ISO 27001</h6>
                                <p>Information Security</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="oci-cta py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="cta-title">Ready to Get Started?</h2>
                    <p class="cta-subtitle">Join millions of satisfied customers and get the best insurance deals today!</p>
                    <div class="cta-buttons">
                        <a href="index.php" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-search"></i>
                            Get Free Quote
                        </a>
                        <a href="contact-us.php" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-phone"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>
