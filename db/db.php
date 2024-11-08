<?php
$host = 'localhost';
$dbname = 'u705875743_my_database';
$username = 'u705875743_root';
$password = 'N3sbXYA]';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
