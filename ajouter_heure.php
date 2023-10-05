<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Heure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ajouter une Heure</h1>
        <form id="addHourForm" action="ajouter_heure_process.php" method="POST">
            <div class="mb-3">
                <label for="projetname" class="form-label">Nom du Projet</label>
                <input type="text" class="form-control" id="projetname" name="projetname" required>
            </div>
            <div class="mb-3">
                <label for="heure_debut" class="form-label">Heure de Début</label>
                <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
            </div>
            <div class="mb-3">
                <label for="heure_fin" class="form-label">Heure de Fin</label>
                <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Heure</button>
        </form>
        <a href="liste_projets.php" class="btn btn-secondary mt-3">Retour à la Liste des Projets</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
