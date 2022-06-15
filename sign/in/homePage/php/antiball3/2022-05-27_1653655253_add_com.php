<?php
include "connexion.php";
if(isset($_GET['id']) and !empty($_GET['id'])){

    $get_
}














$id=$_POST['id'] ;
$contenus=$_POST['contenus'] ;
$pseudo=$_POST['pseudo'] ;

$sql="insert into commentaire(id,pseudo,contenus,)values('$id','$contenus','$pseudo')";
$req=mysqli_query($con,$sql);
if(isset($_POST['submit_commentaire'])) {
    if(isset($_POST['pseudo'],$_POST['commentaire']) and !empty($_POST['pseudo']) and !empty($_POST['commentaire']))
    {
     $pseudo = htmlspecialchars($_POST['pseudo']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        if(strlen($pseudo) < 20) {

       } else{
          $c_erreur = "le pseudo doit faire mois de 20 caractaires  ";
        }
    }else{
      $c_erreur = "tout les chanps doivent etre completes";
    }
    
//}
?>