<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $projetname = $_POST['projetname'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $date = $_POST['date'];

    // Établir une connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = ""; // Remplacez par votre mot de passe MySQL
    $dbname = "workcounter";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Insérer les données dans la table "projet"
    $sql = "INSERT INTO projet (projetname, heure_debut, heure_fin, date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $projetname, $heure_debut, $heure_fin, $date);

        if ($stmt->execute()) {
            echo "Heure ajoutée avec succès dans la table 'projet'.";
            header("Location: liste_projets.php");

        } else {
            echo "Erreur lors de l'ajout de l'heure dans la table 'projet' : " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "La requête n'est pas de type POST.";
}
?>
