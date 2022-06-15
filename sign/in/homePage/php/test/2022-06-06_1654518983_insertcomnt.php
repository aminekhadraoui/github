<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
    $page =$_SESSION['page'];
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {   
        include('conn.php');
        $mail= $_SESSION['user'];
        $idpub=$_POST['idpub'];
        $comnt=$_POST['T1'];
        $date=date('Y-m-d/h-s');
        $page =$_SESSION['page']."#newcommentaire".$idpub;
        $selectiduser="select id_user from user where adresse_user='$mail';";
        $myid=$_SESSION['myid'];
        $qq="select id_user from publication where id_publication='$idpub';";
        $query1=mysqli_query($conn,$qq);
        $n=mysqli_num_rows($query1);
        if($n>0)
        {
            $data=mysqli_fetch_array($query1);
            $user_id=$data[0];
            $mycomnt =  "Commentaire : ".$comnt;
            $query2="INSERT INTO `commentaire` (`id_commentaire`, `id_user`, `commentaire`, `date_commentaire`, `id_publication`) VALUES (NULL, '$myid', '$comnt', '$date', '$idpub');";
            $query3="INSERT INTO `notification` (`id_user`, `date_notif`, `text_notif`) VALUES ('$user_id', '$date', '$mycomnt');";
            if(mysqli_query($conn,$query2))
            {
               if (!mysqli_query($conn,$query3)){
                   echo "error";
               }
               $_SESSION['succ_commentaire']="insertion avec succes";
               header("location:$page");
                exit;
            }
            else
            {
                $_SESSION['err_commentaire']="error!";
                header("location:$page");
                exit;
            }
        }
    }
    else
    {
        header("location:$page");
        exit;
    }
}
else
{
   header("location:login.php");
   exit; 
}
ob_end_flush();
?>