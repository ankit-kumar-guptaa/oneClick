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


document.querySelector()


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

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    observeCards();
    
    // Add loading animation
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease';
        document.body.style.opacity = '1';
    }, 100);
});

// Header scroll effect
let lastScrollTop = 0;
const header = document.querySelector('.oneclick-header');

window.addEventListener('scroll', () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
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
if (header) {
    header.style.transition = 'transform 0.3s ease';
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

// Export functions for use in other files
window.OneclickInsurance = {
    validateEmail,
    validatePhone,
    togglePasswordVisibility,
    showNotification,
    showLoader,
    hideLoader
};


// Enhanced Hero Slider
const heroSwiper = new Swiper('.heroSwiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    autoplay: {
        delay: 3000,
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
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    }
});
