<?php
require_once __DIR__ . '/session-handler.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/schema.php';

safe_session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['purchase_form'])) {
    header('Location: /dashboard');
    exit();
}

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: /signin');
    exit();
}

$db = new Database();
$conn = $db->getConnection();
ensure_app_schema($conn);

$userId = (int)($_SESSION['user_id'] ?? 0);
$policyId = isset($_POST['policy_id']) ? (int)$_POST['policy_id'] : 0;
$fullName = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');

if ($policyId <= 0 || $fullName === '' || $email === '' || $phone === '') {
    $_SESSION['purchase_error'] = 'Please provide all required details.';
    header('Location: /dashboard');
    exit();
}

// Validate policy exists and active
$p = $conn->prepare('SELECT id FROM policies WHERE id = ? AND active = 1 LIMIT 1');
$p->bind_param('i', $policyId);
$p->execute();
$exists = $p->get_result()->num_rows > 0;
$p->close();
if (!$exists) {
    $_SESSION['purchase_error'] = 'Selected policy not available.';
    header('Location: /dashboard');
    exit();
}

$stmt = $conn->prepare('INSERT INTO policy_orders (user_id, policy_id, full_name, email, phone, status) VALUES (?,?,?,?,?, "pending")');
$stmt->bind_param('iisss', $userId, $policyId, $fullName, $email, $phone);
$ok = $stmt->execute();
$stmt->close();

if ($ok) {
    header('Location: /dashboard?order_success=1');
    exit();
} else {
    $_SESSION['purchase_error'] = 'Failed to create order. Please try again.';
    header('Location: /dashboard');
    exit();
}