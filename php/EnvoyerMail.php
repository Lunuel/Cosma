<?php
session_start();
include_once"connectBDD.php";
include"../fct/EnvoyerMail.php";
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

			<?php include "./WP-Nav.php" ?>

			<?php include "../php/WP-Connexion.php"  ?>

			<div class="Wrapper-Content C2-C3">
				<div style="width: 100%;">

					<p class="h1">Je veux m'inscrire sur le site...</p>
					<hr class="sep2 bleu" style="max-width: 250px;">
					<div class="C-Inscription">
						<div  class="WC-id">Inscription</div>
						<div >
		
						<form id="formIns" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
							<table id="table-Ins" style="color: white">
								<tr>
									<th><input  id="mail" type="text" class="" name="email" placeholder="Email"><label id="verif"> </label></th>
								</tr>
								<tr>
									<th><input type="submit" class="submit" id="submit-Register" style="color: white" value="Envoyer le mail" name="valider_mail"></th>
								</tr>
							</table>
						</form>
					</div>	
				</div>
			</div>
			<?php
			if (isset($_SESSION['InscriptionReussie'])) {			
				echo $_SESSION['InscriptionReussie'];}
			 ?>
			</div>

			<?php include"./WP-Footer.php"  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>


	<script>
			 $('#butt-rib').click(function(){
		    	$('#browse-rib').click();
			});
		</script>


	</body>

	</html>