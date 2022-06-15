<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
        include('conn.php');
      
        @$idpub=$_GET['idpub'] or header("location:accueil.php");
        $query2="SELECT publication.file_publication FROM `publication` WHERE `publication`.`id_publication` = $idpub;";
        if ($ress = mysqli_query($conn, $query2))
        {
           if ($pub=mysqli_fetch_array($ress)){
               if ($pub[0]!=""){
                if (!unlink("upload/files/".$pub[0]))
                    echo "File delete error !";
               }
           }
        }
            $query="DELETE FROM `publication` WHERE `publication`.`id_publication` = $idpub;";
            $query2="DELETE FROM `commentaire` WHERE id_publication = $idpub;";
            if(mysqli_query($conn,$query))
            {
                if(mysqli_query($conn,$query2))
            {
                echo"supprision avec succes";
            }
            }
            else
            {
                echo"echec de supprision !";
            }
}
else
{
    header("location:login.php");
    exit;
}
ob_end_flush();
?>