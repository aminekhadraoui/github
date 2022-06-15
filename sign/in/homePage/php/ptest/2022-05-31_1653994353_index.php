<?php 
//start code php
ob_start();
session_start();
$_SESSION['page']="index.php";
if(isset($_SESSION['user']))
{
    if($_SESSION['type']=="super admin")
    {
 include("conn.php");
 @$select             =  "select* from profile , user where user.id_profile=profile.id_profile and user.type_user LIKE '%admin';";
 @$query_select =   mysqli_query(@$conn,@$select);
 @$select_etud   ="select* from profile , user where user.id_profile=profile.id_profile and profile.etat_user LIKE '%Etudient(e)';";      
 @$select_prof   ="select* from profile , user where user.id_profile=profile.id_profile and profile.etat_user LIKE '%Enseignient(e)';";      
 @$query_etud=mysqli_query(@$conn,@$select_etud);
 @$query_prof  =mysqli_query(@$conn,@$select_prof);
        // clear all data input
@$namephoto  ="Aucun_enregistrement";
@$photo         ="../../blog/upload/images/Homme.png"; 
$id_user      ="Aucun_enregistrement";
$id_profile    ="Aucun_enregistrement";
@$cin              ="Aucun_enregistrement";
@$etat_compte="Aucun_enregistrement";
@$vk               ="Aucun_enregistrement";
@$dat_ins        ="Aucun_enregistrement"; 
@$nom            ="Aucun_enregistrement"; 
@$prenom       ="Aucun_enregistrement"; 
@$sexe            ="Aucun_enregistrement";
@$date_naiss   ="Aucun_enregistrement";
@$mail             ="Aucun_enregistrement";
/*@$pass             ="Aucun_enregistrement";*/
@$tel                ="Aucun_enregistrement";
@$fil                 ="Aucun_enregistrement";
@$grp               ="Aucun_enregistrement";
@$type              ="Aucun_enregistrement";
?>
<!doctype html>
<html lang="fr">
    <!-- COPYRIGHT malek syrine -->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/mystyle.css">
    <title>Panneau de configuration</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand float-left" href="#"><h1>Admin</h1></a>
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MalekNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse float-right" id="MalekNav">
            <ul class=" nav navbar-nav navbar float-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"  href="profile.php">Profile</a>
                  <a class="dropdown-item" href="Gestion.php">Gestion des privélléges</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../logout.php">Déconnexion</a>
                </div>
              </li>
            </ul>
          </div>
</nav>
      <div class="container-malek">
        <div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" aria-selected="true">Accueil</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-etudients" role="tab" aria-controls="profile" aria-selected="false">Etudients</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-enseignents" role="tab" aria-controls="messages" aria-selected="false">Enseignents</a>
      <a class="list-group-item list-group-item-action " id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings" aria-selected="false">Parametre</a>
    </div>
    <div class="copy text-center">&copy; malek syrine </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="row">
            <div class=" col-lg-4 col-md-6">
                <?php 
                    // Nombre de publication
                    $select_nbr_pub ="select * from publication";
                    $qry_nbr_pub     =mysqli_query($conn,$select_nbr_pub);
                    $nbr_pub            =mysqli_num_rows($qry_nbr_pub);
                ?>
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Nombre de publications</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nbr_pub; ?></h5>
                    </div>
                </div>
            </div>  
            <div class=" col-lg-4 col-md-6">
                <?php 
                    // Nombre de utilisateur totale
                    $select_nbr_user ="select * from profile";
                    $qry_nbr_user    =mysqli_query($conn,$select_nbr_user);
                    $nbr_user            =mysqli_num_rows($qry_nbr_user);
                ?>
                <div class="card text-white bg-danger mb-3">
                  <div class="card-header">Nombre des utilisateur</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $nbr_user; ?></h5>
                  </div>
               </div>
            </div>  
            <div class=" col-lg-4 col-md-6">
                <div class="card text-white bg-primary mb-3">
                  <div class="card-header">Utilisateur/semaine</div>
                  <div class="card-body">
                    <h5 class="card-title">5</h5>
                </div>
            </div>
            </div>
            <div class=" col-lg-4 col-md-6">
                <?php 
                    // Nombre des etudients
                    $select_nbr_etud ="select * from profile where etat_user='Etudient(e)';";
                    $qry_nbr_etud    =mysqli_query($conn,$select_nbr_etud);
                    $nbr_etud            =mysqli_num_rows($qry_nbr_etud);
                ?>
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Nombre de etudients</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nbr_etud; ?></h5>
                    </div>
                </div>
            </div>  
            <div class=" col-lg-4 col-md-6">
                <?php 
                    // Nombre des professieurs
                    $select_nbr_prof ="select * from profile where etat_user='Enseignient(e)';";
                    $qry_nbr_prof    =mysqli_query($conn,$select_nbr_prof);
                    $nbr_prof            =mysqli_num_rows($qry_nbr_prof);
                ?>
                <div class="card text-white bg-info mb-3">
                  <div class="card-header">Nombre des professieurs</div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $nbr_prof; ?></h5>
                  </div>
               </div>
            </div>  
            <div class=" col-lg-4 col-md-6">
                <div class="card text-white bg-dark mb-3">
                  <div class="card-header">Nombre des visiteurs</div>
                  <div class="card-body">
                    <h5 class="card-title">5</h5>
                </div>
            </div>
            </div>
        </div>
        
      </div>
      <div class="tab-pane fade " id="list-etudients" role="tabpanel" aria-labelledby="list-profile-list">
           <div class="row">
               <div class=" col-lg-8 col-md-12">
                <table class="table table-striped">
            <thead>
                <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Adresse E-mail</th>
                      <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                    if(@$query_etud)
                    {
                        $i=1; // compteur de la liste 
                        $id=0; // compteur de la liste 
                        while($list=mysqli_fetch_array(@$query_etud))
                        {
                            
                            echo"
                                <tbody>
                                    <tr>
                                      <th scope='row'>$i</th>
                                      <td>$list[3]</td>
                                      <td>$list[2]</td>
                                      <td>$list[14]</td>
                                      <td>
                                      <a href='?idEtudient=$list[13]' class='btn btn-outline-info infoinfoo'>Information</a>
                                      </td>
                                    </tr>
                              </tbody>"; 
                            $i++;
                            $id++;
                        }
                    }
                ?>
        </table>
                </div>
               <div class=" col-lg-4 col-md-12">
                   <div id="result">
                       <!--start  form etudient-->
                   <form class="center-block" method="post" action="gestion.php" id="form2">
                       <?php 
                       if(isset($_GET['idEtudient']))
                        {
                           $id=$_GET['idEtudient'];
                           @$select_user             =   "select* from profile , user , filiere , groupe where filiere.cin_user=profile.cin_user AND groupe.cin_user=profile.cin_user and user.id_profile=profile.id_profile and user.id_user='$id'";
                           @$querySelect           =   mysqli_query(@$conn,@$select_user);
                           if(@$querySelect)
                           {
                               while($val=mysqli_fetch_array(@$querySelect))
                               {
                                  @$namephoto  =$val[9];
                                  @$photo         ="../../blog/upload/images/".$val[9]; 
                                  $id_user      =$val[13]; 
                                  $id_profile    =$val[0]; 
                                  @$cin              =$val[1]; 
                                  @$etat_compte=$val[11]; 
                                  @$vk               =$val[10]; 
                                  @$dat_ins        =$val[8]; 
                                  @$nom            =$val[3]; 
                                  @$prenom       =$val[2]; 
                                  @$sexe            =$val[5]; 
                                  @$date_naiss   =$val[4]; 
                                  @$mail             =$val[14]; 
                                  @$pass             =$val[15]; 
                                  @$tel                =$val[7]; 
                                  @$fil                 =$val[18]; 
                                  @$grp               =$val[20]; 
                                  @$type              =$val[16]; 
                               }
                           }
                          // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action active')</script>";
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade active show')</script>";
                           
                       echo"<img src='$photo' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                       else
                       {
                        echo"<img src='../../blog/upload/images/Homme.png' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                        // update etudient
                        if(isset($_POST['etudupdate']))
                            {
                                //les variables
                                  @$cin              =$_POST['etudcin'];
                                  @$etat_compte=$_POST['etudetat'];
                                  @$dat_ins        =$_POST['etuddatenaiss'];
                                  @$nom            =$_POST['etudnom'];
                                  @$prenom       =$_POST['etudpre'];
                                  @$sexe            =$_POST['etudsexe'];
                                  @$date_naiss   =$_POST['etuddatenaiss'];
                                  @$mail             =$_POST['etudemail'];
                                  @$pass             =$_POST['etudpass']; 
                                  @$tel                =$_POST['etudtel'];
                                  @$fil                 =$_POST['etudfil'];
                                  @$grp               =$_POST['etudgrp'];
                                  @$type              =$_POST['etudtype'];
                                  $id                  =$_POST['etudidprofile'];
                             @$update="update profile set profile.cin_user='$cin',profile.verifier='$etat_compte', profile.nom_user='$prenom' ,profile.prenom_user='$nom' , profile.date_naissance='$date_naiss' , profile.sexe='$sexe' , profile.telephone='$tel' where profile.id_profile='$id';";
                             $query_update=mysqli_query($conn,@$update);
                                if(@$query_update)
                                            {
                                                echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                              <strong>Yesss</strong> mise ajour avec succes
                                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>×</span>
                                                              </button>
                                                        </div>";
                                            }
                                    else
                                {
                                      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                              <strong>Erreur ! </strong> code error(#gs176).
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";  
                                }
                            }
                            //delete etudient
                            if(isset($_POST['etuddelete']))
                            {
                                $id                  =$_POST['etudidprofile'];
                                @$delete="delete from profile where id_profile='$id';";
                                @$query_delete=mysqli_query(@$conn,@$delete);
                                if(@$query_delete)
                                 {
                                     echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                              <strong>Yesss</strong> supprission avec success
                                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>×</span>
                                                              </button>
                                                        </div>";
                                    }
                                    else
                                    {
                                      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    <strong>Erreur ! </strong> code error(#gs199)
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";  
                                    }
                            }
                        ?>
                       <div class="form-group" >
                            <label for="tof">Photo de profile</label>
                            <input type="text" class="form-control" id="tof"  placeholder="Entrer le nom de photo" <?php  if(isset($_GET['idEtudient']))
                        {echo "value="."'".$namephoto."'";}?> disabled>
                      </div> 
                       <div class="form-group">
                            <label for="id_user">id user</label>
                            <input type="number" class="form-control" id="id_user" placeholder="Enter id user" <?php if(isset($_GET['idEtudient']))
                        {echo  "value=$id_user";}?> disabled >
                      </div>
                       <div class="form-group">
                            <input type="hidden" class="form-control" id="id" placeholder="Enter id profile"  <?php if(isset($_GET['idEtudient']))
                        {echo "value=$id_profile";}?> name="etudidprofile">
                      </div>
                       <div class="form-group">
                            <label for="cin">C.I.N</label>
                            <input type="text" class="form-control" id="cin" placeholder="Enter cin" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$cin";}?> name="etudcin">
                      </div>
                       <div class="form-group">
                            <label for="etat_compte">Etat de compte</label>
                            <input type="text" class="form-control" id="etat_compte" placeholder="Enter etat de compte" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$etat_compte";}?> name="etudetat">
                      </div>
                       <div class="form-group">
                            <label for="vk">Clé de validation</label>
                            <input type="text" class="form-control" id="vk" placeholder="Entre le clé de validation"  <?php if(isset($_GET['idEtudient']))
                        {echo "value="."'".$vk."'";}?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="date_insc">Date d'inscription</label>
                            <input type="text" class="form-control" id="date_insc" placeholder="Entrer la date d'inscription" <?php if(isset($_GET['idEtudient']))
                        {echo 'value='."'".$dat_ins."'"; }?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Enter nom" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$nom";}?> name="etudnom">
                      </div>
                       <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Enter prenom"<?php if(isset($_GET['idEtudient']))
                        {echo "value="."'".$prenom."'";}?> name="etudpre">
                      </div>
                       <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <input type="text" class="form-control" id="sexe" placeholder="Entrer sexe" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$sexe";}?> name="etudsexe">
                      </div>
                       <div class="form-group">
                            <label for="date_naiss">Date de naissance</label>
                            <input type="text" class="form-control" id="date_naiss" placeholder="Enter date" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$date_naiss";}?> name="etuddatenaiss">
                      </div>
                      <div class="form-group">
                            <label for="exampleInputEmail1">Adresse Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$mail";}?> name="etudemail">
                      </div>
                       <div class="form-group">
                            <label for="Telephone">Téléphone</label>
                            <input type="number" class="form-control" id="Telephone" placeholder="Enter Téléphone" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$tel";}?> name="etudtel">
                      </div>
                       <div class="form-group">
                            <label for="fil">Filliére</label>
                            <input type="text" class="form-control" id="fil" placeholder="Enter filliére" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$fil";}?> name="etudfil">
                      </div>
                       <div class="form-group">
                            <label for="grp">Groupe</label>
                            <input type="text" class="form-control" id="grp" placeholder="Enter groupe" <?php if(isset($_GET['idEtudient']))
                        {echo "value=$grp";}?> name="etudgrp">
                      </div>
                    <div class="form-group">   
                    <label for="select1">Type user</label>   
                    <select class="form-control" id="select1"name="etudtype">    
                      <option <?php if(isset($_GET['idEtudient']))
                        {echo "value="."'".$type."'";}?>><?php if(isset($_GET['idEtudient']))
                        {echo $type;}?></option>
                      <option value="admin">admin</option>
                      <option value="super admin">super admin</option>
                      <option value="user">user</option>
                    </select>
                    </div>    
                      <button type="submit" class="btn btn-primary" name="etudupdate">Enregitrer</button>
                      <button type="submit" class="btn btn-danger" name="etuddelete">Supprimer</button>
                </form>
                        <!--end form etudient-->
</div>
 </div>
            </div>
        </div>
      <div class="tab-pane fade" id="list-enseignents" role="tabpanel" aria-labelledby="list-messages-list">
           <div class="row">
               <div class=" col-lg-8 col-md-12">
                <table class="table table-striped">
            <thead>
                <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Adresse E-mail</th>
                      <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                    if(@$query_prof)
                    {
                        $i=1; // compteur de la liste 
                        while($list=mysqli_fetch_array(@$query_prof))
                        {
                            
                            echo"
                                <tbody>
                                    <tr>
                                      <th scope='row'>$i</th>
                                      <td>$list[3]</td>
                                      <td>$list[2]</td>
                                      <td>$list[14]</td>
                                      <td><a href='?id=$list[13]' class='btn btn-outline-info'>Information</a></td>
                                    </tr>
                              </tbody>"; 
                            $i++;
                        }
                    }
                ?>
        </table>
                </div>
               <div class=" col-lg-4 col-md-12">
                   <!--start form prof-->
                <form class="center-block" method="post" action="gestion.php" id="form2">
                       <?php 
                       if(isset($_GET['id']))
                        {
                           $id=$_GET['id'];
                           @$select_user             =   "select* from profile , user where user.id_profile=profile.id_profile and user.id_user='$id'";
                           @$querySelect           =   mysqli_query(@$conn,@$select_user);
                           if(@$querySelect)
                           {
                               while($val=mysqli_fetch_array(@$querySelect))
                               {
                                  @$namephoto  =$val[9];
                                  @$photo         ="../../blog/upload/images/".$val[9]; 
                                  $id_user      =$val[13]; 
                                  $id_profile    =$val[0]; 
                                  @$cin              =$val[1]; 
                                  @$etat_compte=$val[11]; 
                                  @$vk               =$val[10]; 
                                  @$dat_ins        =$val[8]; 
                                  @$nom            =$val[3]; 
                                  @$prenom       =$val[2]; 
                                  @$sexe            =$val[5]; 
                                  @$date_naiss   =$val[4]; 
                                  @$mail             =$val[14]; 
                                  @$pass             =$val[15]; 
                                  @$tel                =$val[7]; 
                                  @$fil                 =$val[18]; 
                                  @$grp               =$val[20]; 
                                  @$type              =$val[16]; 
                               }
                           }
                        // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                            echo"<script>document.getElementById('list-enseignents').setAttribute('class','tab-pane fade active show')</script>";
                           
                            echo"<script>document.getElementById('list-messages-list').setAttribute('class','list-group-item list-group-item-action active')</script>"; 
                           
                       echo"<img src='$photo' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                       else
                       {
                        echo"<img src='../../blog/upload/images/Homme.png' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                        // update prof
                        if(isset($_POST['profupdate']))
                            {
                                //les variables
                                  @$cin              =$_POST['profcin'];
                                  @$etat_compte=$_POST['profetat'];
                                  @$dat_ins        =$_POST['profdatenaiss'];
                                  @$nom            =$_POST['profnom'];
                                  @$prenom       =$_POST['profpre'];
                                  @$sexe            =$_POST['profsexe'];
                                  @$date_naiss   =$_POST['profdatenaiss'];
                                  @$mail             =$_POST['profemail'];
                                  @$pass             =$_POST['profpass']; 
                                  @$tel                =$_POST['proftel'];
                                  @$fil                 =$_POST['proffil'];
                                  @$grp               =$_POST['profgrp'];
                                  @$type              =$_POST['proftype'];
                                  $id                  =$_POST['profidprofile'];
                             @$update="update profile set profile.cin_user='$cin',profile.verifier='$etat_compte', profile.nom_user='$prenom' ,profile.prenom_user='$nom' , profile.date_naissance='$date_naiss' , profile.sexe='$sexe' , profile.telephone='$tel' where profile.id_profile='$id';";
                             @$query_update=mysqli_query(@$conn,@$update);
                                if(@$query_update)
                                            {
                                                echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                              <strong>Yesss </strong> mise ajour avec succes
                                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>×</span>
                                                              </button>
                                                        </div>";
                                            }
                                    else
                                {
                                      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                              <strong>Erreur ! </strong> code error(#gs176).
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";  
                                }
                            }
                            //delete prof
                            if(isset($_POST['profdelete']))
                            {
                                $id                  =$_POST['profidprofile'];
                                @$delete="delete from profile where id_profile='$id';";
                                @$query_delete=mysqli_query(@$conn,@$delete);
                                if(@$query_delete)
                                 {
                                     echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                              <strong>Yesss</strong> supprission avec success
                                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                                <span aria-hidden='true'>×</span>
                                                              </button>
                                                        </div>";
                                    }
                                    else
                                    {
                                      echo"<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    <strong>Erreur ! </strong> code error(#gs199)
                                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>×</span>
                                              </button>
                                            </div>";  
                                    }
                            }
                        ?>
                       <div class="form-group" >
                            <label for="tof">Photo de profile</label>
                            <input type="text" class="form-control" id="tof"  placeholder="Entrer le nom de photo" <?php  if(isset($_GET['id']))
                        {echo "value="."'".$namephoto."'";}?> disabled>
                      </div> 
                       <div class="form-group">
                            <label for="id_user">id user</label>
                            <input type="number" class="form-control" id="id_user" placeholder="Enter id user" <?php if(isset($_GET['id']))
                        {echo  "value=$id_user";}?> disabled >
                      </div>
                       <div class="form-group">
                            <input type="hidden" class="form-control" id="id" placeholder="Enter id profile"  <?php if(isset($_GET['id']))
                        {echo "value=$id_profile";}?> name="profidprofile">
                      </div>
                       <div class="form-group">
                            <label for="cin">C.I.N</label>
                            <input type="text" class="form-control" id="cin" placeholder="Enter cin" <?php if(isset($_GET['id']))
                        {echo "value=$cin";}?> name="profcin">
                      </div>
                       <div class="form-group">
                            <label for="etat_compte">Etat de compte</label>
                            <input type="text" class="form-control" id="etat_compte" placeholder="Enter etat de compte" <?php if(isset($_GET['id']))
                        {echo "value=$etat_compte";}?> name="profetat">
                      </div>
                       <div class="form-group">
                            <label for="vk">Clé de validation</label>
                            <input type="text" class="form-control" id="vk" placeholder="Entre le clé de validation"  <?php if(isset($_GET['id']))
                        {echo "value="."'".$vk."'";}?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="date_insc">Date d'inscription</label>
                            <input type="text" class="form-control" id="date_insc" placeholder="Entrer la date d'inscription" <?php if(isset($_GET['id']))
                        {echo 'value='."'".$dat_ins."'"; }?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Enter nom" <?php if(isset($_GET['id']))
                        {echo "value=$nom";}?> name="profnom">
                      </div>
                       <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Enter prenom"<?php if(isset($_GET['id']))
                        {echo "value="."'".$prenom."'";}?> name="profpre">
                      </div>
                       <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <input type="text" class="form-control" id="sexe" placeholder="Entrer sexe" <?php if(isset($_GET['id']))
                        {echo "value=$sexe";}?> name="profsexe">
                      </div>
                       <div class="form-group">
                            <label for="date_naiss">Date de naissance</label>
                            <input type="text" class="form-control" id="date_naiss" placeholder="Enter date" <?php if(isset($_GET['id']))
                        {echo "value=$date_naiss";}?> name="profdatenaiss">
                      </div>
                      <div class="form-group">
                            <label for="exampleInputEmail1">Adresse Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" <?php if(isset($_GET['id']))
                        {echo "value=$mail";}?> name="profemail">
                      </div>
                       <div class="form-group">
                            <label for="Telephone">Téléphone</label>
                            <input type="number" class="form-control" id="Telephone" placeholder="Enter Téléphone" <?php if(isset($_GET['id']))
                        {echo "value=$tel";}?> name="proftel">
                      </div>
                       <div class="form-group">
                            <label for="fil">Filliére</label>
                            <input type="text" class="form-control" id="fil" placeholder="Enter filliére" <?php if(isset($_GET['id']))
                        {echo "value=$fil";}?> name="proffil">
                      </div>
                       <div class="form-group">
                            <label for="grp">Groupe</label>
                            <input type="text" class="form-control" id="grp" placeholder="Enter groupe" <?php if(isset($_GET['id']))
                        {echo "value=$grp";}?> name="profgrp">
                      </div>
                    <div class="form-group">   
                    <label for="select1">Type user</label>   
                    <select class="form-control" id="select1"name="proftype">    
                      <option <?php if(isset($_GET['id']))
                        {echo "value="."'".$type."'";}?>><?php if(isset($_GET['id']))
                        {echo $type;}?></option>
                      <option value="admin">admin</option>
                      <option value="super admin">super admin</option>
                      <option value="user">user</option>
                    </select>
                    </div>    
                      <button type="submit" class="btn btn-primary" name="profupdate">Enregitrer</button>
                      <button type="submit" class="btn btn-danger" name="profdelete">Supprimer</button>
                </form>
              
                   <!--end from prof-->
               </div>
            </div>   
     </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <div class="container">
            <form class="center-block" action="notif.php" method="post" id="form_notif">
                <div class="form-group ">
                    <label for="notif">Ajouter Notification Publicique</label>
                    <textarea class="form-control" id="notif" name="text_notif"></textarea>
                    <button class="btn btn-outline-primary" id="btn_notif">Envoyer</button>
                </div>
                <div class="result_notif"></div>
                 <?php
                    if(isset($_SESSION['err_notif']))
                    {
                        // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                            echo"<script>document.getElementById('list-enseignents').setAttribute('class','tab-pane fade')</script>";
                            echo"<script>document.getElementById('list-settings').setAttribute('class','tab-pane fade active show')</script>";
                           
                            echo"<script>document.getElementById('list-messages-list').setAttribute('class','list-group-item list-group-item-action')</script>"; 
                            echo"<script>document.getElementById('list-settings-list').setAttribute('class','list-group-item list-group-item-action active')</script>"; 

                        $msg=$_SESSION['err_notif'];
                        echo $msg;
                        $_SESSION['err_notif']=NULL;
                    }
                    if(isset($_SESSION['suc_notif']))
                    {
                                                // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                            echo"<script>document.getElementById('list-enseignents').setAttribute('class','tab-pane fade')</script>";
                            echo"<script>document.getElementById('list-settings').setAttribute('class','tab-pane fade active show')</script>";
                           
                            echo"<script>document.getElementById('list-messages-list').setAttribute('class','list-group-item list-group-item-action')</script>"; 
                            echo"<script>document.getElementById('list-settings-list').setAttribute('class','list-group-item list-group-item-action active')</script>";
                        $msg=$_SESSION['suc_notif'];
                        echo $msg;
                        $_SESSION['suc_notif']=NULL;
                    }
                    ?>
                </form>
               <form method="post" action="msg.php" id="form_msg">
                <div class="form-group">
                    <label for="msg">Ajouter un message privé à : </label>
                    <input type="text" class="form-control" placeholder="Saisie CIN/Email de distinataire" name="dist">
                    <textarea class="form-control" id="msg" name="text_msg"></textarea>
                    <button class="btn btn-outline-success" id="btn_msg">Envoyer</button>
                </div>
                   <?php
                    if(isset($_SESSION['msg_err']))
                    {
                        // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                            echo"<script>document.getElementById('list-enseignents').setAttribute('class','tab-pane fade')</script>";
                            echo"<script>document.getElementById('list-settings').setAttribute('class','tab-pane fade active show')</script>";
                           
                            echo"<script>document.getElementById('list-messages-list').setAttribute('class','list-group-item list-group-item-action')</script>"; 
                            echo"<script>document.getElementById('list-settings-list').setAttribute('class','list-group-item list-group-item-action active')</script>"; 

                        $msg=$_SESSION['msg_err'];
                        echo $msg;
                        $_SESSION['msg_err']=NULL;
                    }
                    if(isset($_SESSION['msg_suc']))
                    {
                                                // script pour retour au element active 
                           echo"<script>document.getElementById('list-home-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                           echo"<script>document.getElementById('list-home').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-etudients').setAttribute('class','tab-pane fade')</script>";
                           
                           echo"<script>document.getElementById('list-profile-list').setAttribute('class','list-group-item list-group-item-action')</script>";
                           
                            echo"<script>document.getElementById('list-enseignents').setAttribute('class','tab-pane fade')</script>";
                            echo"<script>document.getElementById('list-settings').setAttribute('class','tab-pane fade active show')</script>";
                           
                            echo"<script>document.getElementById('list-messages-list').setAttribute('class','list-group-item list-group-item-action')</script>"; 
                            echo"<script>document.getElementById('list-settings-list').setAttribute('class','list-group-item list-group-item-action active')</script>";
                        $msg=$_SESSION['msg_suc'];
                        echo $msg;
                        $_SESSION['msg_suc']=NULL;
                    }
                    ?>
                <div class="result_msg"></div>   
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
      </div>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
        <?php
    }
    else
    {
        header("location:login.php");
        exit;
    }
}
    ?>
  </body>
</html>