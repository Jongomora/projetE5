<?php
include('connexion.php');
session_start();
if (isset($_POST['id'])){ 
  $username = stripslashes($_POST['id']);
  $username = mysqli_real_escape_string($db, $username);
  $_SESSION['id'] = $username;
  $password = stripslashes($_REQUEST['pw']);
  $password = mysqli_real_escape_string($db, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($db,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
   header("location: index.php"); 
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>