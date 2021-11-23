<?php
 require 'fonction.php'; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Recherche</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
	<form action="RechAdh.php" method="GET"> 
    	<label>Nom : </label>
    	<input type="text" name="nom"/>
    	<input type="submit" name="envoi"/>
	</form>
	</body>
</html>
<?php

	$bdd=getBDD();

	if (isset($_GET['envoi'])){
		$nom = $_GET['nom']; 
	    //Définition de la requête SQL
	    //verifier si le nom existe
	  	$reqverif="SELECT COUNT(*)  as nomAdh FROM adherent WHERE nomAdh='$nom'";
	  	$res=$bdd->query($reqverif);
	  	//car la requette return un array
	  	$don=$res->fetch();

		$var=(int)$don[0];
	

	  	if($var > 0){
		  	//affichage
		    $requete="
		    SELECT matriculeAdh, nomAdh, prenomAdh, villeAdh, cpAdh, niveauAdh,libelletype
			FROM adherent
			RIGHT JOIN type
			ON adherent.numType = type.numType
		    WHERE nomAdh = '$nom'";

		    $resultat=$bdd->query($requete);
			$donnees=$resultat->fetchAll();
			foreach ($donnees as $ligne) {
					$matricule=$ligne['matriculeAdh'];
					$nom=$ligne['nomAdh'];
					$prenom=$ligne['prenomAdh'];
					$nivadh=$ligne['niveauAdh'];
					$ville = $ligne['villeAdh']; 
					$cpadh = $ligne['cpAdh']; 
					$libelletype = $ligne['libelletype'];		
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
		}
		else
		{
			echo "le nom n'existe pas";
		}
	}			
?>