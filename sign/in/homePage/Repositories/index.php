<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="css/style.css">
<style>
.post-pub{
    color:black;
}    
</style>
</head>
<body>

<!-- Nav bar header -->
<div class="header">
    <div class="header_left">
        <img src="../img/git2.png" alt="no image">
        <div class="search_box">
            <i class="bi bi-search"></i>
            <input type="text" class="search_input" placeholder="Search or jump to..">
        </div>
    </div>
    <div class="header_right">
        <div class="nav_link ">
         
            <div class="nav_text">Pull requests</div>
        </div>

        <div class="nav_link network">
            
            <div class="nav_text">Issues</div>
        </div>

        <div class="nav_link jobs">
            
            <div class="nav_text">Marketplace</div>
        </div>

        <div class="nav_link">
            
            <div class="nav_text">
                <a href="search/index.php" style="color:white;text-decoration:none;">Explore old version</a></div>
        </div>

        <div class="nav_link">
            <div class="nav_text">
                <a href="../" style="text-decoration:none;color:white;">Profile</a>
                
            </div>
            
        </div>

       
</div>
</div>

<div class="container">

<div class="left-sidegit">
<div class="fix-margin">
<?php 
            $servername = "localhost";
            $username = "root";
            $password = "madara1998";
            $dbname = "github";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            session_start();
             $user = $_SESSION["username"];
      
          $sql = "SELECT * FROM images where id='$user'";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="../../../up/image-upload-php-and-mysql-main/<?=$images['image_url'] ?>"
                 alt="noimage" style="height:300px;
                    width:300px;
                    
                    border:4px solid white;
                    
                    margin:10px auto 0 0px;"
                 
                 >
             </div>
          		
    <?php } }?>
<h3><?php session_start();
             $user = $_SESSION["username"];
         echo $user; ?></h3>
<p>
<?php
$con = mysqli_connect("localhost","root","madara1998","github");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
$user = $_SESSION["username"];
                     
$sql = "SELECT * FROM sign where email='$user'";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo $row[3];
  }
  mysqli_free_result($result);
}

mysqli_close($con);
?>
</p>
<a href="editer/index.html"><button>Edit profile</button></a>
</div>
</div>

<div class="right-sidegit" style="margin-top:50px;">

                 <!--select data fetch-->
       



<?php
  session_start();
        $con = mysqli_connect("localhost","root","madara1998","github");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit(); 
}
$user = $_SESSION["username"];
                 
$sql = "SELECT * FROM project where user='$user' GROUP BY directoryName";

if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  $i=0;
  while ($row = mysqli_fetch_row($result)) { 
     
   if($row[7]=="css"){
     $color="#3d11ff";
   }else if($row[7]=="php"){
     $color="#0581c9";
   }else if($row[7]=="html"){
     $color="#c92205";
   }
   echo "<a href='../myfilemgr/index.php?project=".$row[6]."' class='post-pub'>".$row[3]."</a>"."<span style='width:10px;height:20px;border-radius:50%;background-color:".$color.";padding:1px 10px;margin-left:10px;'></span>"."<span class='stat'>Public</span></h3><p>".$row[4]."</p><p style='font-weight: bold;'>Type : ".$row[7]."</p> ";
    //echo "<p><a href='codeEditorGit/index.php?project=".$row[1]."' ' class='post-pub'>".$row[3]."</a>"."<span style='width:10px;height:20px;border-radius:50%;background-color:".$color.";padding:1px 10px;margin-left:10px;'></span>"."<span class='stat'>Public</span></h3><p>".$row[4]."</p><p style='font-weight: bold;'>Type : ".$row[7]."</p> ";
    echo "<hr>";


  }
 
}


?>


</div>
</div>


</body>

</html>