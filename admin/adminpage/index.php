<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<head>
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
  </head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#">Github</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="../../sign/in/homePage/chat/login.php">Chat</a></li>
          <li><a href="#">Posts</a></li>
          <li><a href="#">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href=# "">Admin</a></li>
          <li><a href="../../">Log out</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!--header-->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ">
          <h2><span class="glyphicon glyphicon-cog" id="gear"></span> Dashboard</h2>
        </div>
        <div class="col-md-2 ">
          <div class="dropdown create">
             <!-- <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Create Content
                <span class="caret"></span>
              </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              <li><a type="button" data-toggle="modal" data-target="#addPage">Add page</a></li>
              <li><a href="#">Add post</a></li>
              <li><a href="#">Add user</a></li>
            </ul>-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Breadcrumb-->
  <section id="breadcrumb" >
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Home</li>
      </ol>
    </div>
  </section>

  <!--main section-->
  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group animated zoomIn">
            <a href="#" class="list-group-item active  main-color-bg">
                  <span class="glyphicon glyphicon-cog"></span> Dashboard
              </a>
            <a href="pages.html" class="list-group-item"><span class="badge"> <?php
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
                $sql="select count(*) as total from project";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
                ?>
                </span><span class="glyphicon glyphicon-list-alt"></span> Project</a>
            
            <a href="users.html" class="list-group-item"><span class="badge"> <?php
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
                $sql="select count(*) as total from sign";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
                ?>
                </span><span class="glyphicon glyphicon-user"></span> Users</a>
          </div>
          <div class="well animated zoomIn">
            <h4>Disk Space Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                <span class="sr-only">60% Complete</span>
              </div>
            </div>
            <h4>Bandwidth Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                <span class="sr-only">40% Complete</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="panel panel-default animated zoomIn">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Website Overview</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user"></span> 
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
                $sql="select count(*) as total from sign";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
                ?>
                
                
                </h2>
                  <h4>Users</h4>
                </div>
              </div>
              <div class="col-md-3 dash-box">
                <div class="well">
                  <h2><span class="glyphicon glyphicon-list-alt"></span>  <?php
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
                $sql="select count(*) as total from project group by nameproject";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
                ?>
                </h2>
                  <h4>Project</h4>
                </div>
              </div>
              
              <div class="col-md-3 dash-box">
                <div class="well">
                  <h2><span class="glyphicon glyphicon-stats"></span> <?php
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
                $sql="select sum(count) as total from map";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);
echo $data['total'];
                ?></h2>
                  <h4>Visiters</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default animated zoomIn">
            <!-- Default panel contents -->
            <div class="panel-heading main-color-bg">Control Panel Users</div>
            <div class="panel-body">
              <!-- Table -->
              <table class="table table-striped table-hover">
                <tr>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Delete user</th>
             
                </tr>
               
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

$sql = "SELECT * FROM sign";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["email"]. "</td> <td>" . $row["name"]. "</td><td> " . $row["description"]. "</td><td><a href='deleteUser.php?user=".$row['email']."'>Delete</a></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
         

              </table>
            </div>
          </div>
        </div>
      </div>



      <div class="panel panel-default animated zoomIn">
            <!-- Default panel contents -->
            <div class="panel-heading main-color-bg">Control Panel Project</div>
            <div class="panel-body">
              <!-- Table -->
              <table class="table table-striped table-hover">
                <tr>
                  <th>Email</th>
                  <th>Path</th>
                  <th>Description</th>
                  <th>Project Name</th>
                  <th>Date</th>
                  <th>Delete Project</th>
                </tr>
               
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
    echo "<tr><td>" . $row["user"]. "</td> <td>" . $row["path"]. "</td><td> " . $row["description"]. "</td><td>".$row["nameproject"]."</td><td>".$row["date"]."</td>". "<td><a href='deleteProject.php?project=".$row['nameproject']."'>Delete</a></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
         

              </table>
            </div>
          </div>
        </div>
      </div>


      <div class="panel panel-default animated zoomIn">
            <!-- Default panel contents -->
            <div class="panel-heading main-color-bg">Viewer</div>
            <div class="panel-body">
              <!-- Table -->
              <table class="table table-striped table-hover" style="width:200px;">
                <tr>
                  <th>Ip adress</th>
                  <th>Count</th>
                  <th>country</th>
                </tr>
               
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

$sql = "SELECT * FROM map ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["ip"]. "</td> <td>" . $row["count"]."</td><td>".$data = file_get_contents("http://api.hostip.info/country.php?ip=". $row["ip"]."")."</td></tr>";
  //12.215.42.19
  }
} else {
  echo "0 results";
}
$conn->close();
?>
         

              </table>
            </div>
          </div>
        </div>
      </div>     
  </section>

  <!-- footer -->
  <footer id="footer">
    <p>&copy; Developed by <i><strong>Github</p>
    </footer>



  <!-- Model -->
  <!-- Add page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
          <input type="checkbox"> Published
        </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script><script  src="./script.js"></script>

</body>
</html>
