<?php
session_start();

require 'config/db.php';

if(!isset($_SESSION['reset_emp'])){
    header("Location: forgot_password.php");
    exit;
}

$password = trim($_POST['password']);
$confirm  = trim($_POST['confirm_password']);

if($password != $confirm){
    die("Passwords do not match");
}

$emp_id = $_SESSION['reset_emp'];

$hash = password_hash($password,PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE users SET password=? WHERE emp_id=?");
$stmt->bind_param("ss",$hash,$emp_id);
$stmt->execute();

session_destroy();

echo "<script>
alert('Password updated successfully');
window.location='login.php';
</script>";
?>