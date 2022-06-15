<?php
ob_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    session_start();
    if( isset($_SESSION['user']) && isset($_SESSION['type']) )
    {
        //success code
        include('conn.php');         
        //les variables
        
        $msg       =  $_POST['text_msg'];
        $adresse  =  $_SESSION['user'];
        $date       =   date(Y-m-d H:m:s);
        $error      =   array();
        $dist         =   $_POST['dist'];  
        $select     =   "select id_user , nom_user , prenom_user from user , profile where user.id_profile=profile.id_user and adresse_user='$adresse';";
        $first_qry =   mysqli_query($conn,$select);
        
        // recherche et verfication de distinataire saisie
        $recherche = "select user.id_user, nom_user , prenom_user  from profile , user where user.id_profile=profile.id_user and adresse_user ='$dist';";
        $rech_qry   = mysqli_query($conn,$recherche);
        if(mysqli_num_rows($rech_qry)>0)
        {
            
        }
        else
        {
           $recherche = "select user.id_user  , nom_user , prenom_user from profile , user where user.id_profile=profile.id_user and profile.cin_user ='$dist';";
            $rech_qry   = mysqli_query($conn,$recherche);
           if(mysqli_num_rows($rech_qry)>0)
            {

            }
            else
            {
                $error[]="<span>aucun email / cin avec $dist</span>";
            }
        }
        if(empty($error))
        {
            if($rech_qry)
            {
                while($id=mysqli_fetch_array($rech_qry))
                {
                    $id_dist = $id[0];
                    $nom_dist = $id[1];
                    $prenom_dist = $id[11];
                }
            }
                
        if($first_qry)
        {
            while($id=mysqli_fetch_array($first_qry))
            {
                $id_user=$id[0]; // id utilisateur
                $nom_user=$id[1]; // nom utilisateur
                $prenom_user=$id[2]; // prenom utilisateur
            }
        }
        $insert           =  "INSERT INTO `message` (`id_message`, `id_user1`, `id_user2`, `date_envoie`, `message_text`, `nom_user`, `prenom_user`) VALUES (NULL, '$id_user', '$id_dist', '$date', '$msg', '$nom_user', '$prenom_user');";
        $second_qry  =   mysqli_query($conn,$insert);
        if($second_qry)
        {
            echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Yupp</strong> votre message a été envoyer à $nom_dist $prenom_dist avec succes.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";
        }
        else
        {
            echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error</strong> code erreur (#mg74).
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";
        }    
        }
        else
        {
            // error (adresse / cin inconnu)
            foreach($error as $err)
            {
             echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Error</strong> $err.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";   
            }
        }
        //les requettes

    }
    else
    {
        //error session
        header('location:../login.php');
        exit;
    }
}
else
{
    //error Request method
    header('location:index.php');
    exit;
}
?>