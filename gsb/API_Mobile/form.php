<?php

  
    $dsn = 'mysql:host=localhost;dbname=id20465321_db_gsb_g1';
    $username = 'id20465321_ur_gsb_1';
    $password = 'MdpGSB@g0001';

    //Mettez à jour ce qui précède avec vos identifiants de base de données.


    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }


    $db_username = 'id20465321_ur_gsb_1';
    $db_password = 'MdpGSB@g0001';
    $db_name = 'id20465321_db_gsb_g1';
    $db_host = 'localhost';
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');



    
    $today = date("y-m-j");
    $nom_prat = $_POST["praticien"];
    $date = $_POST["date"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];
    $medicament = $_POST["medicament"];
    $avis_visit = $_POST["avis_visiteur"];
    $id_user = $_POST["id_user"];

    $req= "INSERT INTO form_visite (`dateJ`, `praticien`, `date`, `motif`, `bilan`, `medicament`, `avis_visiteur`, `id_user`) VALUES ('$today', '$nom_prat', '$date', '$motif', '$bilan', '$medicament', '$avis_visit','$id_user')";
   
    $result = mysqli_query($con, $req);
   
   
if ($result) {
   
    echo "le formulaire est remplie";
   
    
}else {
    echo "il y a une erreur";
}

 

?>