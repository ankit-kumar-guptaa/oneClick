<!-- Attractive Enquiry Form for OneClick Insurance -->
<div class="oneclick-enquiry-form">
    <div class="enquiry-form-container">
        <div class="enquiry-form-header">
            <div class="form-icon-wrapper">
                <div class="form-icon-circle">
                    <i class="fas fa-headset"></i>
                </div>
            </div>
            <h4>Quick Enquiry</h4>
            <p>Get expert insurance advice within 24 hours</p>
        </div>
        <form id="quickEnquiryForm" method="post" action="includes/process-enquiry.php">
            <div class="form-group mb-3">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control custom-input" id="fullName" name="fullName" placeholder="Your Full Name" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control custom-input" id="emailAddress" name="emailAddress" placeholder="Email Address" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    <input type="tel" class="form-control custom-input" id="phoneNumber" name="phoneNumber" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group input-group-lg">
                    <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                    <select class="form-select custom-input" id="insuranceType" name="insuranceType" required>
                        <option value="" selected disabled>Select Insurance Type</option>
                        <option value="car">Car Insurance</option>
                        <option value="bike">Two Wheeler Insurance</option>
                        <option value="health">Health Insurance</option>
                        <option value="term">Term Life Insurance</option>
                        <option value="travel">Travel Insurance</option>
                        <option value="home">Home Insurance</option>
                        <option value="other">Other Insurance</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                    <textarea class="form-control custom-input" id="message" name="message" placeholder="Your Message (Optional)" rows="3"></textarea>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg enquiry-submit-btn">
                    <span>Get Free Quote</span> <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </div>
            <div class="form-security-badge text-center mt-3">
                <i class="fas fa-lock me-1"></i> Your data is secure & confidential
            </div>
        </form>
    </div>
</div>

<style>
/* Enquiry Form Styles */
.oneclick-enquiry-form {
    background: linear-gradient(145deg, #ffffff, #f8f9fa);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    overflow: hidden;
    border: none;
    transition: all 0.4s ease;
    position: relative;
}

.oneclick-enquiry-form:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18);
}

.oneclick-enquiry-form::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 6px;
    background: linear-gradient(90deg, #4776E6, #8E54E9);
}

.enquiry-form-container {
    padding: 30px 25px;
}

.enquiry-form-header {
    text-align: center;
    margin-bottom: 25px;
    position: relative;
}

.form-icon-wrapper {
    margin-bottom: 15px;
}

.form-icon-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4776E6, #8E54E9);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    box-shadow: 0 10px 20px rgba(71, 118, 230, 0.3);
    animation: pulse-light 2s infinite;
}

.form-icon-circle i {
    font-size: 28px;
    color: white;
}

.enquiry-form-header h4 {
    color: #333;
    font-weight: 700;
    margin-bottom: 8px;
    font-size: 1.6rem;
}

.enquiry-form-header p {
    color: #666;
    font-size: 0.95rem;
    opacity: 0.9;
}

/* Input styling */
.oneclick-enquiry-form .input-group-text {
    background: linear-gradient(135deg, #4776E6, #8E54E9);
    color: white;
    border: none;
    width: 50px;
    display: flex;
    justify-content: center;
}

.oneclick-enquiry-form .custom-input {
    border: 1px solid #e1e5eb;
    padding: 12px 16px;
    border-radius: 0 8px 8px 0 !important;
    font-weight: 500;
    transition: all 0.3s;
    font-size: 1rem;
    background-color: #f8f9fa;
}

.oneclick-enquiry-form .custom-input:focus {
    border-color: #8E54E9;
    box-shadow: 0 0 0 3px rgba(142, 84, 233, 0.15);
    background-color: #fff;
}

.oneclick-enquiry-form textarea.custom-input {
    min-height: 100px;
}

/* Button styling */
.enquiry-submit-btn {
    background: linear-gradient(135deg, #4776E6, #8E54E9) !important;
    border: none;
    padding: 15px;
    font-weight: 600;
    font-size: 1.1rem;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    z-index: 1;
}

.enquiry-submit-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #8E54E9, #4776E6);
    transition: all 0.6s ease;
    z-index: -1;
}

.enquiry-submit-btn:hover::before {
    left: 0;
}

.enquiry-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(71, 118, 230, 0.4);
}

.form-security-badge {
    font-size: 0.85rem;
    color: #666;
    font-weight: 500;
}

/* Animations */
@keyframes pulse-light {
    0% {
        box-shadow: 0 0 0 0 rgba(142, 84, 233, 0.4);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(142, 84, 233, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(142, 84, 233, 0);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .enquiry-form-container {
        padding: 25px 20px;
    }
    
    .enquiry-form-header h4 {
        font-size: 1.4rem;
    }
    
    .form-icon-circle {
        width: 60px;
        height: 60px;
    }
    
    .form-icon-circle i {
        font-size: 24px;
    }
}
</style>

<script>
// Form validation and submission
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quickEnquiryForm');
    
    if(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic form validation
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('emailAddress').value;
            const phone = document.getElementById('phoneNumber').value;
            const insuranceType = document.getElementById('insuranceType').value;
            
            if(!fullName || !email || !phone || !insuranceType) {
                alert('Please fill all required fields');
                return false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }
            
            // Phone validation - basic check for numbers only
            const phoneRegex = /^[0-9]{10}$/;
            if(!phoneRegex.test(phone)) {
                alert('Please enter a valid 10-digit phone number');
                return false;
            }
            
            // If validation passes, submit the form to backend
            form.submit();
        });
    }
});
</script>