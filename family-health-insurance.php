<?php

require_once 'includes/config.php';
require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Health Insurance - OneClick Insurance | Comprehensive Family Coverage</title>
    <meta name="description" content="Get comprehensive family health insurance coverage at OneClick Insurance. Protect your entire family with cashless hospitalization and extensive medical coverage.">
    
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
                        <span>Family Health Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Family Health Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Comprehensive protection for your entire family</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Family Protection</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Protect Your <span class="text-gradient">Entire Family</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our family health insurance plans provide comprehensive medical coverage for you, your spouse, 
                            children, and parents. Enjoy cashless hospitalization, extensive coverage, and peace of mind.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-users text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Family Coverage</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-hospital text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Cashless Treatment</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-percent text-primary"></i>
                                    </div>
                                    <span class="fw-medium">25% Discount</span>
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
                    <h2 class="section-title">Family Health Insurance Options</h2>
                    <p class="section-desc">Choose the right family health plan that suits your family's healthcare needs</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Basic Family Floater</h3>
                        <p>Essential health coverage for nuclear families with basic hospitalization and medical expenses coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Nuclear family coverage</li>
                            <li><i class="fas fa-check"></i> Basic hospitalization</li>
                            <li><i class="fas fa-check"></i> Affordable premiums</li>
                            <li><i class="fas fa-check"></i> Room rent limit</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Comprehensive Family</h3>
                        <p>Extensive coverage for larger families including parents with enhanced medical benefits and higher sum insured.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Extended family coverage</li>
                            <li><i class="fas fa-check"></i> Higher sum insured</li>
                            <li><i class="fas fa-check"></i> Pre-existing disease cover</li>
                            <li><i class="fas fa-check"></i> Maternity benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>Senior Citizen Add-on</h3>
                        <p>Special coverage for elderly parents with comprehensive medical care and senior-specific benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Senior-specific coverage</li>
                            <li><i class="fas fa-check"></i> Chronic disease management</li>
                            <li><i class="fas fa-check"></i> Higher age entry</li>
                            <li><i class="fas fa-check"></i> Annual health checkups</li>
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
                    <h2 class="section-title">Benefits of Family Health Insurance</h2>
                    <p class="section-desc">We offer the best family health insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Single Policy</h4>
                        <p>Cover your entire family under one policy with individual sum insured or floater concept.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hospital"></i>
                        </div>
                        <h4>Cashless Treatment</h4>
                        <p>Access 10,000+ network hospitals across India for cashless hospitalization and treatment.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h4>No Claim Bonus</h4>
                        <p>Get up to 100% increase in sum insured for every claim-free year.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Pre-existing Cover</h4>
                        <p>Coverage for pre-existing diseases after initial waiting period with most plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h4>Maternity Cover</h4>
                        <p>Coverage for maternity expenses including delivery and newborn care in select plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax benefits under Section 80D for health insurance premiums paid.</p>
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
                        <h2 class="mb-4">Secure Your Family's Health Today</h2>
                        <p class="lead mb-4">Compare the best family health insurance plans and get comprehensive coverage for your loved ones</p>
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