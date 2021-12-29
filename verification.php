<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    //Appel du fichier fonctions.php
	require 'fonction.php';

	//Chargement de la fonction de connexion à la base de donnée
	$bdd=getBDD();

	//Exécution de la requête SQL et récupération de ses résultats
	$resultat=$bdd->query($requete);
    
    $username =$_POST['username']; 
    $password = $_POST['password'];
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
            nom = '".$username."' and mdp = '".$password."' ";
	        $resultat=$bdd->query($requete);
			$donnees=$resultat->fetchAll();
            $count = $donnees['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
?>