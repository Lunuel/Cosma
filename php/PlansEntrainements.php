<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>COSMA Running</title>
		<meta charset="utf-8">

		<!-- CSS -->
		<link href="../css/styleIndex.css" rel="stylesheet" >

		<!-- Polices -->
		<?php include"../link/polices.html" ?>


		<?php include"../link/icons.html" ?>



	    <!-- Icone sur navigateur -->
	    <link rel="shortcut icon" href="../ico/.ico">

  		<!-- jQuery pour bootstrap -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  		<!-- Initialisation du viewport-->		
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Icons references-->	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>

	<body>
		<div class="wrapper">

			<?php include "./WP-Nav.php"; ?>

			<?php include "../php/WP-Connexion.php";  ?>

			<div class="Wrapper-Content C2-C3">
				<div style="width: 100%;">
					<p class="h1">Plans d'entrainements</p>
					<hr class="sep2 " style="max-width: 190px;">
					<p class="h1">10 km</p>
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>Plan d'entrainement 10km.xlsx</a></p>
					<p class="h1">Semi 5 jours</p>
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>Plan d'entrainement Semi 5 jours.xlsx</a></p>
					<p class="h1">Semi 4 jours</p>
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>Plan d'entrainement Semi 4 jours.xlsx</a></p>
					<p class="h1">Marathon 5 jours</p>
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>Plan d'entrainement Semi 5 jours.xlsx</a></p>
					<p class="h1">Marathon 4 jours</p>
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>Plan d'entrainement Semi 4 jours.xlsx</a></p>
				</div>


			</div>			
			<?php include"./WP-Footer.php";  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	</body>

	</html>