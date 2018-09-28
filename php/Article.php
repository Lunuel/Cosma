<?php session_start(); 
	if (!isset($_GET['article'])) {
		header('Location: ../index.php');
	}
?>
<!DOCTYPE html>
<html lang="fr">

<!-- Avant de demander de l'aide passez sur  https://www.w3schools.com/-->

	<head>
		<title>COSMA Running</title>
		<meta charset="utf-8">

		<!-- CSS -->
		<link href="../css/styleIndex.css" rel="stylesheet" >

		<!-- Polices -->
		<?php include"../link/polices.html" ?>

		<?php include"../link/icons.html" ?>


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


			<?php include"../php/WP-Nav.php";  ?>

			<?php include"../php/WP-Connexion.php";  ?>



			<div class="Wrapper-Content C2-C3">
				<div>
						<div class="C-article active-article" style="min-height: auto;padding-bottom: 35px;">
							<?php include"../fct/showArticle.php"; ?>
						</div>		
					
				</div>
			</div>

			<?php include"../php/WP-Footer.php"  ?>

		</div>


	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	</body>

	</html>