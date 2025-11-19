<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

function send_mail($toEmail, $subject, $htmlBody, $replyToEmail = null, $replyToName = null, $attachments = []) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@oneclickinsurer.com';
        $mail->Password = 'Raja@123321@';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('no-reply@oneclickinsurer.com', 'OneClick Insurance');
        if ($replyToEmail) {
            $mail->addReplyTo($replyToEmail, $replyToName ?: $replyToEmail);
        }
        $mail->addAddress($toEmail);

        if (!empty($attachments)) {
            foreach ($attachments as $path) {
                $mail->addAttachment($path);
            }
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $htmlBody;
        $mail->AltBody = strip_tags($htmlBody);

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log('Email send failed: ' . $mail->ErrorInfo);
        return false;
    }
}

function send_otp_email($toEmail, $name, $code) {
    $subject = 'Your OneClick Insurance Email Verification Code';
    $htmlBody = "<div style=\"font-family:Inter,Arial,sans-serif; color:#1f2937;\">
        <h2 style=\"margin:0 0 12px;\">Verify your email</h2>
        <p style=\"margin:0 0 16px;\">Hi " . htmlspecialchars($name) . ",</p>
        <p style=\"margin:0 0 16px;\">Use the following One-Time Password (OTP) to verify your email. It expires in 10 minutes.</p>
        <div style=\"display:inline-block; padding:12px 16px; background:#2563eb; color:#fff; border-radius:8px; font-weight:600; letter-spacing:2px;\">" . htmlspecialchars($code) . "</div>
        <p style=\"margin:16px 0 0; font-size:12px; color:#6b7280;\">If you did not request this, please ignore this email.</p>
    </div>";
    return send_mail($toEmail, $subject, $htmlBody);
}
?>