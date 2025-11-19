<?php
require_once __DIR__ . '/mailer.php';

function find_user_by_email(mysqli $conn, string $email) {
    $stmt = $conn->prepare("SELECT id, full_name, email, phone, password, role, status, email_verified_at FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->num_rows ? $res->fetch_assoc() : null;
    $stmt->close();
    return $user;
}

function create_user(mysqli $conn, string $name, string $email, string $phone, string $password) {
    $existing = find_user_by_email($conn, $email);
    if ($existing) {
        return ['success' => false, 'message' => 'Email already registered'];
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, password, role, status) VALUES (?,?,?,?, 'customer', 'pending_verification')");
    $stmt->bind_param('ssss', $name, $email, $phone, $hash);
    $ok = $stmt->execute();
    $userId = $ok ? $conn->insert_id : null;
    $stmt->close();

    if (!$ok) {
        return ['success' => false, 'message' => 'Failed to create account'];
    }

    $sendResult = create_and_send_otp($conn, $userId, $email, $name);
    if (!$sendResult['success']) {
        return ['success' => false, 'message' => 'Account created but failed to send OTP'];
    }

    $_SESSION['pending_verification_email'] = $email;
    $_SESSION['pending_verification_name'] = $name;

    return ['success' => true, 'message' => 'Account created. Check email for OTP to verify.'];
}

function create_and_send_otp(mysqli $conn, int $userId, string $email, string $name) {
    // Rate limit: max 5 OTPs in last hour
    $check = $conn->prepare("SELECT COUNT(*) AS c FROM email_verifications WHERE email = ? AND created_at >= (NOW() - INTERVAL 1 HOUR)");
    $check->bind_param('s', $email);
    $check->execute();
    $countRow = $check->get_result()->fetch_assoc();
    $check->close();
    if ((int)$countRow['c'] >= 5) {
        return ['success' => false, 'message' => 'Too many OTP requests. Try later.'];
    }

    $code = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    $expires = date('Y-m-d H:i:s', time() + 10 * 60);

    // Remove older OTPs for the user
    $conn->prepare("DELETE FROM email_verifications WHERE user_id = ?")
         ->bind_param('i', $userId);
    // We cannot chain bind_param with prepare inline; do properly:
    $del = $conn->prepare("DELETE FROM email_verifications WHERE user_id = ?");
    $del->bind_param('i', $userId);
    $del->execute();
    $del->close();

    $ins = $conn->prepare("INSERT INTO email_verifications (user_id, email, otp_code, expires_at) VALUES (?,?,?,?)");
    $ins->bind_param('isss', $userId, $email, $code, $expires);
    $ok = $ins->execute();
    $ins->close();

    if (!$ok) {
        return ['success' => false, 'message' => 'Failed to generate OTP'];
    }

    $sent = send_otp_email($email, $name, $code);
    return ['success' => $sent, 'message' => $sent ? 'OTP sent' : 'Failed to send OTP'];
}

function verify_otp(mysqli $conn, string $email, string $code) {
    $stmt = $conn->prepare("SELECT v.id, v.user_id, v.otp_code, v.expires_at, u.status FROM email_verifications v JOIN users u ON u.id = v.user_id WHERE v.email = ? ORDER BY v.created_at DESC LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->num_rows ? $res->fetch_assoc() : null;
    $stmt->close();

    if (!$row) return ['success' => false, 'message' => 'No OTP found. Please request again.'];
    if (strtotime($row['expires_at']) < time()) return ['success' => false, 'message' => 'OTP expired. Please request again.'];
    if ($row['otp_code'] !== $code) return ['success' => false, 'message' => 'Invalid OTP'];

    // Mark user verified
    $upd = $conn->prepare("UPDATE users SET status = 'active', email_verified_at = NOW() WHERE id = ?");
    $upd->bind_param('i', $row['user_id']);
    $upd->execute();
    $upd->close();

    // Remove used OTP
    $del = $conn->prepare("DELETE FROM email_verifications WHERE id = ?");
    $del->bind_param('i', $row['id']);
    $del->execute();
    $del->close();

    // Load user for session
    $user = find_user_by_email($conn, $email);
    if ($user) {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['user_email'] = $user['email'];
    }

    return ['success' => true, 'message' => 'Email verified successfully'];
}

function login_user(mysqli $conn, string $email, string $password) {
    $user = find_user_by_email($conn, $email);
    if (!$user) return ['success' => false, 'message' => 'No account found with this email'];

    if (!password_verify($password, $user['password'])) {
        return ['success' => false, 'message' => 'Invalid email or password'];
    }

    if ($user['status'] !== 'active' || empty($user['email_verified_at'])) {
        // Send OTP and ask to verify
        create_and_send_otp($conn, (int)$user['id'], $user['email'], $user['full_name']);
        $_SESSION['pending_verification_email'] = $user['email'];
        $_SESSION['pending_verification_name'] = $user['full_name'];
        return ['success' => false, 'verify_required' => true, 'message' => 'Please verify your email to continue'];
    }

    // Set session and update last login
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['full_name'];
    $_SESSION['user_email'] = $user['email'];

    $upd = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    $upd->bind_param('i', $user['id']);
    $upd->execute();
    $upd->close();

    return ['success' => true, 'message' => 'Login successful'];
}

function resend_otp(mysqli $conn, string $email) {
    $user = find_user_by_email($conn, $email);
    if (!$user) return ['success' => false, 'message' => 'Account not found'];
    return create_and_send_otp($conn, (int)$user['id'], $user['email'], $user['full_name']);
}
?>