<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<html>
    <body>
        <div class="wrapper">
            <div class="logo">
                <a href="../../"><img src="https://i.imgur.com/gr4XvFZ.png" alt="GitHub"></a>
            </div>
            <div class="title">
                <p>Sign in to GitHub</p>
            </div>
            <form method="POST" action="index.php"> 
            <div class="form">
                <div class="input_field">
                    <label>Username or email address</label>
                    <input type="text" class="input" name="user">
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="pass">
                    <a href="#" class="forgot">Forgot password?</a>
                </div>
                <div class="btn">
                    <input type="submit" value="Sign in" class="sign_btn">
                </div>
            </div>
</form>
            <div class="create_act">
                <p>New to GitHub? <a href="../up">Create an account.</a></p>
            </div>
            <div class="footer">
                <ul>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Contact GitHub</a></li>
                </ul>
            </div> 
        </div>	
    </body>
</html>
<?php
// DB credentials.
define('DB_HOST','localhost'); // Host name
define('DB_USER','root'); // db user name
define('DB_PASS','madara1998'); // db user password name
define('DB_NAME','github'); // db name
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

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
if(isset($_POST["user"])){
$username=$_POST["user"];
$pass= $_POST["pass"];
$sql = "SELECT * FROM sign where email='$username' and password='$pass' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<h3 style='color:green;position:absolute; top:400px;'>user found </h3>";
	

$_SESSION["username"] = $username;
$_SESSION["password"] = $pass; 
header("Location: homepage/index.php");
 
} else {
  echo "<h3 style='color:green;position:absolute; top:400px;'>user not found </h3>";
}
}
$conn->close();
?>