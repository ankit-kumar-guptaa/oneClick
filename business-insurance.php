<?php
// session_start();
require_once 'includes/config.php';
// require_once 'routes/web.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Insurance - OneClick Insurance | Protect Your Enterprise</title>
    <meta name="description" content="Get comprehensive business insurance solutions at OneClick Insurance. Protect your business with liability, property, and employee benefits coverage.">
    
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
                        <span>Business Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Business Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Comprehensive protection for your enterprise</p>
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
                        <span class="oneclick-section-label">Business Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Protect Your <span class="text-gradient">Business Assets</span></h2>
                        <p class="hero-desc lead mb-4">
                            Every business faces unique risks. Our comprehensive business insurance solutions 
                            are designed to protect your enterprise from unexpected events and liabilities.
                        </p>
                        <div class="hero-features mb-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span>Liability Protection</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-building text-primary"></i>
                                <span>Property Coverage</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>Employee Benefits</span>
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
                    <h2 class="section-title">Business Insurance Solutions</h2>
                    <p class="section-desc">Comprehensive coverage options tailored for your business needs</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h3>Liability Insurance</h3>
                        <p>Protect your business from third-party claims for bodily injury, property damage, and legal expenses.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> General Liability Coverage</li>
                            <li><i class="fas fa-check"></i> Professional Liability</li>
                            <li><i class="fas fa-check"></i> Product Liability</li>
                            <li><i class="fas fa-check"></i> Directors & Officers Liability</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3>Property Insurance</h3>
                        <p>Coverage for your business property, equipment, inventory, and assets against damage or loss.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Building Coverage</li>
                            <li><i class="fas fa-check"></i> Equipment & Machinery</li>
                            <li><i class="fas fa-check"></i> Inventory Protection</li>
                            <li><i class="fas fa-check"></i> Business Interruption</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Employee Benefits</h3>
                        <p>Comprehensive benefits packages to attract and retain talented employees for your business.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Group Health Insurance</li>
                            <li><i class="fas fa-check"></i> Group Life Insurance</li>
                            <li><i class="fas fa-check"></i> Disability Insurance</li>
                            <li><i class="fas fa-check"></i> Retirement Plans</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Commercial Auto Insurance</h3>
                        <p>Coverage for vehicles used for business purposes, protecting against accidents and liability.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Liability Coverage</li>
                            <li><i class="fas fa-check"></i> Physical Damage Protection</li>
                            <li><i class="fas fa-check"></i> Fleet Insurance</li>
                            <li><i class="fas fa-check"></i> Non-owned Auto Coverage</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3>Cyber Liability Insurance</h3>
                        <p>Protection against data breaches, cyber attacks, and other digital risks that threaten your business.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Data Breach Coverage</li>
                            <li><i class="fas fa-check"></i> Cyber Extortion Protection</li>
                            <li><i class="fas fa-check"></i> Business Interruption</li>
                            <li><i class="fas fa-check"></i> Recovery Assistance</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-hard-hat"></i>
                        </div>
                        <h3>Workers' Compensation</h3>
                        <p>Mandatory coverage that provides benefits to employees who suffer work-related injuries or illnesses.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Medical Expenses</li>
                            <li><i class="fas fa-check"></i> Lost Wages</li>
                            <li><i class="fas fa-check"></i> Rehabilitation Costs</li>
                            <li><i class="fas fa-check"></i> Legal Protection</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industry Solutions Section -->
    <section class="oci-industry-solutions py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Industry-Specific</span>
                    <h2 class="section-title">Tailored Business Solutions</h2>
                    <p class="section-desc">Specialized insurance packages designed for different business sectors</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <h4>Retail Business</h4>
                        <p>Comprehensive coverage for inventory, property, liability, and business interruption.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h4>Restaurants & Hospitality</h4>
                        <p>Specialized protection for food service, liquor liability, and property damage.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-clinic-medical"></i>
                        </div>
                        <h4>Healthcare Facilities</h4>
                        <p>Medical malpractice, liability, and specialized coverage for healthcare providers.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <h4>Construction & Contractors</h4>
                        <p>Builder's risk, equipment coverage, and liability protection for construction projects.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h4>Technology Companies</h4>
                        <p>Cyber liability, intellectual property, and professional liability coverage.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="industry-card">
                        <div class="industry-icon">
                            <i class="fas fa-truck-moving"></i>
                        </div>
                        <h4>Manufacturing & Distribution</h4>
                        <p>Equipment breakdown, product liability, and supply chain interruption coverage.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Learn More</a>
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
                    <h2 class="section-title">Benefits of OneClick Business Insurance</h2>
                    <p class="section-desc">We offer the best business insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Competitive Pricing</h4>
                        <p>Get the best coverage at affordable rates with flexible payment options.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h4>Customized Solutions</h4>
                        <p>Tailored insurance packages designed specifically for your business needs.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Quick Claim Processing</h4>
                        <p>Fast and efficient claim settlement to minimize business disruption.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h4>Dedicated Account Manager</h4>
                        <p>Personal assistance from an experienced business insurance specialist.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Risk Management Services</h4>
                        <p>Proactive risk assessment and mitigation strategies for your business.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>Round-the-clock assistance for emergencies and urgent insurance matters.</p>
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
                    <p class="section-desc">Find answers to common questions about business insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="businessInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What types of business insurance do I need?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#businessInsuranceFAQ">
                                <div class="accordion-body">
                                    The types of business insurance you need depend on your industry, business size, and specific risks. Most businesses require general liability insurance, property insurance, and workers' compensation insurance. Depending on your operations, you might also need professional liability, cyber liability, commercial auto, or business interruption insurance. Our business insurance specialists can help you identify the right coverage based on your unique business needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How much does business insurance cost?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#businessInsuranceFAQ">
                                <div class="accordion-body">
                                    Business insurance costs vary widely based on factors such as business type, size, location, coverage limits, claims history, and risk factors. Small businesses might pay anywhere from ₹15,000 to ₹1,00,000 annually for basic coverage, while larger businesses or those in high-risk industries may pay significantly more. The best way to determine your specific cost is to get a customized quote based on your business details and coverage needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What is general liability insurance and why do I need it?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#businessInsuranceFAQ">
                                <div class="accordion-body">
                                    General liability insurance protects your business from third-party claims of bodily injury, property damage, and advertising injury. It covers medical expenses, legal defense costs, and settlements or judgments if your business is found liable. This coverage is essential because even a small accident on your premises or a simple mistake could lead to a lawsuit that might financially devastate your business without proper insurance protection.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Is business insurance tax deductible?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#businessInsuranceFAQ">
                                <div class="accordion-body">
                                    Yes, business insurance premiums are generally tax-deductible as ordinary business expenses. This includes premiums for general liability, property insurance, professional liability, workers' compensation, and other business-related insurance policies. However, certain types of life insurance or health insurance may have different tax implications. It's always advisable to consult with a tax professional to understand the specific tax benefits applicable to your business insurance expenses.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How do I file a business insurance claim?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#businessInsuranceFAQ">
                                <div class="accordion-body">
                                    To file a business insurance claim, follow these steps: 1) Report the incident to your insurance provider as soon as possible through their claims hotline, online portal, or your account manager. 2) Document the incident with photos, videos, and written accounts. 3) Gather relevant information such as police reports, witness statements, and expense receipts. 4) Complete the claim forms provided by your insurer. 5) Cooperate with the claims adjuster during the investigation process. Our dedicated claims team will guide you through each step to ensure a smooth and efficient claims process.
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
                        <h2 class="mb-4">Ready to Protect Your Business?</h2>
                        <p class="lead mb-4">Get comprehensive business insurance coverage tailored to your specific industry and needs.</p>
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