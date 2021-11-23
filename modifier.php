<?php require 'fonction.php'; 

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

?>

<!doctype html>

<html>

	<head>
	    <meta charset="utf-8" />
	    <title>Modifier sur un adhérent</title>
	    <link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

	    <h1>Modifier un adhérent</h1>

	    <?php
	        echo "Le matricule de l'adhérent est ".escape($_GET['id']);

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
	            $libelletype=$ligne['libelletype'];
	        }
	    ?>
	   
	    <form action="personneModifier.php" method="get"> 
	    	<table>
	    	<tr>
		    	<td><input type="hidden" value="<?php echo $matricule; ?>" name="matricule"/></td>
	    	</tr>
	    	<tr>
		    	<td><label>Nom</label></td>
		    	<td><input type="text" value="<?php echo $nom; ?>" name="nom"/></td>
	    	</tr>
	    	<tr>
		    	<td><label>Prenom</label></td>
		    	<td><input type="text" value="<?php echo $prenom; ?>" name="prenom"/></td>
	    	</tr>
	    	<tr>
	    		<td><label>Niveau :</label></td>
	    		<td><input type="text" value="<?php echo $nivadh; ?>" name="nivadh"/></td>
	    	</tr>
	    	<tr>
	    		<td><label>Ville :</label></td>
	    		<td><input type="text" value="<?php echo $ville; ?>" name="ville"/></td>
	    	</tr>
	    	<tr>
		    	<td><label>Code postal :</label></td>
		    	<td><input type="text" value="<?php echo $cpadh; ?>" name="cpadh"/></td>
		    </tr>
	    	<tr>
		    	<td><label>Code Type Test :</label></td>
		    	<td>
		    		<select name="libelletype[]" name="libelltype">
				    	<option <?php if($libelletype == "Etudient") echo "selected"; ?> valeur="Etudient">Etudient</option>
				    	<option <?php if($libelletype == "Salarie"){echo "selected";} ?> valeur="Salarie">Salarie</option>
				    	<option <?php if($libelletype == "Retraite"){echo "selected";} ?> valeur="Retraite">Retraite</option>
		    		</select>
		    	</td>
	    	</tr>
	    	<tr>
	    		<td></td>
	    		<td>
	    			<input type="submit" name="submit"/>
	    		</td>
	    	</tr>
	    	</table>
		</form>
	</body>
</html>