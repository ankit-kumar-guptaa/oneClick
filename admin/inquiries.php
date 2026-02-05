<?php
// Include security functions
require_once '../includes/security.php';

// Set security headers
set_security_headers();

// Configure secure session
secure_session_config();

require_once '../includes/config.php';
require_once '../includes/database.php';

// Check if user is authenticated with session ownership validation
if (!is_authenticated_secure()) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Handle inquiry status update
if (isset($_POST['action']) && $_POST['action'] == 'update_status') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validate_csrf_token($_POST['csrf_token'])) {
        $error_message = 'Security token invalid or expired. Please refresh the page and try again.';
    } else {
        $inquiry_id = $conn->real_escape_string($_POST['inquiry_id']);
        $status = $conn->real_escape_string($_POST['status']);
    
    $updateSql = "UPDATE enquiries SET status = '$status', updated_at = NOW() WHERE id = $inquiry_id";
    $conn->query($updateSql);
    
        // Redirect to prevent form resubmission
        header("Location: inquiries.php?status_updated=1");
        exit();
    }
}

// Handle inquiry deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $inquiry_id = $conn->real_escape_string($_GET['delete']);
    
    $deleteSql = "DELETE FROM enquiries WHERE id = $inquiry_id";
    $conn->query($deleteSql);
    
    // Redirect to prevent form resubmission
    header("Location: inquiries.php?deleted=1");
    exit();
}

// Get filter parameters
$status_filter = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';
$type_filter = isset($_GET['type']) ? $conn->real_escape_string($_GET['type']) : '';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Build query with filters
$sql = "SELECT * FROM enquiries WHERE 1=1";

if ($status_filter) {
    $sql .= " AND status = '$status_filter'";
}

if ($type_filter) {
    $sql .= " AND insurance_type = '$type_filter'";
}

if ($search) {
    $sql .= " AND (full_name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR message LIKE '%$search%')";
}

$sql .= " ORDER BY created_at DESC";

// Execute query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Inquiries - OneClick Insurance Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="assets/css/admin-style.css" rel="stylesheet">
    
    <style>
        .status-new { background-color: #e3f2fd; }
        .status-contacted { background-color: #fff8e1; }
        .status-qualified { background-color: #e8f5e9; }
        .status-converted { background-color: #e8f5e9; }
        .status-closed { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include 'includes/sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Manage Inquiries</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="exportToCSV()">
                                <i class="fas fa-download"></i> Export
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                                <i class="fas fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
                
                <?php if (isset($_GET['status_updated'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Inquiry status updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Inquiry deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Filter Inquiries</h5>
                    </div>
                    <div class="card-body">
                        <form method="get" action="inquiries.php" class="row g-3">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="new" <?php echo $status_filter == 'new' ? 'selected' : ''; ?>>New</option>
                                    <option value="contacted" <?php echo $status_filter == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                    <option value="qualified" <?php echo $status_filter == 'qualified' ? 'selected' : ''; ?>>Qualified</option>
                                    <option value="converted" <?php echo $status_filter == 'converted' ? 'selected' : ''; ?>>Converted</option>
                                    <option value="closed" <?php echo $status_filter == 'closed' ? 'selected' : ''; ?>>Closed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="type" class="form-label">Insurance Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="">All Types</option>
                                    <option value="car" <?php echo $type_filter == 'car' ? 'selected' : ''; ?>>Car Insurance</option>
                                    <option value="bike" <?php echo $type_filter == 'bike' ? 'selected' : ''; ?>>Two Wheeler Insurance</option>
                                    <option value="health" <?php echo $type_filter == 'health' ? 'selected' : ''; ?>>Health Insurance</option>
                                    <option value="term" <?php echo $type_filter == 'term' ? 'selected' : ''; ?>>Term Life Insurance</option>
                                    <option value="travel" <?php echo $type_filter == 'travel' ? 'selected' : ''; ?>>Travel Insurance</option>
                                    <option value="home" <?php echo $type_filter == 'home' ? 'selected' : ''; ?>>Home Insurance</option>
                                    <option value="other" <?php echo $type_filter == 'other' ? 'selected' : ''; ?>>Other Insurance</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Name, Email, Phone..." value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <a href="inquiries.php" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Inquiries Table -->
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Inquiries</h5>
                        <span class="badge bg-primary"><?php echo $result->num_rows; ?> Records</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Insurance Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result->num_rows > 0): ?>
                                        <?php while ($row = $result->fetch_assoc()): ?>
                                            <tr class="status-<?php echo $row['status'] ?? 'new'; ?>">
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                                                <td>
                                                    <strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?><br>
                                                    <strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $insurance_types = [
                                                        'car' => 'Car Insurance',
                                                        'bike' => 'Two Wheeler Insurance',
                                                        'health' => 'Health Insurance',
                                                        'term' => 'Term Life Insurance',
                                                        'travel' => 'Travel Insurance',
                                                        'home' => 'Home Insurance',
                                                        'other' => 'Other Insurance'
                                                    ];
                                                    echo $insurance_types[$row['insurance_type']] ?? $row['insurance_type'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <form method="post" action="inquiries.php" class="status-form">
                                                        <!-- CSRF Token -->
                                                        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                                                        <input type="hidden" name="action" value="update_status">
                                                        <input type="hidden" name="inquiry_id" value="<?php echo $row['id']; ?>">
                                                        <select name="status" class="form-select form-select-sm status-select" onchange="this.form.submit()">
                                                            <option value="new" <?php echo ($row['status'] ?? 'new') == 'new' ? 'selected' : ''; ?>>New</option>
                                                            <option value="contacted" <?php echo ($row['status'] ?? '') == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                                            <option value="qualified" <?php echo ($row['status'] ?? '') == 'qualified' ? 'selected' : ''; ?>>Qualified</option>
                                                            <option value="converted" <?php echo ($row['status'] ?? '') == 'converted' ? 'selected' : ''; ?>>Converted</option>
                                                            <option value="closed" <?php echo ($row['status'] ?? '') == 'closed' ? 'selected' : ''; ?>>Closed</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td><?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info view-inquiry" data-bs-toggle="modal" data-bs-target="#inquiryModal" 
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-name="<?php echo htmlspecialchars($row['full_name']); ?>"
                                                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                                            data-phone="<?php echo htmlspecialchars($row['phone']); ?>"
                                                            data-type="<?php echo htmlspecialchars($row['insurance_type']); ?>"
                                                            data-message="<?php echo htmlspecialchars($row['message']); ?>"
                                                            data-date="<?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <a href="inquiries.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this inquiry?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No inquiries found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Inquiry Detail Modal -->
    <div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inquiryModalLabel">Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> <span id="modal-name"></span></p>
                            <p><strong>Email:</strong> <span id="modal-email"></span></p>
                            <p><strong>Phone:</strong> <span id="modal-phone"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Insurance Type:</strong> <span id="modal-type"></span></p>
                            <p><strong>Date Submitted:</strong> <span id="modal-date"></span></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h6>Message:</h6>
                            <div class="p-3 bg-light rounded" id="modal-message"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // View inquiry details in modal
        document.querySelectorAll('.view-inquiry').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('modal-name').textContent = this.getAttribute('data-name');
                document.getElementById('modal-email').textContent = this.getAttribute('data-email');
                document.getElementById('modal-phone').textContent = this.getAttribute('data-phone');
                document.getElementById('modal-type').textContent = this.getAttribute('data-type');
                document.getElementById('modal-date').textContent = this.getAttribute('data-date');
                document.getElementById('modal-message').textContent = this.getAttribute('data-message');
            });
        });
        
        // Export to CSV function
        function exportToCSV() {
            let csv = 'ID,Name,Email,Phone,Insurance Type,Status,Date\n';
            const rows = document.querySelectorAll('table tbody tr');
            
            rows.forEach(row => {
                const columns = row.querySelectorAll('td');
                if (columns.length > 1) { // Skip "No inquiries found" row
                    const id = columns[0].textContent;
                    const name = columns[1].textContent;
                    const email = columns[2].textContent.split('Email:')[1].split('Phone:')[0].trim();
                    const phone = columns[2].textContent.split('Phone:')[1].trim();
                    const type = columns[3].textContent.trim();
                    const status = columns[4].querySelector('select').value;
                    const date = columns[5].textContent;
                    
                    csv += `"${id}","${name}","${email}","${phone}","${type}","${status}","${date}"\n`;
                }
            });
            
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            
            link.setAttribute('href', url);
            link.setAttribute('download', 'inquiries_export.csv');
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>