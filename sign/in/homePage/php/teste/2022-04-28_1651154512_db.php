<?php
ob_start();
session_start();
if(isset($_SESSION['user']))
{
include('conn.php');
@$q="select profile.nom_user , profile.prenom_user , profile.photo_profile from user , profile where user.id_profile=profile.id_profile and user.id_user='$idd_etud';";
@$q1="select profile.nom_user , profile.prenom_user , profile.photo_profile from user , profile where user.id_profile=profile.id_profile and user.id_user='$idd';";
$hisname =$conn->query($q);
$myname =$conn->query($q1);
$name = $hisname->fetch_array(MYSQLI_NUM);
$mname = $myname->fetch_array(MYSQLI_NUM);
$path="/upload/images/";
 @$qu="SELECT * FROM `message` WHERE id_user1=$idd and id_user2=$idd_etud";
    $msg="no data !";
    $msg2="hello you can acces to your data ^_^ ";
    $select = mysqli_query($conn,$qu);
@$nbr=mysqli_num_rows($select); 
$photo_profil_titre=$path.$name[2];
$date=date("Y-m-d H:i:s");
if($nbr==0)
{
echo " <div class='titre_chat_box' onclick='minimizeChat()'>
                <div id='imgChat'>
            <img alt='photo de profil' src='$photo_profil_titre'>
                </div>
                <p id='nameChat'>
                $name[0] $name[1]
                    </p>
                    <span>
                        <i class='fas fa-times' onclick='closeChat()'></i>
                    </span>
                
            </div>
            <div class='body_chat_box'>
            <div class='nochat'>aucun disscusion pour l'instant..</div>
                </div>
                  ";
}
else
{
    $class1="UPDATE `message` SET `class1`='cover_my_messege',`class2`='my_msg',`class3`='my_msg_date' WHERE id_user1='$idd'";
$qu0=mysqli_query($conn,$class1);
$class2="UPDATE `message` SET `class1`='cover_distinataire',`class2`='distinataire_msg',`class3`='distinataire_date' WHERE id_user1='$idd_etud'";
$qu1=mysqli_query($conn,$class2);
    $queryy="SELECT class1 ,class2 , class3 , message_text , date_envoie , photo_profile ,message.nom_user ,message.prenom_user  from message , profile , user WHERE profile.id_profile=user.id_profile and profile.nom_user=message.nom_user AND profile.prenom_user=message.prenom_user
";
        $photo_profil_titre=$name[2].".png";
    
echo "
                 <div class='titre_chat_box' onclick='minimizeChat()'>
                <div id='imgChat'>
            <img alt='photo de profil' src='$photo_profil_titre' >
                </div>
                <p id='nameChat'>
                    $name[0] $name[1]</p>
                    <span>
                        <i class='fas fa-times' onclick='closeChat()'></i>
                    </span>
                
            </div>
            <div class='body_chat_box'>";
             if ($msgs = mysqli_query($conn, $queryy))
{
while($msg=mysqli_fetch_array($msgs)) 
    {
$photo_profil_msg=$path.$msg[5];
    echo"
            
                <div class='$msg[0]'>
                <img alt='photo de profil' src='$photo_profil_msg'>
         
                
                    <div class='$msg[1]'>$msg[3]</div>
                               <div class='$msg[2]'>$msg[4]</div>
                </div>
                
                ";
    }
      }echo"</div>
                   </div>
                   <div class='footer_chat_box'>
                <form name='f0' method='post' action='db.php'>
                 <textarea name='msg' placeholder='Ecrire votre message..'  onkeyup='showSendButton()'></textarea >
                    input type='submit' value='envoyer' id='chat_msg' name='send'>
                    <label for='chat_msg'><i class='fas fa-paper-plane'></i></label>
                    </form>
        </div>";
                  

if(isset($_POST['send']))
{   $msg=$_POST['msg'];
    $insert="INSERT INTO `message` (`class1`, `class2`, `class3`, `id_message`, `id_user1`, `id_user2`, `date_envoie`, `message_text`, `nom_user`, `prenom_user`) VALUES ('cover_my_messege', 'my_msg', 'my_msg_date', NULL, '$idd', '$idd_etud', '$date', '$msg', '$mname[0]', '$mname[1]');";
 $query_insert_msg=mysqli_query($conn,$insert);
 if($query_insert_msg)
 {
     echo "message send avec succes ^_^ ";
 }
 else 
 {
     echo"error lors de l'envoie ! ";
 }
}
}
}
else
{
    header("location:login.php");
    exit;
}
ob_end_flush();
?>
