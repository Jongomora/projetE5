<?php


//ceci signifie que le format du corps de la requête est JSON


header("Content-Type:application/json");

//ceci signifie que le format du corps de la requête est JSON



$db_username = 'id20465321_ur_gsb_1';
$db_password = 'MdpGSB@g0001';
$db_name = 'id20465321_db_gsb_g1';
$db_host = 'localhost';
$con = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');



        $id_form = $_POST['id_form'];
        $nom_prat = $_POST["praticien"];
        $motif = $_POST["motif"];
        $bilan = $_POST["bilan"];
        $medicament = $_POST["medicament"];
           $avis_visit = $_POST["avis_visiteur"];

    $sql = "UPDATE form_visite SET praticien = '$nom_prat', motif = '$motif', bilan = '$bilan', avis_visiteur = '$avis_visit' WHERE form_visite.id_form = $id_form";
    $result = mysqli_query($con, $sql);

    if ($result){
        echo "Your form is updated";
    }else{
        echo "Your form is not updated";
    }

    mysqli_close($con);