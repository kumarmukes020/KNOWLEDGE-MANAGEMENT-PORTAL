<?php
session_start();

if(!isset($_SESSION['reset_emp'])){
    header("Location: forgot_password.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:linear-gradient(135deg,#0d6efd,#0dcaf0);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
width:380px;
padding:30px;
background:#fff;
border-radius:12px;
box-shadow:0 5px 20px rgba(0,0,0,0.2);
}
</style>
</head>

<body>

<div class="box">

<h4 class="text-center mb-4">Create New Password</h4>

<form method="POST" action="update_password.php">

<input type="password" name="password" class="form-control mb-3" placeholder="New Password" required>

<input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" required>

<button class="btn btn-success w-100">Update Password</button>

</form>

</div>

</body>
</html>