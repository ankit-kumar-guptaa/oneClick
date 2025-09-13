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
    <meta name="description" content="OneClick Insurance - Best Insurance Plans at Lowest Prices">
    <title>OneClick Insurance - Your Trusted Insurance Partner</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Swiper CSS for Slider -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <!-- Home Page Content -->
    <main class="oneclick-main-content">
       <!-- Hero Section with Image Slider -->
    <section class="oneclick-hero-section">
    <div class="container">
        <div class="row align-items-center min-vh-85">
            <div class="col-lg-6">
                <div class="oneclick-hero-content">
                    <div class="oneclick-hero-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>India's Most Trusted Insurance Platform</span>
                    </div>
                    <h1 class="oneclick-hero-title">
                        Get the <span class="oneclick-text-gradient">Best Insurance</span><br>
                        Insurance Hai Zaroori !
                    </h1>
                    <p class="oneclick-hero-subtitle">
                        Compare 50+ insurance companies and save up to 85% on premiums. 
                        Quick, easy, and completely secure process.
                    </p>
                    <div class="oneclick-hero-features">
                        <div class="oneclick-feature-item">
                            <div class="oneclick-feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="oneclick-feature-text">
                                <span class="feature-number">50+</span>
                                <span class="feature-label">Insurance Partners</span>
                            </div>
                        </div>
                        <div class="oneclick-feature-item">
                            <div class="oneclick-feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="oneclick-feature-text">
                                <span class="feature-number">2 Min</span>
                                <span class="feature-label">Quick Process</span>
                            </div>
                        </div>
                        <div class="oneclick-feature-item">
                            <div class="oneclick-feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="oneclick-feature-text">
                                <span class="feature-number">5M+</span>
                                <span class="feature-label">Happy Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="oneclick-hero-actions">
                        <button class="oneclick-btn-primary oneclick-btn-large">
                            <i class="fas fa-search"></i>
                            Get Free Quote
                        </button>
                        <button class="oneclick-btn-outline oneclick-btn-large">
                            <i class="fas fa-phone"></i>
                            Call Expert
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Image Slider Component -->
                <div class="oneclick-hero-slider">
                    <div class="swiper heroSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="oneclick-slider-card">
                                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=500&h=350&fit=crop" alt="Car Insurance">
                                    <div class="slider-overlay">
                                        <h4>Car Insurance</h4>
                                        <p>Starting from ₹2,999/year</p>
                                        <span class="slider-badge">Up to 85% Off</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="oneclick-slider-card">
                                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=500&h=350&fit=crop" alt="Health Insurance">
                                    <div class="slider-overlay">
                                        <h4>Health Insurance</h4>
                                        <p>Starting from ₹199/month</p>
                                        <span class="slider-badge">Free Health Checkup</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="oneclick-slider-card">
                                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=500&h=350&fit=crop" alt="Home Insurance">
                                    <div class="slider-overlay">
                                        <h4>Home Insurance</h4>
                                        <p>Complete Protection</p>
                                        <span class="slider-badge">Instant Coverage</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


        <!-- Quick Quote Section -->
        <section class="oneclick-quote-section py-5">
            <div class="container">
                <div class="oneclick-quote-card">
                    <h3 class="quote-title">Get Instant Quote</h3>
                    <div class="row g-3">
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select oneclick-form-control">
                                <option>Select Insurance Type</option>
                                <option>Car Insurance</option>
                                <option>Health Insurance</option>
                                <option>Home Insurance</option>
                                <option>Travel Insurance</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <input type="text" class="form-control oneclick-form-control" placeholder="Your Name">
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <input type="tel" class="form-control oneclick-form-control" placeholder="Mobile Number">
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <input type="email" class="form-control oneclick-form-control" placeholder="Email Address">
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <select class="form-select oneclick-form-control">
                                <option>Select City</option>
                                <option>Mumbai</option>
                                <option>Delhi</option>
                                <option>Bangalore</option>
                                <option>Chennai</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6">
                            <button class="btn oneclick-btn-primary w-100">
                                <i class="fas fa-paper-plane"></i>
                                Get Quote
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Insurance Products Section - Clickable Cards -->
<section class="oneclick-products-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="products-main-title">Insurance Products</h2>
            </div>
        </div>
        
        <div class="row g-3">
            <!-- Term Life Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="term-life-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">Lowest Price</div>
                        <div class="product-icon-box purple-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h6 class="product-title">Term Life Insurance</h6>
                    </div>
                </a>
            </div>
            
            <!-- Health Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="health-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">FREE Home Visit</div>
                        <div class="product-icon-box red-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h6 class="product-title">Health Insurance</h6>
                    </div>
                </a>
            </div>
            
            <!-- Investment Plans -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="investment-plans.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">Life Cover</div>
                        <div class="product-icon-box yellow-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h6 class="product-title">Investment Plans</h6>
                    </div>
                </a>
            </div>
            
            <!-- Car Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="car-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge blue-badge">91% Discount</div>
                        <div class="product-icon-box gray-icon">
                            <i class="fas fa-car"></i>
                        </div>
                        <h6 class="product-title">Car Insurance</h6>
                    </div>
                </a>
            </div>
            
            <!-- Bike Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="bike-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge blue-badge">85% Discount</div>
                        <div class="product-icon-box green-icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <h6 class="product-title">2 Wheeler Insurance</h6>
                    </div>
                </a>
            </div>
            
            <!-- Family Health -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="family-health-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">25% Discount</div>
                        <div class="product-icon-box orange-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h6 class="product-title">Family Health</h6>
                    </div>
                </a>
            </div>
            
            <!-- Travel Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="travel-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-icon-box blue-icon">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h6 class="product-title">Travel Insurance</h6>
                    </div>
                </a>
            </div>
            
            <!-- Term Women -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="term-insurance-women.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">20% Cheaper</div>
                        <div class="product-icon-box pink-icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <h6 class="product-title">Term Insurance (Women)</h6>
                    </div>
                </a>
            </div>
            
            <!-- Return Premium -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="return-premium-plans.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-icon-box teal-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h6 class="product-title">Return Premium Plans</h6>
                    </div>
                </a>
            </div>
            
            <!-- Guaranteed Returns -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="guaranteed-return-plans.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-icon-box gold-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h6 class="product-title">Guaranteed Returns</h6>
                    </div>
                </a>
            </div>
            
            <!-- Child Plans -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="child-savings-plans.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge pink-badge">Premium Waiver</div>
                        <div class="product-icon-box sky-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h6 class="product-title">Child Plans</h6>
                    </div>
                </a>
            </div>
            
            <!-- Retirement -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="retirement-plans.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-icon-box indigo-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h6 class="product-title">Retirement Plans</h6>
                    </div>
                </a>
            </div>
            
            <!-- Group Health -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="group-health-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">65% Discount</div>
                        <div class="product-icon-box cyan-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h6 class="product-title">Group Health</h6>
                    </div>
                </a>
            </div>
            
            <!-- Home Insurance -->
            <div class="col-lg-3 col-md-4 col-6">
                <a href="home-insurance.php" class="product-card-link">
                    <div class="oci-product-card">
                        <div class="product-badge green-badge">25% Discount</div>
                        <div class="product-icon-box violet-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h6 class="product-title">Home Insurance</h6>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="all-products.php" class="oci-view-all-btn">
                View all products
            </a>
        </div>
    </div>
</section>


        <!-- Why Choose Us Section -->
        <section class="oneclick-features-section py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="features-content">
                            <span class="oneclick-section-label">Why Choose Us</span>
                            <h2 class="oneclick-section-title">Why OneClick Insurance?</h2>
                            <p class="oneclick-section-desc mb-4">
                                We make insurance simple, affordable, and accessible for everyone
                            </p>
                            
                            <div class="features-list">
                                <div class="feature-item">
                                    <div class="feature-icon-wrapper">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Compare & Choose</h5>
                                        <p>Compare plans from 50+ top insurers and choose the best one for your needs</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon-wrapper">
                                        <i class="fas fa-rupee-sign"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Best Price Guarantee</h5>
                                        <p>Get the lowest premium rates with exclusive discounts and cashback offers</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon-wrapper">
                                        <i class="fas fa-headset"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>24/7 Expert Support</h5>
                                        <p>Get instant support from our insurance experts anytime, anywhere</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-image">
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=600&h=500&fit=crop" 
                                 alt="Insurance Expert" class="img-fluid rounded-3">
                            <div class="floating-badge">
                                <div class="badge-content">
                                    <i class="fas fa-award"></i>
                                    <div>
                                        <strong>Trusted by</strong>
                                        <span>5M+ Customers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="oneclick-stats-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <span class="oneclick-section-label">Our Achievements</span>
                        <h2 class="oneclick-section-title">Numbers That Speak</h2>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="5000000">0</h3>
                                <p class="stat-label">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="50">0</h3>
                                <p class="stat-label">Insurance Partners</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-file-contract"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="12010000">0</h3>
                                <p class="stat-label">Policies Sold</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="4.8">0</h3>
                                <p class="stat-label">Customer Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Customer Testimonials -->
        <section class="oneclick-testimonials-section py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <span class="oneclick-section-label">Testimonials</span>
                        <h2 class="oneclick-section-title">What Our Customers Say</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper testimonialsSwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="testimonial-text">
                                            "OneClick Insurance made buying car insurance so easy! 
                                            Great prices and excellent customer service. Highly recommended!"
                                        </p>
                                        <div class="testimonial-author">
                                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" 
                                                 alt="Customer" class="author-image">
                                            <div class="author-info">
                                                <strong class="author-name">Rohit Sharma</strong>
                                                <span class="author-location">Mumbai, Maharashtra</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="testimonial-text">
                                            "Saved ₹15,000 on my health insurance premium. 
                                            The comparison tool is amazing and support team is very helpful."
                                        </p>
                                        <div class="testimonial-author">
                                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=80&h=80&fit=crop&crop=face" 
                                                 alt="Customer" class="author-image">
                                            <div class="author-info">
                                                <strong class="author-name">Priya Singh</strong>
                                                <span class="author-location">Delhi, NCR</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-card">
                                        <div class="testimonial-stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p class="testimonial-text">
                                            "Quick claim settlement and hassle-free process. 
                                            OneClick Insurance truly lives up to its promises."
                                        </p>
                                        <div class="testimonial-author">
                                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face" 
                                                 alt="Customer" class="author-image">
                                            <div class="author-info">
                                                <strong class="author-name">Arjun Kumar</strong>
                                                <span class="author-location">Bangalore, Karnataka</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
    <!-- Phone Number Popup Form -->
    <div class="oneclick-popup-overlay" id="phonePopup">
        <div class="oneclick-popup-form">
            <button class="oneclick-popup-close" id="closePopup">&times;</button>
            <h3 class="oneclick-popup-title">Get a Call Back</h3>
            <form id="phoneCallbackForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Your Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter your phone number" required>
                </div>
                <button type="submit" class="btn oneclick-btn-primary">
                    <i class="fas fa-phone"></i> Request Call Back
                </button>
            </form>
        </div>
    </div>
</body>
</html>
