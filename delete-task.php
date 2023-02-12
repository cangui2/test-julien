<?php
// Connexion à la base de données
require ('config.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération de l'ID de la tâche depuis les données de la requête
$taskId = $_POST["id"];

// Suppression de la tâche de la base de données
$sql = "DELETE FROM tasks WHERE id='$taskId'";
if ($conn->query($sql) === TRUE) {
    echo "Tâche supprimée avec succès";
}

