<?php
try{
	//Appel du fichier fonctions.php
	require 'fonction.php';

	//Chargement de la fonction de connexion à la base de donnée
	$bdd=getBDD();

	//Définition de la requête SQL
	$requete="SELECT matriculeAdh,nomAdh,prenomAdh,NiveauAdh FROM adherent ORDER BY nomAdh ASC";

	//Exécution de la requête SQL et récupération de ses résultats
	$resultat=$bdd->query($requete);

	//Calcul du nombre de résultats
	$nbEmployes=$resultat->rowCount();
}
catch(Exception $e){
	die('Erreur fatale :'.$e->getmessage());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Projet PPE Badminton</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="containerS">
	<form action="" method="get">
	<table class='cent' border="1">
		<caption><h1>Gestion des adhérents</h1></caption>
		<thead>
			<tr>
				<th>Actions</th>
				<th>Nom de l'adhérent</th>
				<th>Prénom de l'adhérent</th>
				<th>Niveau de l'adhérent</th>
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
				$nivadh=$ligne['NiveauAdh'];
				echo "<tr><td>
				<button><a style='text-decoration:none' href='details.php?id=$matricule'>Détails</a></button>
				<button><a style='text-decoration:none' href='supprimer.php?id=$matricule'>Supprimer</a></button>
				<button><a style='text-decoration:none' href='modifier.php?id=$matricule'>Modifier</a></td></button>";
				echo "<td>$nom</td>";
				echo "<td>$prenom</td>";
				echo "<td>$nivadh</td></tr>";
				
			}
			?>
		</tbody>
	</table>
	<br/>
	<?php
		echo "Le nombre d'adhérent est :".$nbEmployes;
	?>
	<br/>
<a href="index.php">Retour à l'accueil</a>
		</form>
		</div>
</body>
</html>