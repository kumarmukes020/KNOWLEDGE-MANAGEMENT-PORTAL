<?php 
include('../includes/header.php');

// Total folders
$totalFolders = $conn->query("SELECT COUNT(*) as total FROM folders")
                     ->fetch_assoc()['total'];

// Total files (not deleted)
$totalFiles = $conn->query("SELECT COUNT(*) as total FROM files WHERE is_deleted=0")
                   ->fetch_assoc()['total'];

// My uploaded files
$stmt = $conn->prepare("SELECT COUNT(*) as total FROM files WHERE uploaded_by=? AND is_deleted=0");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$myFiles = $stmt->get_result()->fetch_assoc()['total'];
?>

<h4>Admin Dashboard</h4>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card p-3 card-box bg-primary text-white">
            <h6>Total Folders</h6>
            <h2><?= $totalFolders ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 card-box bg-success text-white">
            <h6>Total Files</h6>
            <h2><?= $totalFiles ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 card-box bg-info text-white">
            <h6>My Uploaded Files</h6>
            <h2><?= $myFiles ?></h2>
        </div>
    </div>

</div>

<hr class="my-4">

<h5>Quick Actions</h5>

<div class="mb-4">
    <a href="add_folder.php" class="btn btn-primary me-2">+ Add Folder</a>
    <a href="upload_file.php" class="btn btn-success me-2">↑ Upload File</a>
    <a href="folder_list.php" class="btn btn-secondary">📁 View Folders</a>
</div>

<hr class="my-4">

<h5>Recent Files</h5>

<table class="table table-striped bg-white card-box">
<tr>
<th>File Name</th>
<th>Folder</th>
<th>Uploaded By</th>
<th>Employee ID</th>
<th>Date</th>
</tr>

<?php
$stmt = $conn->prepare("
    SELECT files.*, 
           folders.folder_name, 
           users.name as uploader,
           users.emp_id as employee_id
    FROM files
    LEFT JOIN folders ON files.folder_id = folders.id
    LEFT JOIN users ON files.uploaded_by = users.id
    WHERE files.is_deleted=0
    ORDER BY files.id DESC
    LIMIT 5
");
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
?>
<tr>
<td><?= htmlspecialchars($row['file_name']) ?></td>
<td><?= htmlspecialchars($row['folder_name']) ?></td>
<td><?= htmlspecialchars($row['uploader']) ?></td>
<td><?= htmlspecialchars($row['employee_id']) ?></td>
<td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>

<?php include('../includes/footer.php'); ?>