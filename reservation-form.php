<?php session_start() ?>
<html>
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reservation.css">
    <title>Réservation</title>
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
       date_default_timezone_set('Europe/Paris'); 
       $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
       $requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
       $query = mysqli_query($connexion, $requete);
       $resultat = mysqli_fetch_all($query, MYSQLI_ASSOC);
     ?>
     <section>
     	<h1>Veuillez remplir le formulaire pour la réservation</h1>
     	<form class="reserv-form" method ="post" action ="">
     		<label for="text"><b>Titre</b></label>
     	    <Select name="titre">
                <option></option>
                <option>Paintball Adulte</option>
                <option>Paintball Enfant</option>               
                <option>Paintball Anniversaire</option>
                <option>Paintball en Famille</option>
                <option>Autre Evenement</option>
                <option>Paintball EVG</option>
            </select>
            <label for="text"><b>Description</b></label>
            <input type="text" placeholder="Tapez une Description" name="description" required>
            <label for="datedebut"><b>Date de début</b></label>
            <input type="datetime-local" name="datedebut" required>
            <label for="datefin"><b>Date de fin</b></label>
            <input type="datetime-local" name="datefin" required>
            <input type="submit" value="RESERVER" name="valider">	
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
                              header('Location:reservation-form.php');
                              }   
                          } 
                    }
           

            mysqli_close($connexion);
            ?>
     </section>




</body>