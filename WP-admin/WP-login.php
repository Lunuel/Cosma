<?php 
session_start();
include "../fct/connexion-admin.php";
?>
<!DOCTYPE html>
<html lang="fr">

<!-- Avant de demander de l'aide passez sur  https://www.w3schools.com/-->

	<head>
		<title>Se connecter</title>
		<meta charset="utf-8">

		<!-- CSS -->
		<link href="../css/styleIndex.css" rel="stylesheet" >
		<link href="../css/style-admin.css" rel="stylesheet" >

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
		<div class="wrapper-login-admin">
			<div class="C1" style="background:#2d2d57"><img style="display: block;margin: auto;"  src="../img/logo-Cosma.png"></div>
			<div style="margin:auto;max-width: 460px;width: 100%;padding: 15px;column-grid:">
				<p class="bleu Yanone t-center marg10 " style="font-size: 24px;">Bienvenue dans l'administration de Cosma Running
				</p>
				<p class="bleu Yanone t-center marg10" style="font-size: 24px;margin-bottom: 15px;">Si vous ne vous souvenez plus des codes de connexion veuillez contacter le créateur du site
					</p>
	
				<div class="C-Connexion-admin">
	

					<div  class="WC-admin bleu t-center">CONNEXION</div>
					<div>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
							<table class="table-admin-connexion">
								<tr>
									<th><label >Pseudo</label><br><input type="text" class="" name="pseudo"></th>
								</tr>
								<tr >
									<th><label >Mot de passe</label><br><input type="password" class="" name="mdp"></th>
								</tr>
														
								<tr>
									<th ><input type="submit" class="submit" value="Se connecter" id="submit-Connexion" name="valider_connexion-admin"></th>
								</tr>
								<tr>
									<th style="font-size: 15px;" class="white"><?php echo $ErreurConnexion;?> </th>
								</tr>
								
							</table>
						</form>
					</div>
				</div>
				<p class="marg10"><a class="bleu Yanone t-center marg10" href="../index.php"><i class="fa fa-long-arrow-left" style="font-size:17px"></i> Retour à l'accueil</a>
					</p

			</div>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>




	</body>

	</html>