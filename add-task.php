<?php
require ('config.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $taskDate = $_POST["task-date"];
    $taskName = $_POST["task-name"];
    $taskDesc = $_POST["task-desc"];

    // Insertion des données dans la base de données
    $sql = "INSERT INTO tasks (task_date, task_name, task_desc) VALUES ('$taskDate', '$taskName', '$taskDesc')";
    if ($conn->query($sql) === TRUE) {
        echo "Tâche ajoutée avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

