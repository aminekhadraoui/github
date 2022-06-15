<?php 
// Include the database configuration file 
session_start();
$servername = "localhost";
$username = "root";
$password = "madara1998";
$dbname = "github";

$required = array('description', 'directoryName', 'projectName');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
    $description = $_POST["description"];
    $dateTime=date('Y-m-d H:i:s');
    $dirc = $_POST["directoryName"];
          mkdir($dirc);
          $uploadFileDir = './'.$dirc.'/';
    $user = $_SESSION["username"]; 
    $projectName=$_POST["projectName"];
}





$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "hello1";

if(isset($_POST['submit'])){ 
    // File upload configuration 
    $targetDir = $uploadFileDir ; 
    $allowTypes = array('php','html','css','sql','js','jpeg', 'gif', 'png','pdf','jpg'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']);
    $filesdep = date('Y-m-d H:i:s')."_".$fileName; 
    echo "hello2";
    echo $filesdep;
    if(!empty($fileNames)){ 
      echo "hello3";
      //SELECT * FROM project S WHERE date=( SELECT MAX(date) FROM project WHERE pointedname = S.pointedname)
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $pointedName=basename($_FILES['files']['name'][$key]);
            $fileName = date("Y-m-d")."_".time()."_".(basename($_FILES['files']['name'][$key])); 
            $targetFilePath = $targetDir .$fileName; 
            echo "<h1>".$fileName."</h1>";
            echo "<h1>".date("Y-m-d")."_".time()."_".$targetFilePath."</h1>";
             echo "<h1>".date("Y-m-d")."_".time()."_".$fileName."</h1>";
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                echo "hello5";
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    echo "hello7";
                    $dateTime=date('Y-m-d H:i:s');
                    $projectName=$_POST["projectName"];
                    
                    /**extension */
                    $file = new SplFileInfo($fileName);
                    $ext  = $file->getExtension();
                    
                    echo "this is the path info :::::::: ".$ext ;
                   
                    $insertValuesSQL .= "('".$user."','".$targetFilePath."','".$description."','".$projectName."','".$dateTime."','".$fileName."','".$uploadFileDir."','".$ext."','".$pointedName."'),"; 
                      echo "<br>".$insertValuesSQL."<br>";
                  }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                    
                  } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
        $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
        $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            echo "<br>".$insertValuesSQL;
            // Insert image file name into database 
            echo "hello6";
            
            $sql = ("INSERT INTO project VALUES $insertValuesSQL");
            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
              header("Location: ../");
            } 
           
            if($insert){ 
                $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                header("Location: ../");
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = "Upload failed! ".$errorMsg; 
        } 
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
} 
header("Location: ../");
 
?>


