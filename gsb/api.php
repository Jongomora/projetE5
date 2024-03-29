<?php
header("Content-Type: application/json");

// Connexion à la base de données avec PDO
$host = "localhost";
$dbname = "bd_gsb";
$username = "root";
$password = "";
$bdd = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($bdd, $username, $password, $options);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Récupération de la valeur envoyée par l'application externe (id_User)
$id_User = isset($_POST["id_User"]) ? $_POST["id_User"] : null;

// Vérifier si la valeur est définie
if ($id_User !== null) {
    // Requête pour récupérer les informations de l'utilisateur basé sur son id_User
    $sql = $pdo->prepare("SELECT * FROM users WHERE id_User = :id_User");
    $sql->execute(['id_User' => $id_User]);
    $user = $sql->fetch();  // Récupérer les données de l'utilisateur

    // Affichage du message de succès ou d'erreur sous forme de tableau JSON avec les données de l'utilisateur
    if ($user) {
        $json = array("status" => 200, 'message' => "Success", 'user' => $user);
    } else {
        $json = array("status" => 400, 'message' => "User not found");
    }
} else {
    $json = array("status" => 400, 'message' => "Missing parameters");
}

echo json_encode($json);

// Fermeture de la connexion PDO
$pdo = null;
?>