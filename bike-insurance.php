<?php
// session_start();
require_once 'includes/config.php';
require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Insurance - OneClick Insurance | Two Wheeler Coverage</title>
    <meta name="description" content="Get the best bike insurance policies at OneClick Insurance. Compare comprehensive and third party two wheeler insurance plans from top insurers in India.">
    
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
                        <span>Bike Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Bike Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Protect your two-wheeler with the best insurance coverage</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section class="oci-hero-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <span class="oneclick-section-label">Bike Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Ride with <span class="text-gradient">Complete Protection</span></h2>
                        <p class="hero-desc lead mb-4">
                            Get comprehensive protection for your two-wheeler against accidents, theft, natural disasters, and third-party liabilities. 
                            Compare quotes from top insurers and save up to 60% on your bike insurance premium.
                        </p>
                        <div class="hero-features mb-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span>Instant Policy Issuance</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-money-bill-wave text-primary"></i>
                                <span>No Claim Bonus up to 50%</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-headset text-primary"></i>
                                <span>24/7 Claims Support</span>
                            </div>
                        </div>
                        <div class="hero-cta d-none d-lg-flex">
                            <a href="#" class="btn btn-primary btn-lg">Get Quote <i class="fas fa-arrow-right ms-2"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-lg ms-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Quick Enquiry Form -->
                    <div class="hero-enquiry-wrapper">
                        <div class="hero-enquiry-form">
                            <div class="hero-form-header">
                                <h4><i class="fas fa-paper-plane"></i> Quick Enquiry</h4>
                            </div>
                            <div class="hero-form-body">
                                <?php include 'includes/enquiry-form.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="hero-cta d-flex d-lg-none mt-4 justify-content-center">
                        <a href="#" class="btn btn-primary">Get Quote <i class="fas fa-arrow-right ms-2"></i></a>
                        <a href="#" class="btn btn-outline-secondary ms-2">Learn More</a>
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
                    <h2 class="section-title">Types of Bike Insurance</h2>
                    <p class="section-desc">Choose the right coverage that suits your needs and budget</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <h3>Comprehensive Bike Insurance</h3>
                        <p>Complete protection for your two-wheeler against accidents, theft, fire, natural calamities, and third-party liabilities.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Own damage coverage</li>
                            <li><i class="fas fa-check"></i> Third-party liability</li>
                            <li><i class="fas fa-check"></i> Personal accident cover</li>
                            <li><i class="fas fa-check"></i> Natural calamity protection</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3>Third Party Bike Insurance</h3>
                        <p>Mandatory insurance that covers third-party liabilities arising from accidents involving your two-wheeler.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Legal requirement fulfilled</li>
                            <li><i class="fas fa-check"></i> Third-party injury coverage</li>
                            <li><i class="fas fa-check"></i> Third-party property damage</li>
                            <li><i class="fas fa-check"></i> Affordable premiums</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3>Bike Insurance Renewal</h3>
                        <p>Renew your existing bike insurance policy before it expires to maintain continuous coverage and benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Maintain NCB benefits</li>
                            <li><i class="fas fa-check"></i> No break in coverage</li>
                            <li><i class="fas fa-check"></i> Quick online process</li>
                            <li><i class="fas fa-check"></i> Avoid legal penalties</li>
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
                    <h2 class="section-title">Benefits of OneClick Bike Insurance</h2>
                    <p class="section-desc">We offer the best bike insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Instant Policy Issuance</h4>
                        <p>Get your bike insurance policy instantly after purchase with digital documentation.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Cashless Claims</h4>
                        <p>Enjoy hassle-free cashless claims at our 3000+ network garages across India.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>No Claim Bonus</h4>
                        <p>Get up to 50% discount on your premium for claim-free years.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Customer Support</h4>
                        <p>Our dedicated support team is available round the clock to assist you.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Easy Claim Process</h4>
                        <p>Simple and transparent claim process through our mobile app or website.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Add-on Covers</h4>
                        <p>Customize your policy with various add-on covers for enhanced protection.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="oci-faq-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">FAQs</span>
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-desc">Find answers to common questions about bike insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="bikeInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Is bike insurance mandatory in India?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#bikeInsuranceFAQ">
                                <div class="accordion-body">
                                    Yes, as per the Motor Vehicles Act, 1988, at least third-party bike insurance is mandatory for all two-wheelers plying on Indian roads. Driving without valid third-party insurance can result in penalties and legal consequences.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is IDV in bike insurance?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#bikeInsuranceFAQ">
                                <div class="accordion-body">
                                    IDV or Insured Declared Value is the maximum amount that your insurer will pay you in case of total loss or theft of your two-wheeler. It is calculated based on the manufacturer's listed selling price minus depreciation based on the age of the vehicle.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What is No Claim Bonus (NCB) in bike insurance?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#bikeInsuranceFAQ">
                                <div class="accordion-body">
                                    No Claim Bonus (NCB) is a discount offered on your bike insurance premium for each claim-free year. It starts at 20% after the first claim-free year and can go up to 50% after 5 consecutive claim-free years. NCB is transferable when you change your insurer or vehicle.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    How can I renew my bike insurance policy?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#bikeInsuranceFAQ">
                                <div class="accordion-body">
                                    You can renew your bike insurance policy online through the OneClick Insurance website or app. Simply enter your bike details, review the policy terms, make the payment, and receive your policy document instantly via email. It's recommended to renew your policy before it expires to maintain continuous coverage and NCB benefits.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What documents are required for bike insurance claim?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#bikeInsuranceFAQ">
                                <div class="accordion-body">
                                    For bike insurance claims, you typically need: duly filled claim form, copy of your insurance policy, copy of your driving license, copy of vehicle registration certificate (RC), copy of FIR (in case of theft or third-party injury), original repair bills and payment receipts (for reimbursement claims), and photographs of the damaged vehicle (if applicable).
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="oci-cta-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="cta-card bg-gradient-primary text-white text-center p-5 rounded-lg">
                        <h2 class="mb-4">Ready to Secure Your Bike?</h2>
                        <p class="lead mb-4">Get instant quotes from top insurers and save up to 60% on your bike insurance premium.</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn btn-light btn-lg">Get Quote Now</a>
                            <a href="#" class="btn btn-outline-light btn-lg ms-3">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>