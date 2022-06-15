<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<header>
		<div id="c-red" class="circle"></div>
		<div id="c-yellow" class="circle"></div>
		<div id="c-green" class="circle"></div>
		<h1><span id="c-gray"></span>A project by <?php  
		session_start();
		$user = $_SESSION["username"];
		echo $user;
		?></h1>
</header>

<nav>
		<h2>Working Files</h2>
		<ul>
		<?php
  session_start();
  $project= $_GET['project'];
        $con = mysqli_connect("localhost","root","madara1998","github");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit(); 
}
$user = $_SESSION["username"];
                   
$sql = "SELECT * FROM project where user='$user' and path ='$project' ";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  $i=0;
  while ($row = mysqli_fetch_row($result)) { 
	echo"<li><a href='#' class='active'>".$row[8]." </a>";
	
  }}
     
?>

			
				</li>
				
		</ul>
</nav>

<div contenteditable="true" spellcheck="false" onkeypress="lineCount();" style="outline: none">
		<div id="page-1" class="page" style="display: block;color:white;">
	
<?php
$project= $_GET['project'];
$echoproject= "../../php/".$project;
echo highlight_string("<p style='color:white;'>".file_get_contents($echoproject)."</p>");


//echo htmlspecialchars_decode(file_get_contents($echoproject));
/*$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "github";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$project= $_GET['project'];
$sql = "SELECT * FROM project ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	echo file_get_contents("../php/".$project);
	echo "<p>".$project."</p>";
  }
} else {
  echo "0 results";
}
$conn->close();*/
?>	
</div>

		<div id="page-2" class="page">
				<p>Feel free to make some changes!</p>
		</div>

		<div id="page-3" class="page">
				<p>function You() {</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;return somethingCool;</p>
				<p>}</p>
		</div>

		<div id="page-4" class="page">
				<p>Click that ♥ button :)</p>
		</div>
</div>

<footer>
		<p>hello@gdube.io &#45; <span>1 Line</span>
		</p>
		<ul>
				<li>INS</li>
				<?php
  session_start();
  $project= $_GET['project'];
        $con = mysqli_connect("localhost","root","madara1998","github");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit(); 
}
$user = $_SESSION["username"];
                   
$sql = "SELECT * FROM project where user='$user' and path ='$project' ";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  $i=0;
  while ($row = mysqli_fetch_row($result)) { 
	echo 	"<li id='fileType'>".htmlspecialchars($row[7])."</li>";
	
  }}
     
?>



			
				<li id="color">■</li>
				<li>Tab Size: 4</li>
		</ul>
</footer>
<!-- partial -->
  

</body>
</html>
