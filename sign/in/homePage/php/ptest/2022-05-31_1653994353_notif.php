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
        $notif       =  $_POST['text_notif'];
        $adresse  =  $_SESSION['user'];
        $date       =   date('Y-m-d H:m:s');
        $select     =   "select id_user from user where adresse_user='$adresse';";
        $first_qry =   mysqli_query($conn,$select);
        // verification text de notification 
        if(empty($notif))
        {
            $error[]="<span>le contenu de notification est vide !</span>";
        }
        //les requettes
        
        if($first_qry)
        {
            while($id=mysqli_fetch_array($first_qry))
            {
                $id_user=$id[0]; // id utilisateur
            }
        }
        if(empty($error))
        {
            $insert           =  "INSERT INTO `notification` (`id_user`, `date_notif`, `text_notif`) VALUES ('$id_user', '$date', '$notif');";
            $second_qry  =   mysqli_query($conn,$insert);
            if($second_qry)
            {
                $_SESSION['suc_notif']="<div class='alert alert-success alert-dismissible fade show recherche_alert' role='alert' id='suc'>
                            <strong>Yupp</strong> votre notification envoyer avec succes.
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
                 $_SESSION['err_notif']="<div class='alert alert-danger alert-dismissible fade show recherche_alert' role='alert' id='err'>
                            <strong>Error</strong> code erreur (#nf40).
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
            foreach($error as $err)
            {
                $_SESSION['err_notif']="<div class='alert alert-danger alert-dismissible fade show recherche_alert' role='alert' id='err'>
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