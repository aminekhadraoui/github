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
session_start();
             
// sql to delete a record
$user= $_GET['user'];
echo $project;
echo $user;
$sql = "DELETE FROM sign WHERE email='$user'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: index.php');
exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>