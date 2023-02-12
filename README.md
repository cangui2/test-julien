# Projet de gestion de tâches

## Description

Ce projet est une application de gestion de tâches permettant d'ajouter, de modifier et de supprimer des tâches. Les tâches sont stockées dans une base de données MySQL.

## Installation

1. Clonez le repository sur votre machine locale :



2. Importez le fichier `db.sql` dans votre serveur MySQL pour créer la base de données et la table nécessaire :

Remplacez `username` par votre nom d'utilisateur MySQL et `db_name` par le nom de la base de données que vous souhaitez utiliser.

3. Configurez les informations de connexion à la base de données dans le fichier`config.php` :


Remplacez $servername, $username, $password, $dbname par les informations de connexion à votre base de données.

4. Ouvrez la page `index.php` dans votre navigateur pour accéder à l'application.

## Fonctionnalités

- Ajout de tâches en indiquant une date, un nom et une description
- Affichage des tâches dans un tableau
- Modification et suppression de tâches existantes
- Notification si des tâches ont lieu aujourd'hui
- Fonctionne en PHP, HTML, CSS et JavaScript
- Utilisation de la bibliothèque Bootstrap pour le design

## Auteurs

- Canguilieme julien


## License

Ce projet est sous license MIT. Voir le fichier `LICENSE` pour plus d'informations.
