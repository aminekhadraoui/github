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

$sql = "UPDATE map SET count=count+1 ";

if ($conn->query($sql) === TRUE) {
  echo "";
  $ip = $_SERVER['REMOTE_ADDR'];
  $sql = "INSERT INTO map 
  VALUES ('$ip', '')";
  
  if ($conn->query($sql) === TRUE) {
    echo "";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>View</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

<ul>
  <li><a class="active" href="../">Home</a></li>
  <li><a href="../sign/in">Log in</a></li>
  
</ul>
<!-- partial:index.partial.html -->


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

$sql = "SELECT * FROM project group by nameproject";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='cards'>

    <div class='card'>
      <div class='card__image-holder'>
        <img class='card__image' src='https://149695847.v2.pressablecdn.com/wp-content/uploads/2019/10/mapbox_github.jpg' alt='wave' />
      </div>
      <div class='card-title'>
        <a href='#' class='toggle-info btn'>
          <span class='left'></span>
          <span class='right'></span>
        </a>
        <h2>
           ".$row["nameproject"]."
            <small>".$row["date"]."</small>
        </h2>
      </div>
      <div class='card-flap flap1'>
        <div class='card-description'>
         ".$row["description"]."<br>".$row["user"]."
        </div>
        <div class='card-flap flap2'>
          <div class='card-actions'>
            <a href='myfilemgr/index.php' class='btn' style='cursor: not-allowed;'>Code source</a>
          </div>
        </div>
      </div>
    </div>
  
    
  </div>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script><script  src="./script.js"></script>

</body>
</html>
