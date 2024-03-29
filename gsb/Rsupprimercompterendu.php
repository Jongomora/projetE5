<?php
try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO('mysql:host=localhost;dbname=bd_gsb', 'root', '');

    // Vérifier si l'ID est présent dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Récupérer la date du compte rendu
        $query = "SELECT date FROM form_visite WHERE id_form = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si la date est supérieure à 15 jours
        $dateCompteRendu = strtotime($row['date']);
        $dateLimite = strtotime('-15 days');

        if ($dateCompteRendu > $dateLimite) {
            // Afficher un pop-up avec JavaScript si la date est inférieure à 15 jours
            echo '<script>
                    alert("Suppression impossible : Le compte rendu a moins de 15 jours.");
                    window.location.href = "Rconsultationcompterendu.php";
                 </script>';
        } else {
            // Suppression de la ligne si la date est supérieure à 15 jours
            $deleteQuery = "DELETE FROM form_visite WHERE id_form = :id";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $deleteStmt->execute();

            echo "La suppression a été effectuée avec succès.";
        }
    } else {
        echo "ID non spécifié pour la suppression.";
    }

} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution de la requête
    echo 'Erreur : ' . $e->getMessage();
}

// Fermeture de la connexion
$pdo = null;
?>
