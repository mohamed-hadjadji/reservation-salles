<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Modifier</title>
</head>
<body class="bodyp">

  <?php
  session_start();
  include("bar-nav.php");
  if (isset($_SESSION['login']))
  {
    $connexion = mysqli_connect("localhost","root","","reservationsalles");

    $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
    $req = mysqli_query($connexion, $requete);
    $data = mysqli_fetch_assoc($req);
  ?>
    <section id="connexion">
        <figure class="paint">
          <img  height="600" width ="620" src="img/arena3.png">
        </figure>
       <form class="form" method="POST" action="">
            <main class="connect">
                <img height="120" src="https://www.freeiconspng.com/uploads/bluee-target-icon-6.png">
                <h2>MODIFIER</h2>
            </main>
            <main class="login">

                <label>NOUVEAU LOGIN</label>
                <input type="text" value="<?php echo $data['login']?>" placeholder="Nouvel identifiant" name="login"></input>

                <label>NOUVEAU PASSWORD</label>
                <input type="password" value="<?php echo $data['password']?>" placeholder="nouveau mot de passe" name="mdp"></input>

                <input type="submit" name="Modifier" value ="VALIDER">
            </main>


        </form>
        
   </section>
  <?php

    if (isset($_POST['Modifier']))
    {


      $login = $_POST['login'];
      $passe = password_hash($_POST["mdp"], PASSWORD_DEFAULT, array('cost' => 12));

      $requete2 = "UPDATE utilisateurs SET login = '$login', password = '$passe' WHERE login = '".$_SESSION['login']."'";
      $query2=mysqli_query($connexion,$requete2);
      session_unset();
      header("location:connexion.php?reconnect=1");
    }
  }
  else 
  {
  ?>
    <section id="notcon">
      <p>Veuillez vous connecter pour accéder à votre page !</p>
    </section>
        <?php
  }
  

?>
 
   <footer>
        <h2><b>Contact</b></h2>
        <h3>TERRAIN PAINTBALL MARSEILLE</h3>
        <p>15 Chemin du bois de l’Aumône - Via D4A EOURES
          13011 Marseille</p>
        <p>Téléphone : <b>04 69 00 16 84</b></p>
        <a href="https://www.paintballmarseille.com/site/pdf/INVIT%20ANNIV%203.pdf"> <button type="button" class="contact">TELECHARGER VOTRE INVITATION</button></a>
        <a href="https://www.google.fr/maps/dir/IKEA+Marseille+La+Valentine,+ZAC+la+Ravelle,+Avenue+Fran%C3%A7ois+Chardigny,+13011+Marseille/Chemin+du+Bois+de+l'Aum%C3%B4ne,+13011+Marseille/@43.2925951,5.4851795,14z/data=!4m15!4m14!1m5!1m1!1s0xd552856d05bc761:0x571bcb03362f186a!2m2!1d5.480252!2d43.293167!1m5!1m1!1s0x12c9bcf4cf807b1b:0x996fe742a9f9e5f2!2m2!1d5.5232904!2d43.2933535!3e0!5i2"> <button type="button" class="contact">Plan d'accés</button></a>
    </footer>
</body>
</html>

        
