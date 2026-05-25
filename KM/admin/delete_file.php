<?php
include('../includes/auth.php');
include('../config/db.php');
include('../includes/functions.php');

if(!isset($_GET['id'])){
    die("Invalid Request");
}

$id = intval($_GET['id']);

// Check if file belongs to logged-in user
$stmt = $conn->prepare("
    SELECT file_name 
    FROM files 
    WHERE id=? AND uploaded_by=? AND is_deleted=0
");
$stmt->bind_param("ii", $id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    die("Access Denied");
}

$file = $result->fetch_assoc();

// Soft delete
$delete = $conn->prepare("UPDATE files SET is_deleted=1 WHERE id=?");
$delete->bind_param("i",$id);
$delete->execute();

logActivity(
    $conn,
    $_SESSION['user_id'],
    "Delete File",
    "Deleted file '".$file['file_name']."'"
);

header("Location: folder_list.php");
exit;
?>