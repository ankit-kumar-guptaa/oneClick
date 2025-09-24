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
    <section class="oneclick-hero-section bg-white">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <div class="oneclick-hero-content">
                    <div class="oneclick-hero-badge">
                        <i class="fas fa-award"></i>
                        <span>India's #1 Insurance Platform</span>
                    </div>
                    <h1 class="oneclick-hero-title">
                        Secure Your Future <span class="oneclick-text-gradient">In One Click</span>
                    </h1>
                    <p class="oneclick-hero-subtitle">
                        Instant quotes, zero paperwork, and premium savings up to 85%
                    </p>
                    <div class="oneclick-hero-actions">
                        <button class="oneclick-btn-primary oneclick-btn-large pulse-btn">
                            <i class="fas fa-bolt"></i>
                            Get Instant Quote
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
                                        <p>Save up to ₹5,000 yearly</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="oneclick-slider-card">
                                    <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=500&h=350&fit=crop" alt="Health Insurance">
                                    <div class="slider-overlay">
                                        <h4>Health Insurance</h4>
                                        <p>Coverage from ₹5 lakhs</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="oneclick-slider-card">
                                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=500&h=350&fit=crop" alt="Home Insurance">
                                    <div class="slider-overlay">
                                        <h4>Home Insurance</h4>
                                        <p>100% Claim Support</p>
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
        <!-- <section class="oneclick-quote-section py-5">
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
        </section> -->

       <!-- Insurance Products Section - Clickable Cards -->
<section class="oneclick-products-section py-5">
    <div class="container">
        <!-- <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="products-main-title">Insurance Products</h2>
            </div>
        </div> -->
        
        <div class="row g-3">
            <!-- Term Life Insurance -->
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
            <div class="col-lg-2 col-md-4 col-6">
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
        <section class="oneclick-features-section py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="features-content wow fadeInLeft" data-wow-delay="0.2s">
                            <span class="oneclick-section-label wow fadeIn" data-wow-delay="0.1s">Why Choose Us</span>
                            <h2 class="oneclick-section-title wow fadeIn" data-wow-delay="0.2s">Why OneClick Insurance?</h2>
                            <p class="oneclick-section-desc mb-4 wow fadeIn" data-wow-delay="0.3s">
                                We make insurance simple, affordable, and accessible for everyone with our innovative digital platform
                            </p>
                            
                            <div class="features-list">
                                <div class="feature-item wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="feature-icon-wrapper pulse-animation">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Compare & Choose</h5>
                                        <p>Compare plans from 50+ top insurers and choose the best one for your needs with our AI-powered recommendation engine</p>
                                    </div>
                                </div>
                                <div class="feature-item wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="feature-icon-wrapper pulse-animation">
                                        <i class="fas fa-rupee-sign"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Best Price Guarantee <span class="badge bg-danger bounce">Save 30%</span></h5>
                                        <p>Get the lowest premium rates with exclusive discounts and cashback offers - we'll beat any competitor's price!</p>
                                    </div>
                                </div>
                                <div class="feature-item wow fadeInUp" data-wow-delay="0.7s">
                                    <div class="feature-icon-wrapper pulse-animation">
                                        <i class="fas fa-headset"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>24/7 Expert Support</h5>
                                        <p>Get instant support from our insurance experts anytime, anywhere - via chat, call, or video consultation</p>
                                    </div>
                                </div>
                                <div class="feature-item wow fadeInUp" data-wow-delay="0.9s">
                                    <div class="feature-icon-wrapper pulse-animation">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Lightning Fast Claims</h5>
                                        <p>Experience hassle-free claims with our 30-minute settlement guarantee for eligible claims</p>
                                    </div>
                                </div>
                                <div class="feature-item wow fadeInUp" data-wow-delay="1.1s">
                                    <div class="feature-icon-wrapper pulse-animation">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h5>Digital First Experience <span class="badge bg-success">New</span></h5>
                                        <p>Manage your policies, claims, and renewals from our mobile app - anytime, anywhere</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-image position-relative wow fadeInRight" data-wow-delay="0.4s">
                            <div class="image-shape-bg"></div>
                            <img src="https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=600&h=500&fit=crop" 
                                 alt="Insurance Expert" class="img-fluid rounded-3 shadow-lg">
                            <div class="floating-badge bounce-animation">
                                <div class="badge-content">
                                    <i class="fas fa-award"></i>
                                    <div>
                                        <strong>Trusted by</strong>
                                        <span>5M+ Customers</span>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-review-card">
                                <div class="review-stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="review-text">"OneClick saved me ₹15,000 on my car insurance!"</p>
                                <div class="reviewer-info">
                                    <span class="reviewer-name">- Rahul S.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .oneclick-features-section {
                    background: linear-gradient(135deg, #f0f7ff 0%, #e6f0ff 100%);
                    position: relative;
                    overflow: hidden;
                    padding: 5rem 0;
                }
                .oneclick-features-section::before {
                    content: '';
                    position: absolute;
                    width: 400px;
                    height: 400px;
                    border-radius: 50%;
                    background: linear-gradient(135deg, rgba(37, 99, 235, 0.08) 0%, rgba(59, 130, 246, 0.05) 100%);
                    top: -150px;
                    left: -100px;
                    z-index: 0;
                    animation: float 15s infinite alternate ease-in-out;
                }
                .oneclick-features-section::after {
                    content: '';
                    position: absolute;
                    width: 300px;
                    height: 300px;
                    border-radius: 50%;
                    background: linear-gradient(135deg, rgba(16, 185, 129, 0.08) 0%, rgba(5, 150, 105, 0.05) 100%);
                    bottom: -100px;
                    right: -50px;
                    z-index: 0;
                    animation: float 20s infinite alternate-reverse ease-in-out;
                }
                @keyframes float {
                    0% { transform: translate(0, 0) rotate(0deg); }
                    100% { transform: translate(20px, 20px) rotate(5deg); }
                }
                .feature-item {
                    display: flex;
                    align-items: flex-start;
                    margin-bottom: 2rem;
                    padding: 1.8rem;
                    border-radius: 16px;
                    background: rgba(255, 255, 255, 0.9);
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    border-left: 4px solid transparent;
                }
                .feature-item:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
                    border-left: 4px solid var(--oci-primary);
                }
                .feature-item:nth-child(1):hover { border-left-color: #3b82f6; }
                .feature-item:nth-child(2):hover { border-left-color: #ef4444; }
                .feature-item:nth-child(3):hover { border-left-color: #8b5cf6; }
                .feature-item:nth-child(4):hover { border-left-color: #f59e0b; }
                .feature-item:nth-child(5):hover { border-left-color: #10b981; }
                
                .feature-icon-wrapper {
                    width: 70px;
                    height: 70px;
                    border-radius: 20px;
                    background: var(--oci-gradient);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-right: 1.8rem;
                    color: white;
                    font-size: 1.8rem;
                    flex-shrink: 0;
                    position: relative;
                    overflow: hidden;
                    box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
                }
                .feature-icon-wrapper::before {
                    content: '';
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(135deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 100%);
                    top: -50%;
                    left: -50%;
                    transform: rotate(45deg);
                }
                .feature-item:nth-child(1) .feature-icon-wrapper { background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); }
                .feature-item:nth-child(2) .feature-icon-wrapper { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
                .feature-item:nth-child(3) .feature-icon-wrapper { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }
                .feature-item:nth-child(4) .feature-icon-wrapper { background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); }
                .feature-item:nth-child(5) .feature-icon-wrapper { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
                
                .pulse-animation {
                    animation: pulse 2.5s infinite;
                }
                @keyframes pulse {
                    0% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0.5); }
                    70% { box-shadow: 0 0 0 15px rgba(37, 99, 235, 0); }
                    100% { box-shadow: 0 0 0 0 rgba(37, 99, 235, 0); }
                }
                .feature-content h5 {
                    font-weight: 700;
                    margin-bottom: 0.8rem;
                    color: var(--oci-dark);
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    font-size: 1.25rem;
                }
                .feature-content p {
                    color: var(--oci-gray);
                    margin-bottom: 0;
                    line-height: 1.6;
                    font-size: 1rem;
                }
                .badge {
                    padding: 0.5em 0.8em;
                    border-radius: 6px;
                    font-weight: 600;
                    font-size: 0.7rem;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
                .bounce {
                    animation: badge-bounce 2s infinite;
                }
                @keyframes badge-bounce {
                    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                    40% { transform: translateY(-8px); }
                    60% { transform: translateY(-4px); }
                }
                .features-image {
                    position: relative;
                    z-index: 1;
                    transition: all 0.5s ease;
                }
                .features-image:hover {
                    transform: scale(1.02);
                }
                .features-image img {
                    border-radius: 20px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                    transition: all 0.5s ease;
                }
                .features-image:hover img {
                    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
                }
                .image-shape-bg {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    background: var(--oci-primary);
                    border-radius: 20px;
                    top: 25px;
                    left: 25px;
                    z-index: -1;
                    opacity: 0.15;
                    transition: all 0.5s ease;
                }
                .features-image:hover .image-shape-bg {
                    top: 15px;
                    left: 15px;
                    opacity: 0.2;
                }
                .floating-badge {
                    position: absolute;
                    bottom: -25px;
                    right: 30px;
                    background: white;
                    border-radius: 16px;
                    padding: 18px;
                    box-shadow: var(--oci-shadow-lg);
                    z-index: 2;
                    transition: all 0.3s ease;
                }
                .features-image:hover .floating-badge {
                    transform: translateY(-5px);
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                }
                .bounce-animation {
                    animation: bounce 3s infinite;
                }
                @keyframes bounce {
                    0%, 100% { transform: translateY(0); }
                    50% { transform: translateY(-12px); }
                }
                .badge-content {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                }
                .badge-content i {
                    font-size: 2.2rem;
                    color: var(--oci-accent);
                    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                }
                .badge-content div {
                    display: flex;
                    flex-direction: column;
                }
                .badge-content strong {
                    font-size: 0.8rem;
                    color: var(--oci-gray);
                }
                .badge-content span {
                    font-size: 1.1rem;
                    font-weight: 700;
                    color: var(--oci-dark);
                }
                .feature-review-card {
                    position: absolute;
                    top: 30px;
                    left: -40px;
                    background: white;
                    border-radius: 16px;
                    padding: 20px;
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
                    max-width: 250px;
                    z-index: 2;
                    transition: all 0.3s ease;
                }
                .features-image:hover .feature-review-card {
                    transform: translateY(-5px) rotate(-2deg);
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                }
                .review-stars {
                    color: #f59e0b;
                    margin-bottom: 8px;
                    display: flex;
                    gap: 2px;
                }
                .review-stars i {
                    font-size: 1rem;
                }
                .review-text {
                    font-size: 1rem;
                    font-style: italic;
                    margin-bottom: 8px;
                    color: var(--oci-dark);
                    line-height: 1.5;
                }
                .reviewer-name {
                    font-size: 0.9rem;
                    font-weight: 600;
                    color: var(--oci-gray);
                }
                @media (max-width: 991px) {
                    .features-content {
                        margin-bottom: 4rem;
                    }
                    .feature-review-card {
                        left: 20px;
                        top: 20px;
                    }
                    .oneclick-features-section {
                        padding: 4rem 0;
                    }
                }
                @media (max-width: 767px) {
                    .feature-item {
                        padding: 1.5rem;
                    }
                    .feature-icon-wrapper {
                        width: 60px;
                        height: 60px;
                        font-size: 1.5rem;
                        margin-right: 1.2rem;
                    }
                    .feature-content h5 {
                        font-size: 1.1rem;
                    }
                    .feature-content p {
                        font-size: 0.9rem;
                    }
                }
            </style>
        </section>

        <!-- Insurance Calculator Section -->
        <section class="oneclick-calculator-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <span class="oneclick-section-label wow fadeInUp" data-wow-delay="0.1s">Premium Calculator</span>
                        <h2 class="oneclick-section-title wow fadeInUp" data-wow-delay="0.2s">Calculate Your Insurance Premium</h2>
                        <p class="oneclick-section-desc wow fadeInUp" data-wow-delay="0.3s">Get an instant estimate of your insurance premium based on your requirements</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="calculator-container wow fadeInUp" data-wow-delay="0.4s">
                            <div class="savings-badge">
                                <div class="savings-badge-inner">
                                    <span>Save up to</span>
                                    <strong>30%</strong>
                                </div>
                            </div>
                            <div class="calculator-tabs">
                                <button class="calc-tab-btn active" data-tab="health">Health Insurance</button>
                                <button class="calc-tab-btn" data-tab="car">Car Insurance</button>
                                <button class="calc-tab-btn" data-tab="term">Term Life</button>
                            </div>
                            
                            <div class="calculator-content">
                                <!-- Health Insurance Calculator -->
                                <div class="calc-tab-content active" id="health-calc">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-user-clock"></i> Age</label>
                                                <select class="form-select custom-select" id="health-age">
                                                    <option value="18-25">18-25 years</option>
                                                    <option value="26-35">26-35 years</option>
                                                    <option value="36-45">36-45 years</option>
                                                    <option value="46-55">46-55 years</option>
                                                    <option value="56-65">56-65 years</option>
                                                    <option value="65+">Above 65 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-shield-alt"></i> Coverage Amount</label>
                                                <select class="form-select custom-select" id="health-coverage">
                                                    <option value="300000">₹3 Lakhs</option>
                                                    <option value="500000">₹5 Lakhs</option>
                                                    <option value="1000000" selected>₹10 Lakhs</option>
                                                    <option value="2000000">₹20 Lakhs</option>
                                                    <option value="5000000">₹50 Lakhs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-users"></i> Members to be Covered</label>
                                                <select class="form-select custom-select" id="health-members">
                                                    <option value="1">Self Only</option>
                                                    <option value="2">Self + Spouse</option>
                                                    <option value="3">Self + Spouse + 1 Child</option>
                                                    <option value="4">Self + Spouse + 2 Children</option>
                                                    <option value="5">Self + Spouse + Parents</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-city"></i> City Tier</label>
                                                <select class="form-select custom-select" id="health-city">
                                                    <option value="tier1">Tier 1 (Metro Cities)</option>
                                                    <option value="tier2">Tier 2 (Other Cities)</option>
                                                    <option value="tier3">Tier 3 (Small Towns)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <div class="calculator-actions">
                                                <button class="oneclick-btn-primary btn-lg pulse-btn" id="calculate-health">
                                                    <i class="fas fa-calculator"></i> Calculate Premium
                                                </button>
                                                <button class="oneclick-btn-outline btn-lg" id="reset-calculator">
                                                    <i class="fas fa-redo"></i> Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="premium-result" class="premium-result-container">
                                        <div class="premium-result-content">
                                            <div class="premium-amount-wrapper">
                                                <h4>Your Estimated Premium</h4>
                                                <div class="premium-amount">
                                                    <span class="currency">₹</span>
                                                    <span id="premium-amount">0</span>
                                                    <span class="period">/year</span>
                                                </div>
                                            </div>
                                            <div class="premium-breakdown">
                                                <h5>Premium Breakdown</h5>
                                                <div class="breakdown-item">
                                                    <span>Base Premium</span>
                                                    <strong id="base-premium">₹0</strong>
                                                </div>
                                                <div class="breakdown-item discount">
                                                    <span>OneClick Discount</span>
                                                    <strong id="discount-amount">-₹0</strong>
                                                </div>
                                                <div class="breakdown-item total">
                                                    <span>Final Premium</span>
                                                    <strong id="final-premium">₹0</strong>
                                                </div>
                                            </div>
                                            <div class="premium-actions">
                                                <button class="oneclick-btn-primary" id="get-detailed-quote">
                                                    <i class="fas fa-file-invoice"></i> Get Detailed Quote
                                                </button>
                                                <button class="oneclick-btn-outline" id="compare-plans">
                                                    <i class="fas fa-exchange-alt"></i> Compare Plans
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Car Insurance Calculator -->
                                <div class="calc-tab-content" id="car-calc">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-car"></i> Car Age</label>
                                                <select class="form-select custom-select" id="car-age">
                                                    <option value="new">Brand New</option>
                                                    <option value="1-3">1-3 years</option>
                                                    <option value="4-6">4-6 years</option>
                                                    <option value="7-10">7-10 years</option>
                                                    <option value="10+">Above 10 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-rupee-sign"></i> Car Value (IDV)</label>
                                                <select class="form-select custom-select" id="car-value">
                                                    <option value="300000">Up to ₹3 Lakhs</option>
                                                    <option value="500000">₹3-5 Lakhs</option>
                                                    <option value="800000">₹5-8 Lakhs</option>
                                                    <option value="1200000">₹8-12 Lakhs</option>
                                                    <option value="1500000+">Above ₹15 Lakhs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-shield-alt"></i> Coverage Type</label>
                                                <select class="form-select custom-select" id="car-coverage">
                                                    <option value="third-party">Third Party Only</option>
                                                    <option value="comprehensive">Comprehensive Cover</option>
                                                    <option value="zero-dep">Zero Depreciation</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-percentage"></i> No Claim Bonus</label>
                                                <select class="form-select custom-select" id="car-ncb">
                                                    <option value="0">0% (No NCB)</option>
                                                    <option value="20">20% (After 1 claim-free year)</option>
                                                    <option value="25">25% (After 2 claim-free years)</option>
                                                    <option value="35">35% (After 3 claim-free years)</option>
                                                    <option value="45">45% (After 4 claim-free years)</option>
                                                    <option value="50">50% (After 5 claim-free years)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button class="oneclick-btn-primary btn-lg pulse-btn" id="calculate-car">
                                                <i class="fas fa-calculator"></i> Calculate Premium
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Term Life Calculator -->
                                <div class="calc-tab-content" id="term-calc">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-user-clock"></i> Age</label>
                                                <select class="form-select custom-select" id="term-age">
                                                    <option value="18-25">18-25 years</option>
                                                    <option value="26-35">26-35 years</option>
                                                    <option value="36-45">36-45 years</option>
                                                    <option value="46-55">46-55 years</option>
                                                    <option value="56-60">56-60 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-shield-alt"></i> Coverage Amount</label>
                                                <select class="form-select custom-select" id="term-coverage">
                                                    <option value="1000000">₹10 Lakhs</option>
                                                    <option value="2500000">₹25 Lakhs</option>
                                                    <option value="5000000">₹50 Lakhs</option>
                                                    <option value="10000000">₹1 Crore</option>
                                                    <option value="20000000">₹2 Crores</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-calendar-alt"></i> Policy Term</label>
                                                <select class="form-select custom-select" id="term-duration">
                                                    <option value="10">10 years</option>
                                                    <option value="15">15 years</option>
                                                    <option value="20">20 years</option>
                                                    <option value="25">25 years</option>
                                                    <option value="30">30 years</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="fas fa-smoking"></i> Smoker Status</label>
                                                <select class="form-select custom-select" id="term-smoker">
                                                    <option value="no">Non-Smoker</option>
                                                    <option value="yes">Smoker</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-center mt-4">
                                            <button class="oneclick-btn-primary btn-lg pulse-btn" id="calculate-term">
                                                <i class="fas fa-calculator"></i> Calculate Premium
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Result Display -->
                                <div class="calculator-result" id="premium-result">
                                    <div class="result-content">
                                        <div class="result-header">
                                            <h4>Estimated Premium</h4>
                                            <div class="savings-badge">Save up to 30%</div>
                                        </div>
                                        <div class="premium-amount">₹<span id="premium-amount">0</span><span class="premium-period">/year</span></div>
                                        <div class="premium-breakdown">
                                            <div class="breakdown-item">
                                                <span>Base Premium</span>
                                                <span id="base-premium">₹0</span>
                                            </div>
                                            <div class="breakdown-item discount">
                                                <span>OneClick Discount</span>
                                                <span id="discount-amount">-₹0</span>
                                            </div>
                                            <div class="breakdown-item total">
                                                <span>Final Premium</span>
                                                <span id="final-premium">₹0</span>
                                            </div>
                                        </div>
                                        <p class="result-note">This is an estimate. Actual premium may vary based on detailed assessment.</p>
                                        <div class="result-actions">
                                            <button class="oneclick-btn-primary mt-3" id="get-detailed-quote">
                                                <i class="fas fa-file-invoice"></i> Get Detailed Quote
                                            </button>
                                            <button class="oneclick-btn-outline mt-3 ms-2" id="reset-calculator">
                                                <i class="fas fa-redo"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .oneclick-calculator-section {
                    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
                    position: relative;
                    overflow: hidden;
                }
                .oneclick-calculator-section::before {
                    content: '';
                    position: absolute;
                    width: 400px;
                    height: 400px;
                    border-radius: 50%;
                    background: rgba(16, 185, 129, 0.05);
                    top: -200px;
                    right: -200px;
                    z-index: 0;
                }
                .calculator-container {
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                    overflow: hidden;
                    position: relative;
                    z-index: 1;
                }
                .calculator-tabs {
                    display: flex;
                    background: var(--oci-light);
                    border-bottom: 1px solid var(--oci-border);
                }
                .calc-tab-btn {
                    flex: 1;
                    padding: 1rem;
                    text-align: center;
                    background: none;
                    border: none;
                    font-weight: 600;
                    color: var(--oci-gray);
                    transition: all 0.3s ease;
                    position: relative;
                    cursor: pointer;
                }
                .calc-tab-btn:hover {
                    color: var(--oci-primary);
                }
                .calc-tab-btn.active {
                    color: var(--oci-primary);
                    background: white;
                }
                .calc-tab-btn.active::after {
                    content: '';
                    position: absolute;
                    bottom: -1px;
                    left: 0;
                    width: 100%;
                    height: 3px;
                    background: var(--oci-primary);
                }
                .calculator-content {
                    padding: 2rem;
                    position: relative;
                }
                .calc-tab-content {
                    display: none;
                }
                .calc-tab-content.active {
                    display: block;
                    animation: fadeIn 0.5s ease;
                }
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .form-group {
                    margin-bottom: 0.5rem;
                }
                .form-group label {
                    display: block;
                    margin-bottom: 0.5rem;
                    font-weight: 600;
                    color: var(--oci-dark);
                    display: flex;
                    align-items: center;
                    gap: 8px;
                }
                .form-group label i {
                    color: var(--oci-primary);
                }
                .custom-select {
                    border: 2px solid var(--oci-border);
                    border-radius: 8px;
                    padding: 0.75rem 1rem;
                    font-size: 1rem;
                    transition: all 0.3s ease;
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%232563eb' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
                    background-repeat: no-repeat;
                    background-position: right 1rem center;
                    background-size: 16px 12px;
                    appearance: none;
                }
                .custom-select:focus {
                    border-color: var(--oci-primary);
                    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
                    outline: none;
                }
                .oneclick-btn-primary {
                    background: var(--oci-gradient);
                    color: white;
                    border: none;
                    border-radius: 8px;
                    padding: 0.75rem 1.5rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
                }
                .oneclick-btn-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
                }
                .oneclick-btn-outline {
                    background: transparent;
                    color: var(--oci-primary);
                    border: 2px solid var(--oci-primary);
                    border-radius: 8px;
                    padding: 0.75rem 1.5rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                }
                .oneclick-btn-outline:hover {
                    background: rgba(37, 99, 235, 0.1);
                }
                .btn-lg {
                    padding: 1rem 2rem;
                    font-size: 1.1rem;
                }
                .pulse-btn {
                    position: relative;
                }
                .pulse-btn::after {
                    content: '';
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    background: var(--oci-primary);
                    border-radius: 8px;
                    z-index: -1;
                    animation: pulse-animation 2s infinite;
                }
                @keyframes pulse-animation {
                    0% { transform: scale(1); opacity: 0.8; }
                    50% { transform: scale(1.05); opacity: 0; }
                    100% { transform: scale(1); opacity: 0; }
                }
                .calculator-result {
                    display: none;
                    margin-top: 2rem;
                    border-top: 1px solid var(--oci-border);
                    padding-top: 2rem;
                }
                .calculator-result.show {
                    display: block;
                    animation: slideUp 0.5s ease;
                }
                @keyframes slideUp {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                .result-content {
                    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
                    border-radius: 12px;
                    padding: 2rem;
                    text-align: center;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                }
                .result-header {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    margin-bottom: 1rem;
                }
                .result-header h4 {
                    margin: 0;
                    font-weight: 700;
                    color: var(--oci-dark);
                }
                .savings-badge {
                    background: var(--oci-secondary);
                    color: white;
                    padding: 0.25rem 0.75rem;
                    border-radius: 20px;
                    font-size: 0.8rem;
                    font-weight: 600;
                }
                .premium-amount {
                    font-size: 3rem;
                    font-weight: 700;
                    color: var(--oci-primary);
                    margin: 1rem 0;
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                .premium-period {
                    font-size: 1rem;
                    color: var(--oci-gray);
                    font-weight: 400;
                }
                .premium-breakdown {
                    background: white;
                    border-radius: 8px;
                    padding: 1rem;
                    margin: 1.5rem 0;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                }
                .breakdown-item {
                    display: flex;
                    justify-content: space-between;
                    padding: 0.5rem 0;
                    border-bottom: 1px dashed var(--oci-border);
                }
                .breakdown-item:last-child {
                    border-bottom: none;
                }
                .breakdown-item.discount {
                    color: var(--oci-secondary);
                }
                .breakdown-item.total {
                    font-weight: 700;
                    color: var(--oci-dark);
                    padding-top: 0.75rem;
                    margin-top: 0.25rem;
                    border-top: 2px solid var(--oci-border);
                }
                .result-note {
                    font-size: 0.9rem;
                    color: var(--oci-gray);
                    margin-bottom: 1.5rem;
                }
                .result-actions {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                }
                @media (max-width: 767px) {
                    .calculator-tabs {
                        flex-direction: column;
                    }
                    .calc-tab-btn {
                        padding: 0.75rem;
                    }
                    .calculator-content {
                        padding: 1.5rem 1rem;
                    }
                    .premium-amount {
                        font-size: 2.5rem;
                    }
                    .result-actions {
                        flex-direction: column;
                    }
                }
            </style>
            <script>
                // Enhanced calculator functionality
                document.addEventListener('DOMContentLoaded', function() {
                    // Reset calculator button
                    const resetBtn = document.getElementById('reset-calculator');
                    if (resetBtn) {
                        resetBtn.addEventListener('click', function() {
                            document.getElementById('premium-result').classList.remove('show');
                            
                            // Reset all form fields
                            const selects = document.querySelectorAll('.calculator-content select');
                            selects.forEach(select => {
                                select.selectedIndex = 0;
                            });
                        });
                    }
                    
                    // Update premium breakdown
                    function updatePremiumBreakdown(premium) {
                        const basePremium = Math.round(premium * 1.3); // Original price before discount
                        const discount = basePremium - premium; // Discount amount
                        
                        document.getElementById('base-premium').textContent = '₹' + basePremium.toLocaleString();
                        document.getElementById('discount-amount').textContent = '-₹' + discount.toLocaleString();
                        document.getElementById('final-premium').textContent = '₹' + premium.toLocaleString();
                    }
                    
                    // Override the showPremiumResult function
                    window.showPremiumResult = function(amount) {
                        const resultElement = document.getElementById('premium-result');
                        const amountElement = document.getElementById('premium-amount');
                        
                        if (resultElement && amountElement) {
                            amountElement.textContent = amount.toLocaleString();
                            updatePremiumBreakdown(amount);
                            resultElement.classList.add('show');
                            
                            // Scroll to result with animation
                            resultElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                        }
                    };
                });
            </script>
            <style>
                .oneclick-calculator-section {
                    background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
                    position: relative;
                    padding: 5rem 0;
                    overflow: hidden;
                }
                
                .oneclick-calculator-section::before,
                .oneclick-calculator-section::after {
                    content: '';
                    position: absolute;
                    border-radius: 50%;
                    z-index: 0;
                }
                
                .oneclick-calculator-section::before {
                    width: 400px;
                    height: 400px;
                    background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(99, 102, 241, 0.05) 100%);
                    top: -150px;
                    right: -100px;
                    animation: float-reverse 20s infinite alternate ease-in-out;
                }
                
                .oneclick-calculator-section::after {
                    width: 300px;
                    height: 300px;
                    background: linear-gradient(135deg, rgba(236, 72, 153, 0.08) 0%, rgba(219, 39, 119, 0.05) 100%);
                    bottom: -100px;
                    left: -50px;
                    animation: float 25s infinite alternate-reverse ease-in-out;
                }
                
                @keyframes float-reverse {
                    0% { transform: translate(0, 0) rotate(0deg); }
                    100% { transform: translate(-20px, 20px) rotate(-5deg); }
                }
                
                .calculator-container {
                    background: white;
                    border-radius: 20px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
                    padding: 2rem;
                    position: relative;
                    overflow: hidden;
                    z-index: 1;
                }
                
                .savings-badge {
                    position: absolute;
                    top: -5px;
                    right: -5px;
                    width: 120px;
                    height: 120px;
                    overflow: hidden;
                    z-index: 2;
                }
                
                .savings-badge-inner {
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 150px;
                    background: linear-gradient(135deg, #ef4444 0%, #b91c1c 100%);
                    color: white;
                    text-align: center;
                    transform: rotate(45deg) translateY(-20px) translateX(40px);
                    padding: 8px 0;
                    box-shadow: 0 5px 10px rgba(185, 28, 28, 0.3);
                }
                
                .savings-badge-inner span {
                    display: block;
                    font-size: 0.7rem;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                    font-weight: 600;
                }
                
                .savings-badge-inner strong {
                    font-size: 1.5rem;
                    font-weight: 800;
                }
                
                .calculator-tabs {
                    display: flex;
                    border-bottom: 2px solid #e2e8f0;
                    margin-bottom: 2rem;
                }
                
                .calc-tab-btn {
                    background: none;
                    border: none;
                    padding: 1rem 1.5rem;
                    font-weight: 600;
                    color: var(--oci-gray);
                    position: relative;
                    transition: all 0.3s ease;
                    cursor: pointer;
                }
                
                .calc-tab-btn::after {
                    content: '';
                    position: absolute;
                    bottom: -2px;
                    left: 0;
                    width: 100%;
                    height: 3px;
                    background: var(--oci-primary);
                    transform: scaleX(0);
                    transition: transform 0.3s ease;
                }
                
                .calc-tab-btn.active {
                    color: var(--oci-primary);
                }
                
                .calc-tab-btn.active::after {
                    transform: scaleX(1);
                }
                
                .calc-tab-content {
                    display: none;
                }
                
                .calc-tab-content.active {
                    display: block;
                    animation: fadeIn 0.5s ease;
                }
                
                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }
                
                .form-group {
                    margin-bottom: 1.5rem;
                }
                
                .form-group label {
                    display: block;
                    margin-bottom: 0.5rem;
                    font-weight: 600;
                    color: var(--oci-dark);
                }
                
                .form-group label i {
                    margin-right: 0.5rem;
                    color: var(--oci-primary);
                }
                
                .custom-select {
                    border: 2px solid #e2e8f0;
                    border-radius: 10px;
                    padding: 0.8rem 1rem;
                    font-size: 1rem;
                    width: 100%;
                    transition: all 0.3s ease;
                    background-color: #f8fafc;
                }
                
                .custom-select:focus {
                    border-color: var(--oci-primary);
                    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
                    outline: none;
                }
                
                .calculator-actions {
                    display: flex;
                    justify-content: center;
                    gap: 1rem;
                }
                
                .oneclick-btn-primary {
                    background: var(--oci-gradient);
                    color: white;
                    border: none;
                    border-radius: 10px;
                    padding: 0.8rem 1.5rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                    box-shadow: 0 10px 15px rgba(59, 130, 246, 0.2);
                }
                
                .oneclick-btn-primary:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 15px 20px rgba(59, 130, 246, 0.3);
                }
                
                .oneclick-btn-outline {
                    background: transparent;
                    color: var(--oci-primary);
                    border: 2px solid var(--oci-primary);
                    border-radius: 10px;
                    padding: 0.8rem 1.5rem;
                    font-weight: 600;
                    transition: all 0.3s ease;
                }
                
                .oneclick-btn-outline:hover {
                    background: rgba(59, 130, 246, 0.1);
                    transform: translateY(-3px);
                }
                
                .pulse-btn {
                    position: relative;
                }
                
                .pulse-btn::after {
                    content: '';
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    background: var(--oci-primary);
                    border-radius: 10px;
                    z-index: -1;
                    animation: pulse-btn 2s infinite;
                }
                
                @keyframes pulse-btn {
                    0% { opacity: 0.7; transform: scale(1); }
                    50% { opacity: 0; transform: scale(1.2); }
                    100% { opacity: 0; transform: scale(1.3); }
                }
                
                .premium-result-container {
                    margin-top: 2rem;
                    background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
                    border-radius: 16px;
                    padding: 2rem;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                    display: none;
                    transform: translateY(20px);
                    opacity: 0;
                    transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                }
                
                .premium-result-container.show {
                    display: block;
                    transform: translateY(0);
                    opacity: 1;
                }
                
                .premium-result-content {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    gap: 2rem;
                }
                
                .premium-amount-wrapper {
                    text-align: center;
                    padding: 2rem;
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                }
                
                .premium-amount-wrapper h4 {
                    font-size: 1.2rem;
                    color: var(--oci-gray);
                    margin-bottom: 1rem;
                }
                
                .premium-amount {
                    font-size: 3rem;
                    font-weight: 800;
                    color: var(--oci-primary);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                .premium-amount .currency {
                    font-size: 2rem;
                    margin-right: 0.2rem;
                    align-self: flex-start;
                    margin-top: 0.5rem;
                }
                
                .premium-amount .period {
                    font-size: 1rem;
                    color: var(--oci-gray);
                    align-self: flex-end;
                    margin-bottom: 0.5rem;
                    margin-left: 0.2rem;
                }
                
                .premium-breakdown {
                    padding: 2rem;
                    background: white;
                    border-radius: 16px;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                }
                
                .premium-breakdown h5 {
                    font-size: 1.2rem;
                    color: var(--oci-dark);
                    margin-bottom: 1.5rem;
                    text-align: center;
                }
                
                .breakdown-item {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 0.8rem 0;
                    border-bottom: 1px dashed #e2e8f0;
                }
                
                .breakdown-item:last-child {
                    border-bottom: none;
                    margin-top: 0.5rem;
                    padding-top: 1rem;
                    border-top: 2px solid #e2e8f0;
                }
                
                .breakdown-item span {
                    color: var(--oci-gray);
                    font-weight: 500;
                }
                
                .breakdown-item strong {
                    font-weight: 700;
                    color: var(--oci-dark);
                }
                
                .breakdown-item.discount strong {
                    color: #10b981;
                }
                
                .breakdown-item.total span,
                .breakdown-item.total strong {
                    font-weight: 800;
                    font-size: 1.1rem;
                    color: var(--oci-primary);
                }
                
                .premium-actions {
                    grid-column: 1 / -1;
                    display: flex;
                    justify-content: center;
                    gap: 1rem;
                    margin-top: 1rem;
                }
                
                @media (max-width: 991px) {
                    .premium-result-content {
                        grid-template-columns: 1fr;
                        gap: 1.5rem;
                    }
                }
                
                @media (max-width: 767px) {
                    .calculator-tabs {
                        flex-wrap: wrap;
                    }
                    
                    .calc-tab-btn {
                        flex: 1;
                        padding: 0.8rem 1rem;
                        font-size: 0.9rem;
                    }
                    
                    .calculator-actions {
                        flex-direction: column;
                    }
                    
                    .premium-actions {
                        flex-direction: column;
                    }
                    
                    .premium-amount {
                        font-size: 2.5rem;
                    }
                    
                    .premium-amount .currency {
                        font-size: 1.5rem;
                    }
                }
            </style>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Reset calculator functionality
                    const resetBtn = document.getElementById('reset-calculator');
                    if (resetBtn) {
                        resetBtn.addEventListener('click', function() {
                            // Reset all select elements to their first option
                            const selects = document.querySelectorAll('.calculator-content select');
                            selects.forEach(select => {
                                select.selectedIndex = 0;
                            });
                            
                            // Hide premium result
                            const resultElement = document.getElementById('premium-result');
                            if (resultElement) {
                                resultElement.classList.remove('show');
                            }
                        });
                    }
                    
                    // Update premium breakdown
                    window.updatePremiumBreakdown = function(premium) {
                        const basePremium = Math.round(premium * 1.3); // Original price before discount
                        const discount = basePremium - premium; // Discount amount
                        
                        document.getElementById('base-premium').textContent = '₹' + basePremium.toLocaleString();
                        document.getElementById('discount-amount').textContent = '-₹' + discount.toLocaleString();
                        document.getElementById('final-premium').textContent = '₹' + premium.toLocaleString();
                    }
                    
                    // Override the showPremiumResult function
                    window.showPremiumResult = function(amount) {
                        const resultElement = document.getElementById('premium-result');
                        const amountElement = document.getElementById('premium-amount');
                        
                        if (resultElement && amountElement) {
                            amountElement.textContent = amount.toLocaleString();
                            updatePremiumBreakdown(amount);
                            resultElement.classList.add('show');
                            
                            // Scroll to result with animation
                            setTimeout(() => {
                                resultElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                            }, 300);
                        }
                    };
                });
            </script>
        </section>
        
        <!-- Stats Section -->
        <section class="oneclick-stats-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5 wow fadeIn" data-wow-delay="0.2s">
                        <span class="oneclick-section-label">Our Achievements</span>
                        <h2 class="oneclick-section-title">Numbers That Speak</h2>
                        <p class="oneclick-section-description mt-3">Our success is measured by the trust of our customers and partners</p>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon pulse">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="5000000">0</h3>
                                <p class="stat-label">Happy Customers</p>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon pulse">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="50">0</h3>
                                <p class="stat-label">Insurance Partners</p>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon pulse">
                                <i class="fas fa-file-contract"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="12010000">0</h3>
                                <p class="stat-label">Policies Sold</p>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="oneclick-stat-card">
                            <div class="stat-icon pulse">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="stat-content">
                                <h3 class="stat-number" data-count="4.8">0</h3>
                                <p class="stat-label">Customer Rating</p>
                                <div class="stat-progress">
                                    <div class="progress-bar" style="width: 95%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <style>
                .oneclick-stats-section {
                    background: linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
                    position: relative;
                    padding: 5rem 0;
                    overflow: hidden;
                }
                
                .oneclick-stats-section::before,
                .oneclick-stats-section::after {
                    content: '';
                    position: absolute;
                    border-radius: 50%;
                    z-index: 0;
                }
                
                .oneclick-stats-section::before {
                    width: 400px;
                    height: 400px;
                    background: linear-gradient(135deg, rgba(79, 70, 229, 0.08) 0%, rgba(99, 102, 241, 0.05) 100%);
                    top: -150px;
                    right: -100px;
                    animation: float-reverse 20s infinite alternate ease-in-out;
                }
                
                .oneclick-stats-section::after {
                    width: 300px;
                    height: 300px;
                    background: linear-gradient(135deg, rgba(236, 72, 153, 0.08) 0%, rgba(219, 39, 119, 0.05) 100%);
                    bottom: -100px;
                    left: -50px;
                    animation: float 25s infinite alternate-reverse ease-in-out;
                }
                
                .oneclick-section-description {
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                    color: var(--oci-gray);
                }
                
                .oneclick-stat-card {
                    background: white;
                    border-radius: 16px;
                    padding: 2rem;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                    height: 100%;
                    transition: all 0.3s ease;
                    position: relative;
                    overflow: hidden;
                    z-index: 1;
                }
                
                .oneclick-stat-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 5px;
                    height: 100%;
                    background: var(--oci-primary);
                    transition: all 0.3s ease;
                }
                
                .oneclick-stat-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 20px 30px rgba(0, 0, 0, 0.1);
                }
                
                .oneclick-stat-card:hover::before {
                    width: 100%;
                    opacity: 0.05;
                }
                
                .stat-icon {
                    width: 70px;
                    height: 70px;
                    background: var(--oci-gradient);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 1.5rem;
                    box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
                }
                
                .stat-icon i {
                    font-size: 1.8rem;
                    color: white;
                }
                
                .stat-icon.pulse {
                    position: relative;
                }
                
                .stat-icon.pulse::after {
                    content: '';
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    background: var(--oci-primary);
                    border-radius: 50%;
                    z-index: -1;
                    animation: pulse-animation 2s infinite;
                }
                
                @keyframes pulse-animation {
                    0% { transform: scale(1); opacity: 0.8; }
                    50% { transform: scale(1.5); opacity: 0; }
                    100% { transform: scale(1.8); opacity: 0; }
                }
                
                .stat-content {
                    text-align: center;
                }
                
                .stat-number {
                    font-size: 2.5rem;
                    font-weight: 800;
                    color: var(--oci-primary);
                    margin-bottom: 0.5rem;
                    line-height: 1;
                }
                
                .stat-label {
                    font-size: 1.1rem;
                    color: var(--oci-gray);
                    margin-bottom: 1rem;
                }
                
                .stat-progress {
                    height: 6px;
                    background: #e2e8f0;
                    border-radius: 3px;
                    overflow: hidden;
                    margin-top: 1rem;
                }
                
                .stat-progress .progress-bar {
                    height: 100%;
                    background: var(--oci-gradient);
                    border-radius: 3px;
                    width: 0;
                    transition: width 1.5s ease-in-out;
                }
                
                @media (max-width: 991px) {
                    .oneclick-stat-card {
                        padding: 1.5rem;
                    }
                    
                    .stat-icon {
                        width: 60px;
                        height: 60px;
                    }
                    
                    .stat-number {
                        font-size: 2rem;
                    }
                }
                
                @media (max-width: 767px) {
                    .oneclick-stats-section {
                        padding: 3rem 0;
                    }
                }
            </style>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Counter animation for stats
                    const statNumbers = document.querySelectorAll('.stat-number');
                    const progressBars = document.querySelectorAll('.stat-progress .progress-bar');
                    
                    // Intersection Observer for triggering animations when in view
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                // Start counter animation
                                if (entry.target.classList.contains('stat-number')) {
                                    animateCounter(entry.target);
                                }
                                
                                // Animate progress bars
                                if (entry.target.classList.contains('progress-bar')) {
                                    entry.target.style.width = entry.target.getAttribute('style').split('width:')[1];
                                }
                                
                                // Unobserve after animation
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.2 });
                    
                    // Observe all stat numbers and progress bars
                    statNumbers.forEach(stat => observer.observe(stat));
                    progressBars.forEach(bar => observer.observe(bar));
                    
                    // Counter animation function
                    function animateCounter(element) {
                        const target = parseFloat(element.getAttribute('data-count'));
                        const duration = 2000; // 2 seconds
                        const isDecimal = target % 1 !== 0;
                        let startTime;
                        
                        function updateCounter(timestamp) {
                            if (!startTime) startTime = timestamp;
                            const progress = Math.min((timestamp - startTime) / duration, 1);
                            const currentCount = progress * target;
                            
                            if (isDecimal) {
                                element.textContent = currentCount.toFixed(1);
                            } else if (target > 1000000) {
                                element.textContent = (currentCount / 1000000).toFixed(1) + 'M';
                            } else if (target > 1000) {
                                element.textContent = (currentCount / 1000).toFixed(1) + 'K';
                            } else {
                                element.textContent = Math.floor(currentCount);
                            }
                            
                            if (progress < 1) {
                                requestAnimationFrame(updateCounter);
                            }
                        }
                        
                        requestAnimationFrame(updateCounter);
                    }
                });
            </script>
        </section>

        <!-- Customer Testimonials -->
        <section class="oneclick-testimonials-section py-5 bg-light">
            <style>
                .oneclick-testimonials-section {
                    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                    padding: 80px 0;
                    position: relative;
                    overflow: hidden;
                }
                
                .testimonial-card {
                    background: #fff;
                    border-radius: 12px;
                    padding: 30px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                    margin: 20px 0;
                    position: relative;
                    transition: all 0.3s ease;
                    border-top: 4px solid #4e73df;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }
                
                .testimonial-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
                }
                
                .testimonial-stars {
                    color: #ffc107;
                    margin-bottom: 15px;
                    font-size: 18px;
                }
                
                .testimonial-text {
                    font-size: 16px;
                    line-height: 1.7;
                    color: #495057;
                    margin-bottom: 20px;
                    flex-grow: 1;
                    position: relative;
                    font-style: italic;
                }
                
                .testimonial-text:before {
                    content: '\201C';
                    font-size: 60px;
                    position: absolute;
                    left: -15px;
                    top: -20px;
                    color: rgba(78, 115, 223, 0.1);
                    font-family: Georgia, serif;
                }
                
                .testimonial-author {
                    display: flex;
                    align-items: center;
                    border-top: 1px solid #e9ecef;
                    padding-top: 15px;
                }
                
                .author-info {
                    display: flex;
                    flex-direction: column;
                }
                
                .author-name {
                    font-weight: 600;
                    color: #212529;
                    font-size: 16px;
                }
                
                .author-location {
                    color: #6c757d;
                    font-size: 14px;
                }
                
                .swiper-pagination-bullet-active {
                    background: #4e73df;
                }
                
                .swiper-button-next, .swiper-button-prev {
                    color: #4e73df;
                    background: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                }
                
                .swiper-button-next:after, .swiper-button-prev:after {
                    font-size: 18px;
                }
                
                @media (max-width: 768px) {
                    .testimonial-card {
                        padding: 20px;
                    }
                    
                    .swiper-button-next, .swiper-button-prev {
                        display: none;
                    }
                }
            </style>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <span class="oneclick-section-label wow fadeIn">Testimonials</span>
                        <h2 class="oneclick-section-title wow fadeInUp">What Our Customers Say</h2>
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
                                            <div class="author-info">
                                                <strong class="author-name">Arjun Kumar</strong>
                                                <span class="author-location">Bangalore, Karnataka</span>
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
                                            "The term life insurance policy I got through OneClick saved me thousands compared to other options. 
                                            The process was transparent and straightforward."
                                        </p>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <strong class="author-name">Vikram Patel</strong>
                                                <span class="author-location">Ahmedabad, Gujarat</span>
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
                                            "As a first-time car owner, I was confused about insurance options. OneClick guided me through 
                                            the entire process and found me the perfect coverage at an affordable rate."
                                        </p>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <strong class="author-name">Neha Gupta</strong>
                                                <span class="author-location">Pune, Maharashtra</span>
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
                                            "I had to file a claim after a minor accident, and I was amazed at how quickly OneClick processed everything. 
                                            The settlement was fair and fast - exactly what you need during stressful times."
                                        </p>
                                        <div class="testimonial-author">
                                            <div class="author-info">
                                                <strong class="author-name">Rajesh Khanna</strong>
                                                <span class="author-location">Chennai, Tamil Nadu</span>
                                            </div>
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
        </section>


        <section class="partners pb-4 ">
             <div class="row">
                    <div class="col-12 text-center mt-3">
                        <span class="oneclick-section-label">Our Partners</span>
                        <h2 class="oneclick-section-title">Partner with Us</h2>
                    </div>
                </div>
            <div class="col-lg-12"style="padding:50px" >
                <img src="assets/img/all-partner-logo.avif" alt=""style="width: 100%;">
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Testimonial Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.testimonialsSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });
        });
    </script>
    
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>

</body>
</html>
