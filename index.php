<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des tâches</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script>
        function closeModal() {
            $('#exampleModal').modal('hide');
            document.getElementById("add-task-form").reset();
        }
        $(document).ready(function(){
            $('#exampleModal').on('hide.bs.modal', function () {
                document.getElementById("add-task-form").reset();
            });
            // Lorsque le formulaire d'ajout de tâches est soumis
            $("#add-task-form").submit(function(event){
                event.preventDefault();

                // Envoi des données du formulaire au script add-task.php via AJAX
                $.ajax({
                    type: "POST",
                    url: "add-task.php",
                    data: $("#add-task-form").serialize(),
                    success: function(response){
                        //alert(response);
                        $("#task-table-body").load("get-tasks.php");
                        closeModal();
                    },
                    error: function(xhr, status, error){
                        alert("Erreur : " + xhr.responseText);
                    }
                });
            });

            // Lorsqu'on clique sur le bouton "Supprimer" d'une tâche
            $("#task-table-body").on("click", ".delete-btn", function(){
                var taskId = this.dataset.id;
                console.log(this)
                console.log(taskId);

                // Envoi de l'ID de la tâche au script delete-task.php via AJAX
                $.ajax({
                    type: "POST",
                    url: "delete-task.php",
                    data: {id: taskId},
                    success: function(response){
                        alert(response);
                        $("#task-table-body").load("get-tasks.php");
                    },
                    error: function(xhr, status, error){
                        alert("Erreur : " + xhr.responseText);
                    }
                });
            });

            // Chargement initial des tâches
            $("#task-table-body").load("get-tasks.php");
        });
    </script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col">
            <?php include 'check-today-tasks.php'; ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col">

        </div>
        <div class="col">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter

            </button>

        </div>

    </div>

</div>
<table class="table">
    <thead>
    <tr>
        <th>Date</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody id="task-table-body">
    <!-- Les tâches seront affichées ici -->
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1>Liste des tâches</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-task-form">
            <div class="modal-body">

                    <label for="task-date">Date :</label>
                    <input type="date" name="task-date" required><br><br>
                    <label for="task-name">Nom :</label>
                    <input type="text" name="task-name" required><br><br>
                    <label for="task-desc">Description :</label>
                    <textarea name="task-desc"></textarea><br><br>
<!--                    <button type="submit">Ajouter</button>-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

