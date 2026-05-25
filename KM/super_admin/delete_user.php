<?php
session_start();

include(__DIR__ . '/../includes/db.php');
include(__DIR__ . '/../includes/functions.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("UPDATE users SET status=0 WHERE id=?");

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param("i", $id);
$stmt->execute();

logActivity($conn, $_SESSION['user_id'], "Delete User", "User ID ".$id);

header("Location: user_list.php");
exit;
?>