<?php
$conn = mysqli_connect('localhost','root','madara1998','github');
if(!$conn){
    die("Cannot connect to the database. Error: ".mysqli_error($conn));
}
?>