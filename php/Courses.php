<?php session_start() ;
include_once"connectBDD.php";?>
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
				<h1 class="browse">Sélectionnez une course :</h1>

					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					  <select name="course">

			<?php
					

					$reponse = $bdd->query(

					"SELECT libelle
					FROM course
					ORDER BY libelle");

					while ($donnees = $reponse->fetch())
								{
						echo '<option>'.htmlspecialchars($donnees['libelle']).'</option>';
						}
						?>
					  </select>
					  <input type="submit" name="valider_course" class="butt-submit-profil" >
					</form>

				<?php
					if(isset($_POST['valider_course'])){
						$course=$_POST['course'];
						echo '<p class="h1">Course : ' . $course.'</p>
						<hr class="sep2" style="width:100%;max-width:265px;">';
					}
				?>

									<!-- Accessible aux adhérents-->

					<p class="h1">Compte Rendu <i class="fa fa-caret-right bleu" style="font-size:20px"></i></p>

					<?php

				if(isset($_POST['valider_course'])){
					$course=$_POST['course'];


					$reponse = $bdd->query(

					'SELECT CompteRendu
					FROM course
					WHERE libelle = "'.$course.'"');

					while ($donnees = $reponse->fetch())
								{
						echo '<p><a target="_blank" class="gris" href="../img/Courses/ComptesRendus/'.htmlspecialchars($donnees['CompteRendu']).'"><i class="gris fa fa-file-excel-o" style="font-size:18px;margin-right: 5px;"></i>'.$donnees['CompteRendu'].'</a></p>';
					}
				}
					

						?>
					<p class="h1">Site Internet<i class="fa fa-caret-right bleu" style="font-size:20px;margin-left: 3px;"></i></p>

					<?php

				if(isset($_POST['valider_course'])){
					$course=$_POST['course'];
					$reponse = $bdd->query(

					'SELECT Siteweb
					FROM course
					WHERE libelle = "'.$course.'"');

					while ($donnees = $reponse->fetch())
								{
						echo '<p><a target="_blank" class="bleu" href="'.htmlspecialchars($donnees['Siteweb']).'">Accéder au site</a></p>';
					}
				}
					

						?>


					
					<p class="h1">Résultats <i class="fa fa-caret-right bleu" style="font-size:20px"></i></p>

					<?php

				if(isset($_POST['valider_course'])){
					$course=$_POST['course'];


					$reponse = $bdd->query(

					'SELECT Resultats
					FROM course
					WHERE libelle = "'.$course.'"');

					while ($donnees = $reponse->fetch())
								{
						echo '<div><img src="../img/Courses/Resultats/'.htmlspecialchars($donnees['Resultats']).'" class="i-courses"></div>';
					}
				}
				?>

				<p class="h1">Galerie <i class="fa fa-caret-right bleu" style="font-size:20px"></i></p>

				<p>Indisponible pour le moment</p>

					<br>


					<script>
					var slideIndex = 0;
					showSlides();

					function showSlides() {
					    var i;
					    var slides = document.getElementsByClassName("mySlides");
					    var dots = document.getElementsByClassName("dot");
					    for (i = 0; i < slides.length; i++) {
					       slides[i].style.display = "none";  
					    }
					    slideIndex++;
					    if (slideIndex > slides.length) {slideIndex = 1}    
					    for (i = 0; i < dots.length; i++) {
					        dots[i].className = dots[i].className.replace(" active", "");
					    }
					    slides[slideIndex-1].style.display = "block";  
					    dots[slideIndex-1].className += " active";
					    setTimeout(showSlides, 4000); // Change image every 4 seconds
					}
					</script>
			</div>

			<?php include"./WP-Footer.php"  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>




	</body>

	</html>