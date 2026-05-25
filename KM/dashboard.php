<?php include('../includes/header.php'); 

$project = $_SESSION['project'];

$totalFolders = $conn->query("SELECT COUNT(*) as c FROM folders WHERE project='$project'")->fetch_assoc()['c'];
$totalFiles = $conn->query("SELECT COUNT(*) as c FROM files WHERE project='$project' AND is_deleted=0")->fetch_assoc()['c'];
$totalUsers = $conn->query("SELECT COUNT(*) as c FROM users WHERE project='$project'")->fetch_assoc()['c'];
?>

<h3 class="mb-4">Welcome, <?= $_SESSION['name']; ?></h3>

<div class="row">

    <div class="col-md-4">
        <div class="card card-box p-3 bg-white">
            <h6>Total Folders</h6>
            <h2><?= $totalFolders ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-box p-3 bg-white">
            <h6>Total Files</h6>
            <h2><?= $totalFiles ?></h2>
        </div>
    </div>

    <?php if($_SESSION['role']=='super_admin'){ ?>
    <div class="col-md-4">
        <div class="card card-box p-3 bg-white">
            <h6>Total Users</h6>
            <h2><?= $totalUsers ?></h2>
        </div>
    </div>
    <?php } ?>

</div>

<hr class="my-4">

<h5>Recent Files</h5>

<table class="table table-striped bg-white card-box">
<thead>
<tr>
    <th>File Name</th>
    <th>Uploaded</th>
    <th>Date</th>
</tr>
</thead>
<tbody>
<?php
$res = $conn->query("SELECT * FROM files WHERE project='$project' 
                     AND is_deleted=0 
                     ORDER BY created_at DESC LIMIT 5");

while($row = $res->fetch_assoc()){
?>
<tr>
    <td><?= $row['file_name'] ?></td>
    <td><?= $row['uploaded_by'] ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<?php include('../includes/footer.php'); ?>