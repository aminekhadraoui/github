<!doctype html>
<html>
    <head>
<meta charset="utf-8">
<title>login</title>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/css/all.min.css">
    </head>
    <body>
    <div class="box">
   <div class="titre_box">
    
    </div>     
   <div class="body_box">
       <div class="image"></div>
        <form method="post" action="chk.php">
       <input type="text" placeholder="saisie votre email.." name="mail">
       <input type="password" placeholder="saisie votre mot de passe.." name="pass">
            <input type="submit" value="CONNEXION">
       </form>
       <div class="links">
       <a href="forget_password.php">oubliée mot de passe? </a>/
       <a href="inscription.php">créer un compte</a>
           </div>
    </div>     
   <div class="footer_box">
       <?php
            session_start();
            if(isset($_SESSION['msg']))
            {
               $msg=$_SESSION['msg'];
                echo"<div class='msg'><i class='fas fa-exclamation-triangle'></i>  $msg</div>";
            }else {
                session_unset();
                session_destroy();
            }
       ?>
 </div>     
</div>
</body>
</html>