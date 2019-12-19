<?php
    session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Accueil</title>
</head>
<body id="bodya">
    <?php 
    if (isset($_SESSION['login'])==false)
    {
    ?>
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
    <a href="inscription.php"> <button type="button" class="reserver">REJOINT NOUS ET RESERVER MAINTENANT</button></a>
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
        <a href="reservation-form.php"><h2>Réserver</h2></a>
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
<a href="reservation-form.php"> <button type="button" class="reserver">RESERVER MAINTENANT</button></a>
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
          <h4><b> 7/7 - 365/an - UNIQUEMENT SUR RÉSERVATION - </b></h4>
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
  <footer></footer>
</body>
</html>