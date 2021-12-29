<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Projet PPE Badminton</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>

<body>
<div id="container">

  <form action="" method=""> 
    <a href="gestionAdh.php">Gestion des adhernets</a>
    <br/>
    <br/>
    <a href="AjouterAdherent.php">Ajouter un adhernet</a>
    <br/>
    <br/>
    <a href="RechAdh.php">Recherche adhernet</a>
    <br/>
    <br/>
    <a href="login.php">login adhernet</a>
    <br/>
    <br/>
  </form>
  <p>
    <?php
      echo "<br><right>Nous somme le " . date("d/m/y")."<br></right>"."<br>";
    ?>
  </p>
</div>
  
</body>
</html>