<?php
include('conn.php');
ob_start();
session_start();
if(isset($_SESSION['user']))
{
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
       //declaration des variables..
        $old_pass    = filter_var($_POST['lastpass'] , FILTER_SANITIZE_STRING);
        $newpass    = filter_var($_POST['newpass'] , FILTER_SANITIZE_STRING);
        $renewpass = filter_var($_POST['comfirmpass'] , FILTER_SANITIZE_STRING);
        $mymail      = $_SESSION['user'];
        $error          = array();
        // les requettes..
        $select            =  "select password_user from user where adresse_user  = '$mymail'; ";
        $query_select  =    mysqli_query($conn,$select);
        if($query_select)
        {
            //succes code
            while($pass=mysqli_fetch_array($query_select))
            {
                $mypass  =  $pass[0] ;
            }
            if(empty($old_pass))
            {
              $error[]="<li>veuillez saisie l'ancien mot de passe !</li>";  
            }
            elseif(! empty($old_pass))
            {
               if(!password_verify($old_pass,$mypass))
                {
                    $error[]="<li>l'ancien mot de passe est invalide !</li>";
                } 
            }
            if(empty($newpass))
            {
              $error[]="<li>veuillez saisie le nouveau mot de passe !</li>";  
            }
            if(empty($renewpass))
            {
              $error[]="<li>veuillez saisie la confirmation mot de passe !</li>";  
            }
            if(strlen($newpass)<8)
            {
              $error[]="<li>le nouveau mot de passe ne doit pas inferieur à 8 !</li>";    
            }
            
            if($newpass!==$renewpass)
            {
                $error[]="<li>confirmation de mot de passe est invalide !</li>";
            }
            if($newpass==$old_pass)
            {
                $error[]="<li>deja utilisé ce mot de passe !</li>";
            }
            
            //check if the error table is empty or not
            
            if(empty($error))
            {
               $hashpass           = password_hash($newpass,PASSWORD_DEFAULT);
               $update              = "update user set password_user='$hashpass' where adresse_user='$mymail';";
               $query_update    =  mysqli_query($conn,$update);
                if($query_update)
                {
                    //success..
                    $_SESSION['msg_succes']="le mot de passe est bien changer ";
                    header("location:accueil.php");
                    exit;
                }
                else
                {
                    //error
                   $_SESSION['msg_error']="erreur (error code : #chpass75)" ;
                    header('location:accueil.php');
                    exit;                    
                }
            }
             else // loop for the errors array
            {
                 foreach($error as $err)
                 {
                    $_SESSION['msg_error'] =$err;
                    header('location:accueil.php');
                    exit;
                 }
             }
        }
        else
        {
              $_SESSION['msg_error']="erreur (error code : #chpass92)" ;
              header('location:accueil.php');
              exit;
        }
        
    }
    else
    {
      header("location:accueil.php");
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