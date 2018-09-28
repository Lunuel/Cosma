					<p class="h1">Liste des commandes</p>
					<hr class="sep2 bleu" style="max-width:175px">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
					<div style="display: inline-flex;">
						<p class="h1 bleu" style="font-size:22px;margin-right: 7px;">Rechercher une commande par Nom/Prénom: </p>
						<input type="text" style="padding-bottom: 3px;margin: auto;" name="SearchCommande" placeholder="Rechercher" class="">
						<button type="submit" id="button_loupe" name="valider_search_commande">
						<i class="fa fa-search white" aria-hidden="true" style="font-size: 14px;margin: auto;"></i>
						</button>
					
					</div></form>
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
					<div style="display: inline-flex;">
						<p class="h1 bleu" style="font-size:22px;margin-right: 7px;">Classer par: </p>
						<form method="POST" action="Edit.php" enctype="multipart/form-data">
						<select name="classer" class="classemment">
							<option value="Nom">Nom</option>
							<option value="Libelle">Equipement</option>
							<option value="Id_statutCommande">Statut</option>
							<option value="DateCommande">Date</option>
						</select>
						<button type="submit" name="valider_classer_commande" id="button_classer" >
						<i class="fa fa-long-arrow-right white" aria-hidden="true" style="font-size: 14px;margin: auto;"></i>
						</button>
						</form>
					
					</div>
				
					<?php
					$classer = '';
					$search = '';
				$Lcommande = $bdd->query('SELECT Nom,Prenom,Libelle,libelleCommande,Id_commande,libelle_taille,DateCommande,Prix,C.Id_statutCommande FROM commande as C,adherent as A,stcommande as ST,type_vetement as TV,taille as T
					WHERE C.Id_adherent = A.Id_adherent AND TV.Id_typeVetement = C.Id_typeVetement AND ST.Id_statutCommande = C.Id_statutCommande AND T.Id_taille = C.Id_taille AND C.Id_statutCommande NOT IN (3) '.$search.' group by Id_commande '.$classer.' ');


					if(isset($_POST['valider_classer_commande'])){
						$ClasserPar = $_POST['classer'];
						$classer = 'ORDER BY '.$ClasserPar.' ASC';
					}

					if(isset($_POST['valider_search_commande'])){				
						if (!empty($_POST['SearchCommande'])) {
							$searchCommande = $_POST['SearchCommande'];

							$search = 'AND  Nom LIKE "%'.$searchCommande.'%"OR Prenom LIKE "%'.$searchCommande.'%" ';
							
							$nb = $Lcommande->rowCount();

							if ($nb <= 0) {
								echo '<p class="h1 bleu" style="font-size:18px;">Aucun résultat pour "'.$searchCommande.'"</p>';
							}
							else {
								echo '<p class="h1 bleu" style="font-size:18px;">'.$nb.' résultats pour "'.$searchCommande.'"</p>';
							}
						}
					}

					$Lcommande = $bdd->query('SELECT Nom,Prenom,Libelle,libelleCommande,Id_commande,libelle_taille,DateCommande,Prix,C.Id_statutCommande FROM commande as C,adherent as A,stcommande as ST,type_vetement as TV,taille as T
					WHERE C.Id_adherent = A.Id_adherent AND TV.Id_typeVetement = C.Id_typeVetement AND ST.Id_statutCommande = C.Id_statutCommande AND T.Id_taille = C.Id_taille AND C.Id_statutCommande NOT IN (3) '.$search.' group by Id_commande '.$classer.' ');

					echo '<table class="table-admin">
						<tr>
							<th>Nom/Prénom</th>
							<th>Equipement</th>
							<th style="min-width: 200px;">Date Commande</th>
							<th>Taille</th>
							<th>Prix</th>
							<th>Statut</th><th>Modifier un statut</th></tr>';



					while ($donnees = $Lcommande->fetch()){

						$Id_Statut = prochainStatut($donnees['Id_statutCommande'],3);

						$nvStatut =  $bdd->query('SELECT libelleCommande,Id_statutCommande FROM stcommande WHERE Id_statutCommande = '.$Id_Statut.'');
						while ($d = $nvStatut->fetch()){
							$IdprochainStatut = $d['Id_statutCommande'];
							$prochainStatut = $d['libelleCommande'];
						}

						$dateCommande = dateFR($donnees['DateCommande']);
						echo '<tr>
							<td>'.$donnees['Nom'].' '.$donnees['Prenom'].'</td>
							<td>'.$donnees['Libelle'].'</td>
							<td style="min-width: 200px;">'.$dateCommande.'</th>
							<td>'.$donnees['libelle_taille'].'</td>
							<td>'.$donnees['Prix'].'€</td>
							<td>'.$donnees['libelleCommande'].'</td>
							<td style=";"><form method="POST" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">
							<div style="display:flex;position:relative;">							<input   type="radio" checked value="'.htmlspecialchars($donnees['Id_commande']).'" name="idCommande" hidden>
								<input   type="radio" checked value="'.$IdprochainStatut.'" name="idStatut" hidden>';
						
						if ($prochainStatut == "effectuée") {
									;
								}
								else {
									echo '<input type="submit" value="Passer en '.$prochainStatut.'" name="modifierStatut" class="submit" style="display:inline-block;margin:0px 3px;">';
								}
								
								
								echo '
								<button type="button"  value="Supprimer"  class="butt-close"><i class="fa fa-close bleu" style="font-size:15px"></i></button>
								<div class="C-confirmation">
							  		<p class="t-confirm">Etes-vous sûr ?</p>
							    	<button type="submit"  name="deleteCommande" class="submit">Confirmer</button>
							 	 </div>
							 	 </div>
								          
								 </td></form>
								</tr>';

					}
					?>
						
					</table>

					<div style="height: 50px;"></div>
					<p class="h1">Historique des commandes</p>
					<hr class="sep2 bleu" style="max-width:220px">

					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
					<div style="display: inline-flex;">
						<p class="h1 bleu" style="font-size:22px;margin-right: 7px;">Classer par: </p>
						<form method="POST" action="Edit.php" enctype="multipart/form-data">
						<select name="classer" class="classemment">
							<option value="Nom">Nom</option>
							<option value="Libelle">Equipement</option>
							<option value="Id_statutCommande">Statut</option>
							<option value="DateCommande">Date</option>
						</select>
						<button type="submit" name="valider_classer_hst_commande" id="button_classer" >
						<i class="fa fa-long-arrow-right white" aria-hidden="true" style="font-size: 14px;margin: auto;"></i>
						</button>
						</form>
					
					</div>
				
					<?php
					$classer = '';
					$search = '';
					$IdprochainStatut ='';

					$Hcommande = $bdd->query('SELECT Nom,Prenom,Libelle,libelleCommande,Id_commande,libelle_taille,DateCommande,Prix,C.Id_statutCommande FROM commande as C,adherent as A,stcommande as ST,type_vetement as TV,taille as T
					WHERE C.Id_adherent = A.Id_adherent AND TV.Id_typeVetement = C.Id_typeVetement AND ST.Id_statutCommande = C.Id_statutCommande AND T.Id_taille = C.Id_taille AND C.Id_statutCommande = 3 '.$search.' group by Id_commande '.$classer.' ');


					if(isset($_POST['valider_classer_hst_commande'])){
						$ClasserPar = $_POST['classer'];
						$classer = 'ORDER BY '.$ClasserPar.' ASC';
					}
					

					echo '<table class="table-admin">
						<tr>
							<th>Nom/prénom</th>
							<th>Equipement</th>
							<th style="min-width: 200px;">Date Commande</th>
							<th>Taille</th>
							<th>Prix</th>
							<th>Statut</th><th></th></tr>';



					while ($donnees = $Hcommande->fetch()){


						$dateCommande = dateFR($donnees['DateCommande']);
						echo '<tr>
							<td>'.$donnees['Nom'].' '.$donnees['Prenom'].'</td>
							<td>'.$donnees['Libelle'].'</td>
							<td style="min-width: 200px;">'.$dateCommande.'</th>
							<td>'.$donnees['libelle_taille'].'</td>
							<td>'.$donnees['Prix'].'€</td>
							<td>'.$donnees['libelleCommande'].'</td>
							<td style="position:relative;">
								<form method="POST" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">
								<input   type="radio" checked value="'.htmlspecialchars($donnees['Id_commande']).'" name="idCommande" hidden>
								<input   type="radio" checked value="'.$IdprochainStatut.'" name="idStatut" hidden>';
								
								
								echo '
								<button type="button"  value="Supprimer" class="butt-close"><i class="fa fa-close bleu" style="font-size:15px"></i></button>
								<div class="C-confirmation">
							  		<p class="t-confirm">Etes-vous sûr ?</p>
							    	<button type="submit"  name="deleteCommande" class="submit">Confirmer</button>
							 	 </div>
								          
								          </td></form>
								</tr>';

					}
					?>
						
					</table>

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