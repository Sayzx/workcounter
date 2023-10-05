<?php
// Récupérer les données du formulaire
$projetname = $_POST['projetname'];
$heure_debut = $_POST['heureDebut'];
$heure_fin = $_POST['heureFin'];
$date = $_POST['date'];

// Établir une connexion à la base de données (assurez-vous de remplacer les valeurs appropriées)
$servername = "localhost";
$username = "root";
$password = ""; // Remplacez par votre mot de passe
$dbname = "workcounter";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Insérer les données dans la table projet
$sql = "INSERT INTO projet (projetname, heure_debut, heure_fin, date) VALUES ('$projetname', '$heure_debut', '$heure_fin', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Projet ajouté avec succès.";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>
