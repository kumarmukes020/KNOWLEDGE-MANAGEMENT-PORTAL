<?php include('../includes/header.php'); ?>

<?php
if(!isset($_GET['folder_id'])){
    die("Folder not selected");
}

$folder_id = intval($_GET['folder_id']);

// Get folder name
$stmt = $conn->prepare("SELECT folder_name FROM folders WHERE id=?");
$stmt->bind_param("i",$folder_id);
$stmt->execute();
$folder = $stmt->get_result()->fetch_assoc();

if(!$folder){
    die("Invalid Folder");
}
?>

<h4>Files in Folder: <?= htmlspecialchars($folder['folder_name']) ?></h4>

<a href="folder_list.php" class="btn btn-secondary mb-3">← Back to Folders</a>

<table class="table table-striped bg-white">
<tr>
<th>File Name</th>
<th>Uploaded By</th>
<th>Action</th>
</tr>

<?php
$stmt = $conn->prepare("
    SELECT files.*, 
           users.name as uploaded_by_name,
           users.emp_id as uploaded_by_empid
    FROM files
    LEFT JOIN users ON files.uploaded_by = users.id
    WHERE files.folder_id=? AND files.is_deleted=0
    ORDER BY files.id DESC
");
$stmt->bind_param("i",$folder_id);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
?>
<tr>
<td><?= htmlspecialchars($row['file_name']) ?></td>

<td>
    <strong><?= htmlspecialchars($row['uploaded_by_name']) ?></strong><br>
    <small class="text-muted">
        EMP ID: <?= htmlspecialchars($row['uploaded_by_empid']) ?>
    </small>
</td>

<td>
<a href="../admin/view_file.php?id=<?= $row['id'] ?>" 
   class="btn btn-sm btn-info" target="_blank">View</a>

<a href="../admin/download.php?id=<?= $row['id'] ?>" 
   class="btn btn-sm btn-primary">Download</a>

<a href="delete_file.php?id=<?= $row['id'] ?>" 
   class="btn btn-sm btn-danger"
   onclick="return confirm('Delete this file?')">
   Delete
</a>
</td>
</tr>
<?php } ?>
</table>

<?php include('../includes/footer.php'); ?>