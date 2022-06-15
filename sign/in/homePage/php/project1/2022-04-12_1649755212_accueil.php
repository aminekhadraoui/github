<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
    $_SESSION['page']="accueil.php";
     include('insertstyle.php');
    if($_SESSION['type']=="user")
    {
    include('conn.php');
    $mail=$_SESSION['user'];

    $query = "SELECT nom_user , prenom_user , type_user , user.id_user , photo_profile , cin_user , telephone , sexe , date_naissance , etat_user , nbr_visite FROM `user` , `profile` WHERE profile.`id_profile`= user.id_profile AND `adresse_user`='$mail' ;";


    $result =$conn->query($query);

    $row = $result->fetch_array(MYSQLI_NUM);

    // all data from the this user
$_SESSION['myid']                               =  $row[3]; //id user
$_SESSION['myname']                         =  $row[0]; // name of user
$_SESSION['myprenom']                      =  $row[1]; // lastname of user
$_SESSION['myphoto']                         =  $row[4]; //photo profile user
$_SESSION['mycin']                             =  $row[5]; // C.I.N user
$_SESSION['mysexe']                          =  $row[7];// sexe of user
$_SESSION['myetat']                           =  $row[9]; // etat of user (ensignient/etudient)
$_SESSION['mydatenaiss']                   =  $row[8];// birthday of user
$_SESSION['mytelephone']                  =  $row[6];// telephone number of user
$_SESSION['mytype']                          =  $row[2];// type of user(admin/simple user)
$_SESSION['myidprofil']                      =  $row[4];// user identification profile

    
if ($res = $conn->query("SELECT profile.nom_user , profile.prenom_user , publication.date_publication , publication.contenu_publication FROM `user` , PROFILE , publication WHERE user.id_profile=profile.id_profile and user.id_user=publication.id_user
")) 
    {
        $row_cnt = $res->num_rows;
    }
if ($resy = $conn->query("SELECT profile.nom_user , profile.prenom_user , publication.date_publication , publication.contenu_publication , publication.id_publication , profile.photo_profile  FROM `user` , PROFILE , publication WHERE user.id_profile=profile.id_profile and user.id_user=publication.id_user ORDER BY `publication`.`date_publication` DESC
")) 
    {
        $pub_cnt = $resy->num_rows;
    }

$query2="SELECT profile.nom_user , profile.prenom_user , publication.date_publication , publication.contenu_publication , publication.id_publication , profile.photo_profile,user.id_user  FROM `user` , PROFILE , publication WHERE user.id_profile=profile.id_profile and user.id_user=publication.id_user ORDER BY `publication`.`date_publication` DESC
";
        
$fil="select * from filiere where cin_user='$row[5]';";
$grp="select * from groupe where cin_user='$row[5]';";
$queryfil=mysqli_query($conn,$fil);
$querygrp=mysqli_query($conn,$grp);
if($queryfil)
{
    while($f=mysqli_fetch_array($queryfil))
    {
        @$filiere=$f[0];
    }
}
if($querygrp)
{
    while($g=mysqli_fetch_array($querygrp))
    {
        $groupe=$g[0];
    }
}
$path="/blog/upload/images/";
$photo_profil=$path.$_SESSION['myphoto'] ;
 ;
?>
<!doctype html>
<!-- COPYRIGHT : ismaik @2021-->
<html>
<!--start head-->
<head>
<title><?php echo"$row[0] $row[1]" ?></title>
<meta charset="utf-8">
        <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/css/all.min.css">
    <link rel='stylesheet' href="<?php echo $theme; ?>">
    <script src="js/jquery.js"></script>
    <script src="js/accueil.js"></script>
    </head>
<!--end head-->
<!--start body-->    
<body >
     <div id="<?php echo $row[3].'count'; ?>" class="count"><?php echo" $pub_cnt"; ?></div>
<!--start contenu_page-->        
    <div class="contenu_page"  >
        <div class="black" id="black" ></div>
               
<?php
        if ($row[10]==0)
        {
            echo "
<!--start welcome-->
        <div class='welcome-box' id='welcome_box'>
            <div class='titre-welcome-box'><i class='fas fa-times' onclick='closeWelcomeBox()'></i></div>
            <div class='body-welcome-box'>
                <section>c'est la premiere fois avec nous merci de me donné votre confience a notre site web.<br/>
                        ce site est construite totalement avec la propre code de malek syrine manar et chaima est tout les droits sont respecter. ce site est un site dinamique (relier a une base de donnée , utilisé votre cookies) c'est exemple d'une petite plat forme pour facilité la commenucation entre l'etudient et l'enseignant.
                        <ul>
                            Il'ya des fonctionnalité dans ce site comme : 
                            <li>le mode sombre ( dark mode )</li>
                            <li>recherche intélégant des utilisateur</li>
                            <li>vous pouvez changer votre information a tous moment</li>
                            <li>changement de photo profile</li>
                            <li>ajouter des publications</li>
                            <li>ajouter des commentaires</li>
                            <li>modification et supprision de vos publications seulement</li>
                            <li>agrandir et reduire tous les boxs ( vos messages , vos notification , vos liste des Enseignants , vos liste des etudients ) cliquer sur l'icone de l'entete de ces boxs pour mieux connaitre</li>
                        </ul
                    
                    <ul>
                        remarque:
                        <li>ce site est au cours de construction </li>
                        <li>ce site n'est pas diponible sur la version mobile</li>
                        <li>l'envoie des fichiers est indisponible pour le moment </li>
                        <li>problem d'affichage de l'image lors de selection pour changer la photo de profile</li>
                        <li>le fitrage de liste d'etudient par le filliere est indisponible</li>
                        <li>la confidalité de partage des statuts indisponible (public / filliere )</li>
                        <li>probleme de quelque bugs dans la page profile.php</li>
                    </ul>
                </section>
                <button onclick='closeWelcomeBox();'>Ok j'ai compris</button>
            </div>
            <div class='footer-welcome-box'></div>
        </div> 
<!--end welcome-->"; 
             echo"<script>showWelcomeBox();</script>";
            $newnbr=$row[10]+1;
            $reqUpdate="update user set nbr_visite='$newnbr' where id_user='$row[3]';";
            $updatenbr=mysqli_query($conn,$reqUpdate);
            if($updatenbr)
            {
            }
            else
            {
                header("location : logout.php");
                exit;
            }
            
}
?>
<!--start profil_box-->          
            <div class="profil_box" id="profil_box" >

            <div class="couverture">
            <i class="fas fa-times" onclick="closeProfil()"></i>
            </div>
            <div class="info_profil">
<?php
        echo"
                <img src='$photo_profil' alt='photo de profil' id='photo_profil'>";
?>
                <p><?php echo"$row[0] $row[1]" ?></p>
               <ul> <li><i class="fas fa-id-card-alt"></i><span><?php echo"$row[5]" ?></span></li>
                <li><i class="fas fa-birthday-cake"></i><span><?php echo"$row[8]" ?></span></li>
                <li><i class="fas fa-users"></i><span>
                    <?php if(empty($filiere) || empty($groupe))
                             {echo "filiere indiponible";}
                    else{ echo "$filiere $groupe";}?></span></li>
                   </ul>
            </div>
            <div class="btn_box">
                <button id="modifpass" onclick="fajria()" type="button">Modifier mot de passe</button>
                    <br>
                <button onclick="showModif()" >Modifier vos informations</button>
            </div>
</div>
<!--end profil_box-->
<!--start change_information-->           
            <div class="change_information" id="change_information">
            <div class="titre_information"><i class="fas fa-window-close" id="closemodif" onclick="closeModif()"></i></div>
            <div class="body_information">
                <div class="change_image" style="background-image : url(<?php echo $photo_profil ;?>);" id="pic">
                <label for="image_update">changer</label></div>
                <form action="update_profile.php" method="post" enctype="multipart/form-data" name="updateinfo">
                    <input type="text" placeholder="modifier votre nom" value="<?php  echo $row[0]; ?>" name="newnom">
                    <input type="text" placeholder="modifier votre prenom" value="<?php  echo $row[1]; ?>" name="newprenom">
                    <input type="number" placeholder="modifier votre numéro de téléphone" value="<?php  echo $row[6]; ?>" name="newtel">
                    <input type="file" name="image" id="image_update" accept=".gif,.jpg,.jpeg,.png" onchange="imageUp()">
                    <input type="submit" id="submit_modifier" value="Modifier">
                </form>
                <div id="update_profile_msg">
                <?php

                        if(isset($_SESSION['msg_succes_update_profile']))
                        {
                            $msg=$_SESSION['msg_succes_update_profile'];
                            echo"<script>showModif();</script>";
                            echo "<div class='succes_update_profile'>$msg</div>";
                           $_SESSION['msg_succes_update_profile']=NULL;
                        }
                        if(isset($_SESSION['msg_error_update_profile']))
                        {
                           $msg=$_SESSION['msg_error_update_profile'];
                            echo"<script>showModif();</script>";
                            echo "<div class='error_update_profile'>$msg</div>"; 
             $_SESSION['msg_error_update_profile']=NULL;
                        }
                ?>
                    </div>
            </div>
            <div class="footer_information"></div>
</div>
<!--end change_information-->         
<!--start change password-->         
            <div class="password" id="changepassword">

            <div class="titre_password"><i class="fas fa-window-close" id="closepass" onclick="malek()"></i></div>
            <div class="body_password">

               <form name="f4" id="changepass" method="post" action="changepassword.php">
                <input type="password" name="lastpass" class="pass" placeholder="saisie ancien mot de passe">
                <input type="password" name="newpass" class="pass" placeholder="saisie nouveau mot de passe">
                <input type="password" name="comfirmpass" class="pass" placeholder="confirmer mot de passe">
                   <label for="bnt_password"> <i class="fas fa-fingerprint"></i></label>
                <input type="submit" id="bnt_password">
                </form>
                 <?php
                if(isset($_SESSION['msg_error']))
                {
                    $msg=$_SESSION['msg_error'];
                    echo"<script>fajria();</script>";
                    echo"<ul style='background:red;'>$msg</ul>";
                    $_SESSION['msg_error']=NULL;
                }
                elseif(isset($_SESSION['msg_succes']))
                {
                     $msg=$_SESSION['msg_succes'];
                    echo"<script>fajria();</script>";
                    echo"<ul style='background:green;'>$msg <li>Veuillez enregistre votre login</li></ul>";
                    $_SESSION['msg_succes']=NULL;
                    header('refresh:2;url=logout.php');
                }

                ?>
            </div>
            <div class="footer_password"></div>
</div>
<!--end change password-->
<!--start navigation bar-->
            <nav>

        <div class="profile" onclick="showProfil()">
        <a href="#"><i class="fas fa-list"></i>
            <?php
        echo"
                <img src='$photo_profil' alt='photo de profil' class='profil_photo' id='photo_profil'>";
        ?>
            <p class="profil_name"><?php echo"$row[0] $row[1]" ?></p></a>
        </div>
            <ul class="header">
        <li >

            <form name="f1" method="post" action="smart_recherche.php">
                <div class="clearfix">
                <input type="search" name="recherche" placeholder="Rechercher...">
                <button type="submit" name="B1"><i class="fas fa-search"></i></button>
                    </div>
            </form>

        </li>
        <li class="logout" onclick="showSettings()">
        <a href="#" ><i class="fas fa-sliders-h"></i></a>
        </li>
    </ul>
 </nav>
<!--end navigation bar-->        
<!--start result recherche-->
        <div class="result-recherche"id="recherche_box">
            <div class="result-recherche-titre">
                <i class="fa fa-times recherche-close" onclick='closeRechercheBox()'></i>
            </div>
            <div class="result-recherche-body" id="body_recheche">
                <?php 
                if(isset($_SESSION['recherche']))
                { 
                    echo"<script>showRechercheBox();</script>";
                    $list=array();
                   $list=$_SESSION['recherche'];
                    foreach($list as $item)
                    {
                        echo $item;
                    }
                    $_SESSION['recherche']=NULL;
                }
                 if(isset($_SESSION['err_recherche']))
                { 
                    echo"<script>showRechercheBox();</script>";
                   $err=$_SESSION['err_recherche'];
                    echo "<div style='position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);font-size: 80%;width: 80%;color: #ffffff;background: #F44336;padding: 2%;font-weight: normal;'>$err</div>";
                    $_SESSION['err_recherche']=NULL;
                }
                ?>
            </div>
            <div class="result-recherche-footer"></div>
        </div>
<!--end result recherche-->       
<!--start settings-->        
            <div class="parametre" id="settings">
            <div class="titre_parametre">Paramétre<span onclick="closeSettings()"><i class="fas fa-times"></i></span></div>
            <div class="body_parametre">
            <ul>
            <li><a href="logout.php">déconnexion</a></li>    
            <li>
                        <form method="post" name="fc" id="fc" action="accueil.php">
            <label class="switch" onchange="darkMode()" name="switch"><span>théme sombre</span>

      <input type="checkbox" class="checkbox" name="check1" id="check1" value="css/accueil.css" <?php echo"$checked"?>/>
      <div class=""></div>

    </label>  
                   </form>

            </li>    
            </ul>
            </div>

</div>
<!--end settings-->           
<!--start etudient_box-->           
            <div class="etudient_box" id="etudient">
            <div class="titre_etudient_box" onclick="closeEtudient()" id="showEtudient">
                <p >vos liste des etudients</p>
                <i class="fas fa-user-graduate"></i>
            </div> 
            <div class="body_etudient_box">
                <?php
        $query4="SELECT nom_user , prenom_user , photo_profile ,id_user ,profile.id_profile from profile , user  WHERE profile.id_profile=user.id_profile and etat_user='Etudient(e)' ORDER BY `profile`.`nom_user` ASC";

           if ($resss = mysqli_query($conn, $query4))
            {
                while($etud=mysqli_fetch_array($resss)) 
                    {
                        $id="user".substr($etud[3],-5).substr($etud[3],-3,2).substr($etud[3],-1);
                        $file=$id.".php";
                        $idImage="imageEtudList".$id;
                        $idName="nameEtudList".$id;
                        $photo_etud=$path.$etud[2] ;
                        $id_profile=$etud[4];
                        echo"
                            <div class='cover_etudient' id='$id'>
                            <div id='$idImage' class='imageEtudList' id='$idName'>
                                <img src='$photo_etud' alt='photo de profil' id='$idImage'>
                                </div>
                                <a href='/blog/profile.php?id_user_profile=$id_profile' class='nameEtudList'>$etud[0] $etud[1]</a>
                            </div>";
                    }
           }
            ?>
        </div>
</div>
<!--end etudient_box-->        
<!--start prof_box-->        
            <div class="prof_box" id="prof">
            <div class="titre_prof_box" id="showProf" onclick="closeProf()">
                <p>vos liste des enseignants</p>
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="body_prof_box">
                         <?php
        $query5="SELECT nom_user , prenom_user , photo_profile ,id_user ,profile.id_profile from profile , user WHERE profile.id_profile=user.id_profile and etat_user='Enseignient(e)' ORDER BY `profile`.`nom_user` ASC";

           if ($re= mysqli_query($conn, $query5))
    {
    while($prof=mysqli_fetch_array($re)) 
        {
            $id="user".substr($prof[3],-5).substr($prof[3],-3,2).substr($prof[3],-1);
        $file=$id.".php";
        $idImage="imageEtudList".$id;
        $idName="nameEtudList".$id;
        $id_profile=$prof[4];
        $photo_prof=$path.$prof[2] ;
        ///////////////////////////////////////////

        echo"
            <div class='cover_prof' id='$id'>
                <a href='/blog/profile.php?id_user_profile=$id_profile'>
                <img src='$photo_prof' alt='photo de profil'>
                <span class='name''>$prof[0] $prof[1]</span></a>
            </div>";
    }
           }
        ?>
            </div>
</div>
<!--end prof_box-->   
<!--start messages_box-->   
            <div class="messages_box" id="message">
        <div class="titre_message_box"  id="showMessage" onclick="closeMessage()">
            <p>vos messages</p>
           <i class="fas fa-envelope-open-text"></i>

        </div>
            <div class="body_message_box">
                <?php 
                $myid=$_SESSION['myid'];
                $qm="select photo_profile , message_text,message.nom_user,message.prenom_user,date_envoie ,id_user1 from profile,user,message WHERE user.id_profile=profile.id_profile AND id_user1=user.id_user AND id_user2='$myid';";
                 if ($r = mysqli_query($conn, $qm))
    {

        while($message=mysqli_fetch_array($r)) 
        {
         $idmsg="user".substr($message[5],-5).substr($message[5],-3,2).substr($message[5],-1); 
            $photo_message=$path.$message[0] ;  
            echo"        <div class='cover_message' id='$idmsg' onclick='loadChat(this.id)'>
            <table border='0' class='table-notification'>
        <tr>
            <td class='td_message'>
            <img alt='photo de profile' src='$photo_message' width='50'></td>
            <td class='td_message ' ><b><font size='3'>$message[2] $message[3]</font></b></td>
        </tr>
        <tr>
            <td class='td_message'></td>
            <td id='cnt_msg' class='td_message left_td'>
            <span class='contenu_message'>
            $message[1]
        </span></td>
        </tr>
        <tr>
            <td class='td_message'></td>
            <td class='td_message'>
            <p align='right'><font size='2'>$message[4]</font></td>
        </tr>
    </table>
            </div>";
        }
                 }
                ?>


            </div>
</div>
<!--end messages_box-->        
<!--start box_notification-->        
            <div class="box_notification" id="notification">
        <div class="titre_box_notification" id="showNotification" onclick="showNotification()">

            <p>vos notification</p>
      <i class="fas fa-bell"></i>

        </div>
            <div class="body_box_notification" >
                <?php 
                    // notification
                    $select_notif = "select * from notification  ORDER BY `notification`.`date_notif` DESC";
                    $qry_notif     = mysqli_query($conn,$select_notif);
                    if($qry_notif)
                    {
                        while($list_notif=mysqli_fetch_array($qry_notif))
                        {
                            echo "                <div class='cover_notification'>
                   <table class='table-notification'>
                        <tr>
                            <td class='tb-notification'>
                            <img alt='photo de profile' src='upload/images/admin.png' width='50'></td>
                            <td class='tb-notification'><b><font size='2' style='margin-left:1%;'>administration</font></b></td>
                        </tr>
                        <tr>
                            <td class='tb-notification'></td>
                            <td class='tb-notification'>
                            <span class='contenu_message'>
                            $list_notif[2]</span></td>
                        </tr>
                        <tr>
                            <td class='tb-notification'></td>
                            <td class='tb-notification'>
                            <p align='right'><font size='1'>$list_notif[1]</font></td>
                        </tr>
                    </table>
                </div>";
                        }
                    }
                
                ?>
      </div>
</div>
<!--end box_notification-->        
            <div id="empty">
            <!--deriction mediceau scolaire et universtaire--> 
            
            </div>
<!--start box_post-->        
            <div class="box_post">
          <div class="add_publication">
            <div class="titre_add_publication">

                <label id="fnt" onclick="showPub()"><i class="far fa-window-maximize"></i></label>
                <p>Créer votre publication</p>
            </div>
            <div class="body_add_publication" id="pub" onmouseover="fileValue()">
                <form name="formpub" action="insert_pub.php" method="post" id="insertForm">
                    <input type="hidden" value="<?php echo $row[3]; ?>" name="myid" id="myid">
                    <textarea name="mypub" placeholder="Ecrire votre publication.."></textarea>
                    <button id="postpub"><i class="fas fa-paper-plane"></i></button>
                    <input name="uploadedFile" id="uploadedFile">
                    <label for="file"><i class="fas fa-paperclip"></i></label>
                    <div class="value_file" id="valueFile" >file</div>
                </form>
            </div>
        </div>
       <div id="<?php echo $row[0].'pubb'; ?>" class="pubb"></div>
          <div id="result" onclick="closeResultInsert()"></div>
          <div class="newpub">
          </div>
<?php
     $i=0;    
     $k=0;
    
   if ($ress = mysqli_query($conn, $query2))
    {

        while($pub=mysqli_fetch_array($ress)) 
        {
            $date1 = $pub[2];
            $now =date("Y-m-d H:i:s");
            $difference_in_seconds =  strtotime($now) - strtotime($date1);
            if($difference_in_seconds<60)
            {
                $wa9et=$difference_in_seconds." seconde";
            }
            elseif($difference_in_seconds>60 && $difference_in_seconds<3600 )
            {
                $wa9et="plus de ".intdiv($difference_in_seconds, 60) ." minute";
            }
            elseif($difference_in_seconds>3600 && $difference_in_seconds<86400)
            {
                $wa9et="plus de ".intdiv($difference_in_seconds, 3600)." heure";
            }
            elseif($difference_in_seconds>86400 && $difference_in_seconds<691200)
            {
                $wa9et="plus de ".intdiv($difference_in_seconds,86400)." jour(s)";
            }
            elseif($difference_in_seconds>691200 && $difference_in_seconds<2419200)
            {
                $wa9et="plus de ".intdiv($difference_in_seconds, 604800)." semaine";
            }
            elseif($difference_in_seconds>2419200)
            {
                $wa9et="plus de ".intdiv($difference_in_seconds, 2419200)." mois";
            } 
            elseif($difference_in_seconds>229030400)
            {
                $wa9et="plus de ".intdiv($difference_in_seconds, 229030400) ." année";
            }
            $tof=$path.$pub[5] ;
            $p=$i."c";
            $idoption=$pub[4]."option";
            $updatepub=$pub[4]."updatepub";
            $idselect=$pub[4]."optionselect";
            $iduserpub=$pub[4]."iduserpub";
            $idremoveselect=$pub[4]."optionselectremove";
            $idupdateselect=$pub[4]."optionselectupdate";
            $idcover=$pub[4]."cover";
            $idtitrepost=$pub[4]."titre_post";
            $query3="SELECT commentaire.id_user ,profile.nom_user , profile.prenom_user , `commentaire`.date_commentaire , `commentaire`.commentaire ,profile.photo_profile FROM `commentaire`, user , profile , publication WHERE `commentaire`.id_publication=`publication`.id_publication AND commentaire.id_user=user.id_user AND profile.id_profile=user.id_profile AND publication.id_publication=$pub[4]";

           $x=$k."f";
            $pub[3]=utf8_encode($pub[3]);
            echo " <div id='$updatepub'>
                        <div class='cover_post' id='$idcover'>
                            <input type='hidden' name='iduserpub' id='$iduserpub' value='$pub[6]'>
                            <div class='titre_box_post'>
                                <div class='option'>
                                    <a onclick='selectOption(this.id)' id='$idoption'>...</a>
                                    <ul class='submenu' id='$idselect'>
                                        <li>
                                            <a href='#' onclick='return updatePublication(this.id)' id='$idupdateselect'>modifier la publication
                                            </a>
                                        </li>
                                        <li>
                                            <a href='#'  onclick='return removeOption(this.id)'id='$idremoveselect'>supprimer la publication
                                            </a>
                                        </li>
                                  </ul>
                             </div>
                             <a href='#'><img src='$tof' alt='photo de profile' >$pub[0] $pub[1]</a>
                        </div>
                        <div class='body_box_post'>
                            <div class='date_post'>
                                <br>
                                <p title='$pub[2]'><i class='far fa-clock'></i> $wa9et<span title='partager avec amies'><i class='fas fa-user-friends'></i></span>
                                </p>
                            </div>
                            <div class='titre_de_post' id='$idtitrepost'>$pub[3]</div>
                            <div class='btn_commentaire'>
                                <button id='$k'' onclick='showComment(this.id)' class='btn_cmnt'>commentaire</button>
                            </div>
                        </div>
                        <div class='footer_box_post' id=$x>
                            <div class='commentaire-zone'>";
if ($resss = mysqli_query($conn, $query3))
    {
        while($com=mysqli_fetch_array($resss)) 
        {
            $photo=$path.$com[5] ;
            $com[4]=utf8_encode($com[4]);
              echo" <div class='cover_commentaire'>
                            <a href='#'>
                                <img src='$photo' alt='photo de profile'>$com[1] $com[2]
                            </a>
                            <div class='date_commentaire'><p>$com[3]</p></div>
                            <div class='commentaire_box'>
                                <p>$com[4]</p>
                            </div>
                            <div class='option'><a href='#' id='$i' onclick='selectOption(this.id)'>...</a>
                                <ul class='submenu' id='$p'>
                                    <li><a href='#' onclick='hidSelectOption()'>reduit la fenetre</a></li>
                                    <li><a href='#'  onclick='hidSelectOption()'>autre option</a></li>
                                </ul>
                            </div>
                        </div>";  
        }
   }

            echo"<div class='newcommentaire' id='newcommentaire$pub[4]'></div>
                        <div class='add_commentaire'>
                            <div class='body_add_commentaire'>
                                <form id='f$pub[4]' action='insertcomnt.php' method='post' class='formcomnt' name='f3'>
                                    <input type='hidden' value='$pub[6]' name='iduserpub' id='iduserpub'>
                                    <input type='hidden' value='$pub[4]' name='idpub' id='idpub'>
                                    <input type='hidden' value='$row[10]' name='myid'>
                                    <textarea rows='4' cols='' placeholder='ajouter un commentaire...' name='T1'></textarea>
                                    <button id='$pub[4]' onclick='insertComnt(this.id)'><i class='fas fa-comment-dots'></i></button>
                                    <input type='file' id='file'>
                                    <label for='file'><i class='fas fa-file-upload'></i></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>";
            if(isset($_SESSION['suc_commentaire']))
            {
                echo"<script>showComment($k);</script>";
                $msg=$_SESSION['suc_commentaire'];
                echo "<div class='succ_commentaire'>$msg</div>";
                $_SESSION['suc_commentaire']=NULL;
            }
            if(isset($_SESSION['err_commentaire']))
            {
                echo"<script>showComment($k);</script>";
                $msg=$_SESSION['err_commentaire'];
                echo "<div class='err_commentaire'>$msg</div>";
                $_SESSION['err_commentaire']=NULL;
            }
             $k++;
        }
    }
?>
</div>
<!--end box_post-->        
    </div>
<!--start contenu_page-->  
    <script src="js/load.js"></script>
</body>
<!--end body-->    
</html>
<?php
    }
    else
    {
        header("location:admin/");
        exit;
    }
}
else
{
    header('location:login.php');
    exit;
    ob_end_flush();
}
?>