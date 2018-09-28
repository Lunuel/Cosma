<?php session_start() ;
include_once"../php/connectBDD.php";
include_once"../fct/addArticle.php";
include_once"../fct/addCourse.php";
include_once"../fct/deleteCourse.php";

if (isset($_SESSION['id_admin'])) {

	header('Location: ./WP-login.php');
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
				<div>
					<ul>
					  <a class="active" href="#Home">Articles</a>
					  <a href="#news">Remboursements</a>
					  <a href="#contact">Commandes</a>
					  <a href="#about">Courses</a>
					  <a href="#about">Questionnaire</a>
					  <a href="./deconnexion-admin.php">Déconnexion</a>
					</ul>
				</div>
						
			</div>

			<div class="C2-C3">

				<div class="main-content">

					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
					<h1>Rédaction d'un article : </h1>
					<label>Titre de l'article</label><input type="text" name="title" class="input-title">

            		<textarea name="editor"></textarea>
					<input type="submit" class="submit" value="Ajouter un article" id="submit-Connexion" name="valider_article">
					</form>


					<p><?php echo $ErreurConnexion;echo $Valid_article ; ?></p>

			        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
			        <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
			        <script>
			            CKEDITOR.replace( 'editor' );
			        </script>

					<h1>Remboursements : </h1>
					<p>#Ajouts de remboursements</p>
					<h1>Commandes: </h1>

					<?php 
					include "../php/connectBDD.php";
					include "../fct/dateFR.php";

					$r =  $bdd->query('SELECT taille,Libelle,Prix,DateCommande,libelleCommande FROM commande NATURAL JOIN type_vetement NATURAL JOIN   stcommande');

					echo '<table id="table-Courses">
						<tr>
							<th>Equipement</th>
							<th style="min-width: 200px;">Date Commande</th>
							<th>Taille</th>
							<th>Prix</th>
							<th>Statut*</th></tr>';

					while ($donnees = $r->fetch()){

						$dateCommande = dateFR($donnees['DateCommande']);
					echo '<tr>
							<td>'.$donnees['Libelle'].'</td>
							<td style="min-width: 200px;">'.$dateCommande.'</th>
							<td>'.$donnees['taille'].'</td>
							<td>'.$donnees['Prix'].'€</td>
							<td>'.$donnees['libelleCommande'].'</td>
						</tr>';

					}
					?>
						
					</table>
					<div style="margin-bottom: 50px;">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
						<p class="h1">Ajouter une course: </p>
						<hr class="sep2 bleu" style="max-width:150px">
						<label>Nom de la course</label><input type="text" name="title" class="input-title">
						<br><label>Année</label><input  type="text" name="saison" maxlength="4"><span style="font-size: 14px;">Ex: 2018</span>


					    <h1 class="browse">Sélectionnez une photo des Résultats:</h1>
					    <div class="C-input-file">
					    <button type="button" class="butt-browse Yanone" id="butt-resultat">Choisir un fichier <i class="fa fa-upload white" style="font-size:18px;margin-left: 3px;"></i></button>
					    <input  type="file" name="resultat" value="" class="browse-input" id="browse-resultat"></div>


					    <h1 class="browse">Sélectionnez un Compte Rendu:</h1>
					    <div class="C-input-file">
					    <button type="button" class="butt-browse Yanone" id="butt-compterendu">Choisir un fichier <i class="fa fa-upload white" style="font-size:18px;margin-left: 3px;"></i></button>
					    <input type="file" name="compterendu" value="" class="browse-input" id="browse-compterendu"><br>
						</div>

					    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
						<input accept="image/*" type="submit" class="submit" value="Ajouter une course" id="submit-Connexion" name="valider_course" multiple>
						</form>
						<p style="font-size: 16px;" class="bleu"><?php echo $Valid_course;echo $ChampsVides;echo $CRtype; echo $CRtaille;echo $CRtype;echo $CRtaille; ?></p>
					</div>
					<div>

						<p class="h1">Liste des courses</p>
						<hr class="sep2 bleu" style="max-width:150px">
					<table id="table-Courses">
						<tr>
							<th>Course</th>
							<th style="">Saison</th>
							<th>Compte Rendu</th>
							<th>Résultats</th></tr>					


							<?php 
							include "../php/connectBDD.php";

							$rep =  $bdd->query('SELECT Id_course,libelle,Saison,CompteRendu,Resultats FROM course');

							while ($donnees = $rep->fetch()){

							echo '<tr>
									<td style="text-align:left;">'.$donnees['libelle'].'</td>
									<td style="text-align:left;">'.$donnees['Saison'].'</td>
									<td style="text-align:left;font-size:15px;"><a class="bleu" href="../img/Courses/ComptesRendus/'.$donnees['CompteRendu'].'">'.$donnees['CompteRendu'].'</a></td>
									<td style="text-align:left;font-size:15px;"><a class="bleu" href="../img/Courses/Resultats/'.$donnees['Resultats'].'">'.$donnees['Resultats'].'</a></td>
										<td>
									     <form method="POST" action="../fct/deleteCourse.php">
								            <input   type="radio" checked value="'.htmlspecialchars($donnees['Id_course']).'" name="idCourse" hidden>

								            <input type="submit" id="buttClose" value="Supprimer" name="deleteCourse" class="butt-close">
								          </form>
								          </td>
								</tr>';}
							?>
					</table>
					</div>
					<p></p>
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