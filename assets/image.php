<?php 

$host = "localhost";
$user = "root";
$pass = "mysql";
$db = "sbu_oapps";

$connect = new mysqli ($host, $user, $pass, $db);

if (!$connect) {
  die("Failed to connect db: " . $connect->connect_error);
}


$id = $_GET['id'];

$query = "SELECT Logo FROM accounts WHERE ";
$query .= "Account_ID = '$id'";

$result = $connect->query($query);

if (!$result) {
  die("Failed to get image: " . $connect->error);
}

$row = $result->fetch_assoc();

// echo "ye buoy";

// header('Content-Type: image/png');

echo $row['Logo'];


?>