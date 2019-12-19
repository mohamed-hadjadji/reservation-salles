<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Modifier</title>
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
        <a href="profil.php"><h2>Modification</h2></a>
        <a href="planning.php"><h2>Planning</h2></a>
        <a href="reservation-form.php"><h2>Reserver</h2></a>
        <a href="index.php?deconnexion=true"><h2>Déconnexion</h2></a>
      </div>
    </nav>
    
  </header>

  <?php
  session_start();
$connexion = mysqli_connect("localhost","root","","reservationsalles");

$requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);

if (isset($_GET['Modifier']))
{


$login = $_GET['login'];
$passe = $_GET['mdp'];

$requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
$query2=mysqli_query($connexion,$requete2);
session_unset();
header("location:connexion.php?reconnect=1");
}

?>
       <form method="get" action="">


                        <label>Nouveaux login:</label>
                        <input type="text" value="<?php echo $data['login']?>" placeholder="Nouvel identifiant" name="login"></input><br><br/>

                        <label>Nouveau Password:</label>
                        <input type="password" value="<?php echo $data['password']?>" placeholder="nouveau mot de passe" name="mdp"></input><br><br/>

                        <input type="submit" name="Modifier" value ="Valider">


        </form>
        
