<?php 
session_start();

include "../fct/confirmAccount.php";
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

			<div class="Wrapper-Content C1-C3">
				<div style="width: 100%;height: 100%;display: flex;">
					<div style="margin: auto;"><p class="h1 t-center">Vérification du mail</p>
					<hr class="sep2 " style="width:100%; ">
					<p class="t-center"><?php if(isset($Compte)){echo $Compte;} ?></p>
					<p class="marg10 bleu t-center"><i class="fa fa-arrow-circle-o-right" style="font-size:20px;margin-right: 3px;"></i><a href="../index.php" class="bleu">Retour à l'accueil</a></p></div>
					
					
				</div>


			</div>			
			<?php include"./WP-Footer.php";  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	</body>

	</html>