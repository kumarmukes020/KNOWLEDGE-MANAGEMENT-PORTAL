<?php
include('../includes/header.php');
include('../includes/functions.php');

if($_SESSION['role'] != 'super_admin'){
    die("Access Denied");
}

if(isset($_POST['submit'])){

    $emp_id = trim($_POST['emp_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $project = trim($_POST['project']);
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users(emp_id,name,email,project,role,password)
                            VALUES(?,?,?,?,?,?)");

    $stmt->bind_param("ssssss",$emp_id,$name,$email,$project,$role,$password);
    $stmt->execute();

    logActivity($conn,$_SESSION['user_id'],
        "Add User","Created user ".$email);

    echo "<div class='alert alert-success'>User Added</div>";
}
?>

<h4>Add User</h4>

<form method="POST">
<input class="form-control mb-2" name="emp_id" placeholder="Employee ID" required>
<input class="form-control mb-2" name="name" placeholder="Name" required>
<input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
<input class="form-control mb-2" name="project"  placeholder="project Name" required>
<select class="form-control mb-2" name="role">
<option value="admin">Admin</option>
<option value="super_admin">Super Admin</option>
</select>

<input class="form-control mb-2" name="password" type="password" placeholder="Password" required>

<button class="btn btn-primary" name="submit">Create</button>
</form>

<?php include('../includes/footer.php'); ?>