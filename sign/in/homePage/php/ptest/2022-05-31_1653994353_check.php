<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include('conn.php');
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    if(empty($user)||empty($pass)){
        $_SESSION['msg']="veuillez remplir les champs !";
        echo "veuillez remplir les champs !";
        exit; 
    }
    $select="select * from user where adresse_user='$user' and password_user='$pass' and type_user='super admin' ;";
    $query=mysqli_query($conn,$select);
    $nbr=mysqli_num_rows($query);
    if($nbr>0)
    {
        $_SESSION['user']=$user;
        $_SESSION['type']='super admin';
        header('location:profile.php');
    }
    else {
        echo "password incorrect !";
    }
}