<?php
$conn = new mysqli("localhost", "root", "", "ESSA");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>