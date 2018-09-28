<?php
session_start();
include_once"connectBDD.php";
include_once"../fct/inscription.php";
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
			<div class="Wrapper-Content C1-C3">
				<div style="width: 100%;">
					<p class="bleu  t-justify" style="margin-bottom: 20px;">La saison 2017/2018 a commencé, voici un petit rappel pour votre inscription : <br> <br>

					<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Fournir un certificat médical de "non contre-indication à la pratique sportive de la course à pied en compétition", de moins d’un mois. <br>

					<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Pour les personnes souhaitant adhérer à la FFA (nouvelle licence), fournir la photocopie d’une pièce d’identité.<br>

					<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Chèque à l’ordre de COSMA Marathon d’un montant de :
					110 € (+ 25 € pour ceux qui souhaitent prendre une licence à la FFA).<br>

					<i class="fa fa-angle-right bleu" style="font-size:20px;margin-right: 4px;"></i>Vérifier et signer la fiche de renseignements pré remplie qui vous sera remise : <br>
					<span style="padding-left: 15px;">- le samedi 3/09, sur notre stand du forum des sports</span> <br>
					<span style="padding-left: 15px;">- soit au stade lors d’un entraînement</span> <br> <br>

					Votre dossier d’inscription complet sera à remettre à Anne ou Olivier lors d’un entraînement (ou, en cas d’absence, vous pouvez remettre votre dossier à un membre du bureau). <br><br>

					En ce qui concerne les remboursements de courses, le montant cette année s’élève à 70€.</p>

					<p class="h1">Je veux m'inscrire sur le site...</p>
					<hr class="sep2 bleu" style="max-width: 250px;">
					<div class="C-Inscription">
						<div  class="WC-id">Inscription</div>
						<div >
		
						<form id="formIns" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
							<table id="table-Ins" style="color: white">
								<tr >
									<th><input placeholder="Nom" type="text" name="nom"></th>
								</tr>
								<tr >	
									<th><input placeholder="Prenom" type="text" class="" name="prenom"></th>
								</tr>
								<tr>
									<th><input  id="mail" type="text" class="" name="email" placeholder="Email"><label id="verif"> </label></th>
								</tr>

								<tr>
									<th><input placeholder="Mot de passe" id="mdpI" type="password" class="" name="mdp"></th>
								</tr>
								<tr>
									<th ><input placeholder="Confirmation mot de passe" type="password" class="" name="mdpC"></th>
								</tr>
								<tr>
									<th><div style="display:flex;"><label class="label-DateNaissance bleu">Date de Naissance</label>
										<input class="input-dateNaissance"  type="date" id="bday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"></div></th>
								</tr>
								<tr>
									<th ><input placeholder="Adresse" type="text" name="adresse"></th>
								</tr>
								<tr>
									<th ><input placeholder="Téléphone" type="text" name="tel"></th>
								</tr>
								<tr>
									<th style="padding-top: 10px;">
										
										<div style="display: flex;"><div style="display: inline-flex;"><label class="Yanone bleu" style="font-size: 17px;margin-right: 8px;">Sexe:</label>
										<input id="femme" value="1" type="radio" checked name="sexe"><label for="femme" class="label-sexe bleu">Femme</label></div>
										<div style="display: inline-flex;">
										<input id="homme" value="2" type="radio"  name="sexe"><label for="homme" class="label-sexe bleu">Homme</label>
										</div></div>
										</th>
								</tr>
								<tr>
									<td class="bleu" style="font-size: 14px;padding: 15px 0px 5px;">Personne à contacter en cas d'urgence:</td>
								</tr>
								<tr>
									<th ><input placeholder="Nom" type="text"  name="Unom"></th>
								</tr>								
								<tr>
									<th ><input placeholder="Prenom" type="text" name="Uprenom"></th>
								</tr>
								<tr>
									<th ><input placeholder="Téléphone" type="text" name="Utel"></th>
								</tr>
								<tr>
									<th><input type="submit" class="submit" id="submit-Register" style="color: white" value="Devenir adhérent" name="valider_inscription"></th>
								</tr>
								
								<tr>
									<th class="bleu Yanone t-center" style="padding:8px 0px;">
										<?php 
										echo $InscriptionReussie;
										echo $FEmail;
										echo $ChampsVides;
										echo $Fmdp; ?>		
									</th>
								</tr>
							</table>
						</form>
					</div>	
				</div>
			</div>
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