<?php
include('../includes/auth.php');
include('../config/db.php');
include('../includes/functions.php');

// Only admin or super_admin
if(!in_array($_SESSION['role'], ['admin','super_admin'])){
    die("Access Denied");
}

if(!isset($_GET['id'])){
    die("Invalid Request");
}

$id = intval($_GET['id']);

// Check file exists
$stmt = $conn->prepare("
    SELECT files.*, folders.folder_name 
    FROM files
    LEFT JOIN folders ON files.folder_id = folders.id
    WHERE files.id=? AND files.is_deleted=0
");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    die("File not found or already deleted");
}

$file = $result->fetch_assoc();

// Soft delete
$delete = $conn->prepare("UPDATE files SET is_deleted=1 WHERE id=?");
$delete->bind_param("i",$id);
$delete->execute();

// Log activity
logActivity(
    $conn,
    $_SESSION['user_id'],
    "Delete File",
    "Deleted file '".$file['file_name']."'"
);

header("Location: file_list.php");
exit;
?>