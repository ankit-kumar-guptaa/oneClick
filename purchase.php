<?php
require_once __DIR__ . '/includes/session-handler.php';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/database.php';
require_once __DIR__ . '/includes/schema.php';

safe_session_start();

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: /signin');
    exit();
}

$db = new Database();
$conn = $db->getConnection();
ensure_app_schema($conn);

$userId = (int)($_SESSION['user_id'] ?? 0);
$userName = $_SESSION['user_name'] ?? '';
$userEmail = $_SESSION['user_email'] ?? '';

$policyId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($policyId <= 0) { header('Location: /dashboard'); exit(); }

$stmt = $conn->prepare('SELECT id, name, slug, insurer, description, premium, sum_assured, category FROM policies WHERE id = ? AND active = 1 LIMIT 1');
$stmt->bind_param('i', $policyId);
$stmt->execute();
$res = $stmt->get_result();
$policy = $res->num_rows ? $res->fetch_assoc() : null;
$stmt->close();

if (!$policy) { header('Location: /dashboard'); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchase - <?php echo htmlspecialchars($policy['name']); ?> | OneClick</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background:#f9fafb; }
        .card { border:1px solid #e5e7eb; border-radius:12px; }
        .btn-primary { background:#2563eb; border:none; }
        .btn-primary:hover { background:#1d4ed8; }
    </style>
</head>
<body>
<div class="container py-4">
    <a href="/dashboard" class="btn btn-link">← Back to Dashboard</a>
    <div class="row g-3">
        <div class="col-12 col-lg-7">
            <div class="card p-3">
                <h3 class="mb-1"><?php echo htmlspecialchars($policy['name']); ?></h3>
                <p class="text-secondary mb-2">By <?php echo htmlspecialchars($policy['insurer']); ?> · <?php echo htmlspecialchars($policy['category']); ?></p>
                <p class="mb-2">Premium: <strong>₹<?php echo number_format((float)$policy['premium'], 2); ?></strong></p>
                <p class="mb-3">Sum Assured: <strong>₹<?php echo number_format((float)$policy['sum_assured']); ?></strong></p>
                <p class="text-secondary"><?php echo nl2br(htmlspecialchars($policy['description'])); ?></p>
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <div class="card p-3">
                <h5 class="mb-3">Enter Purchase Details</h5>
                <form method="POST" action="/includes/process-purchase.php">
                    <input type="hidden" name="purchase_form" value="1">
                    <input type="hidden" name="policy_id" value="<?php echo (int)$policy['id']; ?>">
                    <div class="mb-2">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?php echo htmlspecialchars($userName); ?>" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($userEmail); ?>" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" pattern="\d{10}" maxlength="10" placeholder="10-digit mobile" required>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Confirm Purchase</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>