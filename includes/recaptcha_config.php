<?php
/**
 * reCAPTCHA Configuration for OneClick Insurance
 * Site Key: 6LemWGIsAAAAAMQ-p2uDqG-1E0yz_YGNurnT4hW0
 * Secret Key: 6LemWGIsAAAAAMtBEpzRiq-LyiQRpfuXEQRaXgfl
 */

define('RECAPTCHA_SITE_KEY', '6LemWGIsAAAAAMQ-p2uDqG-1E0yz_YGNurnT4hW0');
define('RECAPTCHA_SECRET_KEY', '6LemWGIsAAAAAMtBEpzRiq-LyiQRpfuXEQRaXgfl');
define('RECAPTCHA_VERIFY_URL', 'https://www.google.com/recaptcha/api/siteverify');

/**
 * Validate reCAPTCHA response
 * @param string $recaptchaResponse The reCAPTCHA response from the form
 * @return bool True if valid, false if invalid
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
    
    return isset($response['success']) && $response['success'] === true;
}

/**
 * Render reCAPTCHA widget in forms
 * @return string HTML code for reCAPTCHA widget
 */
function render_recaptcha() {
    return '<div class="g-recaptcha" data-sitekey="' . RECAPTCHA_SITE_KEY . '"></div>';
}

/**
 * Include reCAPTCHA JavaScript in page
 * @return string JavaScript include code
 */
function recaptcha_script() {
    return '<script src="https://www.google.com/recaptcha/api.js" async defer></script>';
}
?>