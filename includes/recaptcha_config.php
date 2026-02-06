<?php
/**
 * reCAPTCHA Configuration for OneClick Insurance
 * Using reCAPTCHA v3 (Invisible)
 */

// reCAPTCHA v3 Keys
define('RECAPTCHA_SITE_KEY', '6LemWGIsAAAAAMQ-p2uDqG-1E0yz_YGNurnT4hW0');
define('RECAPTCHA_SECRET_KEY', '6LemWGIsAAAAAMtBEpzRiq-LyiQRpfuXEQRaXgfl');
define('RECAPTCHA_VERIFY_URL', 'https://www.google.com/recaptcha/api/siteverify');

/**
 * Validate reCAPTCHA response
 * @param string $recaptchaResponse The reCAPTCHA response from the form
 * @return bool True if valid (score >= 0.5), false if invalid
 */
function validate_recaptcha($recaptchaResponse) {
    if (empty($recaptchaResponse)) {
        return false;
    }
    
    $data = [
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $recaptchaResponse,
        'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents(RECAPTCHA_VERIFY_URL, false, $context);
    
    if ($result === false) {
        return false;
    }
    
    $response = json_decode($result, true);
    
    // Check success and score (v3 returns score 0.0-1.0)
    // We accept score >= 0.5 as human
    if (isset($response['success']) && $response['success'] === true) {
        if (isset($response['score']) && $response['score'] >= 0.5) {
            return true;
        }
    }
    
    return false;
}

/**
 * Render reCAPTCHA hidden input and script
 * This replaces the v2 widget
 * @return string HTML code for reCAPTCHA
 */
function render_recaptcha() {
    return '<input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">';
}

/**
 * Include reCAPTCHA JavaScript in page
 * @return string JavaScript include code
 */
function recaptcha_script() {
    $siteKey = RECAPTCHA_SITE_KEY;
    return <<<HTML
    <script src="https://www.google.com/recaptcha/api.js?render={$siteKey}"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        grecaptcha.ready(function() {
            // Find all forms with reCAPTCHA response field
            var inputs = document.querySelectorAll('.g-recaptcha-response');
            inputs.forEach(function(input) {
                grecaptcha.execute('{$siteKey}', {action: 'submit'}).then(function(token) {
                    input.value = token;
                });
            });
            
            // Refresh token every 90 seconds (tokens expire after 2 mins)
            setInterval(function() {
                inputs.forEach(function(input) {
                    grecaptcha.execute('{$siteKey}', {action: 'submit'}).then(function(token) {
                        input.value = token;
                    });
                });
            }, 90000);
        });
    });
    </script>
HTML;
}
?>