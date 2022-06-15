<?php
$conn=new PDO('mysql:host=localhost; dbname=github', 'root', 'madara1998') or die(mysqli_error($conn));
function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
{
    $zip = new ZipArchive();
    if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
        exit("cannot open <$archive_file_name>\n");
    }

    foreach($file_names as $files)
    {
        $zip->addFile($file_path.$files,$files);
        //echo $file_path.$files,$files."<br />";
    }
    $zip->close();
    header("Content-type: application/zip"); 
    header("Content-Disposition: attachment; filename=$archive_file_name"); 
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile("$archive_file_name");
    exit;
}
session_start();
$user=$_SESSION["username"];
$project = $_GET["project"];
$cqurfetch=mysql_query("SELECT * FROM project where user='$user' and accept='1'");
while($row = mysql_fetch_array($cqurfetch))
{
   $file_names[] = $row['user_album_images'];
}
   $archive_file_name=time().'.gallery.zip';
   $file_path="/uploads/";
   zipFilesAndDownload($file_names,$archive_file_name,$file_path);
   echo '^^^^^^Zip ended^^^^^^';
  
?>