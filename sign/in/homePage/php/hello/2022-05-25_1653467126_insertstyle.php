<?php 
ob_start();
$page=$_SESSION['page'];
if(isset($_COOKIE['theme']))
{
if($_COOKIE['theme']=="css/accueil.css")
{
   $checked=''; 
}
else
{
  $checked='checked';  
}
}
else
{
    $checked=''; 
$style="css/accueil.css";
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
          if(isset($_POST['check1']))
                    {
                        @$style =$_POST['check1'];
                    }  
    setcookie('theme' , $style , time() + 7200 ,'/');
if($style=="css/accueil.css")
    {
        $checked='';
    $theme=$_COOKIE['theme'];
    header("location:$page");
    }
    
    else
    {
        
        $checked='checked';
        $theme=$_COOKIE['theme'];
         header("location:$page");
    }

}
    
    if(isset($_COOKIE['theme']))
{
$theme=$_COOKIE['theme'];
}
else
{
   $theme=$style;
}

ob_end_flush();
?>