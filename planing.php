<?php
session_start();  
?>
<html>

	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Planing</title>
	</head>
		<header>
		</header>
			<body>

<h1>planing</h1>

<table>
	<thead>
		<th></th>
		<th>lundi</th>
		<th>mardi</th>
		<th>mercredi</th>
		<th>jeudi</th>
		<th>vendredi</th>
	</thead>
<?php
$connexion = mysqli_connect("localhost","root","","reservationsalles");
$requete ="SELECT * FROM reservations";
$query= mysqli_query($connexion,$requete);
$resultat= mysqli_fetch_all($query);
var_dump($resultat);



// include 'tableau.php';

 for($h=8; $h <=19; $h++){
 	echo "<tr>";
 	echo"<td>$h</td>";

 	 	 	for($jour= 1 ; $jour <=5 ; $jour++){
 	

 		  echo "<td>";


 	
 					foreach ($resultat as $resultat2) {
 						$heure=date("G" , strtotime($resultat2[3]));
 						$heure2=date("G" , strtotime($resultat2[4]));
 						 // echo "$heure<br />";
 						// echo "limite";
 						$jour2=date("w" , strtotime($resultat2[3]));
 						// echo "$jour2<br />";

 						if($jour==$jour2 && $h>=$heure && $h <=$heure2)
 						{
 							
 							echo "$resultat2[1]";
 						}
 						
 					}
 					echo "</td>";
 	}
 	echo "</tr>";

}


?>

 	

</html>
