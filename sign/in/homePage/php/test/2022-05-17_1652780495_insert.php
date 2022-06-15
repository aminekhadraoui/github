<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "github";


$textarea = $_POST["textarea"];
$email = $_POST["email"];
$name = $_POST["name"];
$pswd = $_POST["password"];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO sign
VALUES ('$email', '$name', '$password','$textarea');
INSERT INTO connected
VALUES ('$email', '')

";
  $conn->exec($sql);
/*echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';*/
  
  
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("Location: ../image-upload-php-and-mysql-main/index.php");












$_SESSION["username"] = $email;
$_SESSION["password"] = $pswd; 
$conn->close();
?>
