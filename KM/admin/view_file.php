<?php
include('../includes/auth.php');
include('../config/db.php');

if(!isset($_GET['id'])){
    die("Invalid Request");
}

$id = intval($_GET['id']);

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
    die("File not found");
}

$file = $result->fetch_assoc();

$path = "../uploads/".$file['folder_name']."/".$file['stored_name'];

if(!file_exists($path)){
    die("File missing");
}

// Detect file type
$mime = mime_content_type($path);

header("Content-Type: ".$mime);
header("Content-Disposition: inline; filename=\"".$file['file_name']."\"");
readfile($path);
exit;
?>