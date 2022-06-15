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
        
        $_POST    =  filter_input_array(INPUT_POST , FILTER_SANITIZE_STRING);
        $msg       =  $_POST['text_msg'];
        $adresse  =  $_SESSION['user'];
        $date       =   date('Y-m-d H:m:s');
        $error      =   array();
        $dist         =   $_POST['dist'];  
        $select     =   "select id_user , nom_user , prenom_user from user , profile where user.id_profile=profile.id_profile and adresse_user='$adresse';";
        $first_qry =   mysqli_query($conn,$select);
        //verfication de contenu de message
        if(empty($msg))
        {
           $error[]="<span>aucun message saisie !</span>"; 
        }
        // recherche et verfication de distinataire saisie
        $recherche = "select user.id_user, profile.nom_user , profile.prenom_user  from profile , user where user.id_profile=profile.id_profile and user.adresse_user ='$dist';";
        $rech_qry   = mysqli_query($conn,$recherche);
        @$nbr_qry    = mysqli_num_rows($rech_qry);
        if($nbr_qry>0)
        {
            
        }
        else
        {
           $recherche = "select user.id_user  , profile.nom_user , profile.prenom_user from profile , user where user.id_profile=profile.id_profile and profile.cin_user ='$dist';";
            $rech_qry   = mysqli_query($conn,$recherche);
            @$nbr_qry    = mysqli_num_rows($rech_qry);
            if($nbr_qry>0)
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
                    $prenom_dist = $id[2];
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
            $_SESSION['msg_suc']="<div class='alert alert-success alert-dismissible fade show recherche_alert' role='alert' id='suc'>
                        <strong>Yupp</strong> votre message a été envoyer à $nom_dist $prenom_dist avec succes.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";
            $page=$_SESSION['page'].'#suc';
            header("location:$page");
            exit;
        }
        else
        {
           $_SESSION['msg_err']="<div class='alert alert-danger alert-dismissible fade show recherche_alert' role='alert' id='err'>
                        <strong>Error</strong> code erreur (#mg80).
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";
            $page=$_SESSION['page'].'#err';
            header("location:$page");
            exit;
        }    
        }
        else
        {
            // error (adresse / cin inconnu)
            foreach($error as $err)
            {
             $_SESSION['msg_err']="<div class='alert alert-danger alert-dismissible fade show recherche_alert' role='alert' id='err'>
                        <strong>Error</strong> $err.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>×</span>
                        </button>
                    </div>";
                $page=$_SESSION['page'].'#err';
            header("location:$page");
            exit;
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
ob_end_flush();
?>