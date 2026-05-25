<?php include('header.php'); ?>

<h5 class="mb-4">Available Folders</h5>

<div class="row">

<?php
$folders = $conn->query("SELECT * FROM folders ORDER BY folder_name ASC");

while($folder = $folders->fetch_assoc()){
?>

<div class="col-md-3 mb-4">
    <div class="card text-center shadow-sm">
        <div class="card-body">
            <h6>📁 <?= htmlspecialchars($folder['folder_name']) ?></h6>

            <a href="folder.php?id=<?= $folder['id'] ?>" 
               class="btn btn-primary btn-sm mt-2">
               Open Folder
            </a>
        </div>
    </div>
</div>

<?php } ?>

</div>

<?php include('footer.php'); ?>