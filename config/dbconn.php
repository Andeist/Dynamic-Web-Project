<?php
$servername = "localhost";
$username = "root";
$password = "";
// Change the name of database to yours
$database = "20222_wp2_412021010";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Konkesi Error: " . $conn->connect_error);
}
