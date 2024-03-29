<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="id.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
include('connexion.php');
if (isset($_POST['id'], $_POST['pw'], $_POST['type'])){
  // récupérer le nom d'utilisateur 
  $id = stripslashes($_POST['id']);
  $id = mysqli_real_escape_string($db, $id); 
  // récupérer le mot de passe 
  $pw = stripslashes($_POST['pw']);
  $pw = mysqli_real_escape_string($db, $pw);
  // récupérer le type
  $type = stripslashes($_POST['type']);
  $type = mysqli_real_escape_string($db, $type);
  
  $query = "INSERT into `users` (username, type, password)
        VALUES ('$id',  '$type', '".hash('sha256', $pw)."')";
  $res = mysqli_query($db, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p><br/>
             <a href='index_resp.php'>retour<a/>
       </div>";
    }
}else{
?>
<form class="box" action="" method="POST">
<div>
         <img src="https://gsb.romaneledru.fr/images/logo.png" alt=""><br/>
          </div>
    <h1 class="box-title">S'inscrire</h1>
    <label for=""><b>identifiant</b></label>
        <input type="text" placeholder="enter your id" name="id" required><br/>
        <label for=""><b>Mot de passe</b></label>
        <input type="password" placeholder="enter your password " name="pw" required>

        <select class="box-input" name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="visiteur">Visiteur</option>
        <option value="delegue">Délégué </option>
        <option value="responsable">Responsable</option>
      </select>
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
  
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>