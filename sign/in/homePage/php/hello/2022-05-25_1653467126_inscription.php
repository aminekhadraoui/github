 
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type"  charset="utf-8">
<title>inscription</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</head>

<body onload="ids()">

<div class="box">
      <div   class="box_titre">
           <h1>Crée votre Compte rapidement</h1>
      </div>
    <div class="box_body">
<form method="POST" action="connexion.php"name="f1">
	<table >
      
		<tr>
			<td colspan="2"><label for="T1">Nom :</label></td>
			<td colspan="2" class="td"><input type="text" name="T1" id="T1" placeholder="Saisie votre nom.." onblur="return verifNomPrenom(this)"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T2">Prénom :</label></td>
			<td colspan="2" class="td"><input type="text" name="T2" id="T2"  placeholder="Saisie votre prénom.." onblur="return verifNomPrenom(this)"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T3">CIN :</label></td>
			<td colspan="2" class="td"><input type="Number" name="T3" id="T3"  placeholder="Saisie votre CIN.." onblur="return verifCin(this)"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="R1" onclick="return verifSexe()">Sexe :</label></td>
			<td colspan="2" class="td"><input type="radio" value="Homme" name="R1" id="R1"  onclick="return verifSexe()"><label for="R1" id="homme" onclick="return verifSexe()">Homme</label><input type="radio" value="Femme" name="R1" id="R2" onclick="return verifSexe()"> 
			<label for="R2" id="femme" onclick="return verifSexe()">Femme</label></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T8">Date de Naissance :</label></td>
			<td colspan="2" class="td">
                <p><select class="jour" name="j">
                <option value="">jj</option>
                    <?php
                    session_start();
                    for ($i=01;$i<=9;$i++)
                        {
                           echo" <option value='0$i'>0$i</option>";
                        }
                    for ($i=10;$i<=31;$i++)
                        {
                           echo" <option value='$i'>$i</option>";
                        }
                    
                   ?>
                </select>
                <select class="mois" name="m">
                <option value="">mm</option>
                     <?php
                    for ($i=1;$i<=9;$i++)
                        {
                           echo" <option value='0$i'>0$i</option>";
                        }
                    for ($i=10;$i<=12;$i++)
                        {
                           echo" <option value='$i'>$i</option>";
                        }
                   ?>
                       
                </select>
                <select class="annee" name="a">
                <option value="">aaaa</option>
                     <?php
                    for ($i=1965;$i<=2001;$i++)
                        {
                           echo" <option value='$i'>$i</option>";
                        }
                   ?>
                </select></p>
            </td>
		</tr>
		<tr>
			<td colspan="2"><label for="D1">Etat :</label></td>
			<td colspan="2"class="td"><select size="1" name="D1"  onclick="return verifDate()" onchange="verifEtat()">
                <option value="">Etudient(e) / Enseignient(e)</option>
                <option value="Etudient(e)">Etudient(e)</option>
                <option value="Enseignient(e)">Enseignient(e)</option>
                </select></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T4">Téléphone :</label></td>
			<td colspan="2" class="td"><input type="Number" name="T4" id="T4"  placeholder="Saisie votre numéro de téléphone.." onfocus="return verifEtat()" onblur="return verifTele(this)"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T5">Adresse-Email :</label></td>
			<td colspan="2" class="td"><input type="email" name="T5" id="T5"  placeholder="Saisie votre adresse-Email.." onblur="return verifEmail()"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T6">Mot de passe :</label></td>
			<td colspan="2" class="td"><input type="password" name="T6" id="T6"  placeholder="mot de passe..." onblur="return verifPass(this)"></td>
		</tr>
		<tr>
			<td colspan="2"><label for="T7">Confiramtion de mot de passe :</label></td>
			<td colspan="2" class="td"><input type="password" name="T7" id="T7"  placeholder="mot de passe..." onblur="return reVerifPass(this)"></td>
		</tr>
		<tr id="mask">
         
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td colspan="2" class="td"><input type="submit" value="Inscrire" name="B1" onclick="return verifTout()"></td>
		</tr>
        <tr><td colspan="2"></td>
        <td colspan="2"><a class="link1" href="/blog/login.php">J'ai déja un compte </a></td>
        </tr>
	</table>
</form>
        <?php
        if(isset($_SESSION['msg']))
        {
            $msg= $_SESSION['msg'];
            echo"<div class='error' id='error'>$msg</div>";
        }
        elseif(isset($_SESSION['yes']))
        {
            $yes= $_SESSION['yes'];
            echo"<div class='yes' id='yes'>$yes</div>";
            echo"<script>setInterval(function(){window.location = '/blog/login.php';},2000);</script>";
        }
         session_unset();
        session_destroy();
            ?>
  </div>
    <div class="footer">ismaik@2021</div>
    <style>
        .msag{
            color:red;
            display: none;
        }
    </style>
</div>

</body>

</html>
