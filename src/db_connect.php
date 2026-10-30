<?php
$host = "localhost";
$user = "root";      
$pass = "";          
$dbname = "db_et4132_group10";  

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
