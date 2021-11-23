<?php 
    
    require 'fonction.php'; 

    //Chargement de la fonction de connexion à la base de donnée
    $bdd=getBDD();

    //Définition de la requête SQL
    $id = $_GET['id'];
    
    $requete="DELETE FROM adherent WHERE matriculeAdh = $id";

    //Exécution de la requête SQL et récupération de ses résultats
    $resultat=$bdd->query($requete);
?>

<!doctype html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Adhérent supprimer</title>
    </head>

    <body>
        <?php
            echo "Le matricule de l'adhérent est ".escape($_GET['id']);

            echo " l'adhérent est supprimer avec succés";
        ?>
    </body>
</html>