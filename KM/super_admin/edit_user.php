<?php
include('../includes/header.php');

$id = $_GET['id'];

$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();

if(isset($_POST['update'])){

    $stmt = $conn->prepare("UPDATE users SET name=?,project=?,role=? WHERE id=?");
    $stmt->bind_param("sssi",
        $_POST['name'],
        $_POST['project'],
        $_POST['role'],
        $id
    );
    $stmt->execute();

    echo "<div class='alert alert-success'>Updated</div>";
}
?>

<form method="POST">
<input class="form-control mb-2" name="name" value="<?= $user['name'] ?>">
<input class="form-control mb-2" name="project" value="<?= $user['project'] ?>">

<select class="form-control mb-2" name="role">
<option value="admin">Admin</option>
<option value="super_admin">Super Admin</option>
</select>

<button name="update" class="btn btn-success">Update</button>
</form>

<?php include('../includes/footer.php'); ?>