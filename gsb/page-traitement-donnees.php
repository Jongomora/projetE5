<?php
if (isset($_POST["nom"])){
$nom=$_POST['nom'];
$email=$_POST['email'];
$message=$_POST['message'];

echo "$nom votre message à bien été transmit, vous recevrais une réponse a cette adresse mail: $email";
}
else {
    echo"vous devez remplir le formulaire ici: <a href='Page1.html'>formulaire</a>" ;
}
?>