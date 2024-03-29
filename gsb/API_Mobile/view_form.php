<?php 
header("Content-Type:application/json");

//ceci signifie que le format du corps de la requête est JSON

 $db_username = 'id20465321_ur_gsb_1';
       $db_password = 'MdpGSB@g0001';
       $db_name = 'id20465321_db_gsb_g1';
       $db_host = 'localhost';
       $con = mysqli_connect($db_host, $db_username, $db_password,$db_name)
       or die('could not connect to database');



$id_user = $_POST['id_user'];

$result= array(); 
$result['data'] = array();
 $stmt = "SELECT * FROM form_visite WHERE id_User = '$id_user' ";
 $reponse = mysqli_query($con, $stmt);
 while ($row = mysqli_fetch_array($reponse)){
    $index['date'] = $row['1'];
    $index['praticien'] = $row['2'];
    $index['motif'] = $row['4'];
    $index['bilan'] = $row['5'];
    $index['medicament'] = $row['6'];
    $index['avis_visiteur'] = $row['7'];
    $index['id_form'] = $row['0'];
    $index['id_user'] = $row['8'];
    array_push($result['data'], $index);
 }
 $result["success"] = "1";
echo json_encode($result);
mysqli_close($con);
?>