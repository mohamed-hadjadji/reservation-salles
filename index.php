<?php
    session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Accueil</title>
</head>
<body class="bodya">
    <?php 
    if (isset($_SESSION['login'])==false)
    {
    ?>
  <header>

    <nav id="menu">
      <div class="nav1">
        <img class="img1" src="img/image1.png">
        <a href="index.php"><img class="img2" src="https://i-love-png.com/images/paintball-png-photos.png"></a>

      </div>
      <div class="nav2">
        <a href="index.php"><h2>Accueil</h2></a>
        <a href="connexion.php"><h2>Connexion</h2></a>
        <a href="inscription.php"><h2>Inscription</h2></a>
      </div>
    </nav>
    <a href="connexion.php"> <button type="button" class="reserver">REJOINEZ NOUS ET RESERVEZ MAINTENANT</button></a>
  </header>

     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       
    ?>
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
 
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:index.php");
                   }
                }
             
            ?>
<?php
$user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez réserver maintenant.</b></h3>"; 
 ?>
<a href="planning.php"> <button type="button" class="reserver">RESERVER MAINTENANT</button></a>
</header>
<?php
}
?>
  <section id="defilie">
    <article id="tache1">
      <figure>
        <img src="img/tache1.png">
      </figure>
      <main id="picture1">
        <div class="pic1"><p>Paintball Enfant</p></div>
        <div class="pic2"><p>Paintball Adulte</p></div>
        <div class="pic3"><p>Paintball Anniversaire</p></div>
      </main>
    </article>
    <article id="tache2">
      <main id="picture2">
        <div class="pic4"><p>Paintball en Famille</p></div>
        <div class="pic5"><p>Autre Evenement</p></div>
        <div class="pic6"><p>Paintball EVG</p></div>
      </main>
      <figure>
        <img height="400" src="img/tache2.png">
      </figure>
    </article>
  </section>
  <section id="intro">

    <article id="present">
      <img height="80" src="img/target.png">
      <h1><b>PRÉSENTATION</b></h1>
      <h3><b>DÉCOUVREZ NOUS EN QUELQUES MOTS</b></h3>
      <h2>PAINTBALL MARSEILLE - SITE OFFICIEL -TERRAIN ET ORGANISATION DE PARTIES DE PAINTBALL SUR MARSEILLE 13 ET LA REGION PACA</h2>
      <div id="para">
        <div class="text">
          <p>Le plus grand site de Paintball 13 de la Région PACA (Bouches du Rhône ) vous accueille tous les jours, sur RESERVATION, sur ses 35 hectares de terrains boisés et entièrement sécurisés pour des moments 100% Adrénaline.</p>
          <h4><b>- UNIQUEMENT SUR RÉSERVATION - </b></h4>
          <p><b>Paintball Marseille</b> organise des parties de paintball pour des" petits" de 6 à 10 ans et pour des "grands" Adultes 10 ans et +</p>
        </div>
        <div class="text">
          <p><b>Paintball Marseille,</b> c'est l'organisateur de vos évènements: <u>Anniversaire,</u> <u>Enterrement de vie de célibataire,</u>  Journée d'intégration Lycée, <u>Centre Aéré, groupes et CE....</u></p>
        </div>
      </div>
    </article>
    <article id="video">
      <div class="deco">
      <h1><b>DÉCOUVREZ NOUS</b></h1>
      <h3><b>EN VIDEO</b></h3>
      </div>
      <iframe width="1300" height="600" src="https://www.youtube.com/embed/mGI5ZxCVVXA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </article>
  </section>
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