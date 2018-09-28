<?php session_start(); 

include "../fct/addCommande.php";


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

			<div class="Wrapper-Content C2-C3" style="text-align: left">
				<div>

					<div id="C-Product">
						<?php
						if (!isset($_GET['product'])) {
							echo '<p class="bleu"><a href="Commande.php">Retour aux commandes</a></p>';
						}


							$Id_produit = $_GET['product'];
						
						include "./connectBDD.php";

					$rep =  $bdd->query('SELECT * FROM type_vetement WHERE Id_typeVetement = "'.$Id_produit.'"');
					
					while ($donnees = $rep->fetch()){
						$details = htmlspecialchars($donnees['Details']);
						$Id_typeVetement= htmlspecialchars($donnees['Id_typeVetement']);
						$Prix = htmlspecialchars($donnees['Prix']);
					echo '<div >
							<img class="img-commande imgFlex" src="../img/Commandes/Vetements/'.htmlspecialchars($donnees['Url']).'">
						</div>
						<div style="padding: 15px;">
						<p class="h1" style="margin: 0px;"><i class="fa fa-angle-double-right" style="font-size:24px;margin-right: 4px;"></i>'.htmlspecialchars($donnees['Libelle']).'</p>
						<hr class="sep2" style="width:100%;max-width:100px;">
						<form method="post" action="';

						echo htmlspecialchars($_SERVER["PHP_SELF"]).'?product='.$Id_produit.'" enctype="multipart/form-data">

						<p style="margin:5px 0px">Sélectionnez votre taille : </p>

						<select name="taille" class="Yanone">';
						
							include "connectBDD.php";

							$reponse = $bdd->query(

							"SELECT Id_taille, libelle_taille
							FROM taille
							Order by Id_taille");

							while ($donnees = $reponse->fetch())
										{
								echo '<option value="'.htmlspecialchars($donnees['Id_taille']).'" style="">'.htmlspecialchars($donnees['libelle_taille']).'</option>';
							}
							
							echo '
						  </select>
						  <h1 style="margin-top:8px;">Détails du produit</h1>
						  <p>'.$details.'</p>
						  <p class="marg10 bleu">Prix: '.$Prix.'€</p>
						  <input type="radio" checked value="'.$Id_produit.'" name="idProduit" hidden> <br>
 
					  		<input id="butt-commande" type="button" class="butt-submit-profil" value="Commander">
					  		</div></div>
						<div class="C-Valider-Commande">
							<p class="bleu" style="font-size: 17px;margin-top: 20px;" name="valider_Commande" >Etes vous sur de vouloir commander cet équipement ?</p>
							<input type="submit" class="butt-submit-profil" value="Oui" name="valider_Commande">
							<input type="button" id="butt-commande-non" class="butt-submit-profil" value="Non">
							<p style="font-size: 16px;" class="marg10">Le paiement de l\'équipement se fera au secrétariat de votre club</p></form>

						</div>';

					}
					
						?>


							<p class="marg10 bleu Yanone" style="margin-top: 20px;"><?php if(isset($Valid_Commande)){echo $Valid_Commande;}
							 ?></p>
							<p class="marg10 bleu"><i class="fa fa-arrow-circle-o-right" style="font-size:20px;margin-right: 3px;"></i><a href="Commande.php" class="bleu">Retour aux commandes</a></p>
					</div>

      		    </div>
      	  	</div>
					


			<?php include"./WP-Footer.php"  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>

	<script>
		    $('#butt-commande').click(function(){
				$('.C-Valider-Commande').css('display','block');
			});
			$('#butt-commande-non').click(function(){
				$('.C-Valider-Commande').css('display','none');
			});

		</script>


	</body>

	</html>