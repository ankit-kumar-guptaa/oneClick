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
    <title>Commercial Vehicle Insurance - OneClick Insurance | Business Fleet Coverage</title>
    <meta name="description" content="Get the best commercial vehicle insurance policies at OneClick Insurance. Protect your business fleet with comprehensive coverage from top insurers in India.">
    
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
                        <span>Commercial Vehicle Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Commercial Vehicle Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Comprehensive coverage for your business fleet</p>
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
                        <span class="oneclick-section-label d-inline-block mb-3 px-3 py-1 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold">Commercial Vehicle Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Protect Your <span class="text-gradient">Business Fleet</span></h2>
                        <p class="hero-desc lead mb-4">
                            Get comprehensive protection for your commercial vehicles against accidents, theft, natural disasters, and third-party liabilities. 
                            Our tailored insurance solutions ensure your business operations continue smoothly without interruptions.
                        </p>
                        <div class="hero-features mb-4 row g-3">
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-shield-alt text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Customized Fleet Coverage</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="feature-item d-flex align-items-center p-3 rounded-3 bg-light">
                                    <div class="feature-icon me-3 p-2 rounded-circle bg-primary bg-opacity-10">
                                        <i class="fas fa-money-bill-wave text-primary"></i>
                                    </div>
                                    <span class="fw-medium">Competitive Premium Rates</span>
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

    <!-- Vehicle Types Section -->
    <section class="oci-vehicle-types py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Our Coverage</span>
                    <h2 class="section-title">Commercial Vehicles We Cover</h2>
                    <p class="section-desc">Comprehensive insurance solutions for all types of commercial vehicles</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="vehicle-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Trucks & Lorries</h3>
                        <p>Comprehensive coverage for all types of trucks and lorries used for goods transportation across India.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Own damage coverage</li>
                            <li><i class="fas fa-check"></i> Third-party liability</li>
                            <li><i class="fas fa-check"></i> Driver & cleaner coverage</li>
                            <li><i class="fas fa-check"></i> Goods in transit coverage</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="vehicle-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-bus"></i>
                        </div>
                        <h3>Buses & Coaches</h3>
                        <p>Specialized insurance for passenger vehicles including school buses, tourist coaches, and public transport buses.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Passenger liability cover</li>
                            <li><i class="fas fa-check"></i> Third-party liability</li>
                            <li><i class="fas fa-check"></i> Driver coverage</li>
                            <li><i class="fas fa-check"></i> Natural calamity protection</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="vehicle-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-taxi"></i>
                        </div>
                        <h3>Taxis & Cabs</h3>
                        <p>Tailored insurance solutions for commercial passenger vehicles including taxis, cabs, and ride-sharing vehicles.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Passenger liability cover</li>
                            <li><i class="fas fa-check"></i> Third-party liability</li>
                            <li><i class="fas fa-check"></i> Driver coverage</li>
                            <li><i class="fas fa-check"></i> 24/7 roadside assistance</li>
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
                    <h2 class="section-title">Benefits of OneClick Commercial Vehicle Insurance</h2>
                    <p class="section-desc">We offer the best commercial vehicle insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h4>Customized Fleet Policies</h4>
                        <p>Tailor-made insurance solutions designed specifically for your business fleet requirements.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Cashless Claims</h4>
                        <p>Enjoy hassle-free cashless claims at our 5000+ network garages across India.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-percent"></i>
                        </div>
                        <h4>Fleet Discounts</h4>
                        <p>Special premium discounts for businesses with multiple vehicles in their fleet.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Dedicated Account Manager</h4>
                        <p>A dedicated account manager to handle all your insurance needs and queries.</p>
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

    <!-- Business Solutions Section -->
    <section class="oci-business-solutions py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Business Solutions</span>
                    <h2 class="section-title">Tailored Solutions for Your Business</h2>
                    <p class="section-desc">We understand the unique needs of different businesses and offer customized insurance solutions</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="solution-card d-flex h-100">
                        <div class="solution-icon">
                            <i class="fas fa-truck-loading"></i>
                        </div>
                        <div class="solution-content">
                            <h4>Logistics & Transportation</h4>
                            <p>Comprehensive coverage for logistics companies with features like goods-in-transit insurance, driver coverage, and nationwide garage network.</p>
                            <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="solution-card d-flex h-100">
                        <div class="solution-icon">
                            <i class="fas fa-bus-alt"></i>
                        </div>
                        <div class="solution-content">
                            <h4>Tour & Travel Operators</h4>
                            <p>Specialized insurance for tour operators with passenger liability coverage, breakdown assistance, and alternative transport arrangement coverage.</p>
                            <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="solution-card d-flex h-100">
                        <div class="solution-icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="solution-content">
                            <h4>Educational Institutions</h4>
                            <p>Tailored insurance for school and college buses with enhanced passenger safety coverage and special student protection features.</p>
                            <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="solution-card d-flex h-100">
                        <div class="solution-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="solution-content">
                            <h4>Manufacturing & Construction</h4>
                            <p>Specialized coverage for heavy vehicles used in construction and manufacturing with equipment protection and operator coverage.</p>
                            <a href="#" class="btn-link">Learn More <i class="fas fa-arrow-right"></i></a>
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
                    <p class="section-desc">Find answers to common questions about commercial vehicle insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="commercialVehicleFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is commercial vehicle insurance?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#commercialVehicleFAQ">
                                <div class="accordion-body">
                                    Commercial vehicle insurance is a specialized insurance policy designed for vehicles used for business purposes. It provides coverage for damages to the vehicle, third-party liabilities, and additional coverages specific to commercial use, such as goods-in-transit insurance and employee liability coverage.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How is commercial vehicle insurance different from personal vehicle insurance?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#commercialVehicleFAQ">
                                <div class="accordion-body">
                                    Commercial vehicle insurance differs from personal vehicle insurance in several ways: it typically has higher liability limits to protect businesses from lawsuits, includes coverage for employees driving the vehicles, may cover specialized equipment attached to the vehicle, and often includes business interruption coverage. The premiums are generally higher due to the increased risk associated with commercial use and higher mileage.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What factors affect commercial vehicle insurance premiums?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#commercialVehicleFAQ">
                                <div class="accordion-body">
                                    Several factors affect commercial vehicle insurance premiums, including: type and size of vehicle, nature of goods transported, vehicle usage and annual mileage, driver experience and history, geographical area of operation, claim history, safety features and security measures, and the coverage options and limits selected.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Can I get a fleet insurance policy for multiple commercial vehicles?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#commercialVehicleFAQ">
                                <div class="accordion-body">
                                    Yes, fleet insurance policies are available for businesses with multiple commercial vehicles. These policies cover all vehicles under a single policy, simplifying administration and often providing cost savings. Fleet policies can be customized based on the number and types of vehicles, usage patterns, and specific business needs. At OneClick Insurance, we offer special discounts for fleet policies.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What documents are required for commercial vehicle insurance claim?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#commercialVehicleFAQ">
                                <div class="accordion-body">
                                    For commercial vehicle insurance claims, you typically need: duly filled claim form, copy of your insurance policy, copy of the driver's license, copy of vehicle registration certificate (RC), copy of FIR (in case of theft, third-party injury, or major accidents), original repair bills and payment receipts (for reimbursement claims), photographs of the damaged vehicle, and goods manifest or bill (for goods-in-transit claims).
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
                        <h2 class="mb-4">Ready to Protect Your Business Fleet?</h2>
                        <p class="lead mb-4">Get customized insurance solutions for your commercial vehicles and save on premiums with our fleet discounts.</p>
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