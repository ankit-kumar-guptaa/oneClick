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
    <title>Investment Insurance - OneClick Insurance | Secure Your Financial Future</title>
    <meta name="description" content="Explore investment insurance plans that offer both protection and wealth creation. Secure your financial future with OneClick Insurance.">
    
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
                        <span>Investment Insurance</span>
                    </nav>
                    <h1 class="page-title text-white">Investment Insurance</h1>
                    <p class="page-subtitle text-white opacity-75">Secure your financial future with our investment plans</p>
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
                        <span class="oneclick-section-label">Investment Insurance</span>
                        <h2 class="hero-title display-4 fw-bold mb-4">Grow Your Wealth <span class="text-gradient">With Protection</span></h2>
                        <p class="hero-desc lead mb-4">
                            Our investment insurance plans offer the dual benefit of life insurance protection 
                            and wealth creation. Secure your family's future while building a financial corpus for your goals.
                        </p>
                        <div class="hero-features mb-4">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span>Life Coverage</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-chart-line text-primary"></i>
                                <span>Wealth Creation</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-hand-holding-usd text-primary"></i>
                                <span>Tax Benefits</span>
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
                    <h2 class="section-title">Investment Insurance Plans</h2>
                    <p class="section-desc">Choose the right plan that aligns with your financial goals</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <h3>Unit Linked Insurance Plans (ULIPs)</h3>
                        <p>Market-linked investment plans that offer both insurance coverage and investment opportunities in equity, debt, or balanced funds.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Market-linked returns</li>
                            <li><i class="fas fa-check"></i> Fund switching options</li>
                            <li><i class="fas fa-check"></i> Life insurance coverage</li>
                            <li><i class="fas fa-check"></i> Tax benefits under Section 80C</li>
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
                        <p>Traditional insurance plans that offer guaranteed returns along with life coverage for a specified period.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Guaranteed returns</li>
                            <li><i class="fas fa-check"></i> Low risk investment</li>
                            <li><i class="fas fa-check"></i> Life insurance coverage</li>
                            <li><i class="fas fa-check"></i> Maturity and death benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <h3>Money Back Plans</h3>
                        <p>Insurance plans that provide periodic returns during the policy term along with a lump sum payment at maturity.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Regular payouts</li>
                            <li><i class="fas fa-check"></i> Maturity benefit</li>
                            <li><i class="fas fa-check"></i> Life insurance coverage</li>
                            <li><i class="fas fa-check"></i> Liquidity advantage</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <h3>Child Plans</h3>
                        <p>Investment plans designed to secure your child's future education and other financial needs.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Education funding</li>
                            <li><i class="fas fa-check"></i> Premium waiver benefit</li>
                            <li><i class="fas fa-check"></i> Flexible payout options</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-umbrella"></i>
                        </div>
                        <h3>Pension Plans</h3>
                        <p>Retirement-focused investment plans that help you build a corpus for your post-retirement life.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Regular pension income</li>
                            <li><i class="fas fa-check"></i> Vesting age options</li>
                            <li><i class="fas fa-check"></i> Death benefit</li>
                            <li><i class="fas fa-check"></i> Tax benefits</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="insurance-type-card h-100">
                        <div class="card-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <h3>Guaranteed Return Plans</h3>
                        <p>Low-risk investment plans that offer assured returns regardless of market fluctuations.</p>
                        <ul class="insurance-features">
                            <li><i class="fas fa-check"></i> Fixed returns</li>
                            <li><i class="fas fa-check"></i> Capital protection</li>
                            <li><i class="fas fa-check"></i> Life insurance coverage</li>
                            <li><i class="fas fa-check"></i> Tax-efficient returns</li>
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
                    <h2 class="section-title">Benefits of OneClick Investment Insurance</h2>
                    <p class="section-desc">Discover the advantages of our investment insurance plans</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Dual Benefits</h4>
                        <p>Get the combined advantage of life insurance protection and wealth creation in a single plan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <h4>Tax Benefits</h4>
                        <p>Enjoy tax deductions on premiums under Section 80C and tax-free maturity benefits under Section 10(10D).</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Long-term Wealth Creation</h4>
                        <p>Systematic investment approach helps in building substantial wealth over the long term.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4>Financial Security</h4>
                        <p>Ensure financial protection for your family in case of unfortunate events.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <h4>Flexibility</h4>
                        <p>Options to choose investment strategies, premium payment terms, and policy duration.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>Loan Facility</h4>
                        <p>Option to avail loans against your policy during financial emergencies.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Investment Strategy Section -->
    <section class="oci-investment-strategy py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Smart Investing</span>
                    <h2 class="section-title">Investment Strategies</h2>
                    <p class="section-desc">Maximize returns with our expert investment strategies</p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=500&fit=crop" 
                         alt="Investment Strategy" class="img-fluid rounded-lg shadow">
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="strategy-content">
                        <h3 class="mb-4">How We Maximize Your Returns</h3>
                        <div class="strategy-item mb-3">
                            <h5><i class="fas fa-bullseye text-primary me-2"></i> Goal-Based Investing</h5>
                            <p>We align your investments with your specific financial goals, whether it's retirement planning, child's education, or wealth accumulation.</p>
                        </div>
                        <div class="strategy-item mb-3">
                            <h5><i class="fas fa-balance-scale text-primary me-2"></i> Diversified Portfolio</h5>
                            <p>Our investment plans spread your money across various asset classes to minimize risk and optimize returns.</p>
                        </div>
                        <div class="strategy-item mb-3">
                            <h5><i class="fas fa-sync text-primary me-2"></i> Dynamic Asset Allocation</h5>
                            <p>We adjust your portfolio based on market conditions to protect your investments during volatility and capitalize on growth opportunities.</p>
                        </div>
                        <div class="strategy-item">
                            <h5><i class="fas fa-clock text-primary me-2"></i> Long-Term Perspective</h5>
                            <p>Our strategies focus on long-term wealth creation, allowing your investments to benefit from the power of compounding.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tax Benefits Section -->
    <section class="oci-tax-benefits py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <span class="oneclick-section-label">Tax Advantages</span>
                    <h2 class="section-title">Tax Benefits of Investment Insurance</h2>
                    <p class="section-desc">Optimize your tax planning with our insurance investment plans</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="tax-benefits-card p-4 rounded-lg shadow">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="tax-benefit-item">
                                    <h4><i class="fas fa-file-invoice text-primary me-2"></i> Section 80C Benefits</h4>
                                    <p>Premiums paid towards investment insurance plans qualify for tax deduction under Section 80C of the Income Tax Act, up to ₹1.5 lakh per financial year.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="tax-benefit-item">
                                    <h4><i class="fas fa-hand-holding-usd text-primary me-2"></i> Section 10(10D) Benefits</h4>
                                    <p>Maturity proceeds or death benefits received from investment insurance plans are tax-free under Section 10(10D), subject to certain conditions.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="tax-benefit-item">
                                    <h4><i class="fas fa-exchange-alt text-primary me-2"></i> Tax-Free Switching in ULIPs</h4>
                                    <p>Fund switches within Unit Linked Insurance Plans (ULIPs) are not subject to capital gains tax, allowing for tax-efficient portfolio rebalancing.</p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="tax-benefit-item">
                                    <h4><i class="fas fa-percentage text-primary me-2"></i> Long-Term Capital Gains</h4>
                                    <p>Investment insurance plans offer tax-efficient long-term capital appreciation compared to many other investment options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tax-disclaimer mt-3">
                            <p class="small"><i class="fas fa-info-circle me-2"></i> <strong>Disclaimer:</strong> Tax benefits are subject to changes in tax laws. Please consult a tax advisor for detailed information.</p>
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
                    <p class="section-desc">Find answers to common questions about investment insurance</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="investmentInsuranceFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What is investment insurance?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#investmentInsuranceFAQ">
                                <div class="accordion-body">
                                    Investment insurance is a financial product that combines the benefits of insurance coverage with investment opportunities. It provides life insurance protection while allowing your money to grow through various investment options. The dual benefit ensures that your family is financially protected in case of an unfortunate event, while also helping you build wealth for your future financial goals.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    How is ULIP different from mutual funds?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#investmentInsuranceFAQ">
                                <div class="accordion-body">
                                    While both ULIPs (Unit Linked Insurance Plans) and mutual funds are market-linked investment options, ULIPs offer the additional benefit of life insurance coverage. ULIPs also have a lock-in period of 5 years, whereas mutual funds may have shorter or no lock-in periods depending on the type. ULIPs offer tax benefits under Section 80C for premium payments and tax-free returns under Section 10(10D), while mutual funds are subject to capital gains tax. Additionally, ULIPs allow tax-free switching between funds, which is not available in mutual funds.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What is the lock-in period for investment insurance plans?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#investmentInsuranceFAQ">
                                <div class="accordion-body">
                                    The lock-in period varies depending on the type of investment insurance plan. For ULIPs (Unit Linked Insurance Plans), there is a mandatory lock-in period of 5 years, during which you cannot withdraw your investment. Traditional plans like endowment and money back policies typically have longer lock-in periods, often matching the policy term. Early surrender or withdrawal before the lock-in period may result in surrender charges and reduced returns. It's important to consider your liquidity needs before investing in these plans.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    How do I choose the right investment insurance plan?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#investmentInsuranceFAQ">
                                <div class="accordion-body">
                                    Choosing the right investment insurance plan depends on several factors: 1) Your financial goals (retirement, child's education, wealth creation, etc.), 2) Your risk appetite (conservative, moderate, or aggressive), 3) Investment horizon (short-term or long-term), 4) Liquidity needs, and 5) Tax planning objectives. For market-linked returns with some risk, ULIPs may be suitable. For guaranteed but moderate returns, endowment or guaranteed return plans might be better. Our financial advisors can help you assess your needs and recommend the most appropriate plan based on your specific requirements.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Can I surrender my investment insurance policy before maturity?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#investmentInsuranceFAQ">
                                <div class="accordion-body">
                                    Yes, you can surrender your investment insurance policy before maturity, but it's generally not recommended due to potential financial losses. If you surrender during the lock-in period (typically 5 years for ULIPs), surrender charges will apply, and you may receive significantly less than what you've invested. For traditional plans, early surrender can result in even higher losses. After the lock-in period, surrender charges are lower or nil, but you may still not achieve your financial goals. Instead of surrendering, consider options like policy loans, partial withdrawals (if available), or making the policy paid-up if you're facing financial constraints.
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
                        <h2 class="mb-4">Ready to Secure Your Financial Future?</h2>
                        <p class="lead mb-4">Start your investment journey with OneClick Insurance and enjoy the dual benefits of protection and wealth creation.</p>
                        <div class="cta-buttons">
                            <a href="#" class="btn btn-light btn-lg">Get Quote Now</a>
                            <a href="#" class="btn btn-outline-light btn-lg ms-3">Speak to an Advisor</a>
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