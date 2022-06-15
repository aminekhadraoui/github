<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    //Connexion a la base de donnée..
    include('conn.php');
    //les variables..
    $user=filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $pass=$_POST['pass'];
if(empty($user)||empty($pass))
{
    $_SESSION['msg']="veuillez remplir les champs !";
   header('location:login.php');
    exit; 
}
            //les requettes SQL..
            $select="select user.id_user , password_user , type_user , nbr_visite from profile , user where user.id_profile=profile.id_profile and adresse_user='$user' ;";
            $query=mysqli_query($conn,$select);
            $nbr=mysqli_num_rows($query);
            if($nbr>0)
            {
                while($row=mysqli_fetch_array($query))
                {
                    if(password_verify($pass,$row[1]))
                    {  
                        // ajouter +1 au nombre de visite de site a la base
                        $newnbr=$row[3]+1;
                        $reqUpdate="update user set nbr_visite='$newnbr' where id_user='$row[0]';";
                        $updatenbr=mysqli_query($conn,$reqUpdate);
                            if($updatenbr)
                            {
                            }
                            else
                            {
                                header("location : logout.php");
                                exit;
                            }
                        $_SESSION['user']=$user;
                        $_SESSION['type']=$row[2];//type de l'utilisateur
                        header('location:accueil.php');
                        exit;
                    }
                    else
                    {
                        $_SESSION['msg']="verifer votre mot de passe !";
                            header('location:login.php');
                            exit;
                    }
                }
                
                
            }
        else
         {
            $_SESSION['msg']="veuillez verifier vos donnée !";
            header('location:login.php');
            exit;
        }
    
    
    
}
else
{
header('location:login.php');
    exit;
}