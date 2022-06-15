<html>
    <head>
<link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <h1><span class="blue">&lt;</span>Git<span class="blue">&gt;</span> <span class="yellow">Hub</pan></h1>
<h2>Delete Project</h2>
<a href="../" style="margin:150px;">Back</a>
<table class="container">
	<thead>
		<tr>
			<th><h1>User</h1></th>
			<th><h1>description</h1></th>
			<th><h1>Date</h1></th>
			<th><h1>Project Name</h1></th>
            <th><h1 style="padding-right:50px;">Delete</h1></th>
		</tr>
	</thead>
	<tbody>
		

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
$name=$_POST['name'];
session_start();
$user = $_SESSION["username"];
$sql = "SELECT * FROM project WHERE user='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr> <td>user: " . $row["user"]. " </td> <td>description: " . $row["description"]. " <td> date :" . $row["date"]. "</td>". " <td> project name :" . $row["nameproject"]. "</td><td><button class='w3-button w3-ripple' style='padding-right:50px;'><a href='delete.php?projects=".$row['nameproject']."'>Delete</a></button></td>";
  }
} else {
  echo "0 Project";
}
$conn->close();
?>

	</tbody>
</table>
    </body>
</html>