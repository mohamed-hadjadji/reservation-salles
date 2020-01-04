<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Réservation</title>
</head>
<body id="reservation-formbody">

    <?php

    include("bar-nav.php");
    if (isset($_SESSION['login']))
    {
       date_default_timezone_set('Europe/Paris'); 
       $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
       $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
       $query = mysqli_query($connexion, $requete);
       $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
     ?>
     <section  id="reservation-form-section">
     	<h1 id="h1reservation-form"><b>Veuillez remplir le formulaire de la réservation</b></h1>
     	<form class="reserv-form" method ="post" action ="">
     		<label class="labelreservationform" for="text"><b>Titre: </b></label>
     	    <Select id="selectreservation-form" name="titre">
                <option></option>
                <option>Paintball Adulte</option>
                <option>Paintball Enfant</option>               
                <option>Paintball Anniversaire</option>
                <option>Paintball en Famille</option>
                <option>Autre Evenement</option>
                <option>Paintball EVG</option>
            </select>
            <label class="labelreservationform" for="text"><b>Description: </b></label>
            <input class="input-reservation-form" type="text" placeholder="Tapez une Description" name="description" required>
            <label class="labelreservationform" for="datedebut"><b>Date de début: </b></label>
            <input class="input-reservation-form" type="datetime-local" name="datedebut" required>
            <label class="labelreservationform" for="datefin"><b>Date de fin: </b></label>
            <input class="input-reservation-form" type="datetime-local" name="datefin" required><br>
          
            <br><input type="submit" value="RESERVER" name="valider">
     	</form>
     	<?php
                    if ( isset($_POST["valider"]) )
                    {
                          $titro = $_POST['titre'];
                          $renametitre = addslashes($titro); 
                          $descriptio = $_POST['description'];
                          $renamedescritpion = addslashes($descriptio); 
                          $datedebut = $_POST['datedebut'];
                          $datefin = $_POST['datefin'];
                          $startdate = date('Y-m-d H:i:s', strtotime($datedebut));
                          $enddate = date('Y-m-d H:i:s', strtotime($datefin));
                          if($startdate < date('Y-m-d H:i:s')){
                              echo "Vous ne pouvez pas reserver a une date anterieur au ".date('d-m-Y H:i:s');
                          
                          }
                          elseif ($enddate < $startdate) {
                              echo "Vous ne pouvez pas choisir une date de fin antérieur a la date de debut";
                          }
                          else{
                              $requete2 = "SELECT * FROM reservations WHERE (debut BETWEEN '$startdate' AND '$enddate') OR (fin BETWEEN '$startdate' AND '$enddate') ";
                              $query2 = mysqli_query($connexion, $requete2);
                              $resultat2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                              if(!empty($resultat2)){
                                echo "Une reservation existe deja a cette date";
                              }
                              else{
                              $requete3 = "INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES ('$renametitre', '$renamedescritpion', '$startdate', '$enddate',  ".$resultat[0]['id'].")";
                              $query3 = mysqli_query($connexion, $requete3);
                              header('Location:planning.php');
                              }   
                          } 
                    }
           

            mysqli_close($connexion);
            ?>
     </section>
    <?php
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
