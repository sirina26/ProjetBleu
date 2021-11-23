<?php
require 'fonction.php';


//Chargement de la fonction de connexion à la base de donnée
$bdd=getBDD();

//Prendre les valeurs
$matricule = $_GET['matricule'];
$nom = $_GET['nom']; 
$prenom = $_GET['prenom']; 
$nivadh = $_GET['nivadh']; 
$ville = $_GET['ville']; 
$cpadh = $_GET['cpadh']; 
$libelletype = implode("|",$_GET['libelletype']);
	$numtype=0;

if($libelletype=="Etudient"){
	$numtype = 2;
}
elseif($libelletype=="Salarie"){
	$numtype = 1;
}
else
{
	$numtype = 3;
}

//définition de la requéte sql
$requete="
	UPDATE adherent SET nomAdh = '$nom', prenomAdh = '$prenom',
	villeAdh = '$ville', cpAdh = $cpadh, niveauAdh = '$nivadh',
	numType = $numtype WHERE matriculeAdh = $matricule";

//Exécution de la requête SQL et récupération de ses résultats

if($bdd->query($requete))
    {
    	echo "</br>adhérent modifier";
    	echo "<table border='1'>
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
        <tbody>";
         echo "<td>$matricule</td>";
                echo "<td>$nom</td>";
                echo "<td>$prenom</td>";
                echo "<td>$nivadh</td>";
                echo "<td>$ville</td>";
                echo "<td>$cpadh</td>";
                echo "<td>$libelletype</td></tr>";
    }
    else
    {
    	echo "Erreur Update" . $bdd->error;
    }

?>