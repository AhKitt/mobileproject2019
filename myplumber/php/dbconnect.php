<?php
$servername = "localhost";
$username 	= "mobileho_myplumberadmin";
$password 	= "password here";
$dbname 	= "mobileho_myplumber";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>