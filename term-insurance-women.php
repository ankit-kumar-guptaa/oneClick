<?php

require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Term Insurance for Women - OneClick Insurance | Special Women's Plans</title>
    <meta name="description" content="Get special term insurance plans for women at OneClick Insurance. Affordable life coverage with women-specific benefits and 20% cheaper premiums.">
    
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
                        <span>Term Insurance for Women</span>
                    </nav>
                    <h1 class="page-title text-white">Term Insurance for Women</h1>
                    <p class="page-subtitle text-white opacity-75">Special plans designed for women's unique needs</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Women's Special</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Financial Security <span class="text-gradient">for Women</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our special term insurance plans for women offer comprehensive life coverage at 20% lower premiums. 
                            Designed keeping women's unique needs in mind, these plans provide financial protection and peace of mind.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-percent text-primary"></i>
                                    </div>
                                    <span class="fw-medium">20% Cheaper Premiums</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-female text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Women-specific Benefits</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-shield-alt text-primary"></i>
                                    </div>
                                    <span class="fw-medium">High Coverage</span>
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
                    <h2 class="section-title">Term Insurance Plans for Women</h2>
                    <p class="section-desc">Choose the right term plan designed specifically for women's financial needs</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <h3>Basic Women's Term</h3>
                        <p>Affordable term insurance with lower premiums specifically for women with comprehensive life coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> 20% lower premiums</li>
                            <li><i class="fas fa-check"></i> High sum assured</li>
                            <li><i class="fas fa-check"></i> Flexible tenure</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3>Women with Critical Illness</h3>
                        <p>Comprehensive coverage including critical illness benefits for women-specific health conditions.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Critical illness cover</li>
                            <li><i class="fas fa-check"></i> Women-specific diseases</li>
                            <li><i class="fas fa-check"></i> Lump sum payout</li>
                            <li><i class="fas fa-check"></i> Affordable premiums</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <h3>Family Protection Plan</h3>
                        <p>Special plans for women that include additional benefits for family financial security.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Family income benefit</li>
                            <li><i class="fas fa-check"></i> Child education rider</li>
                            <li><i class="fas fa-check"></i> Spouse cover option</li>
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
                    <h2 class="section-title">Benefits of Women's Term Insurance</h2>
                    <p class="section-desc">We offer the best term insurance experience for women with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>Lower Premiums</h4>
                        <p>Enjoy up to 20% lower premiums compared to regular term insurance plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Women-specific Coverage</h4>
                        <p>Special coverage for women-specific critical illnesses and health conditions.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>High Sum Assured</h4>
                        <p>Get coverage up to ₹2 crores to ensure your family's financial security.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-baby"></i>
                        </div>
                        <h4>Maternity Benefits</h4>
                        <p>Optional maternity riders for comprehensive family planning coverage.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Child Education Rider</h4>
                        <p>Ensure your children's education is secured with optional education riders.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h4>Accidental Cover</h4>
                        <p>Additional accidental death benefit included in most women's term plans.</p>
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
                        <p class="lead mb-4">Compare the best term insurance plans for women and get comprehensive coverage at lower premiums</p>
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