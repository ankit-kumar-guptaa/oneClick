<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once '../includes/database.php';
require_once '../includes/visitor-tracker.php';

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();
$visitorTracker = new VisitorTracker($conn);

// Get visitor statistics
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));
$last7Days = date('Y-m-d', strtotime('-7 days'));
$last30Days = date('Y-m-d', strtotime('-30 days'));

$todayStats = $visitorTracker->getVisitorStats($today, $today);
$yesterdayStats = $visitorTracker->getVisitorStats($yesterday, $yesterday);
$last7DaysStats = $visitorTracker->getVisitorStats($last7Days, $today);
$last30DaysStats = $visitorTracker->getVisitorStats($last30Days, $today);

// Get daily visitor data for chart (last 7 days)
$dailyVisitorData = [];
$dailyUniqueVisitorData = [];
$dailyLabels = [];

for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $dailyLabels[] = date('M d', strtotime($date));
    
    $dailyStats = $visitorTracker->getVisitorStats($date, $date);
    $dailyVisitorData[] = $dailyStats['total_visits'] ?? 0;
    $dailyUniqueVisitorData[] = $dailyStats['unique_visits'] ?? 0;
}

// Get inquiry statistics - mysqli method
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM enquiries");
$stmt->execute();
$stmt->bind_result($totalInquiries);
$stmt->fetch();
$stmt->close();

$stmt = $conn->prepare("SELECT COUNT(*) as new FROM enquiries WHERE DATE(created_at) = CURDATE()");
$stmt->execute();
$stmt->bind_result($newInquiries);
$stmt->fetch();
$stmt->close();

// Get inquiries by insurance type
$stmt = $conn->prepare("SELECT insurance_type, COUNT(*) as count FROM enquiries GROUP BY insurance_type ORDER BY count DESC");
$stmt->execute();
$result = $stmt->get_result();
$inquiriesByType = [];
while ($row = $result->fetch_assoc()) {
    $inquiriesByType[] = $row;
}
$stmt->close();

$insuranceTypes = [];
$inquiryCounts = [];

foreach ($inquiriesByType as $item) {
    $insuranceTypes[] = $item['insurance_type'];
    $inquiryCounts[] = $item['count'];
}

// Get recent inquiries
$stmt = $conn->prepare("SELECT * FROM enquiries ORDER BY created_at DESC LIMIT 5");
$stmt->execute();
$result = $stmt->get_result();
$recentInquiries = [];
while ($row = $result->fetch_assoc()) {
    $recentInquiries[] = $row;
}
$stmt->close();

// Get top pages
$stmt = $conn->prepare("SELECT page_visited, COUNT(*) as visits FROM visitors GROUP BY page_visited ORDER BY visits DESC LIMIT 5");
$stmt->execute();
$result = $stmt->get_result();
$topPages = [];
while ($row = $result->fetch_assoc()) {
    $topPages[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - OneClick Insurance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.5rem 1rem;
            margin: 0.2rem 0;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .card-dashboard {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card-dashboard:hover {
            transform: translateY(-5px);
        }
        .stat-card {
            border-left: 4px solid;
        }
        .stat-card.primary {
            border-left-color: #4e73df;
        }
        .stat-card.success {
            border-left-color: #1cc88a;
        }
        .stat-card.info {
            border-left-color: #36b9cc;
        }
        .stat-card.warning {
            border-left-color: #f6c23e;
        }
        .stat-icon {
            font-size: 2rem;
            opacity: 0.3;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h4>OneClick Insurance</h4>
                        <p>Admin Panel</p>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inquiries.php">
                                <i class="fas fa-clipboard-list"></i> Inquiries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="visitors.php">
                                <i class="fas fa-users"></i> Visitors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                        <li class="nav-item mt-5">
                            <a class="nav-link text-danger" href="logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card primary card-dashboard h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Today's Visitors</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $todayStats['total_visits'] ?? 0; ?></div>
                                        <div class="small text-muted mt-2">Unique: <?php echo $todayStats['unique_visits'] ?? 0; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-day stat-icon text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card success card-dashboard h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last 7 Days Visitors</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $last7DaysStats['total_visits'] ?? 0; ?></div>
                                        <div class="small text-muted mt-2">Unique: <?php echo $last7DaysStats['unique_visits'] ?? 0; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-week stat-icon text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card info card-dashboard h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Inquiries</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalInquiries; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list stat-icon text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card stat-card warning card-dashboard h-100">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Inquiries Today</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $newInquiries; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments stat-icon text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card card-dashboard">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">Visitor Statistics (Last 7 Days)</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="visitorChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card card-dashboard">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">Inquiries by Insurance Type</h6>
                            </div>
                            <div class="card-body">
                                <canvas id="inquiryTypeChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Inquiries and Top Pages -->
                <div class="row">
                    <div class="col-lg-8 mb-4">
                        <div class="card card-dashboard">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">Recent Inquiries</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Insurance Type</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recentInquiries as $inquiry): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($inquiry['full_name']); ?></td>
                                                <td><?php echo htmlspecialchars($inquiry['phone']); ?></td>
                                                <td><?php echo htmlspecialchars($inquiry['insurance_type']); ?></td>
                                                <td><?php echo date('M d, Y', strtotime($inquiry['created_at'])); ?></td>
                                                <td>
                                                    <a href="inquiry-details.php?id=<?php echo $inquiry['id']; ?>" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php if (empty($recentInquiries)): ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No inquiries found</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="inquiries.php" class="btn btn-primary btn-sm">View All Inquiries</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="card card-dashboard">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold">Top Pages</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Page</th>
                                                <th>Visits</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($topPages as $page): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars(basename($page['page_visited'])); ?></td>
                                                <td><?php echo $page['visits']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php if (empty($topPages)): ?>
                                            <tr>
                                                <td colspan="2" class="text-center">No data available</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="visitors.php" class="btn btn-primary btn-sm">View All Statistics</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2023 OneClick Insurance</span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="#">Terms and conditions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="#">Contact</a>
                        </li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Visitor Chart
        var ctx = document.getElementById('visitorChart').getContext('2d');
        var visitorChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dailyLabels); ?>,
                datasets: [
                    {
                        label: 'Total Visits',
                        data: <?php echo json_encode($dailyVisitorData); ?>,
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'Unique Visits',
                        data: <?php echo json_encode($dailyUniqueVisitorData); ?>,
                        backgroundColor: 'rgba(28, 200, 138, 0.05)',
                        borderColor: 'rgba(28, 200, 138, 1)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(28, 200, 138, 1)',
                        pointBorderColor: 'rgba(28, 200, 138, 1)',
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: 'rgba(28, 200, 138, 1)',
                        pointHoverBorderColor: 'rgba(28, 200, 138, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        fill: true
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });

        // Inquiry Type Chart
        var ctxPie = document.getElementById('inquiryTypeChart').getContext('2d');
        var inquiryTypeChart = new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: <?php echo json_encode($insuranceTypes); ?>,
                datasets: [{
                    data: <?php echo json_encode($inquiryCounts); ?>,
                    backgroundColor: [
                        '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#5a5c69'
                    ],
                    hoverBackgroundColor: [
                        '#2e59d9', '#17a673', '#2c9faf', '#dda20a', '#be2617', '#484a52'
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                cutout: '60%'
            }
        });
    </script>
</body>
</html>
