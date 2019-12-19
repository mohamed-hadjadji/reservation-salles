<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="reservation.css">
	<title>Inscription</title>
</head>
<body>

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

$connexion =  mysqli_connect("localhost","root","","reservationsalles");
if (isset($_POST['connexion']))
{
	 $mdp= password_hash($_POST["mdp1"], PASSWORD_DEFAULT, array('cost' => 12));
	if ($_POST['mdp1']==$_POST['mdp2'])
    {
    $requet="SELECT* FROM utilisateurs";
    $query2=mysqli_query($connexion,$requet);
    $resultat=mysqli_fetch_all($query2);
    $trouve=false;
       foreach ($resultat as $key => $value) 
       {
            if ($resultat[$key][1]==$_POST['login'])
            {
               $trouve=true;
               echo "Login deja existant!!";
            }
       }
       if ($trouve==false)
        {
            $sql = "INSERT INTO utilisateurs (login,password)
                VALUES ('".$_POST['login']."','".$mdp."')";
            $query=mysqli_query($connexion,$sql);
            header('location:connexion.php');
        }
    }
    else
    {
        echo "Les mots de passe doivent être identique!";
    }
}
?>
        <form class="form" method="POST" action=""> 
            <h2>Inscrivez vous pour la réservation</h2>
        
        
            <label>Login:</label>
            <input type="text" name="login" placeholder="Entrez votre Login" required><br/>
            <label>Mot de passe:</label>
            <input type="password" name="mdp1" placeholder="Entrez votre mot de passe" required><br/>
            <label>Confirmez Mot de passe:</label>
            <input type="password" name="mdp2" placeholder="Confirmez votre mot de passe" required><br/> 
            <input align="center" type="submit" value="valider" name="connexion">
        
        </form>

    </body>
</html>