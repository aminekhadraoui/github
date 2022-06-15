
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>File Manager</title>
  <link rel="stylesheet" href="./style.css">
 <style>
 .btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
 </style>
</head>
<body>
<!-- partial:index.partial.html -->
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>

    body{
        background-image: linear-gradient(to right top, #2f4b76, #004963, #004143, #073723, #202a0a);;
    }
</style>  
</head>
  <body>

  <?php
  session_start();
  $project= $_GET['project'];
        $con = mysqli_connect("localhost","root","madara1998","github");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit(); 
}
$user = $_SESSION["username"];
                   
$sql = "SELECT * FROM project S WHERE date= ( SELECT MIN(date) FROM project WHERE pointedname = S.pointedname ) and  (user='$user')";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  $i=0;
  while ($row = mysqli_fetch_row($result)) { 
	//echo"<li><a href='#' class='active'>".$row[8]." </a>";
    echo "    <div class='row edrive-table-data-row' style='margin-top:50px;'>
    <div class='col-lg-3 col-md-3 col-sm-3 col-12 data-name'><i class='fas fa-folder edrive-file-icon'></i> <a href='../codeEditorGit/index.php?project=".$row[1]."'>".$row[8]."</a></div>
    <div class='col-lg-2 col-md-3 col-sm-3 col-12 data-info'style='color:white;'>".$row[4]."</div>
    <div class='col-lg-2 col-md-2 col-sm-2 col-12 data-info'style='color:white;'>".$row[8]."</div>
    <a href='../../php/".$row[1]."' download='".$row[8]."'><button class='btn'><i class='fa fa-download'></i> Download </button></a>
    <div class='col-lg-4 col-md-3 col-sm-3 col-12 data-info'>-</div>
  </div>";
	
 
}
  
}
     
?>
<a href="../" style="margin:10px 0 0 20px;">back</a>
  </body>
</html>
<!-- partial -->
  
</body>
</html>
