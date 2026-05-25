<?php
include('../includes/auth.php');
include('../config/db.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>KMS Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color:#f4f6f9; }
        .sidebar {
            height:100vh;
            background:#1f2937;
            color:#fff;
        }
        .sidebar a {
            color:#cbd5e1;
            text-decoration:none;
            display:block;
            padding:10px;
            border-radius:6px;
        }
        .sidebar a:hover {
            background:#374151;
            color:#fff;
        }
        .card-box {
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>

<div class="container-fluid">
<div class="row">

<!-- Sidebar -->
<div class="col-md-2 sidebar p-3">
    <!-- Company Logo -->
<div class="mb-3 text-center">
    <img src="../assets/nmllogo.jpg" 
         alt="Company Logo" 
         class="img-fluid"
         style="max-height:60px;">
</div>

<hr class="text-light">

<!-- User Info -->
<div class="mb-4 text-center">
    <i class="bi bi-person-circle fs-3 text-light"></i>
    <div class="fw-bold mt-2">
        <?= htmlspecialchars($_SESSION['name']) ?>
    </div>
    <small class="text-light">
        ID: <?= htmlspecialchars($_SESSION['emp_id']) ?>
    </small>
</div>

    <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="add_folder.php"><i class="bi bi-folder-plus"></i> Add Folder</a>
    <a href="upload_file.php"><i class="bi bi-upload"></i> Upload File</a>
    <a href="folder_list.php"><i class="bi bi-files"></i> File List</a>

    <?php if($_SESSION['role']=='super_admin'){ ?>
        <a href="../super_admin/user_list.php"><i class="bi bi-people"></i> Manage Users</a>
        <a href="../super_admin/activity_logs.php"><i class="bi bi-clock-history"></i> Activity Logs</a>
    <?php } ?>

    <a href="change_password.php"><i class="bi bi-key"></i> Change Password</a>
    <a href="../logout.php" class="text-danger"><i class="bi bi-box-arrow-right"></i> Logout</a>
</div>

<!-- Main Content -->
<div class="col-md-10 p-4">