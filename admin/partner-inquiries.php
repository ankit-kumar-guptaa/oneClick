<?php
// Include security functions
require_once '../includes/security.php';
require_once '../includes/config.php';
require_once '../includes/database.php';

// Set security headers
set_security_headers();

// Configure secure session
secure_session_config();

// Check if user is authenticated
if (!is_authenticated()) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
$db = new Database();
$conn = $db->getConnection();

// Handle partner inquiry status update
if (isset($_POST['action']) && $_POST['action'] == 'update_status') {
    $inquiry_id = $conn->real_escape_string($_POST['inquiry_id']);
    $status = $conn->real_escape_string($_POST['status']);
    
    $updateSql = "UPDATE partner_enquiries SET status = '$status', updated_at = NOW() WHERE id = $inquiry_id";
    $conn->query($updateSql);
    
    // Redirect to prevent form resubmission
    header("Location: partner-inquiries.php?status_updated=1");
    exit();
}

// Handle partner inquiry deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $inquiry_id = $conn->real_escape_string($_GET['delete']);
    
    $deleteSql = "DELETE FROM partner_enquiries WHERE id = $inquiry_id";
    $conn->query($deleteSql);
    
    // Redirect to prevent form resubmission
    header("Location: partner-inquiries.php?deleted=1");
    exit();
}

// Get filter parameters
$status_filter = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Build query with filters
$sql = "SELECT * FROM partner_enquiries WHERE 1=1";

if ($status_filter) {
    $sql .= " AND status = '$status_filter'";
}

if ($search) {
    $sql .= " AND (contact_person LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR message LIKE '%$search%')";
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
    <title>Manage Partner Inquiries - OneClick Insurance Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="assets/css/admin-style.css" rel="stylesheet">
    
    <style>
        .status-new { background-color: #e3f2fd; }
        .status-contacted { background-color: #fff8e1; }
        .status-accepted { background-color: #e8f5e9; }
        .status-rejected { background-color: #ffebee; }
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
                    <h1 class="h2">Manage Partner Inquiries</h1>
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
                    Partner inquiry status updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (isset($_GET['deleted'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Partner inquiry deleted successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Filter Partner Inquiries</h5>
                    </div>
                    <div class="card-body">
                        <form method="get" action="partner-inquiries.php" class="row g-3">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="new" <?php echo $status_filter == 'new' ? 'selected' : ''; ?>>New</option>
                                    <option value="contacted" <?php echo $status_filter == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                    <option value="accepted" <?php echo $status_filter == 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                                    <option value="rejected" <?php echo $status_filter == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Contact Person, Email, Phone..." value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                <a href="partner-inquiries.php" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Partner Inquiries Table -->
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">All Partner Inquiries</h5>
                        <span class="badge bg-primary"><?php echo $result->num_rows; ?> Records</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Contact Person</th>
                                        <th>Contact Details</th>
                                        <th>Message Preview</th>
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
                                                <td><?php echo htmlspecialchars($row['contact_person']); ?></td>
                                                <td>
                                                    <strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?><br>
                                                    <strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $message = $row['message'] ?? '';
                                                    echo htmlspecialchars(substr($message, 0, 50) . (strlen($message) > 50 ? '...' : ''));
                                                    ?>
                                                </td>
                                                <td>
                                                    <form method="post" action="partner-inquiries.php" class="status-form">
                                                        <input type="hidden" name="action" value="update_status">
                                                        <input type="hidden" name="inquiry_id" value="<?php echo $row['id']; ?>">
                                                        <select name="status" class="form-select form-select-sm status-select" onchange="this.form.submit()">
                                                            <option value="new" <?php echo ($row['status'] ?? 'new') == 'new' ? 'selected' : ''; ?>>New</option>
                                                            <option value="contacted" <?php echo ($row['status'] ?? '') == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                                            <option value="accepted" <?php echo ($row['status'] ?? '') == 'accepted' ? 'selected' : ''; ?>>Accepted</option>
                                                            <option value="rejected" <?php echo ($row['status'] ?? '') == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td><?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info view-partner" data-bs-toggle="modal" data-bs-target="#partnerModal" 
                                                            data-id="<?php echo $row['id']; ?>"
                                                            data-contact="<?php echo htmlspecialchars($row['contact_person']); ?>"
                                                            data-email="<?php echo htmlspecialchars($row['email']); ?>"
                                                            data-phone="<?php echo htmlspecialchars($row['phone']); ?>"
                                                            data-message="<?php echo htmlspecialchars($row['message'] ?? ''); ?>"
                                                            data-date="<?php echo date('d M Y, h:i A', strtotime($row['created_at'])); ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <a href="partner-inquiries.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this partner inquiry?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No partner inquiries found</td>
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
    
    <!-- Partner Inquiry Detail Modal -->
    <div class="modal fade" id="partnerModal" tabindex="-1" aria-labelledby="partnerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="partnerModalLabel">Partner Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Contact Person:</strong> <span id="modal-contact"></span></p>
                            <p><strong>Email:</strong> <span id="modal-email"></span></p>
                            <p><strong>Phone:</strong> <span id="modal-phone"></span></p>
                        </div>
                        <div class="col-md-6">
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
        // View partner inquiry details in modal
        document.querySelectorAll('.view-partner').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('modal-contact').textContent = this.getAttribute('data-contact');
                document.getElementById('modal-email').textContent = this.getAttribute('data-email');
                document.getElementById('modal-phone').textContent = this.getAttribute('data-phone');
                document.getElementById('modal-date').textContent = this.getAttribute('data-date');
                document.getElementById('modal-message').textContent = this.getAttribute('data-message');
            });
        });
        
        // Export to CSV function
        function exportToCSV() {
            let csv = 'ID,Contact Person,Email,Phone,Message,Status,Date\n';
            const rows = document.querySelectorAll('table tbody tr');
            
            rows.forEach(row => {
                const columns = row.querySelectorAll('td');
                if (columns.length > 1) { // Skip "No partner inquiries found" row
                    const id = columns[0].textContent;
                    const contact = columns[1].textContent;
                    const email = columns[2].textContent.split('Email:')[1].split('Phone:')[0].trim();
                    const phone = columns[2].textContent.split('Phone:')[1].trim();
                    const message = columns[3].textContent.trim();
                    const status = columns[4].querySelector('select').value;
                    const date = columns[5].textContent;
                    
                    csv += `"${id}","${contact}","${email}","${phone}","${message}","${status}","${date}"\n`;
                }
            });
            
            const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            const url = URL.createObjectURL(blob);
            
            link.setAttribute('href', url);
            link.setAttribute('download', 'partner_inquiries_export.csv');
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>
</html>