<?php 

session_start(); 

include "../fct/infosAdherents.php";
include "./connectBDD.php";
include "../fct/addQuestionnaire.php";
include "../fct/count.php";
include "../fct/infosSupp.php";
include"../fct/dateFR.php";


if (!isset($_SESSION['id_adherent'])) {
	header('Location: ../index.php');
}
else {
	$idAdherent = $_SESSION['id_adherent'];
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
		<div class="wrapper" >

			<?php include "./WP-Nav.php" ?>

			<?php include "../php/WP-Connexion.php"  ?>

			<div class="Wrapper-Content C2-C3">
				<div>
					<?php
						InfosAdherent($idAdherent);
					 ?>


					<p class="h1 marg10">Informations supplémentaires<p>
					<hr class="sep2 bleu" style="max-width: 250px;">

					<p style="font-size: 17px;" class="bleu marg10">Vous avez le choix de transmettre soit une licence ou un certificat médical</p>




					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					<div class="upload">
					    <h1 class="browse">Sélectionnez votre certificat médical :</h1>
					    <button class="butt-browse Yanone" id="butt-certificat">Choisir un fichier <i class="fa fa-upload white" style="font-size:18px;margin-left: 3px;"></i></button>
					    <input type="file" name="certificat" value="" class="browse-input" id="browse-certificat">
					</div>
					    
					    <p style="font-size: 15px;" class="bleu marg10">Ou</p>
					<div class="upload">    
					    <h1 class="browse">Sélectionnez votre licence :</h1>
					    <button class="butt-browse Yanone" id="butt-licence">Choisir un fichier <i class="fa fa-upload white" style="font-size:18px;margin-left: 3px;"></i></button>
					    <input type="file" name="licence" value="" class="browse-input" id="browse-licence">
					</div>

					 <div class="C-input-file" style="z-index: 0;">
					    	<label class="label-file bleu">Sélectionnez un RIB</label><br>
					    <button type="button" class="butt-browse Yanone" id="butt-rib">Choisir un fichier <i class="fa fa-upload white" style="font-size:18px;margin-left: 3px;"></i></button>
					    <input type="file" name="rib" value="" class="browse-input" id="browse-rib"><br>
						</div>

					    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
					    

					  
	
					  <input type="submit" name="valider_InfosSupp" class="butt-submit-profil" value="Envoyer">
					</form>

					</div>

					<?php

					

					$req = $bdd->query('SELECT * FROM res_questionnaire WHERE Id_adherent = "'.$idAdherent.'"');
					$n = $req->rowCount();
					if ($n == 0) {				
						echo '<p class="h1 marg10 ">Questionnaire<p>
					<hr class="sep2 bleu" style="max-width: 115px;">
						<p style="font-size: 17px;" class="bleu marg10">Afin de mieux vous connaître pourriez-vous nous donner quelques infos sur vous: </p>';
						include "../fct/showQuestionnaire.php"; showQuestionnaire("QSRE1");
					}
					
					
					

						

					?>

					
				</div>						</div>
			</div>

			<?php include"./WP-Footer.php"  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	<script>
 		    $('#butt-certificat').click(function(){
		    	$('#browse-certificat').click();
			});

			 $('#butt-licence').click(function(){
		    	$('#browse-licence').click();
			});

			  $('.C-Radio input:radio').attr('checked',true)
		</script>


	</body>

	</html>