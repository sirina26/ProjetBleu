<?php
	function escape($valeur)
	{
		return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', False);
	}
	function getBDD(){

		return new PDO("mysql:host=localhost;dbname=badminton;charset=utf8", "utilisateur2", "root", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	}
?>
<!-- <a href="index.php">Accueil</a>
<link rel="stylesheet" type="text/css" href="style.css"> -->
