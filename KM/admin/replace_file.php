<?php
include('../includes/header.php');
include('../includes/functions.php');

if(isset($_POST['replace'])){

    $file_id = $_POST['file_id'];

    $stmt = $conn->prepare("SELECT * FROM files WHERE id=? AND project=?");
    $stmt->bind_param("is",$file_id,$_SESSION['project']);
    $stmt->execute();
    $file = $stmt->get_result()->fetch_assoc();

    if(!$file) die("Access Denied");

    $oldPath = "../uploads/".$file['project']."/".$file['stored_name'];

    unlink($oldPath); // delete old file

    $newFile = $_FILES['file'];
    $ext = strtolower(pathinfo($newFile['name'],PATHINFO_EXTENSION));
    $stored = uniqid().'.'.$ext;

    $newPath = "../uploads/".$file['project']."/".$stored;

    move_uploaded_file($newFile['tmp_name'],$newPath);

    $update = $conn->prepare("UPDATE files SET file_name=?,stored_name=?,updated_at=NOW()
                              WHERE id=?");

    $update->bind_param("ssi",$newFile['name'],$stored,$file_id);
    $update->execute();

    logActivity($conn,$_SESSION['user_id'],"Replace","Replaced file ID ".$file_id);

    echo "File Replaced";
}
?>