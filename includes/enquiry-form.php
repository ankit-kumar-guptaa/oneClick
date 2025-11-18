<!-- OneClick Minimal Enquiry Form - Compact, Blue-White, AJAX+Notify -->
<div class="oc-enquiry-minimal">
  <form id="quickEnquiryForm" method="post" action="includes/process-enquiry.php" autocomplete="off" class="oc-mini-form">
    <div class="ocm-header">
      <span class="ocm-icon"><i class="fas fa-headset"></i></span>
      <span class="ocm-title">Quick Enquiry</span>
    </div>
    <input type="text" name="fullName" class="ocm-input" placeholder="Full Name*" required>
    <input type="email" name="emailAddress" class="ocm-input" placeholder="Email Address*" required>
    <input type="tel" name="phoneNumber" class="ocm-input" maxlength="10" pattern="[0-9]{10}" placeholder="Phone Number*" required>
    <select name="insuranceType" class="ocm-input" required>
      <option value="" disabled selected>Insurance Type*</option>
      <option value="car">Car Insurance</option>
      <option value="bike">Two Wheeler</option>
      <option value="health">Health</option>
      <option value="term">Term Life</option>
      <option value="travel">Travel</option>
      <option value="home">Home</option>
      <option value="other">Other</option>
    </select>
    <textarea name="message" class="ocm-input" rows="2" placeholder="Message (optional)"></textarea>
    <button type="submit" class="ocm-btn" id="ocmSubmitBtn">
      <span class="btn-text">Get Free Quote</span>
      <span class="btn-loader" style="display:none;"><i class="fas fa-spinner fa-spin"></i></span>
      <i class="fas fa-arrow-right"></i>
    </button>
    <div class="ocm-note"><i class="fas fa-lock"></i> Your data is secure</div>
  </form>
  <div class="ocm-toast" id="ocmToast"></div>
</div>

<!-- Minimal Component Styles -->
<style>
.oc-enquiry-minimal {
  max-width: 320px;
  margin: 28px auto 0 auto;
}
.oc-mini-form {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 3px 17px rgba(71,123,231,0.10);
  border:1px solid #e5eaf4;
  padding: 14px 12px 10px 12px;
  display: flex;
  flex-direction: column;
  gap: 7px;
  min-width: 0;
  transition: box-shadow 0.21s;
}
.oc-mini-form:focus-within { box-shadow: 0 6px 20px rgba(71,123,231,0.13);}
.ocm-header { display: flex; align-items: center; gap:9px; margin-bottom:7px;}
.ocm-icon {
  background: linear-gradient(130deg, #497be7 75%, #3595e6 100%);
  color: #fff;
  border-radius: 50%;
  width: 28px; height: 28px; display: grid; place-items:center;
  font-size: 1rem; margin-bottom: 1px;
}
.ocm-title { font-weight: 600; color: #2856a7; font-size: 1.03rem; }
.ocm-input {
  font-size: 0.93rem; padding: 7.7px 12px;
  border-radius: 7px; border: 1px solid #dbe7fa;
  background: #f7faff; outline: none;
  color: #35425c; transition: box-shadow 0.2s, border-color 0.2s;
}
.ocm-input:focus {
  border-color: #497be7;
  background: #fff;
  box-shadow: 0 0 0 1.5px rgba(71,123,231,0.11);
}
.ocm-btn {
  margin-top: 2px;
  background: linear-gradient(90deg, #497be7 80%, #899cf4 100%);
  color: #fff; border: none;
  font-size: 0.98rem; font-weight: 600; padding: 9px 0;
  border-radius: 7px;
  box-shadow: 0 1.5px 6px rgba(71,123,231,0.12);
  cursor: pointer;
  transition: background 0.13s;
  display: flex; align-items: center; justify-content: center; gap:6px;
}
.ocm-btn:hover { background: linear-gradient(90deg, #3155b5 80%, #497be7 100%);}
.ocm-btn .btn-loader { margin-right:5px;}
.ocm-btn:disabled { opacity: 0.74; cursor: not-allowed;}
.ocm-note {
  font-size: 0.83rem; color: #7283a2;
  text-align: center; margin-top: 2px;
}
.ocm-note i { color: #497be7; margin-right: 3px; font-size:0.95em;}
.ocm-toast {
  display: none; position: fixed; top: 28px; left: 50%;
  transform: translateX(-50%);
  background: #497be7; color: #fff;
  padding: 9px 28px; border-radius: 6px;
  box-shadow: 0 2px 16px rgba(71,123,231,0.08);
  z-index: 999; font-size: 1rem; animation: toastpop 0.37s;
}
@keyframes toastpop {
  0% { opacity: 0; transform: translate(-50%, -16px);}
  100% { opacity:1; transform: translate(-50%,0);}
}
@media (max-width:450px) { .oc-mini-form{padding:7px 2px 7px 2px;} }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('quickEnquiryForm');
  const toast = document.getElementById('ocmToast');
  const submitBtn = document.getElementById('ocmSubmitBtn');
  const btnText = submitBtn.querySelector('.btn-text');
  const btnLoader = submitBtn.querySelector('.btn-loader');

  if(form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      // Compact validation
      const fullName = form.fullName.value.trim();
      const email = form.emailAddress.value.trim();
      const phone = form.phoneNumber.value.trim();
      const insuranceType = form.insuranceType.value;
      if(!fullName || !email || !phone || !insuranceType) {
        showToast('Fill all required fields');
        return false;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if(!emailRegex.test(email)) {
        showToast('Enter valid email');
        return false;
      }
      const phoneRegex = /^[0-9]{10}$/;
      if(!phoneRegex.test(phone)) {
        showToast('Enter 10-digit phone');
        return false;
      }

      submitBtn.disabled = true;
      btnText.style.display = 'none';
      btnLoader.style.display = 'inline-block';

      const FD = new FormData(form);
      fetch(form.action, { method: "POST", body: FD })
      .then(res => res.text())
      .then(data => {
        showToast("Your enquiry submitted successfully!");
        form.reset();
      })
      .catch(() => {
        showToast("Something went wrong!");
      })
      .finally(() => {
        submitBtn.disabled = false;
        btnText.style.display = 'inline-block';
        btnLoader.style.display = 'none';
      });
    });
  }
  function showToast(msg) {
    toast.innerText = msg;
    toast.style.display = 'block';
    setTimeout(() => { toast.style.display = 'none'; }, 2100);
  }
});
</script>
