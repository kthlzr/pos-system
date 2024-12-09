<?php
$host = "localhost";
$username = "root";
$password = "asdfG24@";
$database = "pos";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>