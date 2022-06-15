<?php
session_start(); 
$user = $_SESSION["username"];

?>

<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL); 
// TODO: add the password to the connection
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

$textarea = $_POST["textarea"];
$email = $_POST["email"];
$name = $_POST["name"];
$pswd = $_POST["password"];

// validate the user email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Bad email address";
  exit();
}

// TODO: validate name, password here

// check if the user exists already
$select = mysqli_query($conn, "SELECT * FROM sign WHERE email = '".$_POST['email']."'");
if(mysqli_num_rows($select)) {
    exit("<div class='alert'>
    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
    <strong>Danger!</strong> email already exist !
  </div>");
}else{
  echo "dont exist";
}



/*if ($stmt = $conn->prepare("SELECT * FROM sign WHERE email ? LIMIT 1")) {
  $stmt->bind_param("s", $_POST['email']);
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    echo "Bad email address";
    exit();
  }
  $stmt->close();
} else {
  echo "Server error 1";
  exit();
}*/

// create the new user account







if ($stmt = $conn->prepare("INSERT INTO sign (email, name, password, description) VALUES (?, ?, ?, ?)")) {
  $stmt->bind_param("ssss", $email, $name, $pswd, $textarea);
  if (!$stmt->execute()) {
    echo "Something went wrong.";
    exit();
  }
  $stmt->close();
} else {
  echo "Server error 2";
  exit();
}

// insert the connected log
if ($stmt = $conn->prepare("INSERT INTO connected VALUES (?, '')")) {
  $stmt->bind_param("s", $email);
  if (!$stmt->execute()) {
    echo "Something went wrong.";
    exit();
  }
  $stmt->close();
} else {
  echo "Server error 3";
  exit();
}

// success, redirect the user
header("Location: ../image-upload-php-and-mysql-main/index.php");
exit(); 