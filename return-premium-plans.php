<?php

require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Premium Plans - OneClick Insurance | Money Back Insurance</title>
    <meta name="description" content="Get return premium insurance plans at OneClick Insurance. Money back plans with guaranteed returns and life coverage combined.">
    
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
                        <span>Return Premium Plans</span>
                    </nav>
                    <h1 class="page-title text-white">Return Premium Plans</h1>
                    <p class="page-subtitle text-white opacity-75">Get your premiums back with life coverage benefits</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Money Back</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Premium Return <span class="text-gradient">with Life Cover</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our return premium plans offer the perfect combination of life insurance coverage and guaranteed premium returns. 
                            Get comprehensive protection while ensuring your premiums are returned at maturity.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-money-bill-wave text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Premium Return</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-shield-alt text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Life Coverage</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-chart-line text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Guaranteed Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero-cta mt-4">
                            <a href="#" class="btn btn-primary btn-lg rounded-pill shadow-sm">Get Quote <i class="fas fa-arrow-right ms-2"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-lg ms-2 rounded-pill">Compare Plans</a>
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
                    <h2 class="section-title">Return Premium Insurance Plans</h2>
                    <p class="section-desc">Choose the right money back plan that suits your financial goals</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <h3>Basic Return Premium</h3>
                        <p>Simple money back plan with guaranteed premium return at maturity and comprehensive life coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> 100% premium return</li>
                            <li><i class="fas fa-check"></i> Life insurance cover</li>
                            <li><i class="fas fa-check"></i> Fixed tenure plans</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h3>Bonus Return Plan</h3>
                        <p>Enhanced money back plan with additional bonuses along with premium return and life coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Premium + bonus return</li>
                            <li><i class="fas fa-check"></i> Annual bonuses</li>
                            <li><i class="fas fa-check"></i> High sum assured</li>
                            <li><i class="fas fa-check"></i> Flexible payment terms</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3>Periodic Return Plan</h3>
                        <p>Structured money back plan with periodic premium returns during the policy term.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Periodic payments</li>
                            <li><i class="fas fa-check"></i> Regular income stream</li>
                            <li><i class="fas fa-check"></i> Life coverage continues</li>
                            <li><i class="fas fa-check"></i> Maturity benefits</li>
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
                    <h2 class="section-title">Benefits of Return Premium Plans</h2>
                    <p class="section-desc">We offer the best money back insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Premium Return</h4>
                        <p>Get 100% of your premiums back at maturity while enjoying life coverage benefits.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Life Protection</h4>
                        <p>Comprehensive life insurance coverage throughout the policy term for financial security.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax deductions under Section 80C and tax-free returns under Section 10(10D).</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Guaranteed Returns</h4>
                        <p>Fixed and guaranteed returns without market risks or investment uncertainties.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>Bonus Additions</h4>
                        <p>Additional bonuses and loyalty additions that enhance your overall returns.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Flexible Tenure</h4>
                        <p>Choose from various policy terms ranging from 10 to 30 years as per your needs.</p>
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
                        <h2 class="mb-4">Secure Your Financial Future Today</h2>
                        <p class="lead mb-4">Compare the best return premium plans and get both life coverage and money back benefits</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn btn-light btn-lg rounded-pill me-3">Get Instant Quote</a>
                            <a href="#" class="btn btn-outline-light btn-lg rounded-pill">Speak to Advisor</a>
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