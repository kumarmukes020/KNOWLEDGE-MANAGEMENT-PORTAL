<?php include('../includes/header.php'); ?>

<h4>Folders</h4>

<div class="row">

<?php
$folders = $conn->query("
    SELECT folders.*, 
           COUNT(files.id) as total_files
    FROM folders
    LEFT JOIN files 
        ON folders.id = files.folder_id 
        AND files.is_deleted = 0
    GROUP BY folders.id
    ORDER BY folders.folder_name ASC
");

while($row = $folders->fetch_assoc()){
?>

<div class="col-md-3 mb-3">
    <div class="card p-3 shadow-sm text-center">
        <h5>📁 <?= htmlspecialchars($row['folder_name']) ?></h5>
        <p><?= $row['total_files'] ?> Files</p>

        <a href="file_list.php?folder_id=<?= $row['id'] ?>" 
           class="btn btn-primary btn-sm">
           Open Folder
        </a>
    </div>
</div>

<?php } ?>

</div>

<?php include('../includes/footer.php'); ?>