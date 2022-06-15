<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('conn.php');
    // Check connection
    if ($conn->connect_error) 
    {
        $_SESSION['msg']="Connection failed: ";
        header('location:inscription.php');
        exit;
    }
    else
    {
        $statut="en ligne";
    }
        //les variables..
     @$nom                  =       filter_var($_POST['T1'], FILTER_SANITIZE_STRING);
      @$pre                   =       filter_var($_POST['T2'], FILTER_SANITIZE_STRING);
      @$cin                    =      filter_var($_POST['T3'], FILTER_SANITIZE_NUMBER_INT);
      @$sexe                 =      filter_var($_POST['R1'], FILTER_SANITIZE_STRING);
      @$photo_profile    =      $sexe.".png";
    if(isset($_POST['a'])&&isset($_POST['m'])&&isset($_POST['j']))
    {
      @$date_naiss=filter_var($_POST['a'],FILTER_SANITIZE_NUMBER_INT ).'-'.filter_var($_POST['m'], FILTER_SANITIZE_NUMBER_INT).'-'.filter_var($_POST['j'], FILTER_SANITIZE_NUMBER_INT);
    }
    if(isset($_POST['D1']))
    {
      @$etat=filter_var($_POST['D1'], FILTER_SANITIZE_STRING);  
    }
      @$tel=filter_var($_POST['T4'],FILTER_SANITIZE_NUMBER_INT );  
      @$email=filter_var($_POST['T5'],FILTER_SANITIZE_EMAIL );  
     @ $pass=$_POST['T6'];  

       //start hashing password..
        $hashpass=password_hash($pass,PASSWORD_DEFAULT);

        //end hashing password..

    if(isset($_POST['f']))
    {
      @$fil=filter_var($_POST['f'], FILTER_SANITIZE_STRING);  
    }
    if(isset($_POST['g']))
    {
    @$groupe=filter_var($_POST['g'] , FILTER_SANITIZE_STRING);  
    }
     // verification form inputs..
        if (empty($nom) || empty($pre) || empty($cin) || empty($sexe)|| empty($email) || empty($date_naiss ) || empty($pass ) || (filter_var($email,FILTER_VALIDATE_EMAIL)==false)|| (filter_var($nom,FILTER_VALIDATE_INT)==true)|| (filter_var($pre,FILTER_VALIDATE_INT)==true)||(filter_var($tel,FILTER_VALIDATE_INT)==false)|| (filter_var($sexe,FILTER_VALIDATE_INT)==true)|| (strlen($cin)<8)|| (strlen($tel)<8)||(strlen($tel)<8)||(strlen($pass)<8)||(strlen($nom)<3)||(strlen($pre)<3))
        {
            $_SESSION['msg']="Erreur : il faut remplir vos vrai informations !";
             header('location:inscription.php#error');
                    exit;
        } 
        else 
        {   
            @$idu = substr($cin,2,5).substr($cin,-3).substr($tel,3);
    @$id=substr($nom,0,3).substr($pre,3).substr($cin,-1).substr($tel,-1);

            @$today = date("Y-m-d H:m:s");  

    // mysql codes..

            $select = mysqli_query($conn, "SELECT * FROM profile WHERE id_profile='$id' or cin_user='$cin'");
            $selectt=mysqli_query($conn, "SELECT * FROM user WHERE  adresse_user='$email'");
            @$nbr=mysqli_num_rows($select);
            @$nbrr=mysqli_num_rows($selectt);

            if ($nbr!=1 && $nbrr!=1) 
                {
                $vk=md5(time().$hashpass);// acces token..or verification key
    @$sql = "INSERT INTO `profile` (`id_profile`, `cin_user`, `nom_user`, `prenom_user`, `date_naissance`, `sexe`, `etat_user`, `telephone`, `date_inscription` ,photo_profile,vk,verifier,date_veirfier) VALUES ('$id', '$cin', '$nom', '$pre', '$date_naiss', '$sexe', '$etat', '$tel', '$today', '$photo_profile','$vk','non','');";
    @$sql1="INSERT INTO `user` (`id_user`, `adresse_user`, `password_user`, `type_user`, `id_profile`) VALUES ('$idu', '$email', '$hashpass', 'user', '$id');";
    @$sql2="INSERT INTO `filiere` (`nom_filiere`, `cin_user`) VALUES ('$fil', '$cin');";
    @$sql3="INSERT INTO `groupe` (`num_groupe`, `cin_user`) VALUES ('$groupe', '$cin');";

            if (mysqli_query($conn, $sql1))
                {
                    $_SESSION['succs']= 1;
                } 
                    else
                        {
                            $_SESSION['succs']= 0;
                        }
                          if (mysqli_query($conn, $sql2))
                {
                  $_SESSION['succs']= 1;
                } 
                    else
                        {
                            $_SESSION['succs']= 0;
                        }
            if (mysqli_query($conn, $sql3))
                {
                    $_SESSION['succs']= 1;
                } 
                    else
                        {
                        $_SESSION['succs']= 0;
                        }  

        if (mysqli_query($conn, $sql))
            {      
                $_SESSION['succs']= 1;
            } 
            else
            {
                $_SESSION['succs']= 0;
            }
                if($_SESSION['succs']==1)
                {
                    $_SESSION['yes']= "inscription avec succés";
                    header('location:inscription.php#yes');
                    exit;
                }
                else
                {
                  $_SESSION['msg']= "désolé un probleme technique lors de l'inscription !";  
                    header('location:inscription.php');
                    exit;
                }

    }
            else
                {
                    $_SESSION['msg']="Vous avez déja un compte !";
                    header('location:inscription.php');
                    exit;
                }

        }

    $conn->close();
}
else
{
    header('location:inscription.php');
    exit;
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
    <title>Connexion..</title>

</head>
<body>
    <div class="box">
    <div class="head">Statut de votre inscription : <span id="statut"><?php echo "$statut"; ?></span></div>
    <div class="body" id="msg"><?php echo "$msg"; ?></div>
    <div class="footer">Vous serez automatiquement dirigé vers la page de connexion après : <span id="countDown"></span></div>
    </div>
    <style>
        .box{
        position: absolute;
            top: 50%;
            left:50%;
            transform: translate(-50%,-50%);
            width: 60%;
            height: 60%;
            background: #ccc;
            border-radius: 15px;
        }
        .head{
            content: "message :";
            padding: 2%;
            height: 10%;
            background: #eee;
            border-radius: 15px 15px 0px 0px;
            font-family:arial;
            font-size: 100%;
            color:dimgrey;
        }
        #statut{
            font-family: monospace;
        }
        .body{
            background: #ddd;
            padding: 2%;
            text-align: center;
            position: relative;
            align-items:center;
            align-content: center;
            font-family:cursive;
            font-weight: bold;
            height: 60%;
            overflow-y: scroll;
        }
        .footer{
            padding: 2%;
            color: saddlebrown;
            font-family: monospace;
        }
        #countDown{
            color : red;
            font-family: arial;
        }
    </style>
        <script>
    if (document.getElementById('statut').innerHTML=="en ligne")
        {
            document.getElementById('statut').style.color="green";
        }
        else{
            document.getElementById('statut').style.color="red";
        }
    if (document.getElementById('msg').innerHTML=="Votre compte a été créé avec succès")
        {
            document.getElementById('msg').style.color="green";
             var count =10;
setInterval(function(){
    count--;
    document.getElementById('countDown').innerHTML =count;
    if (count == 0) {
        window.location = '/blog/login.php'; 
    }
},500);
        }
            else{
                document.getElementById('msg').style.color="red";
                 var count = 5;
setInterval(function(){
    count--;
    document.getElementById('countDown').innerHTML =count;
    if (count == 0) {
        window.location = '/blog/inscription.php'; 
    }
},1000);
            }
     
    </script>
</body>
</html>
