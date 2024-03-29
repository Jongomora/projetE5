<?php 

include 'connexion2.php';
session_start();

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    $user = $_SESSION['id'];

    // Vérifie s'il y a une valeur passée dans l'URL pour l'id de l'utilisateur à modifier
    if (isset($_GET['id_User'])) {
        $id_User = $_GET['id_User'];

        // Récupère les informations de l'utilisateur connecté
        $users = $con->prepare("SELECT * FROM users WHERE username = :user");
        $users->execute(array('user' => $user));
        $donnees = $users->fetch();
        $type = $donnees['type'];
        $data = $donnees['id_User'];

if(isset ( $_POST["usernames"], $_POST["type"], $_POST["password"], $_POST["nom"], $_POST["prenom"]));



$USER = htmlspecialchars($_POST["usernames"]);
$TYPE = htmlspecialchars($_POST["type"]);
$PASSWORD = htmlspecialchars($_POST["password"]);
$NOM = htmlspecialchars($_POST["nom"]);
$PRENOM = htmlspecialchars($_POST["prenom"]);
$today = date("y.m.d");
$id =($_GET["id"]);



//$req = $bdd -> prepare('INSERT INTO form_visit(RAP_NUM, RAP_DATEVISITE, PRA_NUM,PRA_COEFF, PRA_REMPLACANT, RAP_DATE, RAP_MOTIFAUTRE, RAP_BILAN, PROD1, PROD2, RAP_DOC, PRA_ECH1, PRA_QTE1, RAP_LOCK) VALUES('.$_POST['RAP_NUM'].''.$_POST["RAP_DATEVISITE"].''.$_POST["PRA_NUM"].''.$_POST["PRA_COEFF"].''.$_POST["PRA_REMPLACANT"].''.$_POST["RAP_DATE"].''.$_POST["RAP_MOTIFAUTRE"].''.$_POST["RAP_BILAN"].''.$_POST["PROD1"].''.$_POST["PROD2"].''.$_POST["RAP_DOC"].''.$_POST["PRA_ECH1"].''.$_POST["PRA_QTE1"].''.$_POST["RAP_LOCK"].')');

$req = $con -> prepare('UPDATE users SET: usernames=:c, type=:d, password=:e, nom=:f, prenom=:g ,id_User=:b where id_User=.$id_User'); //insert dans la table utilisateur le pseudo et le message
$req -> execute(array('c' => $USER ,'d'=>$TYPE,'e'=>$PASSWORD,'f'=>$NOM, 'g'=>$PRENOM,  'b'=>$data));
header('location: index.php');

}}
else{
   
    session_destroy();
                      header("location:login.php");
                      exit;
};
?>
