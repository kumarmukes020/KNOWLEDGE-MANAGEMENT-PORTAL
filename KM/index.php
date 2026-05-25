<?php
require 'config/db.php';
include('header.php');

/* =============================
   HANDLE FILE RATING
=============================*/
if(isset($_POST['rate_file'])){

    $file_id = intval($_POST['file_id']);
    $rating  = intval($_POST['rating']);
    $ip      = $_SERVER['REMOTE_ADDR'];

    if($rating >= 1 && $rating <= 5){

        $stmt = $conn->prepare("
            INSERT INTO file_ratings(file_id,rating,ip_address)
            VALUES(?,?,?)
            ON DUPLICATE KEY UPDATE rating=VALUES(rating)
        ");
        $stmt->bind_param("iis",$file_id,$rating,$ip);
        $stmt->execute();
    }
}

/* =============================
   DASHBOARD COUNTS
=============================*/

?>

<!-- DASHBOARD CARDS -->



<?php

/* =============================
   IF FOLDER SELECTED
=============================*/

if(isset($_GET['folder_id'])){

$folder_id = intval($_GET['folder_id']);

$update = $conn->prepare("UPDATE folders SET hits = hits + 1 WHERE id=?");
$update->bind_param("i",$folder_id);
$update->execute();

$stmt = $conn->prepare("SELECT folder_name,hits FROM folders WHERE id=?");
$stmt->bind_param("i",$folder_id);
$stmt->execute();

$folder = $stmt->get_result()->fetch_assoc();
?>

<h4 class="mb-3 text-primary">
📁 <?= htmlspecialchars($folder['folder_name']) ?>
<small class="text-muted">(Hits : <?= $folder['hits'] ?>)</small>
</h4>

<a href="index.php" class="btn btn-secondary btn-sm mb-3">
← Back
</a>

<!-- FILE SEARCH -->

<div class="row mb-3">
<div class="col-md-4">
<input type="text" id="fileSearch"
class="form-control"
placeholder="Search files...">
</div>
</div>

<table class="table table-hover table-bordered bg-white shadow-sm">

<thead class="table-primary">
<tr>
<th>File Name</th>
<th>Uploaded By</th>
<th>Date</th>
<th>Rating</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php

$stmt = $conn->prepare("
SELECT files.*,users.name AS uploader,users.emp_id
FROM files
LEFT JOIN users ON files.uploaded_by = users.id
WHERE files.folder_id=? AND files.is_deleted=0
ORDER BY files.id DESC
");

$stmt->bind_param("i",$folder_id);
$stmt->execute();
$result = $stmt->get_result();

while($file = $result->fetch_assoc()){

$ratingStmt = $conn->prepare("
SELECT AVG(rating) as avg_rating,
COUNT(*) as total_votes
FROM file_ratings
WHERE file_id=?
");

$ratingStmt->bind_param("i",$file['id']);
$ratingStmt->execute();

$ratingData = $ratingStmt->get_result()->fetch_assoc();

$avgRating  = round($ratingData['avg_rating'],1);
$totalVotes = $ratingData['total_votes'];

?>

<tr>

<td><?= htmlspecialchars($file['file_name']) ?></td>

<td>
<small class="text-muted">
EMP ID : <?= $file['emp_id'] ?>
</small><br>
<?= htmlspecialchars($file['uploader']) ?>
</td>

<td><?= date("d M Y",strtotime($file['created_at'])) ?></td>

<td>

<small class="text-muted d-block mb-2">
<?= $avgRating ? $avgRating : 0 ?>/5 (<?= $totalVotes ?> votes)
</small>

<form method="POST" class="rating-form position-relative">

<input type="hidden" name="file_id" value="<?= $file['id'] ?>">
<input type="hidden" name="rate_file" value="1">

<div class="star-rating">

<?php for($i=5;$i>=1;$i--){ ?>

<input type="radio"
id="star<?= $file['id'].$i ?>"
name="rating"
value="<?= $i ?>"
onchange="showEmoji(this.value,this)">

<label for="star<?= $file['id'].$i ?>">★</label>

<?php } ?>

</div>

<div class="emoji-bubble">😊</div>

</form>

</td>

<td>

<a href="view_file.php?id=<?= $file['id'] ?>"
class="btn btn-sm btn-info"
target="_blank">View</a>

<a href="download.php?id=<?= $file['id'] ?>"
class="btn btn-sm btn-success">Download</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<?php } else { ?>

<h4 class="text-center mb-4 text-primary">
KNOWLEDGE GROUPS
</h4>

<div class="row">

<?php

$folders = $conn->query("SELECT id,folder_name,hits FROM folders ORDER BY folder_name ASC");

while($folder = $folders->fetch_assoc()){

?>

<div class="col-md-3 mb-4">

<div class="card folder-card text-center h-100">

<div class="card-body">

<div class="folder-icon">📁</div>

<h6 class="fw-bold mt-2">
<?= htmlspecialchars($folder['folder_name']) ?>
</h6>

<small class="text-muted">
<?= $folder['hits'] ?> views
</small>

<br>

<a href="index.php?folder_id=<?= $folder['id'] ?>"
class="btn btn-primary btn-sm mt-3">
Open Folder
</a>

</div>

</div>

</div>

<?php } ?>

</div>

<?php } ?>

<?php include('footer.php'); ?>