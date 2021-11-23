<?php 
require 'fonction.php'; 
try{

    //Chargement de la fonction de connexion à la base de donnée
    $bdd=getBDD();

    //Définition de la requête SQL
    $id = $_GET['id'];
    
    $requete="
        SELECT matriculeAdh, nomAdh, prenomAdh, villeAdh, cpAdh, niveauAdh,libelletype
        FROM adherent
        RIGHT JOIN type
        ON adherent.numType = type.numType
        WHERE matriculeAdh = $id";


    //Exécution de la requête SQL et récupération de ses résultats
    $resultat=$bdd->query($requete);
}
catch(Exception $e){
    die('Erreur fatale :'.$e->getmessage());
}

?>

<!doctype html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Détails sur un adhérent</title>
</head>

<body>

    <h1>Détails sur un adhérent</h1>

    <?php
        echo "Le matricule de l'adhérent est ".escape($_GET['id']);
    ?>
    <table border="1">
        <caption><h1>Détail adhérent</h1></caption>
        <thead>
            <tr>
                <th>Matricule de l'adhérent</th>
                <th>Nom de l'adhérent</th>
                <th>Prénom de l'adhérent</th>
                <th>Niveau de l'adhérent</th>
                <th>Ville de l'adhérent</th>
                <th>Code postal de l'adhérent</th>
                <th>Statue de l'adhérent</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Récupération de tous les résultats de la requête dans un tableau
                $donnees=$resultat->fetchAll();

                //Itération sur les résultats de la requête SQL
                foreach ($donnees as $ligne) {
                    $matricule=$ligne['matriculeAdh'];
                    $nom=$ligne['nomAdh'];
                    $prenom=$ligne['prenomAdh'];
                    $nivadh=$ligne['niveauAdh'];
                    $ville=$ligne['villeAdh'];
                    $cpadh=$ligne['cpAdh'];
                    $lib=$ligne['libelletype'];
                echo "<td>$matricule</td>";
                echo "<td>$nom</td>";
                echo "<td>$prenom</td>";
                echo "<td>$nivadh</td>";
                echo "<td>$ville</td>";
                echo "<td>$cpadh</td>";
                echo "<td>$lib</td></tr>";
                
                    
                }
            ?>
        </tbody>
    </table>

</body>

</html>