<?php 
session_start() 
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>COSMA Running</title>

		<!-- CSS -->
		<link href="./css/styleIndex.css" rel="stylesheet" >

		<!-- Polices -->
		<?php include_once "./link/polices.html"; ?>

		<link rel="shortcut icon" href="./ico/ico.png">


	    <!-- Icone sur navigateur -->
	    <link rel="shortcut icon" href="./ico/.ico">

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


		<?php include_once "./php/WP-Nav.php";  ?>

		<?php include_once "./php/WP-Connexion.php";  ?>



			<div class="Wrapper-Content C2-C3">
				<div>
					<p class="bleu t-justify">Bienvenue sur le site de la section Running du COSMA (club omnisport d’Arcueil dans le Val-De-Marne).
					Anciennement COSMA Marathon.</p> <br>
					<p class="h1">Pourquoi rejoindre le COSMA RUNNING ?<p>

					<ul>
						<li class="content-li-accueil"><i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Vous souhaitez débuter ou reprendre une activité régulière de course à pied pour vous maintenir en forme ?</li>
						<li class="content-li-accueil">
						<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Vous êtes adeptes du jogging et vous souhaitez rejoindre un club pour la motivation, l’émulation et la convivialité qu’apporte celui-ci ?</li><li class="content-li-accueil"><i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>
						Vous voulez vous lancer dans l’aventure des courses d’endurance sans avoir l’ambition de battre le record du monde du marathon ?</li><li class="content-li-accueil">
						<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Vous avez déjà participé à des courses hors stade (10 km ou plus, trails, …) et vous avez envie de progresser grâce à un entrainement adapté ?</li>
					</ul>	

						<p class="marg15 h1" >Si vous répondez OUI à l’une de ces questions, c’est le moment de nous rejoindre ! Au programme : <br></p>
						<p>
						Des séances sur piste au stade Louis Frébault d’Arcueil les mardis et jeudis soir, encadrés par un entraîneur diplômé. <br>
						Des entrainements en groupe le week-end, en général au parc de Sceaux.
						Des sorties compétition en région parisienne et hors région parisienne subventionnées par la section : 5 km, 10 km, semi-marathons, marathons, trails.</p>
					
						<img class="img-slide-Accueil" src="./img/accueil.jpg" >
	
						
					
				</div>
			</div>

<?php include_once"./php/WP-Footer.php";  ?>

		</div>


	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>




	</body>

	</html>