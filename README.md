# KNOWLEDGE-MANAGEMENT-PORTAL
KNOWLEDGE MANAGEMENT PORTAL (KMP)

A secure and user-friendly Knowledge Management Portal / Document Management System (DMS) developed using Core PHP, MySQL, Bootstrap 5, HTML, CSS, and JavaScript.

This portal helps organizations manage, share, rate, and track documents efficiently with role-based access control.

🚀 Features
🔐 Authentication System
Secure Login
Password Hashing (password_hash)
Session Management
Forgot Password / Reset Password
👥 User Roles
👑 Super Admin
Manage Users
Create Folders
Upload Files
Replace Files
Delete Files
Activity Logs
Secure Downloads
Change Password
🧑‍💼 Admin
Create Folders
Upload Files
View Files
Download Files
Delete Own Files
Change Password
🌐 Public User
View Public Folders
Open Folder
View Files
Download Files
Give File Ratings
See Folder Hits
📂 Folder Management
Create Folder
Folder-wise File Listing
Folder Hits Counter
Public Folder Access
📄 File Management
Upload Any File Type
View File
Download File
Secure File Access
Soft Delete System
File Replace System
⭐ File Rating System

Modern interactive file rating system:

1–5 Star Rating
Auto Submit on Star Click
Emoji Bubble Feedback
Average Rating Display
Vote Count
One Vote Per IP
📊 Activity Logs

Tracks:

User Login
File Upload
Folder Creation
File Delete
Other Activities
🔐 Security Features
Prepared Statements
Password Hashing
Session Security
XSS Protection
Secure File Validation
Soft Delete Protection
🎨 UI Features
Responsive Bootstrap UI
Corporate Blue Theme
Sticky Footer
Attractive Star Rating
Animated Emoji Feedback
Professional Dashboard
🛠 Technologies Used
Technology	Purpose
PHP	Backend
MySQL	Database
Bootstrap 5	UI Design
HTML/CSS	Frontend
JavaScript	Interactive Features
XAMPP	Local Server
📁 Project Structure
KM/
│
├── admin/
├── super_admin/
├── uploads/
├── assets/
├── config/
├── includes/
│
├── index.php
├── login.php
├── forgot_password.php
├── reset_password.php
├── view_file.php
├── download.php
└── logout.php
⚙️ Installation Steps
1️⃣ Clone or Download Project
https://github.com/kumarmukes020/KNOWLEDGE-MANAGEMENT-PORTAL)

OR copy project into:

htdocs/KM/
2️⃣ Create Database

Open phpMyAdmin and create database:

CREATE DATABASE km_portal;
3️⃣ Import Database

Import your .sql file into phpMyAdmin.

4️⃣ Configure Database

Edit:

config/db.php

Example:

<?php
$conn = new mysqli("localhost","root","","km_portal");

if($conn->connect_error){
    die("Connection Failed");
}
?>
5️⃣ Start Server

Start:

Apache
MySQL

Using XAMPP.

6️⃣ Open Project
http://localhost/KM/
🔑 Default Login
Super Admin
Email: admin@example.com
Password: 123456

Change credentials after first login.

📸 Main Modules
📁 Folder View
Open Folder
View Hits
Browse Files
📄 File View
View File
Download File
Rate File
⭐ Rating System
Interactive Stars
Emoji Feedback
Average Rating
🚀 Future Enhancements
AJAX Rating System
Live Notifications
PDF Preview
File Search
Dashboard Analytics
OTP Login
Email Notifications
Cloud Storage Integration
🏢 Use Cases

Suitable for:

Corporate Offices
Training Departments
Educational Institutes
HR Departments
Technical Documentation
Knowledge Sharing Platforms
👨‍💻 Developed By

Mukesh Kumar
Knowledge Management Portal (KMP)

📄 License

This project is for educational and organizational use.
