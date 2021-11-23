<?php

//Chargement de la fonction de connexion à la base de donnée
$bdd=getBDD();

//Prendre les valeurs
$matricule = $_GET['matricule'];
$nom = $_GET['nom']; 
$prenom = $_GET['prenom']; 
$nivadh = $_GET['nivadh']; 
$ville = $_GET['ville']; 
$cpadh = $_GET['cpadh']; 

echo $nom . ' est modifier avec succées '; 
echo 'matricule : ' . $matricule .'Nom : ' . $nom . ' prenom : ' . $prenom . ' nivadh : ' . $nivadh . ' ville : ' . $ville . ' cpadh : ' . $cpadh; 
?>