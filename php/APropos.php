<?php session_start(); ?>
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

			<?php include "WP-Nav.php"; ?>

			<?php include "../php/WP-Connexion.php";  ?>

			<div class="Wrapper-Content C2-C3">
				<div>

					<p class="h1 marg10 ">Bureau<p>
						<hr class="sep2 bleu" style="max-width: 60px;">
					<p><span class="bureau-span bleu">Président de la section : </span> Marc BREDIF<br>

					<span class="bureau-span bleu">Secrétaire de section :</span> Olivier LHUILLERY <i class="fa fa-envelope-o gris" style="font-size:12px;margin-right: 5px;"></i><a class="gris" href="mailto:secretariat@cosma-marathon.fr"><span style="font-size: 14px;">secretariat@cosma-marathon.fr</span></a><br>

					<span class="bureau-span bleu">Trésorière de la section :</span> Anne SONNIER<br><br>

					<span class="Yanone bleu">Autres membres :</span> <br>
					Jean-Baptiste BENNOIT (responsable communication)<br>
					Anne-Claude HULLY<br>
					Christine MARCAILLOU<br>
					Bruno OUALID<br>
					
					Ingrid VERON (responsable équipement)<br><br>

					<span class="Yanone bleu">Entraîneurs :</span> <br>
					Claude LE BRIGAND (mardi/jeudi)<br>
					Ludovic BOULET (vendredi)</p>	
					<br>
					<p class="h1 marg10">Stade Louis Frébault<p>
					<hr class="sep2 bleu" style="max-width: 170px;">
					<p>Notre stade : <br>
						Centre sportif Louis Frébault <br>
						17/19, rue du Colonel Fabien  <br>
						94110 ARCUEIL</p>

					<iframe src="https://www.google.com/maps/d/embed?mid=1ZAQNuy9ryeAQix_KoxKIcDzLH0o&hl=fr" id="map" ></iframe>

					<p class="h1 marg10">Charte de la section<p>
					<hr class="sep2 bleu" style="max-width: 165px;">
					<p><a target="_blank" class="gris" href="../ressources/Charte.pdf"><i class="gris fa fa-file-pdf-o" style="font-size:20px;margin-right: 5px;"></i>Charte.pdf</a></p>
		
				</div>		
			</div>

			<?php include"./WP-Footer.php";  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	</body>

	</html>