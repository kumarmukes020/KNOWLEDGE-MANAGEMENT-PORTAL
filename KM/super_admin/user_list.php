<?php
include('../includes/header.php');
include('../includes/functions.php');

if($_SESSION['role'] != 'super_admin'){
    die("Access Denied");
}
?>

<h4>Manage Users</h4>

<a href="add_user.php" class="btn btn-primary mb-3">Add User</a>

<table class="table table-bordered bg-white">
<tr>
<th>Employee ID</th>
<th>Name</th>
<th>Email</th>
<th>Project</th>
<th>Role</th>
<th>Action</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM users ORDER BY id DESC");

while($row = $res->fetch_assoc()){
?>
<tr>
<td><?= htmlspecialchars($row['emp_id']) ?></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td><?= htmlspecialchars($row['project']) ?></td>
<td><?= htmlspecialchars($row['role']) ?></td>
<td>
<a href="edit_user.php?id=<?= $row['id'] ?>" 
   class="btn btn-sm btn-warning">Edit</a>

<a href="delete_user.php?id=<?= $row['id'] ?>"
   class="btn btn-sm btn-danger"
   onclick="return confirm('Delete this user?')">
   Delete
</a>
</td>
</tr>
<?php } ?>
</table>

<?php include('../includes/footer.php'); ?>