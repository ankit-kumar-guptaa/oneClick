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
$userName = $_SESSION['user_name'] ?? 'User';
$userEmail = $_SESSION['user_email'] ?? '';

// Filters
$q = trim($_GET['q'] ?? '');
$category = trim($_GET['category'] ?? '');
$minPremium = trim($_GET['min_premium'] ?? '');
$maxPremium = trim($_GET['max_premium'] ?? '');

$conds = ['active = 1'];
$types = '';
$vals = [];

if ($q !== '') {
    $conds[] = '(name LIKE ? OR insurer LIKE ? OR category LIKE ? OR description LIKE ?)';
    $like = "%$q%";
    $types .= 'ssss';
    $vals[] = $like; $vals[] = $like; $vals[] = $like; $vals[] = $like;
}
if ($category !== '') {
    $conds[] = 'category = ?';
    $types .= 's';
    $vals[] = $category;
}
if ($minPremium !== '' && is_numeric($minPremium)) {
    $conds[] = 'premium >= ?';
    $types .= 'd';
    $vals[] = (float)$minPremium;
}
if ($maxPremium !== '' && is_numeric($maxPremium)) {
    $conds[] = 'premium <= ?';
    $types .= 'd';
    $vals[] = (float)$maxPremium;
}

$sql = 'SELECT id, name, slug, category, insurer, description, premium, sum_assured FROM policies WHERE ' . implode(' AND ', $conds) . ' ORDER BY created_at DESC LIMIT 100';
$stmt = $conn->prepare($sql);
if ($types !== '') {
    $stmt->bind_param($types, ...$vals);
}
$stmt->execute();
$res = $stmt->get_result();
$policies = [];
while ($row = $res->fetch_assoc()) { $policies[] = $row; }
$stmt->close();

// Load recent orders for the user
$orders = [];
$ord = $conn->prepare('SELECT o.id, p.name, p.insurer, o.status, o.created_at FROM policy_orders o JOIN policies p ON p.id = o.policy_id WHERE o.user_id = ? ORDER BY o.created_at DESC LIMIT 20');
$ord->bind_param('i', $userId);
$ord->execute();
$or = $ord->get_result();
while ($r = $or->fetch_assoc()) { $orders[] = $r; }
$ord->close();

$orderSuccess = isset($_GET['order_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - OneClick Insurance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --bg-light: #f9fafb;
        }
        body { font-family: 'Inter', sans-serif; background: var(--bg-light); }
        .navbar { border-bottom: 1px solid var(--border-color); background:#fff; }
        .page-title { font-weight:600; }
        .filter-card { background:#fff;border:1px solid var(--border-color);border-radius:12px;padding:16px; }
        .policy-card { background:#fff;border:1px solid var(--border-color);border-radius:12px;padding:16px;height:100%; }
        .orders-card { background:#fff;border:1px solid var(--border-color);border-radius:12px;padding:16px; }
        .btn-primary { background: var(--primary-color); border: none; }
        .btn-primary:hover { background: var(--primary-hover); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">OneClick Insurance</a>
    <div class="d-flex align-items-center ms-auto">
      <span class="me-3 text-secondary">Hi, <?php echo htmlspecialchars($userName); ?></span>
      <a class="btn btn-outline-secondary me-2" href="/signin">Account</a>
      <a class="btn btn-outline-danger" href="/logout.php">Logout</a>
    </div>
  </div>
</nav>

<div class="container py-4">
    <?php if ($orderSuccess): ?>
    <div class="alert alert-success">Your order has been created. Our team will contact you shortly.</div>
    <?php endif; ?>

    <div class="row g-3">
        <div class="col-12">
            <h2 class="page-title">Buy Insurance Policies</h2>
            <p class="text-secondary">Search, filter and purchase from our curated catalog.</p>
        </div>
        <div class="col-12 col-lg-4">
            <div class="filter-card">
                <form method="GET" action="/dashboard">
                    <div class="mb-3">
                        <label class="form-label">Search</label>
                        <input type="text" class="form-control" name="q" value="<?php echo htmlspecialchars($q); ?>" placeholder="Search by name, insurer...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option value="">All</option>
                            <?php
                              $cats = ['Health','Motor','Travel','Life','Business','Investment','Other'];
                              foreach ($cats as $c) {
                                  $sel = ($category === $c) ? 'selected' : '';
                                  echo "<option value=\"$c\" $sel>$c</option>";
                              }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Premium range (₹)</label>
                        <div class="d-flex gap-2">
                            <input type="number" min="0" step="1" class="form-control" name="min_premium" value="<?php echo htmlspecialchars($minPremium); ?>" placeholder="Min">
                            <input type="number" min="0" step="1" class="form-control" name="max_premium" value="<?php echo htmlspecialchars($maxPremium); ?>" placeholder="Max">
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Apply Filters</button>
                </form>

                <hr class="my-4" />
                <h5>Become a Partner</h5>
                <p class="text-secondary">Work with us to serve customers across India.</p>
                <form method="POST" action="/includes/process-partner.php">
                    <input type="hidden" name="partner_form" value="1">
                    <div class="mb-2">
                        <label class="form-label">Contact Person</label>
                        <input type="text" class="form-control" name="contactPerson" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" pattern="\d{10}" maxlength="10" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="2" placeholder="Tell us about your business"></textarea>
                    </div>
                    <button class="btn btn-outline-primary w-100" type="submit">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            <div class="row g-3">
                <?php if (empty($policies)): ?>
                    <div class="col-12">
                        <div class="policy-card text-center">
                            <p class="mb-0 text-secondary">No policies match your filters.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php foreach ($policies as $p): ?>
                    <div class="col-12 col-md-6">
                        <div class="policy-card">
                            <h5 class="mb-1"><?php echo htmlspecialchars($p['name']); ?></h5>
                            <p class="text-secondary mb-2">By <?php echo htmlspecialchars($p['insurer']); ?> · <?php echo htmlspecialchars($p['category']); ?></p>
                            <p class="mb-2">Premium: <strong>₹<?php echo number_format((float)$p['premium'], 2); ?></strong></p>
                            <p class="mb-3">Sum Assured: <strong>₹<?php echo number_format((float)$p['sum_assured']); ?></strong></p>
                            <p class="text-secondary" style="min-height:48px;"><?php echo htmlspecialchars($p['description']); ?></p>
                            <a class="btn btn-primary w-100" href="/purchase.php?id=<?php echo (int)$p['id']; ?>">Buy</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="orders-card mt-4">
                <h5 class="mb-3">My Recent Orders</h5>
                <?php if (empty($orders)): ?>
                    <p class="text-secondary mb-0">No orders yet. Start by purchasing a policy above.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Policy</th>
                                    <th>Insurer</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $o): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($o['name']); ?></td>
                                        <td><?php echo htmlspecialchars($o['insurer']); ?></td>
                                        <td><span class="badge bg-secondary"><?php echo htmlspecialchars($o['status']); ?></span></td>
                                        <td><?php echo htmlspecialchars(date('d M Y, H:i', strtotime($o['created_at']))); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>