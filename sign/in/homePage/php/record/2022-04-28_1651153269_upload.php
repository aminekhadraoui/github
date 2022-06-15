

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "github";
$description = $_POST["description"];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$user = $_SESSION["username"];
$message = ''; 
echo "hello";
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Push')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = (date("Y-m-d")."_".time()."_". $fileName);

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'php', 'html', 'zip', 'txt', 'xls', 'doc','css');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $dateTime=date('Y-m-d H:i:s');
      $dirc = $_POST["directoryName"];
      mkdir($dirc);
      $uploadFileDir = './'.$dirc.'/';
      $dest_path = $uploadFileDir . $newFileName;
      $projectName=$_POST["projectName"];
      $sql = "INSERT INTO project
VALUES ('$user', '$dest_path','$description','$projectName','$dateTime','$fileName','$uploadFileDir','$fileExtension')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
//begin *********************************************************************




header("Location: ../");
