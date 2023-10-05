<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Projets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Projets</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Projet</th>
                    <th>Heure de Début</th>
                    <th>Heure de Fin</th>
                    <th>Total du Jour</th>
                </tr>
            </thead>
            <tbody>
                <?php
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

                // Tableau pour stocker les totaux par projet
                $totals = array();

                // Récupérer les projets depuis la base de données
                $sql = "SELECT projetname, heure_debut, heure_fin, date FROM projet";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $projetname = $row["projetname"];
                        $heure_debut = $row["heure_debut"];
                        $heure_fin = $row["heure_fin"];
                        $date = $row["date"];

                        // Calculez le total du jour en soustrayant l'heure de début de l'heure de fin
                        $total_jour = strtotime($heure_fin) - strtotime($heure_debut);

                        // Ajouter le total du jour au total du projet correspondant
                        if (!isset($totals[$projetname])) {
                            $totals[$projetname] = 0;
                        }
                        $totals[$projetname] += $total_jour;

                        echo "<tr>";
                        echo "<td>$projetname</td>";
                        echo "<td>$heure_debut</td>";
                        echo "<td>$heure_fin</td>";
                        echo "<td>" . gmdate("H:i", $total_jour) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun projet trouvé.</td></tr>";
                }

                // Fermer la connexion à la base de données
                $conn->close();
                ?>
            </tbody>
        </table>

        <!-- Tableau pour afficher les totaux par projet -->
        <h2>Totaux par Projet</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Projet</th>
                    <th>Total Projet</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Afficher les totaux par projet
                foreach ($totals as $projetname => $total) {
                    echo "<tr>";
                    echo "<td>$projetname</td>";
                    echo "<td>" . gmdate("H:i", $total) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="ajouter_heure.php" class="btn btn-primary mt-3">Ajouter une Heure</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
