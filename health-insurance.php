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
    <title>Health Insurance - OneClick Insurance | Comprehensive Medical Coverage</title>
    <meta name="description" content="Get the best health insurance policies at OneClick Insurance. Compare individual, family and senior citizen health plans from top insurers in India.">
    
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
                        <span>Health Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Health Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Protect your family with the best medical coverage</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Health Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Your Health, <span class="text-gradient">Our Priority</span></h2>
                        <p class="hero-desc lead mb-4">
                            Get comprehensive health insurance coverage for you and your family. Compare plans from top insurers 
                            and find the perfect policy that meets your healthcare needs and budget.
                        </p>
                        <div class="hero-features mb-4 row g-3">
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
                                        <i class="fas fa-money-bill-wave text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Tax Benefits</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-headset text-primary"></i>
                                    </div>
                                    <span class="fw-medium">24/7 Claims Support</span>
                                </div>
                            </div>
                        </div>
                        <div class="hero-cta mt-4">
                            <a href="#" class="btn btn-primary btn-lg rounded-pill shadow-sm">Get Quote <i class="fas fa-arrow-right ms-2"></i></a>
                            <a href="#" class="btn btn-outline-secondary btn-lg ms-2 rounded-pill">Learn More</a>
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
                    <h2 class="section-title">Types of Health Insurance</h2>
                    <p class="section-desc">Choose the right coverage that suits your needs and budget</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3>Individual Health Insurance</h3>
                        <p>Comprehensive health coverage designed for individuals with customizable sum insured options.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Hospitalization expenses</li>
                            <li><i class="fas fa-check"></i> Pre & post hospitalization</li>
                            <li><i class="fas fa-check"></i> Day care procedures</li>
                            <li><i class="fas fa-check"></i> No claim bonus</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Family Floater Health Insurance</h3>
                        <p>Single policy that covers your entire family with a shared sum insured amount.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Coverage for entire family</li>
                            <li><i class="fas fa-check"></i> Cost-effective premium</li>
                            <li><i class="fas fa-check"></i> Shared sum insured</li>
                            <li><i class="fas fa-check"></i> Easy management</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3>Critical Illness Insurance</h3>
                        <p>Specialized coverage that provides a lump sum benefit upon diagnosis of specified critical illnesses.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Lump sum payout</li>
                            <li><i class="fas fa-check"></i> Coverage for major illnesses</li>
                            <li><i class="fas fa-check"></i> No hospitalization required</li>
                            <li><i class="fas fa-check"></i> Income replacement</li>
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
                    <h2 class="section-title">Benefits of OneClick Health Insurance</h2>
                    <p class="section-desc">We offer the best health insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <h4>Cashless Hospitalization</h4>
                        <p>Get treatment at 10,000+ network hospitals across India without paying upfront.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax benefits on premiums paid under Section 80D of the Income Tax Act.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>No Claim Bonus</h4>
                        <p>Get increased sum insured for every claim-free year at no extra cost.</p>
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
                        <h4>Pre & Post Hospitalization</h4>
                        <p>Coverage for medical expenses before and after hospitalization.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coverage Section -->
    <section class="oci-coverage-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Coverage Details</span>
                    <h2 class="section-title">What's Covered & What's Not</h2>
                    <p class="section-desc">Understanding your health insurance coverage is essential</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="coverage-card covered h-100">
                        <div class="card-header">
                            <h3><i class="fas fa-check-circle"></i> What's Covered</h3>
                        </div>
                        <div class="card-body">
                            <ul class="coverage-list">
                                <li><i class="fas fa-check"></i> In-patient hospitalization expenses</li>
                                <li><i class="fas fa-check"></i> Pre and post hospitalization expenses</li>
                                <li><i class="fas fa-check"></i> Day care procedures</li>
                                <li><i class="fas fa-check"></i> Ambulance charges</li>
                                <li><i class="fas fa-check"></i> Domiciliary treatment</li>
                                <li><i class="fas fa-check"></i> Organ donor expenses</li>
                                <li><i class="fas fa-check"></i> AYUSH treatment</li>
                                <li><i class="fas fa-check"></i> Free health check-ups</li>
                                <li><i class="fas fa-check"></i> Maternity expenses (waiting period applies)</li>
                                <li><i class="fas fa-check"></i> New-born baby coverage</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="coverage-card not-covered h-100">
                        <div class="card-header">
                            <h3><i class="fas fa-times-circle"></i> What's Not Covered</h3>
                        </div>
                        <div class="card-body">
                            <ul class="coverage-list">
                                <li><i class="fas fa-times"></i> Pre-existing diseases (waiting period applies)</li>
                                <li><i class="fas fa-times"></i> Cosmetic treatments</li>
                                <li><i class="fas fa-times"></i> Self-inflicted injuries</li>
                                <li><i class="fas fa-times"></i> Non-allopathic treatments (unless specified)</li>
                                <li><i class="fas fa-times"></i> Dental treatments (unless due to accident)</li>
                                <li><i class="fas fa-times"></i> Congenital diseases (external)</li>
                                <li><i class="fas fa-times"></i> HIV/AIDS treatment</li>
                                <li><i class="fas fa-times"></i> War and nuclear perils</li>
                                <li><i class="fas fa-times"></i> Experimental treatments</li>
                                <li><i class="fas fa-times"></i> OPD expenses (unless specified)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="oci-faq-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">FAQs</span>
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-desc">Find answers to common questions about health insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="healthInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is a waiting period in health insurance?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#healthInsuranceFAQ">
                                <div class="accordion-body">
                                    A waiting period is a specified time during which you cannot claim benefits for certain conditions after purchasing a health insurance policy. There are different types of waiting periods: initial waiting period (usually 30 days for any claim except accidents), pre-existing disease waiting period (typically 2-4 years), and specific disease waiting period (usually 1-2 years for conditions like hernia, cataract, etc.).
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is the difference between individual and family floater health insurance?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#healthInsuranceFAQ">
                                <div class="accordion-body">
                                    Individual health insurance provides separate coverage for each insured person with individual sum insured amounts. Family floater health insurance, on the other hand, covers multiple family members under a single policy with a shared sum insured. Family floater plans are generally more cost-effective for young families, while individual plans may be better for families with elderly members or those with pre-existing conditions.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What is a cashless claim in health insurance?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#healthInsuranceFAQ">
                                <div class="accordion-body">
                                    A cashless claim is a facility where you can get treatment at a network hospital without paying hospital bills upfront. The insurance company settles the bill directly with the hospital. To avail this facility, you need to inform the insurance company before planned hospitalization or within 24 hours of emergency hospitalization, and present your health insurance card at the hospital's insurance desk.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What tax benefits do I get on health insurance premiums?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#healthInsuranceFAQ">
                                <div class="accordion-body">
                                    Under Section 80D of the Income Tax Act, you can claim tax deductions on health insurance premiums. For individuals below 60 years, the deduction limit is ₹25,000 for self, spouse, and dependent children. An additional deduction of ₹25,000 is available for parents below 60 years, which increases to ₹50,000 if parents are senior citizens (above 60 years). If both you and your parents are senior citizens, the maximum deduction can go up to ₹1,00,000.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What is a pre-existing disease in health insurance?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#healthInsuranceFAQ">
                                <div class="accordion-body">
                                    A pre-existing disease is any condition, ailment, injury, or disease that is diagnosed by a physician within 48 months prior to the issuance of the health insurance policy. Most health insurance policies have a waiting period of 2-4 years for pre-existing diseases, during which claims related to these conditions are not covered. It's important to disclose all pre-existing conditions when purchasing a policy to avoid claim rejection later.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="oci-cta-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="cta-card bg-gradient-primary text-white text-center p-5 rounded-lg">
                        <h2 class="mb-4">Ready to Secure Your Health?</h2>
                        <p class="lead mb-4">Get comprehensive health insurance coverage for you and your family at affordable premiums.</p>
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