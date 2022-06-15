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
             $user = $_SESSION["username"];
// sql to delete a record
$project= $_GET['projects'];
echo $project;
echo $user;
$sql = "DELETE FROM project WHERE user='$user' and nameproject='$project'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: ../');
exit;
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>