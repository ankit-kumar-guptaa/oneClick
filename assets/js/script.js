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
    const autoPopupOverlay = document.getElementById('autoAppearingPopup');
    const autoPopupForm = autoPopupOverlay?.querySelector('.oneclick-popup-form');
    const closeAutoPopupBtn = document.getElementById('closeAutoPopup');
    const specialOfferForm = document.getElementById('specialOfferForm');
    
    if (!autoPopupOverlay || !autoPopupForm) return;
    
    // Show popup after 6 seconds
    const showAutoPopupTimeout = setTimeout(() => {
        autoPopupOverlay.classList.add('active');
        setTimeout(() => {
            autoPopupForm.classList.add('active');
        }, 300);
    }, 6000);
    
    // Close popup
    if (closeAutoPopupBtn) {
        closeAutoPopupBtn.addEventListener('click', () => {
            autoPopupForm.classList.remove('active');
            setTimeout(() => {
                autoPopupOverlay.classList.remove('active');
            }, 300);
        });
    }
    
    // Close on outside click
    autoPopupOverlay.addEventListener('click', (e) => {
        if (e.target === autoPopupOverlay) {
            autoPopupForm.classList.remove('active');
            setTimeout(() => {
                autoPopupOverlay.classList.remove('active');
            }, 300);
        }
    });
    
    // Form submission
    if (specialOfferForm) {
        specialOfferForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = specialOfferForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual AJAX call)
            setTimeout(() => {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                
                // Hide form
                autoPopupForm.classList.remove('active');
                setTimeout(() => {
                    autoPopupOverlay.classList.remove('active');
                    
                    // Show success notification
                    showNotification('Thank you! Your discount code has been sent to your email.', 'success');
                }, 300);
            }, 1500);
        });
    }
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
    const signInBtn = document.getElementById('signInBtn');
    const signInPopup = document.getElementById('signInPopup');
    const closeSignInPopupBtn = document.getElementById('closeSignInPopup');
    const popupContent = signInPopup?.querySelector('.signin-popup-content');
    
    if (signInBtn && signInPopup) {
        // Show popup when sign in button is clicked
        signInBtn.addEventListener('click', function(e) {
            e.preventDefault();
            document.body.classList.add('popup-open');
            signInPopup.classList.add('active');
            
            // Add a small delay for the animation
            setTimeout(() => {
                if (popupContent) {
                    popupContent.style.opacity = '1';
                    popupContent.style.transform = 'translateY(0) scale(1)';
                }
            }, 50);
        });
        
        // Close popup when close button is clicked
        if (closeSignInPopupBtn) {
            closeSignInPopupBtn.addEventListener('click', function() {
                closeSignInPopupWithAnimation();
            });
        }
        
        // Close popup when clicking outside
        signInPopup.addEventListener('click', function(e) {
            if (e.target === signInPopup) {
                closeSignInPopupWithAnimation();
            }
        });
        
        // Function to close popup with animation
        function closeSignInPopupWithAnimation() {
            if (popupContent) {
                popupContent.style.opacity = '0';
                popupContent.style.transform = 'translateY(30px) scale(0.95)';
            }
            
            // Wait for animation to complete before removing active class
            setTimeout(() => {
                document.body.classList.remove('popup-open');
                signInPopup.classList.remove('active');
                
                // Reset transform and opacity after popup is hidden
                setTimeout(() => {
                    if (popupContent) {
                        popupContent.removeAttribute('style');
                    }
                }, 300);
            }, 300);
        }
        
        // Setup tabs
        const tabs = signInPopup.querySelectorAll('.signin-tab');
        const tabContents = signInPopup.querySelectorAll('.signin-tab-content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to current tab
                this.classList.add('active');
                
                // Hide all tab contents
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Show current tab content
                const target = this.getAttribute('data-tab');
                const targetContent = signInPopup.querySelector(`.signin-tab-content[data-tab="${target}"]`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
        
        // Setup password toggle
        const passwordInput = document.getElementById('signin-password');
        const passwordToggle = document.getElementById('passwordToggle');
        if (passwordInput && passwordToggle) {
            passwordToggle.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    this.innerHTML = '<i class="fas fa-eye-slash"></i>';
                } else {
                    passwordInput.type = 'password';
                    this.innerHTML = '<i class="fas fa-eye"></i>';
                }
            });
        }
        
        // Setup phone input formatting
        const phoneInput = document.getElementById('signin-phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 10) value = value.slice(0, 10);
                this.value = value;
            });
        }
        
        // Setup form submission
        const phoneForm = signInPopup.querySelector('.signin-tab-content[data-tab="phone"] form');
        if (phoneForm) {
            phoneForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Show OTP section
                const otpSection = signInPopup.querySelector('.otp-section');
                if (otpSection) {
                    otpSection.classList.add('active');
                    // Focus on first OTP input
                    const firstOtpInput = otpSection.querySelector('.otp-input');
                    if (firstOtpInput) firstOtpInput.focus();
                }
            });
        }
        
        // Setup OTP input focus behavior
        const otpInputs = document.querySelectorAll('.otp-input');
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                // Only allow numbers
                this.value = this.value.replace(/[^0-9]/g, '');
                
                if (this.value.length >= 1) {
                    this.value = this.value[0]; // Only allow one character
                    
                    // Add filled class for styling
                    this.classList.add('filled');
                    
                    // Move to next input
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    } else {
                        // Last input filled, check if all inputs are filled
                        const allFilled = Array.from(otpInputs).every(input => input.value.length === 1);
                        if (allFilled) {
                            // All inputs filled, show success animation
                            otpInputs.forEach(input => {
                                input.style.borderColor = '#10b981'; // Success color
                                input.style.backgroundColor = 'rgba(16, 185, 129, 0.1)'; // Light success background
                            });
                            
                            // Change button text to indicate verification
                            const verifyOtpBtn = document.querySelector('.signin-button');
                            if (verifyOtpBtn) {
                                verifyOtpBtn.innerHTML = '<i class="fas fa-check-circle"></i> Verify OTP';
                                verifyOtpBtn.classList.add('verify-ready');
                            }
                        }
                    }
                } else {
                    this.classList.remove('filled');
                }
            });
            
            // Handle backspace
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace') {
                    if (!this.value && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                    this.classList.remove('filled');
                    this.style.borderColor = '';
                    this.style.backgroundColor = '';
                }
            });
            
            // Handle paste event for OTP
            input.addEventListener('paste', function(e) {
                e.preventDefault();
                const pasteData = e.clipboardData.getData('text');
                const otpDigits = pasteData.replace(/[^0-9]/g, '').split('');
                
                // Fill inputs with pasted digits
                otpInputs.forEach((input, i) => {
                    if (i < otpDigits.length) {
                        input.value = otpDigits[i];
                        input.classList.add('filled');
                    }
                });
                
                // Focus on appropriate input after paste
                if (otpDigits.length < otpInputs.length) {
                    otpInputs[Math.min(otpDigits.length, otpInputs.length - 1)].focus();
                } else {
                    otpInputs[otpInputs.length - 1].focus();
                }
            });
        });
        
        // Setup email form submission
        const emailForm = signInPopup.querySelector('.signin-tab-content[data-tab="email"] form');
        if (emailForm) {
            emailForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Handle email login (can be expanded later)
                showNotification('Login successful!', 'success');
                hidePopup(signInPopup);
            });
        }
    }
    
    // Close popup when close button is clicked
    closePopupBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const popup = this.closest('.popup-overlay');
            if (popup) {
                hidePopup(popup);
            }
        });
    });
    
    // Close popup when clicking outside
    document.addEventListener('click', function(e) {
        const popups = document.querySelectorAll('.popup-overlay.active');
        popups.forEach(popup => {
            const popupContent = popup.querySelector('.popup-content');
            if (popup.classList.contains('active') && popupContent && !popupContent.contains(e.target) && !e.target.closest('.popup-trigger')) {
                hidePopup(popup);
            }
        });
    });
}

// Setup Phone Callback Popup
function setupPhoneCallbackPopup() {
    const phonePopup = document.getElementById('phonePopup');
    const closePopupBtns = document.querySelectorAll('.close-popup');
    
    if (phonePopup) {
        // Close popup when close button is clicked
        closePopupBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const popup = this.closest('.popup-overlay');
                if (popup) {
                    hidePopup(popup);
                }
            });
        });
        
        // Setup phone input formatting
        const phoneInput = document.getElementById('callbackPhoneInput');
        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 10) value = value.slice(0, 10);
                
                // Format as XXX-XXX-XXXX
                if (value.length > 6) {
                    this.value = `${value.slice(0, 3)}-${value.slice(3, 6)}-${value.slice(6)}`;
                } else if (value.length > 3) {
                    this.value = `${value.slice(0, 3)}-${value.slice(3)}`;
                } else {
                    this.value = value;
                }
            });
        }
        
        // Form submission
        const callbackForm = document.getElementById('callbackForm');
        if (callbackForm) {
            callbackForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                const name = document.getElementById('callbackNameInput').value;
                const phone = document.getElementById('callbackPhoneInput').value;
                const email = document.getElementById('callbackEmailInput').value;
                
                // Validate form data
                if (!name || !phone) {
                    showNotification('Please fill in all required fields', 'error');
                    return;
                }
                
                // Show success message
                showNotification('Thank you! We will call you back shortly.', 'success');
                
                // Hide popup after success
                setTimeout(() => {
                    hidePopup(phonePopup);
                    callbackForm.reset();
                }, 2000);
                
                // Here you would normally send the data to the server
                console.log('Callback request:', { name, phone, email });
            });
        }
    }
};

// Legacy Popup Form Functionality - Keeping for backward compatibility
const setupPopupForm = () => {
    // This function is now deprecated, using setupPhoneCallbackPopup instead
    console.log('Using legacy popup form setup');
};

// Initialize popup form when DOM is loaded
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
