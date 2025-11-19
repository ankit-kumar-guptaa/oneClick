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
    <title>Life Insurance - OneClick Insurance | Secure Your Family's Future</title>
    <meta name="description" content="Get the best life insurance policies at OneClick Insurance. Compare term life, savings & investment plans from top insurers in India.">
    
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
                        <span>Life Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Life Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Secure your family's financial future</p>
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
                        <span class="oneclick-section-label">Life Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Protect Your <span class="text-gradient">Family's Future</span></h2>
                        <p class="hero-desc lead mb-4">
                            Life is unpredictable. Ensure your loved ones are financially secure with our comprehensive 
                            life insurance plans designed to provide protection and peace of mind.
                        </p>
                        <div class="hero-features mb-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span>Financial Security</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-money-bill-wave text-primary"></i>
                                <span>Tax Benefits</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-piggy-bank text-primary"></i>
                                <span>Wealth Creation</span>
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
                    <h2 class="section-title">Types of Life Insurance</h2>
                    <p class="section-desc">Choose the right coverage that suits your needs and financial goals</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Term Life Insurance</h3>
                        <p>Pure protection plans that provide financial security to your family in case of unfortunate events.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> High coverage at affordable premiums</li>
                            <li><i class="fas fa-check"></i> Income replacement for family</li>
                            <li><i class="fas fa-check"></i> Critical illness riders available</li>
                            <li><i class="fas fa-check"></i> Tax benefits under Section 80C</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Unit Linked Insurance Plans</h3>
                        <p>Dual benefit of insurance protection and investment opportunities for wealth creation.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Market-linked returns</li>
                            <li><i class="fas fa-check"></i> Flexibility in premium payment</li>
                            <li><i class="fas fa-check"></i> Fund switching options</li>
                            <li><i class="fas fa-check"></i> Partial withdrawal facility</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h3>Endowment Plans</h3>
                        <p>Savings-oriented life insurance plans that provide maturity benefits along with life cover.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Guaranteed returns</li>
                            <li><i class="fas fa-check"></i> Disciplined savings</li>
                            <li><i class="fas fa-check"></i> Maturity benefits</li>
                            <li><i class="fas fa-check"></i> Loan facility available</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h3>Money Back Plans</h3>
                        <p>Regular income plans that provide periodic returns along with insurance coverage.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Periodic survival benefits</li>
                            <li><i class="fas fa-check"></i> Steady income stream</li>
                            <li><i class="fas fa-check"></i> Life cover throughout policy term</li>
                            <li><i class="fas fa-check"></i> Maturity benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h3>Retirement Plans</h3>
                        <p>Pension plans designed to provide regular income after retirement for financial independence.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Regular pension after retirement</li>
                            <li><i class="fas fa-check"></i> Lump sum on maturity option</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                            <li><i class="fas fa-check"></i> Death benefit for nominees</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <h3>Child Plans</h3>
                        <p>Specialized plans to secure your child's future education and life goals.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Education funding</li>
                            <li><i class="fas fa-check"></i> Premium waiver benefit</li>
                            <li><i class="fas fa-check"></i> Flexible payout options</li>
                            <li><i class="fas fa-check"></i> Wealth creation for child</li>
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
                    <h2 class="section-title">Benefits of OneClick Life Insurance</h2>
                    <p class="section-desc">We offer the best life insurance experience with numerous advantages</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Financial Protection</h4>
                        <p>Ensure your family's financial security even in your absence with comprehensive coverage.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax benefits on premiums paid under Section 80C and tax-free returns under Section 10(10D).</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <h4>Wealth Creation</h4>
                        <p>Build a corpus for your future goals with investment-linked insurance plans.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Education Planning</h4>
                        <p>Secure your child's education with specialized child plans that ensure funds are available when needed.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h4>Retirement Planning</h4>
                        <p>Ensure financial independence post-retirement with pension plans that provide regular income.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h4>Critical Illness Cover</h4>
                        <p>Get additional protection against critical illnesses with rider options for comprehensive coverage.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="oci-why-choose-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <span class="oneclick-section-label">Our Advantage</span>
                    <h2 class="section-title">Why Choose OneClick Insurance?</h2>
                    <p class="section-desc mb-4">We make life insurance simple, affordable, and accessible for everyone.</p>
                    
                    <div class="why-choose-item d-flex mb-4">
                        <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="content">
                            <h4>Expert Guidance</h4>
                            <p>Our insurance advisors help you choose the right plan based on your needs and financial goals.</p>
                        </div>
                    </div>
                    
                    <div class="why-choose-item d-flex mb-4">
                        <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="content">
                            <h4>Transparent Process</h4>
                            <p>No hidden charges or fine print. We believe in complete transparency throughout the policy term.</p>
                        </div>
                    </div>
                    
                    <div class="why-choose-item d-flex mb-4">
                        <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="content">
                            <h4>Quick Claim Settlement</h4>
                            <p>Hassle-free and quick claim settlement process to ensure your family gets the benefits when they need it most.</p>
                        </div>
                    </div>
                    
                    <div class="why-choose-item d-flex">
                        <div class="icon-box">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="content">
                            <h4>Digital Experience</h4>
                            <p>Manage your policy, pay premiums, and track investments online through our user-friendly portal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-image position-relative">
                        <img src="https://images.unsplash.com/photo-1573497620053-ea5300f94f21?w=600&h=400&fit=crop" 
                             alt="Why Choose OneClick Insurance" class="img-fluid rounded-lg shadow-lg">
                        <div class="stats-card">
                            <div class="stats-item">
                                <h3>98%</h3>
                                <p>Claim Settlement Ratio</p>
                            </div>
                            <div class="stats-item">
                                <h3>24/7</h3>
                                <p>Customer Support</p>
                            </div>
                            <div class="stats-item">
                                <h3>10+</h3>
                                <p>Insurance Partners</p>
                            </div>
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
                    <p class="section-desc">Find answers to common questions about life insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="lifeInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How much life insurance coverage do I need?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#lifeInsuranceFAQ">
                                <div class="accordion-body">
                                    The ideal life insurance coverage should be at least 10-15 times your annual income. However, the exact amount depends on various factors like your age, income, expenses, liabilities, dependents, and future financial goals. Our insurance advisors can help you calculate the right coverage amount based on your specific situation and needs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What is the difference between term insurance and whole life insurance?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#lifeInsuranceFAQ">
                                <div class="accordion-body">
                                    Term insurance provides coverage for a specific period (term), typically 10, 20, or 30 years, and pays the death benefit only if the insured dies during the term. It offers high coverage at affordable premiums but has no maturity benefits if you survive the term. Whole life insurance, on the other hand, provides coverage for the entire lifetime of the insured and includes a savings component that builds cash value over time. It has higher premiums but offers both death benefits and maturity benefits.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What happens if I miss a premium payment?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#lifeInsuranceFAQ">
                                <div class="accordion-body">
                                    Most life insurance policies come with a grace period of 15-30 days after the due date during which you can pay the premium without any penalty. If you fail to pay within the grace period, the policy may lapse. However, many insurers offer a revival option where you can reinstate your policy by paying the outstanding premiums with interest within a specified period (usually 2-5 years from the first unpaid premium).
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Are life insurance premiums tax-deductible?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#lifeInsuranceFAQ">
                                <div class="accordion-body">
                                    Yes, life insurance premiums are eligible for tax deduction under Section 80C of the Income Tax Act, up to a maximum limit of ₹1.5 lakh per financial year. Additionally, the death benefit received by the nominee is completely tax-free under Section 10(10D). For certain policies, maturity benefits may also be tax-free if the conditions specified under Section 10(10D) are met.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Can I surrender my life insurance policy before maturity?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#lifeInsuranceFAQ">
                                <div class="accordion-body">
                                    Yes, you can surrender your life insurance policy before maturity. However, surrendering a policy in the initial years may result in significant financial loss as most policies have high surrender charges in the early years. If you surrender a traditional policy after completing three years, you will receive the surrender value, which is a percentage of the premiums paid or the fund value. For ULIPs, the surrender value depends on the fund performance and applicable charges as per the policy terms.
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
                        <h2 class="mb-4">Ready to Secure Your Family's Future?</h2>
                        <p class="lead mb-4">Get comprehensive life insurance coverage at affordable premiums. Our experts will help you choose the right plan.</p>
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