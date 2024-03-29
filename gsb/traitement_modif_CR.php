<?php 


include 'connexion2.php';
session_start();
if (isset ($_SESSION['id'])){
 $id = $_SESSION ['id'];
$user = $_SESSION['id'];

$id_form = $_GET['id_form'];

$users = $con->query("SELECT * FROM users where username = '$user' ");
$donnees = $users->fetch();
$type = $donnees['type'];
$data = $donnees['id_User'];
if(isset( $_SESSION['id'])){  
date_default_timezone_set('UTC');

if(isset ( $_POST["PRAT_NOM"], $_POST["RAP_DATE"], $_POST["RAP_MOTIF"], $_POST["RAP_BILAN"], $_POST["MED_NOM"], $_POST["AVIS_VISIT"]));



$NOM_PRAT = htmlspecialchars($_POST["PRAT_NOM"]);
$DATE_RAP = htmlspecialchars($_POST["RAP_DATE"]);
$MOTIF_RAP = htmlspecialchars($_POST["RAP_MOTIF"]);
$BILAN_RAP = htmlspecialchars($_POST["RAP_BILAN"]);
$NOM_MED = htmlspecialchars($_POST["MED_NOM"]);
$VISIT_AVIS = htmlspecialchars($_POST["AVIS_VISIT"]);
$today = date("y.m.d");
$id =($_GET["id"]);



//$req = $bdd -> prepare('INSERT INTO form_visit(RAP_NUM, RAP_DATEVISITE, PRA_NUM,PRA_COEFF, PRA_REMPLACANT, RAP_DATE, RAP_MOTIFAUTRE, RAP_BILAN, PROD1, PROD2, RAP_DOC, PRA_ECH1, PRA_QTE1, RAP_LOCK) VALUES('.$_POST['RAP_NUM'].''.$_POST["RAP_DATEVISITE"].''.$_POST["PRA_NUM"].''.$_POST["PRA_COEFF"].''.$_POST["PRA_REMPLACANT"].''.$_POST["RAP_DATE"].''.$_POST["RAP_MOTIFAUTRE"].''.$_POST["RAP_BILAN"].''.$_POST["PROD1"].''.$_POST["PROD2"].''.$_POST["RAP_DOC"].''.$_POST["PRA_ECH1"].''.$_POST["PRA_QTE1"].''.$_POST["RAP_LOCK"].')');

$req = $con -> prepare('UPDATE form_visite SET dateJ = :a, praticien=:c, date=:d, motif=:e, bilan=:f, medicament=:g, avis_visiteur=:h, id_User=:b WHERE id_form ='.$id_form.''); //insert dans la table utilisateur le pseudo et le message
$req -> execute(array('a' => $today ,'c'=>$NOM_PRAT,'d'=>$DATE_RAP,'e'=>$MOTIF_RAP, 'f'=>$BILAN_RAP, 'g'=>$NOM_MED, 'h'=>$VISIT_AVIS, 'b'=>$data));
header('location: index.php');

}}
else{
   
    session_destroy();
                      header("location:login.php");
                      exit;
};
?>