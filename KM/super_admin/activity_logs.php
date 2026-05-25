<?php include('../includes/header.php'); ?>

<?php
$limit = 20; // Records per page

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Total records count
$totalResult = $conn->query("SELECT COUNT(*) as total FROM activity_logs");
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];

$totalPages = ceil($totalRecords / $limit);

// Fetch limited records
$stmt = $conn->prepare("
    SELECT a.*, u.name 
    FROM activity_logs a
    JOIN users u ON a.user_id=u.id
    ORDER BY a.created_at DESC
    LIMIT ?, ?
");
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();
?>

<h4>Activity Logs</h4>

<table class="table table-bordered bg-white card-box">
<tr>
    <th>User</th>
    <th>Action</th>
    <th>Description</th>
    <th>Date</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['action']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php } ?>
</table>

<!-- Pagination -->
<nav>
<ul class="pagination">

<?php if($page > 1){ ?>
<li class="page-item">
    <a class="page-link" href="?page=<?= $page-1 ?>">Previous</a>
</li>
<?php } ?>

<?php for($i=1; $i <= $totalPages; $i++){ ?>
<li class="page-item <?= ($i==$page)?'active':'' ?>">
    <a class="page-link" href="?page=<?= $i ?>">
        <?= $i ?>
    </a>
</li>
<?php } ?>

<?php if($page < $totalPages){ ?>
<li class="page-item">
    <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
</li>
<?php } ?>

</ul>
</nav>

<?php include('../includes/footer.php'); ?>