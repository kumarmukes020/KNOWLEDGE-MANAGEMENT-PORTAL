<?php include('header.php'); ?>

<?php
if(!isset($_GET['id'])){
    die("Invalid Folder");
}

$folder_id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT folder_name FROM folders WHERE id=?");
$stmt->bind_param("i",$folder_id);
$stmt->execute();
$folder = $stmt->get_result()->fetch_assoc();

if(!$folder){
    die("Folder not found");
}
?>

<h5 class="mb-3">
📁 <?= htmlspecialchars($folder['folder_name']) ?>
</h5>

<a href="index.php" class="btn btn-secondary btn-sm mb-3">
← Back to Folders
</a>

<table class="table table-striped">
<tr>
<th>File Name</th>
<th>Uploaded By</th>
<th>Action</th>
</tr>

<?php
$stmt = $conn->prepare("
    SELECT files.*, users.name AS uploader
    FROM files
    LEFT JOIN users ON files.uploaded_by = users.id
    WHERE files.folder_id=? AND files.is_deleted=0
    ORDER BY files.id DESC
");
$stmt->bind_param("i",$folder_id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){

while($file = $result->fetch_assoc()){
?>
<tr>
<td><?= htmlspecialchars($file['file_name']) ?></td>
<td><?= htmlspecialchars($file['uploader']) ?></td>
<td>
<a href="view_file.php?id=<?= $file['id'] ?>" 
   class="btn btn-sm btn-info" target="_blank">View</a>

<a href="../admin/download.php?id=<?= $file['id'] ?>" 
   class="btn btn-sm btn-success">Download</a>
</td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="3" class="text-center text-muted">
No files available
</td>
</tr>
<?php } ?>
</table>

<?php include('footer.php'); ?>