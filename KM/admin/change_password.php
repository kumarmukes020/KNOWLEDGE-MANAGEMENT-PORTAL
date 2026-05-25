<?php include('../includes/header.php');

if(isset($_POST['submit'])){

    $current = $_POST['current_password'];
    $new = $_POST['new_password'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
    $stmt->bind_param("i",$_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if(password_verify($current,$user['password'])){

        $newHash = password_hash($new,PASSWORD_BCRYPT);

        $update = $conn->prepare("UPDATE users SET password=? WHERE id=?");
        $update->bind_param("si",$newHash,$_SESSION['user_id']);
        $update->execute();

        echo "<div class='alert alert-success'>Password Changed</div>";

    } else {
        echo "<div class='alert alert-danger'>Wrong Current Password</div>";
    }
}
?>

<h4>Change Password</h4>
<form method="POST">
<input type="password" name="current_password" class="form-control mb-3" placeholder="Current Password" required>
<input type="password" name="new_password" class="form-control mb-3" placeholder="New Password" required>
<button class="btn btn-warning" name="submit">Update</button>
</form>

<?php include('../includes/footer.php'); ?>