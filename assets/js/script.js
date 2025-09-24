// OneClick Insurance Custom JavaScript

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});


// Removed empty document.querySelector() call


// Add animation to cards on scroll
const observeCards = () => {
    const cards = document.querySelectorAll('.oneclick-product-card, .oneclick-stat-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
};

// Insurance Calculator Functions
function setupCalculator() {
    // Tab switching functionality
    const tabBtns = document.querySelectorAll('.calc-tab-btn');
    const tabContents = document.querySelectorAll('.calc-tab-content');
    
    if (tabBtns.length === 0) return; // Exit if calculator not on page
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const tabTarget = btn.dataset.tab;
            
            // Update active tab button
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Update active tab content
            tabContents.forEach(content => {
                content.classList.remove('active');
                if (content.id === tabTarget + '-calc') {
                    content.classList.add('active');
                }
            });
            
            // Hide result if shown
            document.getElementById('premium-result').classList.remove('show');
        });
    });
    
    // Calculate premium for Health Insurance
    const calculateHealthBtn = document.getElementById('calculate-health');
    if (calculateHealthBtn) {
        calculateHealthBtn.addEventListener('click', () => {
            const age = document.getElementById('health-age').value;
            const coverage = parseInt(document.getElementById('health-coverage').value);
            const members = parseInt(document.getElementById('health-members').value);
            const city = document.getElementById('health-city').value;
            
            // Simple calculation logic (can be enhanced with more complex formulas)
            let basePremium = coverage * 0.02; // 2% of coverage amount as base
            
            // Age factor
            let ageFactor = 1.0;
            if (age === '18-25') ageFactor = 0.8;
            else if (age === '26-35') ageFactor = 1.0;
            else if (age === '36-45') ageFactor = 1.2;
            else if (age === '46-55') ageFactor = 1.5;
            else if (age === '56-65') ageFactor = 1.8;
            else if (age === '65+') ageFactor = 2.2;
            
            // Members factor
            let membersFactor = 1.0 + ((members - 1) * 0.5);
            
            // City tier factor
            let cityFactor = 1.0;
            if (city === 'tier1') cityFactor = 1.2;
            else if (city === 'tier2') cityFactor = 1.0;
            else if (city === 'tier3') cityFactor = 0.9;
            
            const premium = Math.round(basePremium * ageFactor * membersFactor * cityFactor);
            showPremiumResult(premium);
        });
    }
    
    // Calculate premium for Car Insurance
    const calculateCarBtn = document.getElementById('calculate-car');
    if (calculateCarBtn) {
        calculateCarBtn.addEventListener('click', () => {
            const carAge = document.getElementById('car-age').value;
            const carValue = document.getElementById('car-value').value;
            const coverageType = document.getElementById('car-coverage').value;
            const ncb = parseInt(document.getElementById('car-ncb').value);
            
            // Simple calculation logic
            let value = 0;
            if (carValue === '300000') value = 300000;
            else if (carValue === '500000') value = 500000;
            else if (carValue === '800000') value = 800000;
            else if (carValue === '1200000') value = 1200000;
            else if (carValue === '1500000+') value = 1500000;
            
            let basePremium = value * 0.03; // 3% of car value
            
            // Car age factor
            let ageFactor = 1.0;
            if (carAge === 'new') ageFactor = 1.0;
            else if (carAge === '1-3') ageFactor = 1.1;
            else if (carAge === '4-6') ageFactor = 1.3;
            else if (carAge === '7-10') ageFactor = 1.5;
            else if (carAge === '10+') ageFactor = 1.8;
            
            // Coverage type factor
            let coverageFactor = 1.0;
            if (coverageType === 'third-party') coverageFactor = 0.4;
            else if (coverageType === 'comprehensive') coverageFactor = 1.0;
            else if (coverageType === 'zero-dep') coverageFactor = 1.3;
            
            // NCB discount
            let ncbDiscount = 1 - (ncb / 100);
            
            const premium = Math.round(basePremium * ageFactor * coverageFactor * ncbDiscount);
            showPremiumResult(premium);
        });
    }
    
    // Calculate premium for Term Life Insurance
    const calculateTermBtn = document.getElementById('calculate-term');
    if (calculateTermBtn) {
        calculateTermBtn.addEventListener('click', () => {
            const age = document.getElementById('term-age').value;
            const coverage = parseInt(document.getElementById('term-coverage').value);
            const duration = parseInt(document.getElementById('term-duration').value);
            const smoker = document.getElementById('term-smoker').value;
            
            // Simple calculation logic
            let basePremium = coverage * 0.001; // 0.1% of coverage amount
            
            // Age factor
            let ageFactor = 1.0;
            if (age === '18-25') ageFactor = 0.8;
            else if (age === '26-35') ageFactor = 1.0;
            else if (age === '36-45') ageFactor = 1.5;
            else if (age === '46-55') ageFactor = 2.2;
            else if (age === '56-60') ageFactor = 3.0;
            
            // Duration factor
            let durationFactor = 1.0 + (duration / 100);
            
            // Smoker factor
            let smokerFactor = smoker === 'yes' ? 1.5 : 1.0;
            
            const premium = Math.round(basePremium * ageFactor * durationFactor * smokerFactor);
            showPremiumResult(premium);
        });
    }
    
    // Get detailed quote button
    const getDetailedQuoteBtn = document.getElementById('get-detailed-quote');
    if (getDetailedQuoteBtn) {
        getDetailedQuoteBtn.addEventListener('click', () => {
            // Show notification
            showNotification('Your detailed quote request has been submitted. Our team will contact you shortly!', 'success');
            
            // Hide calculator result
            setTimeout(() => {
                document.getElementById('premium-result').classList.remove('show');
            }, 1000);
        });
    }
}

function showPremiumResult(amount) {
    const resultElement = document.getElementById('premium-result');
    const amountElement = document.getElementById('premium-amount');
    
    if (resultElement && amountElement) {
        amountElement.textContent = amount.toLocaleString();
        resultElement.classList.add('show');
        
        // Scroll to result
        resultElement.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
}

// Initialize animations when DOM is loaded
// Auto-Appearing Form Functions
function setupAutoAppearingForm() {
    // Function removed as auto-appearing form popup has been removed
    console.log('Auto-appearing form functionality removed');
}

// DOMContentLoaded Event
document.addEventListener('DOMContentLoaded', function() {
    observeCards();
    setupModernHeader();
    setupSignInPopup();
    setupPhoneCallbackPopup();
    setupCalculator();
    setupAutoAppearingForm();
    
    // Add loading animation
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
    
    // Auto show phone callback popup after 5 seconds
    setTimeout(() => {
        const phonePopup = document.getElementById('phonePopup');
        if (phonePopup) {
            showPopup(phonePopup);
        }
    }, 5000);
});

// Modern Header scroll effect
const setupModernHeader = () => {
    const header = document.querySelector('.oneclick-header');
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    if (!header) return;
    
    let lastScrollTop = 0;
    
    // Add scrolled class on scroll
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Add scrolled class for styling
        if (scrollTop > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        // Hide/show header on scroll direction
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            // Scrolling down
            header.style.transform = 'translateY(-100%)';
        } else {
            // Scrolling up
            header.style.transform = 'translateY(0)';
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Add transition to header
    header.style.transition = 'transform 0.3s ease, padding 0.3s ease, box-shadow 0.3s ease';
    
    // Close navbar when clicking outside
    if (navbarToggler) {
        document.addEventListener('click', function(event) {
            const navbarCollapse = document.querySelector('.navbar-collapse');
            if (navbarCollapse && navbarCollapse.classList.contains('show') && 
                !event.target.closest('.navbar-collapse') && 
                !event.target.closest('.navbar-toggler')) {
                navbarToggler.click();
            }
        });
    }
}

// Form validation helper functions
const validateEmail = (email) => {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
};

const validatePhone = (phone) => {
    const re = /^[6-9]\d{9}$/;
    return re.test(phone);
};

// Show/hide password functionality
const togglePasswordVisibility = (inputId, toggleId) => {
    const input = document.getElementById(inputId);
    const toggle = document.getElementById(toggleId);
    
    if (toggle) {
        toggle.addEventListener('click', function() {
            if (input.type === 'password') {
                input.type = 'text';
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    }
};

// Notification system
const showNotification = (message, type = 'success') => {
    const notification = document.createElement('div');
    notification.className = `oneclick-notification oneclick-notification-${type}`;
    notification.innerHTML = `
        <div class="oneclick-notification-content">
            <span>${message}</span>
            <button class="oneclick-notification-close">&times;</button>
        </div>
    `;
    
    // Add notification styles if not already added
    if (!document.querySelector('#oneclick-notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'oneclick-notification-styles';
        styles.textContent = `
            .oneclick-notification {
                position: fixed;
                top: 20px;
                right: 20px;
                min-width: 300px;
                padding: 1rem;
                border-radius: 0.5rem;
                color: white;
                z-index: 10000;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }
            .oneclick-notification-success { background: #10b981; }
            .oneclick-notification-error { background: #ef4444; }
            .oneclick-notification-warning { background: #f59e0b; }
            .oneclick-notification-info { background: #2563eb; }
            .oneclick-notification-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .oneclick-notification-close {
                background: none;
                border: none;
                color: white;
                font-size: 1.2rem;
                cursor: pointer;
                margin-left: 1rem;
            }
            .oneclick-notification.show {
                transform: translateX(0);
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => notification.classList.add('show'), 100);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
    
    // Close button functionality
    notification.querySelector('.oneclick-notification-close').addEventListener('click', () => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    });
};

// Loading spinner
const showLoader = () => {
    const loader = document.createElement('div');
    loader.id = 'oneclick-loader';
    loader.innerHTML = `
        <div class="oneclick-loader-overlay">
            <div class="oneclick-spinner">
                <i class="fas fa-shield-alt"></i>
            </div>
        </div>
    `;
    
    // Add loader styles
    const styles = document.createElement('style');
    styles.textContent = `
        .oneclick-loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10001;
        }
        .oneclick-spinner {
            font-size: 3rem;
            color: #2563eb;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(styles);
    document.body.appendChild(loader);
};

const hideLoader = () => {
    const loader = document.getElementById('oneclick-loader');
    if (loader) {
        loader.remove();
    }
};

// Show popup function
function showPopup(popup) {
    if (!popup) return;
    
    document.body.classList.add('popup-open');
    popup.classList.add('active');
    
    // Add animation classes
    setTimeout(() => {
        const popupContent = popup.querySelector('.popup-content');
        if (popupContent) {
            popupContent.classList.add('popup-animated');
        }
    }, 10);
}

// Hide popup function
function hidePopup(popup) {
    if (!popup) return;
    
    const popupContent = popup.querySelector('.popup-content');
    if (popupContent) {
        popupContent.classList.remove('popup-animated');
    }
    
    setTimeout(() => {
        document.body.classList.remove('popup-open');
        popup.classList.remove('active');
    }, 300);
}

// Setup Sign In Popup
function setupSignInPopup() {
    // Function removed as sign-in popup has been removed
    console.log('Sign-in popup functionality removed');
}

// Setup Phone Callback Popup
function setupPhoneCallbackPopup() {
    // Function removed as phone callback popup has been removed
    console.log('Phone callback popup functionality removed');
}
                


// Legacy Popup Form Functionality - Keeping for backward compatibility
const setupPopupForm = () => {
    // This function is now deprecated, using setupPhoneCallbackPopup instead
    console.log('Using legacy popup form setup');
};

// Initialize popup form when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    observeCards();
    setupModernHeader();
    // setupSignInPopup(); - Removed as sign-in popup has been removed
    // setupPhoneCallbackPopup(); - Removed as phone callback popup has been removed
    setupCalculator();
    // setupAutoAppearingForm(); - Removed as auto-appearing form has been removed
    
    // Add loading animation
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});

// Export functions for use in other files
window.OneclickInsurance = {
    validateEmail,
    validatePhone,
    togglePasswordVisibility,
    showNotification,
    showLoader,
    hideLoader,
    setupPopupForm,
    setupModernHeader
};


// Enhanced Hero Slider
document.addEventListener('DOMContentLoaded', function() {
    const heroSwiper = new Swiper('.heroSwiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        speed: 800, // Smooth transition speed
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        effect: 'slide', // Changed from fade to slide for smooth sliding effect
        grabCursor: true,
        touchEventsTarget: 'container',
        preloadImages: true,
        updateOnImagesReady: true,
        watchSlidesProgress: true
    });
});
