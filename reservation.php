<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Réservation</title>
</head>
<body class="bodyt">
    <header>
        <nav id="menu">
            <div class="nav1">
                <img class="img1" src="img/image1.png">
                <a href="index.php"><img class="img2" src="https://i-love-png.com/images/paintball-png-photos.png"></a>

            </div>
            <div class="nav2">
                <a href="index.php"><h2>Accueil</h2></a>
                <a href="profil.php"><h2>Modification</h2></a>
                <a href="planning.php"><h2>Planning</h2></a>
                <a href="reservation-form.php"><h2>Réservation</h2></a>
                <a href="index.php?deconnexion=true"><h2>Déconnexion</h2></a>
            </div>
        </nav>
    
    </header>
    <?php
    $connexion= mysqli_connect("localhost", "root", "", "reservationsalles");
    if ( isset($_GET["idresa"]) )
     {
     $idresa = $_GET["idresa"];

    $requete = "SELECT login, titre,description,debut,fin FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE id=$idresa";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
  
           echo $resultat['login'];
	echo $resultat['titre'];
		   echo $resultat['description'];
		   echo $resultat['debut'];
		echo $resultat['fin'];
	}
		   
		
	
	