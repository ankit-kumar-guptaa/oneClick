<!-- Removed Top Bar -->
<?php 
// Ensure reCAPTCHA script is loaded
if (function_exists('recaptcha_script')) {
    echo recaptcha_script();
}
?>

    <!-- Modern Header -->
    <header class="oneclick-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand oneclick-brand" href="/">
                    <div class="brand-logo">
                        <img src="assets/img/logo.jpg" style="width: 160px;" alt="OneClick Insurance" class="brand-logo-image">
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-car"></i>
                                Motor
                            </a>
                            <div class="dropdown-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Car Insurance</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">Comprehensive Car Insurance</a></li>
                                                <li><a href="#">Third Party Car Insurance</a></li>
                                                <li><a href="#">Car Insurance Renewal</a></li>
                                                <li><a href="#">Zero Depreciation Cover</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Two Wheeler</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">Bike Insurance</a></li>
                                                <li><a href="#">Scooter Insurance</a></li>
                                                <li><a href="#">Two Wheeler Renewal</a></li>
                                                <li><a href="#">Third Party Bike</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Commercial Vehicle</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">Truck Insurance</a></li>
                                                <li><a href="#">Bus Insurance</a></li>
                                                <li><a href="#">Taxi Insurance</a></li>
                                                <li><a href="#">Goods Carrying Vehicle</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-heartbeat"></i>
                                Health
                            </a>
                            <div class="dropdown-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Individual Plans</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">Individual Health Insurance</a></li>
                                                <li><a href="#">Critical Illness Insurance</a></li>
                                                <li><a href="#">Personal Accident Cover</a></li>
                                                <li><a href="#">Top Up Health Insurance</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Family Plans</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">Family Floater Insurance</a></li>
                                                <li><a href="#">Senior Citizen Health</a></li>
                                                <li><a href="#">Maternity Insurance</a></li>
                                                <li><a href="#">Group Health Insurance</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Special Plans</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#">COVID-19 Insurance</a></li>
                                                <li><a href="#">Diabetes Cover</a></li>
                                                <li><a href="#">Heart Disease Cover</a></li>
                                                <li><a href="#">Cancer Insurance</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-chart-line"></i>
                                Investment
                            </a>
                            <div class="dropdown-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Investment Plans</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#"><i class="fas fa-chart-line"></i> Mutual Funds</a></li>
                                                <li><a href="#"><i class="fas fa-coins"></i> Fixed Deposits</a></li>
                                                <li><a href="#"><i class="fas fa-piggy-bank"></i> Savings Plans</a></li>
                                                <li><a href="#"><i class="fas fa-hand-holding-usd"></i> Retirement Plans</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Insurance + Investment</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#"><i class="fas fa-user-shield"></i> ULIP Plans</a></li>
                                                <li><a href="#"><i class="fas fa-heartbeat"></i> Endowment Plans</a></li>
                                                <li><a href="#"><i class="fas fa-baby"></i> Child Plans</a></li>
                                                <li><a href="#"><i class="fas fa-umbrella"></i> Guaranteed Return Plans</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mega-menu-image">
                                                <img src="assets/img/investment-banner.jpg" alt="Investment Plans" onerror="this.src='assets/img/fallback-image.svg'">
                                                <div class="mega-menu-cta">
                                                    <h5>Grow your wealth</h5>
                                                    <p>Secure your future with our investment plans</p>
                                                    <a href="#" class="btn btn-sm btn-light">Explore Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-umbrella"></i>
                                Other
                            </a>
                            <div class="dropdown-menu mega-menu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Property Insurance</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#"><i class="fas fa-home"></i> Home Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-building"></i> Property Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-store"></i> Shop Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-industry"></i> Industrial Insurance</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Travel & Life</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#"><i class="fas fa-plane"></i> Travel Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-user-shield"></i> Term Life Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-graduation-cap"></i> Student Travel Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-briefcase"></i> Corporate Travel Plans</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="mega-menu-title">Specialized Coverage</h6>
                                            <ul class="mega-menu-list">
                                                <li><a href="#"><i class="fas fa-laptop"></i> Gadget Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-paw"></i> Pet Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-bicycle"></i> Cycle Insurance</a></li>
                                                <li><a href="#"><i class="fas fa-ring"></i> Jewelry Insurance</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">
                                <i class="fas fa-headset"></i>
                                Help
                            </a>
                        </li>
                    </ul>

                    <div class="header-actions">
                        <a href="/signin" class="btn oneclick-btn-signin me-2">
                            <i class="fas fa-user"></i>
                            Sign In
                        </a>

                        <button class="btn oneclick-btn-primary">
                            <i class="fas fa-search"></i>
                            Get Quote
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>