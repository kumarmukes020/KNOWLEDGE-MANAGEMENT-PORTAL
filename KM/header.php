<?php require 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>KNOWLEDGE MANAGEMENT PORTAL</title>
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

        .star {
    font-size:30px;
    color:#ccc;
}

.star.filled {
    color:gold;
}

.star-rating {
    direction: rtl;
    display: inline-flex;
}

.star-rating input {
    display: none;
}

.star-rating label {
    font-size: 22px;
    color: #ccc;
    cursor: pointer;
    transition: 0.3s;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: gold;
    transform: scale(1.2);
}

.star-rating input:checked ~ label {
    color: gold;
}

.header-blue {
    background: linear-gradient(90deg, #0d6efd, #0b5ed7);
    color: white;
}

.header-blue h4,
.header-blue small {
    color: white;
}

.header-blue .btn-outline-primary {
    border-color: white;
    color: white;
}

.header-blue .btn-outline-primary:hover {
    background: white;
    color: #0d6efd;
}
.footer-blue {
    background: linear-gradient(90deg, #0d6efd, #0b5ed7);
    color: white;
}

.footer-blue small {
    color: white;
}
.star {
    font-size:20px;
    color:#ccc;
}

.star.filled {
    color:gold;
}

.star-rating {
    direction: rtl;
    display: inline-flex;
}

.star-rating input {
    display: none;
}

.star-rating label {
    font-size: 24px;
    color: #ccc;
    cursor: pointer;
    transition: 0.3s;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: gold;
    transform: scale(1.2);
}

.star-rating input:checked ~ label {
    color: gold;
}

.emoji-bubble {
    position: absolute;
    top: -40px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 26px;
    opacity: 0;
    transition: 0.5s ease;
}

.emoji-show {
    opacity: 1;
    transform: translateX(-50%) translateY(-10px);
}

.stat-card{
border:none;
border-radius:12px;
box-shadow:0 5px 20px rgba(0,0,0,0.1);
transition:0.3s;
}

.stat-card:hover{
transform:translateY(-5px);
}

.folder-card{
border:none;
border-radius:10px;
transition:0.3s;
box-shadow:0 3px 10px rgba(0,0,0,0.08);
padding:8px;
}
.folder-card:hover{
transform:translateY(-6px);
box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

.folder-icon{
font-size:35px;
}

.star-rating{
direction:rtl;
display:inline-flex;
}

.star-rating input{
display:none;
}

.star-rating label{
font-size:24px;
color:#ccc;
cursor:pointer;
transition:0.3s;
}

.star-rating label:hover,
.star-rating label:hover ~ label{
color:#ffc107;
transform:scale(1.2);
}

.star-rating input:checked ~ label{
color:#ffc107;
}

.emoji-bubble{
position:absolute;
top:-40px;
left:50%;
transform:translateX(-50%);
font-size:26px;
opacity:0;
transition:0.5s;
}

.emoji-show{
opacity:1;
transform:translateX(-50%) translateY(-10px);
}
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- HEADER -->
<div class="container-fluid header-blue shadow-sm py-3">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Left Logo -->
        <div>
            <img src="assets/nmllogo.jpg"
                 alt="Company Logo"
                 class="logo-img">
        </div>

        <!-- Center Title -->
        <div class="text-center">
            <h4 class="mb-0">KNOWLEDGE MANAGEMENT PORTAL</h4>
            <small>COAL MINING HEADQUARTERS</small>
        </div>

        <!-- Right Side (Login + Logo) -->
        <div class="d-flex align-items-center gap-3">
			 <a href="KM Portal Coordinators.pdf" rel="noopener noreferrer">Coordinators</a>
            <!-- Login Button -->
            <a href="login.php" class="btn btn-outline-primary btn-sm">
                Login
            </a>

            <!-- Right Logo -->
            <img src="assets/ntpclogo.png"
                 alt="Company Logo"
                 class="logo-img">

        </div>

    </div>
</div>

<!-- CONTENT WRAPPER -->
<div class="container flex-grow-1 py-4">