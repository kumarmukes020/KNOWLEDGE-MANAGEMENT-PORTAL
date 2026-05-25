<?php
include('../includes/header.php');

$totalUsers = $conn->query("SELECT COUNT(*) as c FROM users WHERE role='admin'")->fetch_assoc()['c'];
$totalFiles = $conn->query("SELECT COUNT(*) as c FROM files WHERE is_deleted=0")->fetch_assoc()['c'];
$totalFolders = $conn->query("SELECT COUNT(*) as c FROM folders")->fetch_assoc()['c'];
?>

<h3>Super Admin Dashboard</h3>

<div class="row mt-4">

<div class="col-md-4">
<div class="card p-3 card-box">
<h6>Total Admin Users</h6>
<h2><?= $totalUsers ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 card-box">
<h6>Total Files</h6>
<h2><?= $totalFiles ?></h2>
</div>
</div>

<div class="col-md-4">
<div class="card p-3 card-box">
<h6>Total Folders</h6>
<h2><?= $totalFolders ?></h2>
</div>
</div>

</div>

<?php include('../includes/footer.php'); ?>