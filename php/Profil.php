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