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

// Check if inquiry ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: inquiries.php?error=invalid_id");
    exit();
}

$inquiry_id = $conn->real_escape_string($_GET['id']);

// Get inquiry details
$sql = "SELECT * FROM enquiries WHERE id = $inquiry_id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    header("Location: inquiries.php?error=not_found");
    exit();
}

$inquiry = $result->fetch_assoc();

// Handle status update
if (isset($_POST['update_status'])) {
    $status = $conn->real_escape_string($_POST['status']);
    $updateSql = "UPDATE enquiries SET status = '$status', updated_at = NOW() WHERE id = $inquiry_id";
    
    if ($conn->query($updateSql)) {
        $statusUpdated = true;
        // Refresh inquiry data
        $result = $conn->query($sql);
        $inquiry = $result->fetch_assoc();
    } else {
        $updateError = true;
    }
}

// Handle adding notes
if (isset($_POST['add_note'])) {
    $note = $conn->real_escape_string($_POST['note']);
    $addNoteSql = "INSERT INTO enquiry_notes (enquiry_id, note, created_at) VALUES ($inquiry_id, '$note', NOW())";
    
    if ($conn->query($addNoteSql)) {
        $noteAdded = true;
    } else {
        $noteError = true;
    }
}

// Get inquiry notes
$notesSql = "SELECT * FROM enquiry_notes WHERE enquiry_id = $inquiry_id ORDER BY created_at DESC";
$notesResult = $conn->query($notesSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Details - OneClick Insurance Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="assets/css/admin-style.css" rel="stylesheet">
    
    <style>
        .inquiry-details-card {
            border-left: 4px solid #4e73df;
        }
        
        .note-card {
            border-left: 3px solid #1cc88a;
            margin-bottom: 15px;
        }
        
        .note-timestamp {
            font-size: 0.8rem;
            color: #858796;
        }
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
                    <h1 class="h2">Inquiry Details</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="inquiries.php" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Inquiries
                        </a>
                    </div>
                </div>
                
                <?php if (isset($statusUpdated) && $statusUpdated): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Status updated successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (isset($updateError) && $updateError): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error updating status. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (isset($noteAdded) && $noteAdded): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Note added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (isset($noteError) && $noteError): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error adding note. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <div class="row">
                    <!-- Inquiry Details -->
                    <div class="col-lg-8">
                        <div class="card shadow mb-4 inquiry-details-card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Customer Information</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateStatusModal">
                                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Update Status
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteInquiryModal">
                                            <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Delete Inquiry
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold"><?php echo htmlspecialchars($inquiry['full_name']); ?></h5>
                                        <p class="mb-0">
                                            <i class="fas fa-envelope text-gray-400 mr-1"></i> 
                                            <a href="mailto:<?php echo htmlspecialchars($inquiry['email']); ?>"><?php echo htmlspecialchars($inquiry['email']); ?></a>
                                        </p>
                                        <p class="mb-0">
                                            <i class="fas fa-phone text-gray-400 mr-1"></i>
                                            <a href="tel:<?php echo htmlspecialchars($inquiry['phone']); ?>"><?php echo htmlspecialchars($inquiry['phone']); ?></a>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-md-end">
                                        <span class="badge bg-primary"><?php echo htmlspecialchars($inquiry['insurance_type']); ?> Insurance</span>
                                        <?php
                                        $statusClass = 'bg-secondary';
                                        switch($inquiry['status']) {
                                            case 'new': $statusClass = 'bg-info'; break;
                                            case 'contacted': $statusClass = 'bg-warning'; break;
                                            case 'qualified': $statusClass = 'bg-primary'; break;
                                            case 'converted': $statusClass = 'bg-success'; break;
                                            case 'closed': $statusClass = 'bg-secondary'; break;
                                        }
                                        ?>
                                        <span class="badge <?php echo $statusClass; ?>"><?php echo ucfirst(htmlspecialchars($inquiry['status'])); ?></span>
                                        <p class="mt-2 text-muted small">
                                            Created: <?php echo date('M d, Y h:i A', strtotime($inquiry['created_at'])); ?>
                                        </p>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="font-weight-bold">Message</h6>
                                        <p><?php echo nl2br(htmlspecialchars($inquiry['message'])); ?></p>
                                    </div>
                                </div>
                                
                                <?php if (!empty($inquiry['additional_info'])): ?>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h6 class="font-weight-bold">Additional Information</h6>
                                        <p><?php echo nl2br(htmlspecialchars($inquiry['additional_info'])); ?></p>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notes Section -->
                    <div class="col-lg-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Notes</h6>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" class="mb-4">
                                    <div class="mb-3">
                                        <textarea class="form-control" name="note" rows="3" placeholder="Add a note..." required></textarea>
                                    </div>
                                    <button type="submit" name="add_note" class="btn btn-primary btn-sm">Add Note</button>
                                </form>
                                
                                <hr>
                                
                                <div class="notes-container">
                                    <?php if ($notesResult && $notesResult->num_rows > 0): ?>
                                        <?php while ($note = $notesResult->fetch_assoc()): ?>
                                            <div class="card note-card">
                                                <div class="card-body py-2 px-3">
                                                    <p class="mb-1"><?php echo nl2br(htmlspecialchars($note['note'])); ?></p>
                                                    <p class="note-timestamp mb-0">
                                                        <?php echo date('M d, Y h:i A', strtotime($note['created_at'])); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <p class="text-muted text-center">No notes yet.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Update Status Modal -->
    <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStatusModalLabel">Update Inquiry Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="new" <?php echo ($inquiry['status'] == 'new') ? 'selected' : ''; ?>>New</option>
                                <option value="contacted" <?php echo ($inquiry['status'] == 'contacted') ? 'selected' : ''; ?>>Contacted</option>
                                <option value="qualified" <?php echo ($inquiry['status'] == 'qualified') ? 'selected' : ''; ?>>Qualified</option>
                                <option value="converted" <?php echo ($inquiry['status'] == 'converted') ? 'selected' : ''; ?>>Converted</option>
                                <option value="closed" <?php echo ($inquiry['status'] == 'closed') ? 'selected' : ''; ?>>Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Inquiry Modal -->
    <div class="modal fade" id="deleteInquiryModal" tabindex="-1" aria-labelledby="deleteInquiryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteInquiryModalLabel">Delete Inquiry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this inquiry? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="inquiries.php?delete=<?php echo $inquiry_id; ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>