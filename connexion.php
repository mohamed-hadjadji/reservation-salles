<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Connexion</title>
</head>
<body class="bodyc">

	<header>
		<nav id="menu">
      <div class="nav1">
        <img class="img1" src="img/image1.png">
        <img class="img2" src="https://i-love-png.com/images/paintball-png-photos.png">

      </div>
      <div class="nav2">
        <a href="index.php"><h2>Accueil</h2></a>
        <a href="connexion.php"><h2>Connexion</h2></a>
        <a href="inscription.php"><h2>Inscription</h2></a>
      </div>
    </nav>
	</header>

	<?php

	if(isset($_GET['login']) && isset($_GET['password']))
   {
   	    $connexion = mysqli_connect ("localhost", "root", "", "reservationsalles");

   	    $login = mysqli_real_escape_string($connexion,htmlspecialchars($_GET['login']));
        $password = mysqli_real_escape_string($connexion,htmlspecialchars($_GET['password']));

        if($login !== "" && $password !== "")
       {
            $requete = "SELECT count(*) FROM utilisateurs where
            login = '".$login."' ";
            $exec_requete = mysqli_query($connexion,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            $requete4 = "SELECT * FROM utilisateurs WHERE login='".$login."'";
            $exec_requete4 = mysqli_query($connexion,$requete4);
            $reponse4 = mysqli_fetch_array($exec_requete4);

            if( $count!=0 && $_SESSION['login'] !== "" && password_verify($password, $reponse4[2]) )
            {
            session_start();
            $_SESSION['login'] = $_GET['login'];
            $user = $_SESSION['login'];
            header('Location: index.php');
            }
           else
           {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
           }
        }
    }
    ?>
    <section class="form">
        <form action="" method="GET">
                <h2>Connexion</h2>
                
                <label><b>LOGIN</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>

                <label><b>PASSWORD</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'><b>Utilisateur ou mot de passe incorrect</b></p>";
                }

                if(isset($_GET['reconnect'])){
                    $con = $_GET['reconnect'];
                    if($con==1 || $con==2)
                        echo "<p style='color:red'><b>Connecte toi avec le nouveau profil</b></p>";
                }
                
                ?>
        </form>
    </section>
