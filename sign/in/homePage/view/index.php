
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Notification</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Notification</title>
  
  <!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,400italic,700,900' rel='stylesheet' type='text/css'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- // Fonts -->
</head>
<body>
  <!-- Vertical Timeline -->

  <section id="conference-timeline">
  <div class='timeline-start' style="margin-button: 100px;">Viewed profile</div>
  <div class='timeline-start'><a href="../">Back</a></div>
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
$sql = "SELECT * FROM view where user!='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    
    <div class='conference-center-line'></div>
    <div class='conference-timeline-content'>
      <!-- Article -->
      <div class='timeline-article'>
        <div class='content-left-container'>
          <div class='content-left'>
            <p>Profile viewed by : ".$row["user"]."<span class='article-number'>01</span></p>
          </div>

        </div>
        <div class='content-right-container'>
          <div class='content-right'>
            <p>at : ".$row["date"]."<span class='article-number'>02</span></p>
          </div>
         
        </div>
        <div class='meta-date'>
          <span class='date'><img src='https://cdn-icons-png.flaticon.com/512/25/25231.png' style='height:50px;width:50px;'></span>
         
        </div>
      </div>
    
    ";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

  
    
      <!-- // Article -->
      
      <!-- Article -->
     
  </section>
  <!-- // Vertical Timeline -->
</body>
</html>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
