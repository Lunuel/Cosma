<?php session_start(); 
include "./connectBDD.php";
include "../fct/infosAdherents.php";
include "../fct/deleteCommande.php";
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
									<div style="margin-top: 25px;">
						<p class="h1 ">Liste de vos commandes</p>
						<hr class="sep2" style="width:100%;max-width:200px;">

					<?php 
					include "./connectBDD.php";
					include "../fct/dateFR.php";

					$idAdherent = $_SESSION['id_adherent'];

					$r =  $bdd->query('
						SELECT Nom,Prenom,Libelle,libelleCommande,Id_commande,libelle_taille,DateCommande,Prix,C.Id_statutCommande FROM commande as C,adherent as A,stcommande as ST,type_vetement as TV,taille as T
					WHERE C.Id_adherent = A.Id_adherent AND TV.Id_typeVetement = C.Id_typeVetement AND ST.Id_statutCommande = C.Id_statutCommande AND T.Id_taille = C.Id_taille AND C.Id_adherent = "'.$idAdherent.'" group by Id_commande ORDER BY Id_statutCommande  ASC');

					echo '<table class="table-admin">
						<tr>
							<th>Equipement</th>
							<th style="min-width: 200px;">Date Commande</th>
							<th>Taille</th>
							<th>Prix</th>
							<th>Statut*</th><th></th></tr>';
					while ($donnees = $r->fetch()){

						$dateCommande = dateFR($donnees['DateCommande']);

					echo '<tr>

							<td>'.$donnees['Libelle'].'</td>
							<td style="min-width: 15%;">'.$dateCommande.'</td>
							<td>'.$donnees['libelle_taille'].'</td>
							<td>'.$donnees['Prix'].'€</td>
							<td>'.$donnees['libelleCommande'].'</td>
							<td style="position:relative;"><form method="POST" action="'.$_SERVER['PHP_SELF'].'">';
					if ($donnees['Id_statutCommande'] == 1) {
						echo '<input   type="radio" checked value="'.htmlspecialchars($donnees['Id_commande']).'" name="idCommande" hidden>

							<button type="button"  class="butt-close"><i class="fa fa-close bleu" style="font-size:15px"></i></button>

							  <div class="C-confirmation">
							  <p class="t-confirm">Etes-vous sûr ?</p>
							    <button type="submit"  name="deleteCommande" class="submit">Confirmer</button>
							  </div>';
					}						

					echo '</form></td></tr>';	
					}
					echo '</table>';
					?>
					<p style="font-size: 16px;" class="marg10">Le paiement de l'équipement se fera au secrétariat de votre club</p>
					<p style="font-size: 13px;" class="bleu marg10">*Le statut peut avoir 3 valeurs:					Effectuée, Payée, Distribuée</p>
					</div>
				<div>
					<p class="h1 bleu">Les équipements</p>
					<hr class="sep2" style="width:100%;max-width:150px;margin-bottom: 25px;">
					<div id="C-Commandes">


					<?php 
					include "./connectBDD.php";

					$r =  $bdd->query('SELECT * FROM type_vetement');
					
					while ($donnees = $r->fetch()){

					echo '<div class="product-card C-img-commande"><a class="lien" href="Products.php?product='.htmlspecialchars($donnees['Id_typeVetement']).'"></a>
					<img id="img-commande" class="img-commande imgFlex" src="../img/Commandes/Vetements/'.htmlspecialchars($donnees['Url']).'">
					<p class="t-center marg10 libelle-vet">'.htmlspecialchars($donnees['Libelle']).'</p>
					<p class="t-center bleu prix-vet">'.htmlspecialchars($donnees['Prix']).'€</p>
					
					</div>

					';

					}
					?>
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
		    $('#img-commande').click(function(){
		    	$('#lien').click();
			});
		</script>
		<script type="text/javascript">
			
		var acc = document.getElementsByClassName("butt-close");
		var i;

		for (i = 0; i < acc.length; i++) {
		    acc[i].addEventListener("click", function() {
		        /* Toggle between adding and removing the "active" class,
		        to highlight the button that controls the panel */
		        this.classList.toggle("active");

		        /* Toggle between hiding and showing the active panel */
		        var panel = this.nextElementSibling;
		        if (panel.style.display === "block") {
		            panel.style.display = "none";
		        } else {
		            panel.style.display = "block";
		        }
		    });
		}

		</script>



	</body>

	</html>