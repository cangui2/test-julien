<?php
// Connexion à la base de données
require ('config.php');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des tâches de la base de données
$sql = "SELECT * FROM tasks ORDER BY task_date ASC";
$result = $conn->query($sql);

// Génération du code HTML pour afficher les tâches
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["task_date"] . "</td>";
        echo "<td>" . $row["task_name"] . "</td>";
        echo "<td>" . $row["task_desc"] . "</td>";
        echo "<td><button class='btn btn-danger delete-btn' data-id='" . $row["id"] . "'>Supprimer</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Aucune tâche trouvée</td></tr>";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
