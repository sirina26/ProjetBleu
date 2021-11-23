<?php
require 'fonction.php';

//Chargement de la fonction de connexion à la base de donnée
$bdd=getBDD();

//Prendre les valeurs
$nom = $_POST['nom']; 
$prenom = $_POST['prenom']; 
$nivadh = $_POST['nivadh']; 
$ville = $_POST['ville']; 
$cpadh = intval($_POST['cpadh']); 
$libelltype = $_POST['libelltype'];
	$numtype=0;

if($libelltype == "Etudient"){
	$numtype = 2;
}
elseif($libelltype == "Salarie"){
	$numtype = 1;
}
elseif($libelltype == "Retraite")
{
	$numtype = 3;
}
else
{
	echo "erreur de libelltype";
}


echo $nom . ' est modifier avec succées '; 
echo 'Nom : ' . $nom . ' prenom : ' . $prenom . ' nivadh : ' . $nivadh . ' ville : ' . $ville . ' cpadh : ' . $cpadh. ' libelltype : ' . $libelltype  . 'numtype ' .$numtype ; 

$requete="
	INSERT INTO adherent (nomAdh, prenomAdh, villeAdh, cpAdh, niveauAdh, numType) 
    VALUES ('$nom','$prenom','$ville','$cpadh','$nivadh','$numtype')";

//Exécution de la requête SQL et récupération de ses résultats

if($bdd->query($requete))
    {
    	echo "Update successfully";
    }
    else
    {
    	echo "Erreur Update" . $bdd->error;
    }

?>
<!doctype html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Détails sur un adhérent</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>

<body>

    <h1>Détails sur un adhérent</h1>
<?php
	echo $nom . ' est modifier avec succées ';?></br>; 
	<?php
echo 'Nom : ' . $nom . '         prenom : ' . $prenom . '            nivadh : ' . $nivadh . '        ville : ' . $ville . '          cpadh : ' . $cpadh. '            libelltype : ' . $libelltype  . '       numtype ' .$numtype ; 
?>
</br>
<a href="index.php">Retour à l'accueil</a>
</body>