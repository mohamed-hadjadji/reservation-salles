<?php session_start() ?>
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

$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$requete = "SELECT login, titre, description, DATE_FORMAT(debut, \"%T\"), debut, DATE_FORMAT(fin, \"%T\"), fin, DATE_FORMAT(debut, \"%W\") FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur";
$query = mysqli_query($connexion, $requete);
$resultat = mysqli_fetch_all($query);
?>
     <section id="choix">
            <h1><b>Veuillez choisir votre créneau et réservez</b></h1>
     </section>
     <section id="connexion">
        
        <table>
                <thead>
                    <tr>
                        <th></th>
                        <th><b>Lundi</b></th>
                        <th><b>Mardi</b></th>
                        <th><b>Mercredi</b></th>
                        <th><b>Jeudi</b></th>
                        <th><b>Vendredi</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
function isdateok($heurecasebegin, $heurecaseend, $lecturebdd, $jour) {
    $k = 0;
    while ( $k < sizeof($lecturebdd) ) {
        $datecasebegin = date( 'H:i:s', strtotime($heurecasebegin) );
        $datecaseend = date( 'H:i:s', strtotime($heurecaseend) );
        $DateBegin = date( 'H:i:s', strtotime($lecturebdd[$k][3]) );
        $DateEnd = date( 'H:i:s', strtotime($lecturebdd[$k][5]) );
        if ( ($datecasebegin == $DateBegin) && $lecturebdd[$k][7] == $jour || ($datecaseend == $DateEnd) && $lecturebdd[$k][7] == $jour ) {
            return true;
        }
        $k++;
    }
}
$i = 0;
$j = 0;
while ( $i < 11 ) {
    if ( $i == 0 ) {
        $heured = "08:00:00";
        $heuref = "09:00:00";
    }
    if ( $i == 1 ) {
        $heured = "09:00:00";
        $heuref = "10:00:00";
    }
    if ( $i == 2 ) {
        $heured = "10:00:00";
        $heuref = "11:00:00";
    }
    if ( $i == 3 ) {
        $heured = "11:00:00";
        $heuref = "12:00:00";
    }
    if ( $i == 4 ) {
        $heured = "12:00:00";
        $heuref = "13:00:00";
    }
    if ( $i == 5 ) {
        $heured = "13:00:00";
        $heuref = "14:00:00";
    }
    if ( $i == 6 ) {
        $heured = "14:00:00";
        $heuref = "15:00:00";
    }
    if ( $i == 7 ) {
        $heured = "15:00:00";
        $heuref = "16:00:00";
    }
    if ( $i == 8 ) {
        $heured = "16:00:00";
        $heuref = "17:00:00";
    }
    if ( $i == 9 ) {
        $heured = "17:00:00";
        $heuref = "18:00:00";
    }
    if ( $i == 10 ) {
        $heured = "18:00:00";
        $heuref = "19:00:00";
    }
?>
    <tr>
        <?php
        while ($j < 6) {
            if ( $j == 1 ) {
                $jour = "Monday";
            }
            if ( $j == 2 ) {
                $jour = "Tuesday";
            }
            if ( $j == 3 ) {
                $jour = "Wednesday";
            }
            if ( $j == 4 ) {
                $jour = "Thursday";
            }
            if ( $j == 5 ) {
                $jour = "Friday";
            }
            if ( $j == 0 ) {
        ?>
            <td class="cheures">
            <?php
                if ($i == 0) {
                    echo "08h00 - 09h00";
                }
                elseif ($i == 1) {
                    echo "09h00 - 10h00";
                }
                elseif ($i == 2) {
                    echo "10h00 - 11h00";
                }
                elseif ($i == 3) {
                    echo "11h00 - 12h00";
                }
                elseif ($i == 4) {
                    echo "12h00 - 13h00";
                }
                elseif ($i == 5) {
                    echo "13h00 - 14h00";
                }
                elseif ($i == 6) {
                    echo "14h00 - 15h00";
                }
                elseif ($i == 7) {
                    echo "15h00 - 16h00";
                }
                elseif ($i == 8) {
                    echo "16h00 - 17h00";
                }
                elseif ($i == 9) {
                    echo "17h00 - 18h00";
                }
                elseif ($i == 10) {
                    echo "18h00 - 19h00";
                }
            }
            ?>
            </td>
            <?php
            if ( $j > 0 ) {
            ?>
            <?php
                $m = 0;
                while ( $m < 6 ) {
                    if ( $j == $m ) {
                        $l = 0;
                        while ( $l < 11 ) {
                            if ( $i == $l ) {
                                $isokevent = isdateok($heured, $heuref, $resultat, $jour);
                                if ( $isokevent == true ) {
                                    $requeteevent= "SELECT login, titre FROM reservations LEFT JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE DATE_FORMAT(debut, \"%T\")=\"$heured\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\" OR DATE_FORMAT(fin, \"%T\")=\"$heuref\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\"";
                                    $getidresa="SELECT id FROM reservations WHERE DATE_FORMAT(debut, \"%T\")=\"$heured\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\" OR DATE_FORMAT(fin, \"%T\")=\"$heuref\" AND DATE_FORMAT(debut, \"%W\")=\"$jour\"";
                                    $queryevent = mysqli_query($connexion, $requeteevent);
                                    $queryresa = mysqli_query($connexion, $getidresa);
                                    $resultatevent = mysqli_fetch_all($queryevent);
                                    $resultatresa = mysqli_fetch_all($queryresa);
                                    $idresa = $resultatresa[0][0];
                                    echo "<td>Titre: ".$resultatevent[0][1]."<br />Organisateur: ".$resultatevent[0][0]."<br /><a href=\"reservation.php?idresa=".$idresa."\">Plus d'infos</a></td>";
                                }
                                else {
                                    echo "<td>"."<a href=\"reservation-form.php\"><div>Choisir</div></a>"."</td>";
                                }
                            unset($isokevent);
                            }
                            $l++;
                        }
                    }
                    $m++;
                }
                ?>
            <?php
            }
            $j++;
        }
        $j = 0;
        $i++;
} ?>
</tr>
            </tbody>
        </table>
        <figure class="paint">
          <img  height="650" width ="620" src="img/arena4.png">
        </figure>
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


