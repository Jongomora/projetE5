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

if(isset ( $_POST["nom_com"], $_POST["fam_med"], $_POST["compo_med"], $_POST["effet"], $_POST["contre_ind"], $_POST["prix"]));



$nom_com = htmlspecialchars($_POST["nom_com"]);
$fam_med = htmlspecialchars($_POST["fam_med"]);
$compo_med = htmlspecialchars($_POST["compo_med"]);
$effet = htmlspecialchars($_POST["effet"]);
$contre_ind = htmlspecialchars($_POST["contre_ind"]);
$prix = htmlspecialchars($_POST["prix"]);
$id =($_GET["id"]);



//$req = $bdd -> prepare('INSERT INTO form_visit(RAP_NUM, RAP_DATEVISITE, PRA_NUM,PRA_COEFF, PRA_REMPLACANT, RAP_DATE, RAP_MOTIFAUTRE, RAP_BILAN, PROD1, PROD2, RAP_DOC, PRA_ECH1, PRA_QTE1, RAP_LOCK) VALUES('.$_POST['RAP_NUM'].''.$_POST["RAP_DATEVISITE"].''.$_POST["PRA_NUM"].''.$_POST["PRA_COEFF"].''.$_POST["PRA_REMPLACANT"].''.$_POST["RAP_DATE"].''.$_POST["RAP_MOTIFAUTRE"].''.$_POST["RAP_BILAN"].''.$_POST["PROD1"].''.$_POST["PROD2"].''.$_POST["RAP_DOC"].''.$_POST["PRA_ECH1"].''.$_POST["PRA_QTE1"].''.$_POST["RAP_LOCK"].')');

$req = $con -> prepare('INSERT INTO medicament( nom_commercial, famille_medicament, composition, effet_indesirable, contre_indication, prix_echantillon) VALUES(:a, :c, :d, :e, :f, :g)'); //insert dans la table utilisateur le pseudo et le message
$req -> execute(array('a' => $nom_com ,'c'=>$fam_med,'d'=>$compo_med,'e'=>$effet, 'f'=>$contre_ind, 'g'=>$prix));
header('location: medicament.php');

}}
else{
   
    session_destroy();
                      header("location:login.php");
                      exit;
};
?>