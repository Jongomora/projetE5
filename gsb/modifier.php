<?php
// Assurez-vous d'avoir une connexion à la base de données ici
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$baseDeDonnees = "bd_gsb";

try {
    // Créez une connexion à la base de données en utilisant PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees", $utilisateur, $motDePasse);

    // Définissez l'attribut PDO pour afficher les erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupère les valeurs du formulaire
        $famille_medicament = $_POST['famille_medicament'];
        $composition = $_POST['composition'];
        $effet_indesirable = $_POST['effet_indesirable'];
        $contre_indication = $_POST['contre_indication'];
        $prix_echantillon = $_POST['prix_echantillon'];

        // Mettez à jour les données dans la base de données
        // Assurez-vous d'avoir une requête SQL appropriée pour mettre à jour les données
        
        $sql = "UPDATE medicament SET composition = :composition, effet_indesirable = :effet_indesirable, contre_indication = :contre_indication, prix_echantillon = :prix_echantillon WHERE famille_medicament = :famille_medicament";

        // Préparez la requête
        $requete = $connexion->prepare($sql);

        // Liez les paramètres
        $requete->bindParam(':composition', $composition);
        $requete->bindParam(':effet_indesirable', $effet_indesirable);
        $requete->bindParam(':contre_indication', $contre_indication);
        $requete->bindParam(':prix_echantillon', $prix_echantillon);
        $requete->bindParam(':famille_medicament', $famille_medicament);

        // Exécutez la requête
        $resultat = $requete->execute();

        // Vérifie si la mise à jour a réussi
        if ($resultat) {
            echo "Les données ont été modifiées avec succès.";
        } else {
            echo "Erreur lors de la modification des données : " . $requete->errorInfo()[2];
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

// Assurez-vous de fermer la connexion à la base de données à la fin du script
$connexion = null;
?>
