<?php
$conn = new mysqli("localhost", "root", "", "km");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function logActivity($conn,$user,$action,$desc){
    $stmt = $conn->prepare("INSERT INTO activity_logs(user_id,action,description)
                            VALUES(?,?,?)");
    $stmt->bind_param("iss",$user,$action,$desc);
    $stmt->execute();
}

function clean($data){
    return htmlspecialchars(trim($data));
}
?>