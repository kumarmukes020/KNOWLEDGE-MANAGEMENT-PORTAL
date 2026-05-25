<?php
require 'config/db.php';

if(!isset($_GET['id'])){
    die("Invalid Request");
}

$id = intval($_GET['id']);

// Get file + folder name
$stmt = $conn->prepare("
    SELECT files.file_name,
           files.stored_name,
           folders.folder_name
    FROM files
    LEFT JOIN folders ON files.folder_id = folders.id
    WHERE files.id=? AND files.is_deleted=0
    LIMIT 1
");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    die("File not found");
}

$file = $result->fetch_assoc();

// Build file path
$path = "uploads/" . $file['folder_name'] . "/" . $file['stored_name'];

if(!file_exists($path)){
    die("File missing");
}

// Clear output buffer
if(ob_get_level()){
    ob_end_clean();
}

// Force download headers
header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"" . $file['file_name'] . "\"");
header("Content-Length: " . filesize($path));
header("Cache-Control: must-revalidate");
header("Pragma: public");

readfile($path);
exit;
?>