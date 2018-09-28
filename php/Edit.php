<?php
session_start();
include_once"../php/connectBDD.php";
include_once"../fct/addArticle.php";
include_once"../fct/addCourse.php";
include "../fct/dateFR.php";
include "../fct/nvStatut.php";
include_once"../fct/deleteCourse.php";
include_once"../fct/deleteCommande.php";
include_once"../fct/deleteArticle.php";

if(isset($_POST['modifierStatut'])){

	 	$idCommande = $_POST['idCommande'];
	 	$idStatut = $_POST['idStatut'];

		$nb_modifs = $bdd->exec('UPDATE commande SET id_statutCommande = '.$idStatut.' WHERE Id_commande = "'.$idCommande.'"');

}


?>
<!DOCTYPE html>
<html lang="fr">

<!-- Avant de demander de l'aide passez sur  https://www.w3schools.com/-->

	<head>
		<title>Administration</title>
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
		<div class="wrapper">
			<div class="C1-C3">
				<div>
					<p class="h1">Administration Cosma Running</p>
				</div>
					
					
			</div>
			<div class="C1">
				<?php include "../WP-admin/WP-admin-Navbar.php" ;?>
						
			</div>

			<div class="C2-C3">

				<div class="main-content">
				<?php 
				if (isset($_GET['post'])) {
					include '../WP-admin/WP-admin-'.$_GET['post'].'.php';
				}
				else{
					include "../WP-admin/WP-admin-home.php";
				}
				?>
				</div>
	        </div>
	    </div>



		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>



	        	<script>
		    $('#butt-resultat').click(function(){
		    	$('#browse-resultat').click();
			});

			 $('#butt-compterendu').click(function(){
		    	$('#browse-compterendu').click();
			});

			 			 $('#butt-galerie').click(function(){
		    	$('#browse-galerie').click();
			});
		</script>
	</body>

	</html>