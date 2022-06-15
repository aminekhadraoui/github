<?php
include('conn.php');
$quef="SELECT profile.nom_user , profile.prenom_user , publication.date_publication , publication.contenu_publication , publication.id_publication , profile.photo_profile ,user.id_user FROM `user` , PROFILE , publication WHERE user.id_profile=profile.id_profile and user.id_user=publication.id_user ORDER BY date_publication DESC limit 1";
$path="/blog/upload/images/";
/*$result2 =$conn->quersy($query2);
$pub= $result2->fetch_array(MYSQLI_NUM);*/
///////////////variables ut8//////////////

?>
     <?php
    $i=0;    
    $k=0;
    
   if($ff = mysqli_query($conn, $quef))
   {
 while($newpub=mysqli_fetch_array($ff)) 
    {
     $date1 = $newpub[2];
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
        } elseif($difference_in_seconds>691200 && $difference_in_seconds<2419200)
        {
            $wa9et="plus de ".intdiv($difference_in_seconds, 604800)." semaine";
        }
        elseif($difference_in_seconds>2419200)
        {
            $wa9et="plus de ".intdiv($difference_in_seconds, 2419200)." mois";
        } elseif($difference_in_seconds>229030400)
        {
            $wa9et="plus de ".intdiv($difference_in_seconds, 229030400) ." année";
        }

        $tof=$path.$newpub[5];
$p=$i."c";
        $idoption=$newpub[4]."option";
        $updatepub=$newpub[4]."updatepub";
        $idselect=$newpub[4]."optionselect";
        $iduserpub=$newpub[4]."iduserpub";
     $idtitrepost=$newpub[4]."titre_post";
$idremoveselect=$newpub[4]."optionselectremove";
$idupdateselect=$newpub[4]."optionselectupdate";
$idcover=$newpub[4]."cover";
          $queryy3="SELECT commentaire.id_user ,profile.nom_user , profile.prenom_user , `commentaire`.date_commentaire , `commentaire`.commentaire ,profile.photo_profile FROM `commentaire`, user , profile , publication WHERE `commentaire`.id_publication=`publication`.id_publication AND commentaire.id_user=user.id_user AND profile.id_profile=user.id_profile AND publication.id_publication=$newpub[4]";
         
      
       $x=$k."f";
     $newpub[3]=utf8_encode($newpub[3]);
        echo "<div id='$updatepub'><div class='cover_post' id='$idcover'>
        <input type='hidden' name='iduserpub' id='$iduserpub' value='$newpub[6]'>
    <div class='titre_box_post'>
         <div class='option'>
                <a onclick='selectOption(this.id)' id='$idoption'>...</a>
                    <ul class='submenu' id='$idselect'>
                        <li><a href='#' onclick='return updatePublication(this.id)' id='$idupdateselect'>modifier la publication</a></li>
                        <li><a href='#'  onclick='return removeOption(this.id)'id='$idremoveselect'>supprimer la publication</a></li>
                    </ul>
        </div>
                
      <a href='#'><img src='$tof' alt='photo de profile' >
        $newpub[0] $newpub[1]</a>
            
                
         
          </div>
      <div class='body_box_post'>
      <div class='date_post'>
                <br>
                <p title='$newpub[2]'><i class='far fa-clock'></i> $wa9et<span title='partager avec amies'><i class='fas fa-user-friends'></i>         </span></p>
            </div>
               
        <div class='titre_de_post' id='$idtitrepost'>$newpub[3]</div>
        
          <div class='btn_commentaire'>
          <button id='$k'' onclick='showComment(this.id)' class='btn_cmnt'>commentaire</button>
          </div>
      </div>
      <div class='footer_box_post' id=$x>
        <div class='commentaire-zone'>
        ";
        
           if ($rezsss = mysqli_query($conn, $queryy3))
{

    while($comm=mysqli_fetch_array($rezsss)) 
    {
        $photo=$comm[5].".png";
        $comm[4]=utf8_encode($comm[4]);
          echo" <div class='cover_commentaire'>
                      
                <a href='#'><img src='$photo' alt='photo de profile'>
                    $comm[1] $comm[2]
               </a><div class='date_commentaire'><p>$comm[3]</p></div>
            <div class='commentaire_box'>
                <p>$comm[4]</p>
                </div>
                <div class='option'><a href='#' id='$i' onclick='selectOption(this.id)'>...</a>
                    <ul class='submenu' id='$p'>
                        <li><a href='#' onclick='hidSelectOption()'>reduit la fenetre</a></li>
                        <li><a href='#'  onclick='hidSelectOption()'>autre option</a></li>
                    </ul></div>
            </div>";
      }
             }
        else{
            die('error 1');
        }
         echo"<div class='newcommentaire' id='newcommentaire$newpub[4]'></div>
                        <div class='add_commentaire'>
                            <div class='body_add_commentaire'>
                                <form id='f$newpub[4]' action='insertcomnt.php' method='post' class='formcomnt' name='f3'>
                                    <input type='hidden' value='$newpub[6]' name='iduserpub' id='iduserpub'>
                                    <input type='hidden' value='$newpub[4]' name='idpub' id='idpub'>
                                    <textarea rows='4' cols='' placeholder='ajouter un commentaire...' name='T1'></textarea>
                                    <button id='$newpub[4]' onclick='insertComnt(this.id)'><i class='fas fa-comment-dots'></i></button>
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
     