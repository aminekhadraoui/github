<?php
ob_start();
session_start();
define ('SITE_ROOT', realpath(dirname(__FILE__)));

if($_SERVER['REQUEST_METHOD']=="POST")
{
    include('conn.php');
    $dirpath = dirname(getcwd());
    $publication=$_POST['mypub'];
    $filenameNew = "";
    if ($_FILES['file']){
        $file=$_FILES['file'];
        $filename=$file['name'];
        $fileTmpName=$file['tmp_name'];
        $fileSize=$file['size'];
        $fileError=$file['error'];
        $fileType=$file['type'];
        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
        $filenameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = "C:/xampp/htdocs/blog/upload/files/".$filenameNew;
        $allowed = array('pdf','doc',"txt","xls");
        if (in_array($fileActualExt,$allowed)){
            if ($fileError === 0){
               move_uploaded_file($fileTmpName,$fileDestination);
            }else {
                echo "There was an Error !";
            }
        }else {
            if ($filename != ''){
                echo "You Cannot upload files of this type!";
            }
        }
    }
    

    $id=$_SESSION['myid'];
    $date=date("Y-m-d H:i:s");
    if (empty($publication))
    {
        echo"<script>red();</script>";
        echo"Error : Publication est vide !";
        exit;
    }
    if(strlen($publication)<10)
    {
      echo"<script>red();</script>";
        echo"Error : publication doit etre superier ou égale à 10 caractére ! ";
        exit;  
    }
    else
    {
        $query="INSERT INTO `publication` (`id_publication`, `id_user`, `date_publication`, `contenu_publication`, `file_publication`) VALUES (NULL,'$id', '$date', '$publication','$filenameNew');";

        $quef="SELECT profile.nom_user , profile.prenom_user , publication.date_publication , publication.contenu_publication , publication.id_publication , profile.sexe  FROM `user` , PROFILE , publication WHERE user.id_profile=profile.id_profile and user.id_user=publication.id_user ORDER BY date_publication DESC limit 1";


          if (mysqli_query($conn,$query))
          {
              echo"<script>green();</script>";
              header("Location: " . $_SERVER["HTTP_REFERER"]);
              echo"insertion avec succées";
              exit;
          }
        else
        {
            echo"<script>red();</script>";
            die ("error : peut etre un probleme technique ou veuillez annuler les caractére spéciaux come l'apostrof ( ' )!");
            exit;
        }
     }
}
else
{
    header('location:accueil.php');
    exit;
}
ob_end_flush();
?>