<?php
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "github";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$name=$_POST['name'];
session_start();
             $user = $_SESSION["username"];
$sql = "UPDATE sign SET description='$name' WHERE email='$user'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
  header('Location: ../');
exit;
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>