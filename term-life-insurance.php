<?php

require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Term Life Insurance - OneClick Insurance | Affordable Life Coverage</title>
    <meta name="description" content="Get affordable term life insurance policies at OneClick Insurance. Compare term life plans from top insurers with high sum assured and low premiums.">
    
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
                        <span>Term Life Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Term Life Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Affordable protection for your family's future</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Term Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Secure Your Family's <span class="text-gradient">Financial Future</span></h2>
                        <p class="hero-desc lead mb-4">
                            Get comprehensive life coverage at the most affordable premiums. Our term life insurance plans 
                            provide financial security to your loved ones with high sum assured amounts and flexible policy terms.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-rupee-sign text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Lowest Premiums</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-shield-alt text-primary"></i>
                                    </div>
                                    <span class="fw-medium">High Sum Assured</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-taxi text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Accidental Death Cover</span>
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
                    <h2 class="section-title">Types of Term Life Insurance</h2>
                    <p class="section-desc">Choose the right term plan that matches your financial goals and protection needs</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3>Pure Term Insurance</h3>
                        <p>Basic life coverage with maximum protection at minimum cost. Ideal for those seeking pure risk cover.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> High death benefit</li>
                            <li><i class="fas fa-check"></i> Lowest premiums</li>
                            <li><i class="fas fa-check"></i> Flexible tenure</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-undo-alt"></i>
                        </div>
                        <h3>Return of Premium</h3>
                        <p>Get all your premiums back if you survive the policy term. Protection with savings benefit.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Premiums returned</li>
                            <li><i class="fas fa-check"></i> Life coverage</li>
                            <li><i class="fas fa-check"></i> Savings element</li>
                            <li><i class="fas fa-check"></i> Higher premiums</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <h3>Term with Riders</h3>
                        <p>Enhanced protection with additional riders for critical illness, disability, and accidental death.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Critical illness cover</li>
                            <li><i class="fas fa-check"></i> Accidental death benefit</li>
                            <li><i class="fas fa-check"></i> Disability rider</li>
                            <li><i class="fas fa-check"></i> Comprehensive protection</li>
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
                    <h2 class="section-title">Benefits of OneClick Term Insurance</h2>
                    <p class="section-desc">We offer the best term life insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Affordable Premiums</h4>
                        <p>Get the lowest premiums starting from just ₹490 per month for ₹1 crore coverage.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Instant Issuance</h4>
                        <p>Get your term insurance policy instantly with minimal documentation and quick processing.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>High Sum Assured</h4>
                        <p>Coverage up to ₹5 crores to ensure your family's financial security.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h4>Accidental Cover</h4>
                        <p>Additional accidental death benefit up to ₹1 crore at no extra cost.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Critical Illness</h4>
                        <p>Optional critical illness cover for 30+ major diseases with lump sum payout.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax benefits under Section 80C and 10(10D) of Income Tax Act.</p>
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
                        <h2 class="mb-4">Ready to Secure Your Family's Future?</h2>
                        <p class="lead mb-4">Compare quotes from top insurers and get the best term life insurance coverage</p>
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