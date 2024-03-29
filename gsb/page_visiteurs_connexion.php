<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=GSB_BDD;charse=utf8','root','');
}
catch (Exception $e)
{
    die ('Erreur : ' . $e->getMessage());
}

$departement=$_POST["departement"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$adresse=$_POST["adresse"];
$CP=$_POST["CP"];
$ville=$_POST["ville"];
echo $departement." <br> ".$nom." <br> ".$prenom." <br> ".$adresse." <br> ".$CP." <br> ".$ville." <br> ";
echo "<p>Vous etes bien inscrit</p> <a href='page_visiteurs.php'>retour</a>";


$req = $bdd->prepare('INSERT INTO visiteurs (departement, nom, prenom, adresse, CP, ville) VALUES(:a, :b, :c, :d, :e, :f)');

    $req->execute(array('a' => $departement, 'b' => $nom, 'c' => $prenom, 'd' => $adresse, 'e' => $CP, 'f' => $ville
));

?>