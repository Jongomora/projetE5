<?php

  
header("Content-Type:application/json");


    $db_username = 'id20465321_ur_gsb_1';
    $db_password = 'MdpGSB@g0001';
    $db_name = 'id20465321_db_gsb_g1';
    $db_host = 'localhost';
    $con = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');


    $id_user = $_POST['id_user'];

    $result= array(); 
    $result['data'] = array();
    $user = "SELECT * FROM users WHERE id_User = $id_user";
    $reponse = mysqli_query($con, $user);
    
    
    while ($row = mysqli_fetch_array($reponse)){
        $index['username'] = $row['1'];
        $index['type'] = $row['2'];
        $index['nom'] = $row['4'];
        $index['prenom'] = $row['5'];
        $index['departement'] = $row['6'];
        array_push($result['data'], $index);
     }
     $result["success"] = "1";
    echo json_encode($result);
    mysqli_close($con);