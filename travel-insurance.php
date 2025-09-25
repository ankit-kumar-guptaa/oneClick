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
    <title>Travel Insurance - OneClick Insurance | Secure Your Journey</title>
    <meta name="description" content="Get comprehensive travel insurance for domestic and international trips. Protect yourself against medical emergencies, trip cancellations, and more.">
    
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
                        <span>Travel Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Travel Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Travel worry-free with comprehensive coverage</p>
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
                        <span class="oneclick-section-label">Travel Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Explore The World <span class="text-gradient">With Confidence</span></h2>
                        <p class="hero-desc lead mb-4">
                            Don't let unexpected events ruin your travel plans. Our comprehensive travel insurance 
                            provides protection against medical emergencies, trip cancellations, lost baggage, and more.
                        </p>
                        <div class="hero-features mb-4">
                            <div class="feature-item">
                                <i class="fas fa-hospital text-primary"></i>
                                <span>Medical Coverage</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-suitcase text-primary"></i>
                                <span>Baggage Protection</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-plane-slash text-primary"></i>
                                <span>Trip Cancellation</span>
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
                    <h2 class="section-title">Types of Travel Insurance</h2>
                    <p class="section-desc">Choose the right coverage that suits your travel needs</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-globe-asia"></i>
                        </div>
                        <h3>International Travel Insurance</h3>
                        <p>Comprehensive coverage for your international trips with higher sum insured for medical emergencies abroad.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Medical expenses coverage</li>
                            <li><i class="fas fa-check"></i> Emergency evacuation</li>
                            <li><i class="fas fa-check"></i> Loss of passport</li>
                            <li><i class="fas fa-check"></i> Trip cancellation/delay</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3>Domestic Travel Insurance</h3>
                        <p>Essential coverage for your travels within India at affordable premiums.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Accident coverage</li>
                            <li><i class="fas fa-check"></i> Trip cancellation</li>
                            <li><i class="fas fa-check"></i> Baggage loss</li>
                            <li><i class="fas fa-check"></i> Flight delays</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Family Travel Insurance</h3>
                        <p>Cost-effective coverage for the entire family under a single policy with shared benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Coverage for all family members</li>
                            <li><i class="fas fa-check"></i> Cost-effective premium</li>
                            <li><i class="fas fa-check"></i> Child-specific benefits</li>
                            <li><i class="fas fa-check"></i> Easy management</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Business Travel Insurance</h3>
                        <p>Specialized coverage for business travelers with additional benefits for business equipment.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Business equipment coverage</li>
                            <li><i class="fas fa-check"></i> Alternative employee expense</li>
                            <li><i class="fas fa-check"></i> Emergency meeting costs</li>
                            <li><i class="fas fa-check"></i> Business trip cancellation</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Student Travel Insurance</h3>
                        <p>Long-term coverage for students studying abroad with education-specific benefits.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Study interruption</li>
                            <li><i class="fas fa-check"></i> Sponsor protection</li>
                            <li><i class="fas fa-check"></i> Tuition fee protection</li>
                            <li><i class="fas fa-check"></i> Extended medical coverage</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                        <h3>Adventure Travel Insurance</h3>
                        <p>Enhanced coverage for adventure activities and sports that standard policies may not cover.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Adventure sports coverage</li>
                            <li><i class="fas fa-check"></i> Equipment protection</li>
                            <li><i class="fas fa-check"></i> Search and rescue</li>
                            <li><i class="fas fa-check"></i> Higher medical limits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Coverage Section -->
    <section class="oci-coverage-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Coverage Details</span>
                    <h2 class="section-title">What's Covered & What's Not</h2>
                    <p class="section-desc">Understanding your travel insurance coverage is essential</p>
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
                                <li><i class="fas fa-check"></i> Medical expenses and hospitalization abroad</li>
                                <li><i class="fas fa-check"></i> Emergency medical evacuation</li>
                                <li><i class="fas fa-check"></i> Trip cancellation or interruption</li>
                                <li><i class="fas fa-check"></i> Flight delays beyond specified hours</li>
                                <li><i class="fas fa-check"></i> Lost, stolen or damaged baggage</li>
                                <li><i class="fas fa-check"></i> Passport loss assistance</li>
                                <li><i class="fas fa-check"></i> Personal accident coverage</li>
                                <li><i class="fas fa-check"></i> Personal liability</li>
                                <li><i class="fas fa-check"></i> Hijack distress allowance</li>
                                <li><i class="fas fa-check"></i> Emergency cash advance</li>
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
                                <li><i class="fas fa-times"></i> Pre-existing medical conditions (unless declared)</li>
                                <li><i class="fas fa-times"></i> Self-inflicted injuries</li>
                                <li><i class="fas fa-times"></i> Traveling against medical advice</li>
                                <li><i class="fas fa-times"></i> Alcohol or drug-related incidents</li>
                                <li><i class="fas fa-times"></i> War zones or countries with travel advisories</li>
                                <li><i class="fas fa-times"></i> Adventure sports (unless specifically covered)</li>
                                <li><i class="fas fa-times"></i> Mental or nervous disorders</li>
                                <li><i class="fas fa-times"></i> Pregnancy-related complications after specified weeks</li>
                                <li><i class="fas fa-times"></i> Traveling for medical treatment</li>
                                <li><i class="fas fa-times"></i> Claims due to illegal activities</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="oci-benefits-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Why Choose Us</span>
                    <h2 class="section-title">Benefits of OneClick Travel Insurance</h2>
                    <p class="section-desc">We offer the best travel insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Worldwide Coverage</h4>
                        <p>Protection across the globe with access to international emergency assistance.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Emergency Assistance</h4>
                        <p>Round-the-clock support for emergencies, no matter where you are.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hospital-user"></i>
                        </div>
                        <h4>Cashless Hospitalization</h4>
                        <p>Get treatment at network hospitals worldwide without paying upfront.</p>
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
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Instant Policy Issuance</h4>
                        <p>Get your travel insurance policy instantly after purchase.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Affordable Premiums</h4>
                        <p>Comprehensive coverage at competitive rates with flexible plan options.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination Guide Section -->
    <section class="oci-destination-guide py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Travel Smart</span>
                    <h2 class="section-title">Popular Destinations & Insurance Requirements</h2>
                    <p class="section-desc">Essential insurance information for top travel destinations</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="destination-card">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=600&h=400&fit=crop" alt="Europe" class="img-fluid rounded-top">
                        </div>
                        <div class="destination-content">
                            <h4>Europe</h4>
                            <p>Schengen visa requires mandatory travel insurance with minimum €30,000 coverage for medical emergencies.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Plans</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="destination-card">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?w=600&h=400&fit=crop" alt="USA" class="img-fluid rounded-top">
                        </div>
                        <div class="destination-content">
                            <h4>USA & Canada</h4>
                            <p>High medical costs require comprehensive coverage with minimum $100,000 medical coverage recommended.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Plans</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="destination-card">
                        <div class="destination-image">
                            <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=600&h=400&fit=crop" alt="Asia" class="img-fluid rounded-top">
                        </div>
                        <div class="destination-content">
                            <h4>Asia</h4>
                            <p>Standard travel insurance with medical coverage and trip protection is recommended for most Asian countries.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary">View Plans</a>
                        </div>
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
                    <p class="section-desc">Find answers to common questions about travel insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="travelInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    When should I buy travel insurance?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#travelInsuranceFAQ">
                                <div class="accordion-body">
                                    It's best to purchase travel insurance as soon as you've booked your trip. This ensures you're covered for any pre-departure issues like trip cancellations due to unforeseen circumstances. Most travel insurance plans offer a "free look" period (usually 10-15 days) during which you can review your policy and request changes or cancellations if needed. Remember that some benefits, like pre-existing condition waivers, are only available if you purchase insurance within 14-21 days of your initial trip deposit.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Does travel insurance cover COVID-19?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#travelInsuranceFAQ">
                                <div class="accordion-body">
                                    Many of our travel insurance plans now include COVID-19 coverage, but the extent of coverage varies by policy. Typically, if you contract COVID-19 before your trip and need to cancel, or if you get COVID-19 while traveling and need medical treatment, you would be covered (subject to policy terms and conditions). However, fear of traveling due to COVID-19 or government travel advisories related to the pandemic may not be covered under standard cancellation reasons. We offer "Cancel For Any Reason" (CFAR) upgrades that provide more flexibility in such situations.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How do I make a claim on my travel insurance?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#travelInsuranceFAQ">
                                <div class="accordion-body">
                                    To make a claim, follow these steps: 1) Contact our 24/7 emergency assistance team immediately if you're facing a medical emergency. 2) For non-emergency claims, document everything with photos, receipts, and official reports (like police reports for theft). 3) Fill out our claim form available on our website or mobile app. 4) Submit the form along with all supporting documentation within the timeframe specified in your policy (usually 30 days from the incident). 5) Our claims team will process your claim and communicate with you regarding any additional information needed or the status of your claim.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Are pre-existing medical conditions covered?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#travelInsuranceFAQ">
                                <div class="accordion-body">
                                    Most standard travel insurance policies exclude pre-existing medical conditions. However, many of our plans offer a pre-existing condition waiver if you purchase the insurance within a specified timeframe after making your initial trip deposit (usually 14-21 days) and insure the full non-refundable cost of your trip. To qualify for this waiver, you must also be medically fit to travel on the day you purchase the policy. For travelers with significant pre-existing conditions, we offer specialized plans with more comprehensive coverage options.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    What's the difference between trip cancellation and "Cancel For Any Reason" coverage?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#travelInsuranceFAQ">
                                <div class="accordion-body">
                                    Standard trip cancellation coverage reimburses you for pre-paid, non-refundable trip costs if you need to cancel for covered reasons specified in the policy (such as illness, injury, death of a traveler or family member, natural disasters, or airline strikes). "Cancel For Any Reason" (CFAR) is an optional upgrade that allows you to cancel your trip for any reason not otherwise covered by the standard policy. CFAR typically reimburses 50-75% of your non-refundable trip costs, must be purchased within 14-21 days of your initial trip deposit, and requires you to insure 100% of your pre-paid trip costs and cancel at least 48 hours before departure.
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
                        <h2 class="mb-4">Ready to Travel Worry-Free?</h2>
                        <p class="lead mb-4">Get comprehensive travel insurance coverage for your next adventure at affordable premiums.</p>
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