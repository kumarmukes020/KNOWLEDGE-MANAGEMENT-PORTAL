<?php require '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
        }

        body {
            background:#f4f6f9;
        }

        .logo-img {
            height:60px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- HEADER -->
<div class="container-fluid bg-white shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Left Logo -->
        <div>
            <img src="../assets/nmllogo.jpg"
                 alt="Company Logo"
                 class="logo-img">
        </div>

        <!-- Center Title -->
        <div class="text-center">
            <h4 class="mb-0">Knowledge Management System</h4>
            <small class="text-muted">Read Only Access</small>
        </div>

        <!-- Right Logo -->
        <div>
            <img src="../assets/ntpclogo.png"
                 alt="Company Logo"
                 class="logo-img">
        </div>

    </div>
</div>

<!-- CONTENT WRAPPER -->
<div class="container flex-grow-1 py-4">