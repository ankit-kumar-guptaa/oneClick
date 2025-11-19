<?php

require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Plans - OneClick Insurance | Wealth Creation with Life Cover</title>
    <meta name="description" content="Explore the best investment plans with life insurance coverage at OneClick Insurance. ULIPs, endowment plans, and money-back policies for wealth creation.">
    
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
                        <span>Investment Plans</span>
                    </nav>
                    <h1 class="page-title text-white">Investment Plans</h1>
                    <p class="page-subtitle text-white opacity-75">Wealth creation with life insurance protection</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="oci-hero-section py-5 bg-gradient-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content p-4 p-lg-5 rounded-4 bg-white shadow-sm">
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Investment + Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Grow Your Wealth <span class="text-gradient">with Protection</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our investment plans combine wealth creation with life insurance coverage. Enjoy market-linked returns, 
                            guaranteed benefits, and tax savings while securing your family's financial future.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-chart-line text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Market-linked Returns</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-shield-alt text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Life Cover Included</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-percent text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Tax Benefits</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero-cta mt-4">
                            <a href="#" class="btn btn-primary btn-lg rounded-pill shadow-sm">Explore Plans <i class="fas fa-arrow-right ms-2"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-lg ms-2 rounded-pill">Calculate Returns</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Quick Enquiry Form -->
                    <div class="hero-enquiry-wrapper mt-4 mt-lg-0">
                        <?php include 'includes/enquiry-form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Insurance Types Section -->
    <section class="oci-insurance-types py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Our Offerings</span>
                    <h2 class="section-title">Types of Investment Plans</h2>
                    <p class="section-desc">Choose the right investment plan that matches your financial goals and risk appetite</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3>ULIP Plans</h3>
                        <p>Unit Linked Insurance Plans that offer market-linked returns with life insurance coverage and flexibility.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Market-linked returns</li>
                            <li><i class="fas fa-check"></i> Fund switching options</li>
                            <li><i class="fas fa-check"></i> Life cover included</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <h3>Endowment Plans</h3>
                        <p>Traditional plans that offer guaranteed returns along with life coverage and maturity benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Guaranteed returns</li>
                            <li><i class="fas fa-check"></i> Maturity benefit</li>
                            <li><i class="fas fa-check"></i> Death benefit</li>
                            <li><i class="fas fa-check"></i> Bonuses</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3>Money Back Plans</h3>
                        <p>Receive periodic payouts during the policy term while enjoying life coverage and maturity benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Regular payouts</li>
                            <li><i class="fas fa-check"></i> Life coverage</li>
                            <li><i class="fas fa-check"></i> Maturity benefit</li>
                            <li><i class="fas fa-check"></i> Liquidity</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="oci-benefits-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Why Choose Us</span>
                    <h2 class="section-title">Benefits of Investment Plans</h2>
                    <p class="section-desc">We offer the best investment insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Wealth Creation</h4>
                        <p>Grow your wealth through market-linked returns or guaranteed benefits over the long term.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Life Protection</h4>
                        <p>Financial security for your family with life coverage included in all investment plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>Tax Savings</h4>
                        <p>Enjoy tax benefits under Section 80C, 80D, and 10(10D) of Income Tax Act.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Goal Planning</h4>
                        <p>Plan for specific goals like child education, marriage, or retirement with tailored plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4>Guaranteed Returns</h4>
                        <p>Some plans offer guaranteed returns ensuring capital protection and predictable growth.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h4>Flexibility</h4>
                        <p>Choose premium payment terms, policy duration, and investment options as per your needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="oci-cta-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="cta-card text-center p-5 rounded-4">
                        <h2 class="mb-4">Start Your Investment Journey Today</h2>
                        <p class="lead mb-4">Compare the best investment plans with insurance coverage and secure your financial future</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn btn-light btn-lg rounded-pill me-3">View All Plans</a>
                            <a href="#" class="btn btn-outline-light btn-lg rounded-pill">Get Expert Advice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>