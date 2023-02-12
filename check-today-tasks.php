<?php
// Connexion à la base de données
require ('config.php');

// Vérification des erreurs de connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer toutes les tâches avec une date égale à la date d'aujourd'hui
$today = date("Y-m-d");
$sql = "SELECT * FROM tasks WHERE task_date = '$today'";
$result = $conn->query($sql);

// Si des tâches sont trouvées, afficher une alerte avec les informations des tâches
if ($result->num_rows > 0) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Vous avez des tâches à faire aujourd\'hui :</strong><br>';
    while($row = $result->fetch_assoc()) {
        echo 'Nom: '.$row["task_name"].' <br> Description: '.$row["task_desc"].'<br>';
    }
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
