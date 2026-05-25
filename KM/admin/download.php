<?php
include('../includes/auth.php');
include('../config/db.php');

$id = intval($_GET['id']);

// Get file with folder info
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
    die("Access Denied");
}

$file = $result->fetch_assoc();

// Build file path
$path = "../uploads/".$file['folder_name']."/".$file['stored_name'];

if(!file_exists($path)){
    die("File not found");
}

// Force download
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"".$file['file_name']."\"");
header("Content-Length: " . filesize($path));

readfile($path);
exit;
?>