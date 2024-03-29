<?php

    header("Content-Type:application/json");

    //ceci signifie que le format du corps de la requête est JSON


    $dsn = 'mysql:host=localhost;dbname=id20465321_db_gsb_g1';
    $username = 'id20465321_ur_gsb_1';
    $password = 'MdpGSB@g0001';

    //Mettez à jour ce qui précède avec vos identifiants de base de données.


    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch(PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }

    $email = $_POST["email"];
    $password = $_POST["password"];
    


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:email AND password=:password");
$stmt->execute(array(':email' => $email, ':password' => hash('sha256', $password)));
$count = $stmt->rowCount();

$data = $stmt->fetch();
$index['id_User'] = $data['id_User'];

if ($count > 0) {

  
    $json = array("status" => 200,'message' => "Success", "id_user" =>$index['id_User']);

}else {
    $json = array("status" => 400,'message' => "Error");
}

echo json_encode($json);

$pdo = null;
?>