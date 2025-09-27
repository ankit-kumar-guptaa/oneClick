<?php
session_start();
require_once '../includes/config.php';
require_once '../includes/database.php';

// Check if user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Get date range for filtering
$end_date = date('Y-m-d');
$start_date = isset($_GET['period']) ? date('Y-m-d', strtotime("-{$_GET['period']} days")) : date('Y-m-d', strtotime('-30 days'));

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $conn->real_escape_string($_GET['start_date']);
    $end_date = $conn->real_escape_string($_GET['end_date']);
}

// Get visitor statistics
$sql = "SELECT date, SUM(total_visits) as total_visits, SUM(unique_visits) as unique_visits 
        FROM visitor_stats 
        WHERE date BETWEEN '$start_date' AND '$end_date' 
        GROUP BY date 
        ORDER BY date";

$result = $conn->query($sql);
$visitor_data = [];
$dates = [];
$total_visits = [];
$unique_visits = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $visitor_data[] = $row;
        $dates[] = date('d M', strtotime($row['date']));
        $total_visits[] = $row['total_visits'];
        $unique_visits[] = $row['unique_visits'];
    }
}

// Get page statistics
$page_sql = "SELECT page_visited, COUNT(*) as total_visits, COUNT(DISTINCT ip_address) as unique_visits 
             FROM visitors 
             WHERE visit_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59' 
             GROUP BY page_visited 
             ORDER BY total_visits DESC 
             LIMIT 10";

$page_result = $conn->query($page_sql);
$page_data = [];

if ($page_result->num_rows > 0) {
    while ($row = $page_result->fetch_assoc()) {
        $page_data[] = $row;
    }
}

// Get referrer statistics
$referrer_sql = "SELECT referrer_url, COUNT(*) as count 
                FROM visitors 
                WHERE visit_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59' 
                AND referrer_url != '' 
                GROUP BY referrer_url 
                ORDER BY count DESC 
                LIMIT 10";

$referrer_result = $conn->query($referrer_sql);
$referrer_data = [];

if ($referrer_result->num_rows > 0) {
    while ($row = $referrer_result->fetch_assoc()) {
        $referrer_data[] = $row;
    }
}

// Get device statistics
$device_sql = "SELECT 
                CASE 
                    WHEN user_agent LIKE '%Android%' THEN 'Android'
                    WHEN user_agent LIKE '%iPhone%' THEN 'iPhone'
                    WHEN user_agent LIKE '%iPad%' THEN 'iPad'
                    WHEN user_agent LIKE '%Windows%' THEN 'Windows'
                    WHEN user_agent LIKE '%Macintosh%' THEN 'Mac'
                    WHEN user_agent LIKE '%Linux%' THEN 'Linux'
                    ELSE 'Other'
                END as device,
                COUNT(*) as count
                FROM visitors
                WHERE visit_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'
                GROUP BY device
                ORDER BY count DESC";

$device_result = $conn->query($device_sql);
$device_data = [];

if ($device_result->num_rows > 0) {
    while ($row = $device_result->fetch_assoc()) {
        $device_data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Statistics - OneClick Insurance Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Admin CSS -->
    <link href="assets/css/admin-style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Visitor Statistics</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="exportVisitorData()">
                                <i class="fas fa-download"></i> Export
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                                <i class="fas fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Date Range Filter -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Filter by Date Range</h5>
                    </div>
                    <div class="card-body">
                        <form method="get" action="visitors.php" class="row g-3">
                            <div class="col-md-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Apply Filter</button>
                                <a href="visitors.php" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                        
                        <div class="mt-3">
                            <div class="btn-group" role="group">
                                <a href="visitors.php?period=7" class="btn btn-outline-primary <?php echo isset($_GET['period']) && $_GET['period'] == 7 ? 'active' : ''; ?>">Last 7 Days</a>
                                <a href="visitors.php?period=30" class="btn btn-outline-primary <?php echo (!isset($_GET['period']) || $_GET['period'] == 30) ? 'active' : ''; ?>">Last 30 Days</a>
                                <a href="visitors.php?period=90" class="btn btn-outline-primary <?php echo isset($_GET['period']) && $_GET['period'] == 90 ? 'active' : ''; ?>">Last 90 Days</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Visitor Statistics Overview -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Visitor Trend</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="visitorChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Device Distribution</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="deviceChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Top Pages -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Top Pages</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Page URL</th>
                                        <th>Total Visits</th>
                                        <th>Unique Visits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($page_data) > 0): ?>
                                        <?php foreach ($page_data as $page): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($page['page_visited']); ?></td>
                                                <td><?php echo $page['total_visits']; ?></td>
                                                <td><?php echo $page['unique_visits']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No page data available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Top Referrers -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Top Referrers</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Referrer URL</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($referrer_data) > 0): ?>
                                        <?php foreach ($referrer_data as $referrer): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($referrer['referrer_url']); ?></td>
                                                <td><?php echo $referrer['count']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="2" class="text-center">No referrer data available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Raw Visitor Data -->
                <div class="card mb-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daily Visitor Data</h5>
                        <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#rawDataCollapse">
                            <i class="fas fa-table"></i> Show/Hide
                        </button>
                    </div>
                    <div class="collapse" id="rawDataCollapse">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Total Visits</th>
                                            <th>Unique Visits</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($visitor_data) > 0): ?>
                                            <?php foreach ($visitor_data as $data): ?>
                                                <tr>
                                                    <td><?php echo date('Y-m-d', strtotime($data['date'])); ?></td>
                                                    <td><?php echo $data['total_visits']; ?></td>
                                                    <td><?php echo $data['unique_visits']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No visitor data available</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Visitor Chart
        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        const visitorChart = new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [
                    {
                        label: 'Total Visits',
                        data: <?php echo json_encode($total_visits); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.3
                    },
                    {
                        label: 'Unique Visits',
                        data: <?php echo json_encode($unique_visits); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        // Device Chart
        const deviceCtx = document.getElementById('deviceChart').getContext('2d');
        const deviceLabels = <?php echo json_encode(array_column($device_data, 'device')); ?>;
        const deviceCounts = <?php echo json_encode(array_column($device_data, 'count')); ?>;
        
        const deviceChart = new Chart(deviceCtx, {
            type: 'doughnut',
            data: {
                labels: deviceLabels,
                datasets: [{
                    data: deviceCounts,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                        'rgba(199, 199, 199, 0.8)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right'
                    }
                }
            }
        });
        
        // Export visitor data to CSV
        function exportVisitorData() {
            let csv = 'Date,Total Visits,Unique Visits\n';
            
            <?php foreach ($visitor_data as $data): ?>
                csv += '<?php echo $data['date']; ?>,<?php echo $data['total_visits']; ?>,<?php echo $data['unique_visits']; ?>\n';
            <?php endforeach; ?>
            
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            
            link.setAttribute('href', url);
            link.setAttribute('download', 'visitor_statistics.csv');
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>