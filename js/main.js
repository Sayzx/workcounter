document.addEventListener("DOMContentLoaded", function () {
    const addProjectForm = document.getElementById("addProjectForm");
    const projectList = document.getElementById("projectList");

    // Fonction pour ajouter un projet à la liste
    function addProjectToList(project) {
        const listItem = document.createElement("li");
        listItem.className = "list-group-item";
        listItem.textContent = `Projet: ${project.projetname}, Début: ${project.heure_debut}, Fin: ${project.heure_fin}, Date: ${project.date}`;
        projectList.appendChild(listItem);
    }

    // Écouteur pour soumettre le formulaire d'ajout de projet
    addProjectForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const projectName = document.getElementById("projectName").value;
        const heureDebut = document.getElementById("heureDebut").value;
        const heureFin = document.getElementById("heureFin").value;
        const date = document.getElementById("date").value;

        // Envoi des données du formulaire au serveur (à implémenter en PHP)
        // Exemple en JavaScript :
        const projectData = {
            projetname: projectName,
            heure_debut: heureDebut,
            heure_fin: heureFin,
            date: date,
        };

        // Utilisez une requête AJAX pour envoyer les données au serveur PHP.
        // Vous devrez également implémenter la logique PHP pour ajouter le projet à la base de données.

        // Ajoutez ensuite le projet à la liste sans recharger la page.
        addProjectToList(projectData);

        // Effacez les champs du formulaire après l'ajout du projet.
        addProjectForm.reset();
    });

    // Vous pouvez également charger la liste des projets existants depuis la base de données ici (à implémenter en PHP).
    // Par exemple, vous pourriez récupérer les données via une requête AJAX et les ajouter à la liste en utilisant la fonction addProjectToList.
});
