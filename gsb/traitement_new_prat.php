<?php 


include 'connexion2.php';
session_start();
if (isset ($_SESSION['id'])){
 $id = $_SESSION ['id'];
$user = $_SESSION['id'];

$users = $con->query("SELECT * FROM users where username = '$user' ");
$donnees = $users->fetch();
$type = $donnees['type'];
$data = $donnees['id_User'];
if(isset( $_SESSION['id'])){  
date_default_timezone_set('UTC');

if(isset ( $_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["ville"], $_POST["region"]));



$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$adresse = htmlspecialchars($_POST["adresse"]);

$ville = htmlspecialchars($_POST["ville"]);
$region = htmlspecialchars($_POST["region"]);
$id =($_GET["id"]);



//$req = $bdd -> prepare('INSERT INTO form_visit(RAP_NUM, RAP_DATEVISITE, PRA_NUM,PRA_COEFF, PRA_REMPLACANT, RAP_DATE, RAP_MOTIFAUTRE, RAP_BILAN, PROD1, PROD2, RAP_DOC, PRA_ECH1, PRA_QTE1, RAP_LOCK) VALUES('.$_POST['RAP_NUM'].''.$_POST["RAP_DATEVISITE"].''.$_POST["PRA_NUM"].''.$_POST["PRA_COEFF"].''.$_POST["PRA_REMPLACANT"].''.$_POST["RAP_DATE"].''.$_POST["RAP_MOTIFAUTRE"].''.$_POST["RAP_BILAN"].''.$_POST["PROD1"].''.$_POST["PROD2"].''.$_POST["RAP_DOC"].''.$_POST["PRA_ECH1"].''.$_POST["PRA_QTE1"].''.$_POST["RAP_LOCK"].')');

$req = $con -> prepare('INSERT INTO practiciens( Nom_praticiens, Prenom_praticiens, Adresse_praticiens, Ville_praticiens, region_practiciens) VALUES(:a, :c, :d, :e, :f)'); //insert dans la table utilisateur le pseudo et le message
$req -> execute(array('a' => $nom ,'c'=>$prenom,'d'=>$adresse,'e'=>$ville, 'f'=>$region));
header('location: page_practicien.php');

}}
else{
   
    session_destroy();
                      header("location:login.php");
                      exit;
};
?>