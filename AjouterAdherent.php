<?php
require 'fonction.php'; 
?>
<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Ajouter un adhérent</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>

<body>
	<form action="personneAjouter.php" method="post"> 
		<table>
		<tr>
	    	<td><label>Nom</label></td>
	    	<td><input type="text" name="nom"/></td>
		</tr>
		<tr>
	    	<td><label>Prenom</label></td>
	    	<td><input type="text" name="prenom"/></td>
		</tr>
		<tr>
			<td><label>Niveau :</label></td>
			<td><input type="text" name="nivadh"/></td>
		</tr>
		<tr>
			<td><label>Ville :</label></td>
			<td><input type="text" name="ville"/></td>
		</tr>
		<tr>
	    	<td><label>Code postal :</label></td>
	    	<td><input type="text" name="cpadh"/></td>
	    </tr>
		<tr>
	    	<td><label>Code Type Test :</label></td>
	    	<td>
	    		<select id="libelltype" name="libelltype">
			    	<option valeur="Etudient">Etudient</option>
			    	<option valeur="Salarie">Salarie</option>
			    	<option valeur="Retraite">Retraite</option>
	    		</select>
	    	</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" name="envoi"/>
			</td>
		</tr>
		</table>
	</form>
	<a href="index.php">Retour à l'accueil</a>
</body>
