     <form class="center-block" method="post" action="list_etud.php">
                       <?php 
                        include('conn.php');
                        $select_etud   ="select* from profile , user where user.id_profile=profile.id_profile and profile.etat_user LIKE '%Etudient(e)';";
                        $query_etud=mysqli_query($conn,$select_etud);
                       if(isset($_POST['id']))
                        {
                           $id=$_POST['id'];
                           $select_user             =   "select* from profile , user , filiere , groupe where filiere.cin_user=profile.cin_user AND groupe.cin_user=profile.cin_user and user.id_profile=profile.id_profile and user.id_user='$id'";
                           $querySelect           =   mysqli_query($conn,$select_user);
                           if($querySelect)
                           {
                               while($val=mysqli_fetch_array($querySelect))
                               {
                                  $namephoto  =$val[9];
                                  $photo         ="../../blog/upload/images/".$val[9]; 
                                  $id_user      =$val[13]; 
                                  $id_profile    =$val[0]; 
                                  $cin              =$val[1]; 
                                  $etat_compte=$val[11]; 
                                  $vk               =$val[10]; 
                                  $dat_ins        =$val[8]; 
                                  $nom            =$val[3]; 
                                  $prenom       =$val[2]; 
                                  $sexe            =$val[5]; 
                                  $date_naiss   =$val[4]; 
                                  $mail             =$val[14]; 
                                  $pass             =$val[15]; 
                                  $tel                =$val[7]; 
                                  $fil                 =$val[18]; 
                                  $grp               =$val[20]; 
                                  $type              =$val[16]; 
                               }
                           }
                          
                       echo"<img src='$photo' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                       else
                       {
                        echo"<img src='../../blog/upload/images/Homme.png' class='img-fluid img-thumbnail img-circle' alt='photo de profile'>";
                       }
                        if(isset($_POST['etudupdate']))
                            {
                                //les variables
                                  $cin              =$_POST['etudcin'];
                                  $etat_compte=$_POST['etudetat'];
                                  $dat_ins        =$_POST['etuddatenaiss'];
                                  $nom            =$_POST['etudnom'];
                                  $prenom       =$_POST['etudpre'];
                                  $sexe            =$_POST['etudsexe'];
                                  $date_naiss   =$_POST['etuddatenaiss'];
                                  $mail             =$_POST['etudemail'];
                                  $pass             =$_POST['etudpass']; 
                                  $tel                =$_POST['etudtel'];
                                  $fil                 =$_POST['etudfil'];
                                  $grp               =$_POST['etudgrp'];
                                  $type              =$_POST['etudtype'];
                                  $id                  =$_POST['etudidprofile'];
                             $update="update profile set profile.cin_user='$cin',profile.verifier='$etat_compte', profile.nom_user='$prenom' ,profile.prenom_user='$nom' , profile.date_naissance='$date_naiss' , profile.sexe='$sexe' , profile.telephone='$tel' where profile.id_profile='$id';";
                             $query_update=mysqli_query($conn,$update);
                                if($query_update)
                                            {
                                                echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                              <strong>Yesss $id</strong> mise ajour avec succes
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
                            if(isset($_POST['tuddelete']))
                            {
                                $id                  =$_POST['etudidprofile'];
                                $delete="delete from profile where id_profile='$id';";
                                $query_delete=mysqli_query($conn,$delete);
                                if($query_delete)
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
                            <input type="text" class="form-control" id="tof"  placeholder="Entrer le nom de photo" <?php  if(isset($_POST['id']))
                        {echo "value="."'".$namephoto."'";}?> disabled>
                      </div> 
                       <div class="form-group">
                            <label for="id_user">id user</label>
                            <input type="number" class="form-control" id="id_user" placeholder="Enter id user" <?php if(isset($_POST['id']))
                        {echo  "value=$id_user";}?> disabled >
                      </div>
                       <div class="form-group">
                            <input type="hidden" class="form-control" id="id" placeholder="Enter id profile"  <?php if(isset($_POST['id']))
                        {echo "value=$id_profile";}?> name="etudidprofile">
                      </div>
                       <div class="form-group">
                            <label for="cin">C.I.N</label>
                            <input type="text" class="form-control" id="cin" placeholder="Enter cin" <?php if(isset($_POST['id']))
                        {echo "value=$cin";}?> name="etudcin">
                      </div>
                       <div class="form-group">
                            <label for="etat_compte">Etat de compte</label>
                            <input type="text" class="form-control" id="etat_compte" placeholder="Enter etat de compte" <?php if(isset($_POST['id']))
                        {echo "value=$etat_compte";}?> name="etudetat">
                      </div>
                       <div class="form-group">
                            <label for="vk">Clé de validation</label>
                            <input type="text" class="form-control" id="vk" placeholder="Entre le clé de validation"  <?php if(isset($_POST['id']))
                        {echo "value="."'".$vk."'";}?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="date_insc">Date d'inscription</label>
                            <input type="text" class="form-control" id="date_insc" placeholder="Entrer la date d'inscription" <?php if(isset($_POST['id']))
                        {echo 'value='."'".$dat_ins."'"; }?> disabled>
                      </div>
                       <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Enter nom" <?php if(isset($_POST['id']))
                        {echo "value=$nom";}?> name="etudnom">
                      </div>
                       <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Enter prenom"<?php if(isset($_POST['id']))
                        {echo "value="."'".$prenom."'";}?> name="etudpre">
                      </div>
                       <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <input type="text" class="form-control" id="sexe" placeholder="Entrer sexe" <?php if(isset($_POST['id']))
                        {echo "value=$sexe";}?> name="etudsexe">
                      </div>
                       <div class="form-group">
                            <label for="date_naiss">Date de naissance</label>
                            <input type="text" class="form-control" id="date_naiss" placeholder="Enter date" <?php if(isset($_POST['id']))
                        {echo "value=$date_naiss";}?> name="etuddatenaiss">
                      </div>
                      <div class="form-group">
                            <label for="exampleInputEmail1">Adresse Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" <?php if(isset($_POST['id']))
                        {echo "value=$mail";}?> name="etudemail">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" <?php if(isset($_POST['id']))
                        {echo "value=$pass";}?> name="etudpass">
                      </div>
                       <div class="form-group">
                            <label for="Telephone">Téléphone</label>
                            <input type="number" class="form-control" id="Telephone" placeholder="Enter Téléphone" <?php if(isset($_POST['id']))
                        {echo "value=$tel";}?> name="etudtel">
                      </div>
                       <div class="form-group">
                            <label for="fil">Filliére</label>
                            <input type="text" class="form-control" id="fil" placeholder="Enter filliére" <?php if(isset($_POST['id']))
                        {echo "value=$fil";}?> name="etudfil">
                      </div>
                       <div class="form-group">
                            <label for="grp">Groupe</label>
                            <input type="text" class="form-control" id="grp" placeholder="Enter groupe" <?php if(isset($_POST['id']))
                        {echo "value=$grp";}?> name="etudgrp">
                      </div>
                    <div class="form-group">   
                    <label for="select1">Type user</label>   
                    <select class="form-control" id="select1"name="etudtype">    
                      <option <?php if(isset($_POST['id']))
                        {echo "value="."'".$type."'";}?>><?php if(isset($_POST['id']))
                        {echo $type;}?></option>
                      <option value="admin">admin</option>
                      <option value="super admin">super admin</option>
                      <option value="user">user</option>
                    </select>
                    </div>    
                      <button type="submit" class="btn btn-primary" name="etudupdate">Enregitrer</button>
                      <button type="submit" class="btn btn-danger" name="etuddelete">Supprimer</button>
                </form>
              