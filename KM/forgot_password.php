<?php
ini_set('session.cookie_httponly',1);
ini_set('session.use_only_cookies',1);
session_start();

require 'config/db.php';

if(isset($_POST['verify'])){

    $emp_id = trim($_POST['emp_id']);
    $email  = trim($_POST['email']);

    if(empty($emp_id) || empty($email)){
        $error = "All fields are required.";
    } else {

        $stmt = $conn->prepare("SELECT id FROM users WHERE emp_id=? AND email=? LIMIT 1");
        $stmt->bind_param("ss",$emp_id,$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){

            $_SESSION['reset_emp'] = $emp_id;

            header("Location: new_password.php");
            exit;

        } else {
            $error = "Employee ID and Email do not match.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>
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

<h4 class="text-center mb-4">Forgot Password</h4>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">

<input type="text" name="emp_id" class="form-control mb-3" placeholder="Employee ID" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Registered Email" required>

<button class="btn btn-primary w-100 mb-2" name="verify">Verify</button>

</form>

<a href="login.php" class="btn btn-outline-secondary w-100">
← Back to Login
</a>

</div>

</body>
</html>