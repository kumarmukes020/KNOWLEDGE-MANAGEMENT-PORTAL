<?php
ini_set('session.cookie_httponly',1);
ini_set('session.use_only_cookies',1);
session_start();

require 'config/db.php';

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password)){
        $error = "All fields are required.";
    } else {

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){

            $user = $result->fetch_assoc();

            if(password_verify($password,$user['password'])){

                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['emp_id']  = $user['emp_id'];
                $_SESSION['name']    = $user['name'];
                $_SESSION['role']    = $user['role'];

                // Log login activity
                $log = $conn->prepare("INSERT INTO activity_logs(user_id,action,description)
                                       VALUES(?,?,?)");
                $action = "Login";
                $desc   = "User logged in";
                $log->bind_param("iss",$user['id'],$action,$desc);
                $log->execute();

                if($user['role'] == 'super_admin'){
                    header("Location: super_admin/dashboard.php");
                } else {
                    header("Location: admin/dashboard.php");
                }
                exit;

            } else {
                $error = "Invalid Password.";
            }

        } else {
            $error = "Invalid Email.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KMP Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg,#0d6efd,#0dcaf0); /* BLUE GRADIENT */
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .login-box {
            width:380px;
            padding:30px;
            background:#fff;
            border-radius:12px;
            box-shadow:0 5px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h4 class="text-center mb-4">KMP Login</h4>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST">
        <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        
    <div class="text-end mb-3">
        <a href="forgot_password.php" style="font-size:14px;">Forgot Password?</a>
    </div>
        <button class="btn btn-primary w-100 mb-2" name="login">Login</button>
    </form>

    <!-- Back Button -->
    <a href="index.php" class="btn btn-outline-secondary w-100">
        ← Back to Home Page
    </a>

</div>

</body>
</html>