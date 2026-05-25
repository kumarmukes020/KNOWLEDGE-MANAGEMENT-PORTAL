<?php
$conn = new mysqli("localhost", "root", "", "km");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>