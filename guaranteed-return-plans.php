<?php

require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guaranteed Return Plans - OneClick Insurance | Fixed Return Insurance</title>
    <meta name="description" content="Get guaranteed return insurance plans at OneClick Insurance. Fixed return plans with life coverage and assured benefits.">
    
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
                        <span>Guaranteed Return Plans</span>
                    </nav>
                    <h1 class="page-title text-white">Guaranteed Return Plans</h1>
                    <p class="page-subtitle text-white opacity-75">Fixed returns with life insurance protection</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Fixed Returns</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Guaranteed Returns <span class="text-gradient">with Security</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our guaranteed return plans offer fixed and assured returns along with comprehensive life insurance coverage. 
                            Perfect for risk-averse investors looking for stable returns with financial protection.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-lock text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Guaranteed Returns</span>
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
                                    <span class="fw-medium">Fixed Interest Rates</span>
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
                    <h2 class="section-title">Guaranteed Return Insurance Plans</h2>
                    <p class="section-desc">Choose the right fixed return plan that matches your financial goals</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>Fixed Return Plan</h3>
                        <p>Basic guaranteed return plan with fixed interest rates and comprehensive life insurance coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Fixed interest rates</li>
                            <li><i class="fas fa-check"></i> Life insurance cover</li>
                            <li><i class="fas fa-check"></i> Guaranteed maturity</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3>Monthly Income Plan</h3>
                        <p>Guaranteed monthly income plan with fixed returns and regular payout options.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Monthly income</li>
                            <li><i class="fas fa-check"></i> Fixed returns</li>
                            <li><i class="fas fa-check"></i> Life coverage</li>
                            <li><i class="fas fa-check"></i> Flexible tenure</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Education Plan</h3>
                        <p>Guaranteed education plan with fixed returns for children's education expenses.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Education corpus</li>
                            <li><i class="fas fa-check"></i> Fixed returns</li>
                            <li><i class="fas fa-check"></i> Life coverage</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
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
                    <h2 class="section-title">Benefits of Guaranteed Return Plans</h2>
                    <p class="section-desc">We offer the best fixed return insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4>Guaranteed Returns</h4>
                        <p>Fixed and assured returns without market risks or investment uncertainties.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Life Protection</h4>
                        <p>Comprehensive life insurance coverage throughout the policy term.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax deductions under Section 80C and tax-free returns.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Regular Income</h4>
                        <p>Option for regular income payouts during the policy term.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Lump Sum Payout</h4>
                        <p>Get a lump sum amount at maturity for major financial goals.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Fixed Interest Rates</h4>
                        <p>Predetermined interest rates that remain constant throughout the term.</p>
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
                        <p class="lead mb-4">Compare the best guaranteed return plans and get both fixed returns and life coverage</p>
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