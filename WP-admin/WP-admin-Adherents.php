
					<p class="h1">Liste des adhérents</p>
					<hr class="sep2 bleu" style="max-width:160px">

					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
						<div style="display: inline-flex;">
							<p class="h1 bleu" style="font-size:22px;margin-right: 7px;">Rechercher un adhérent: </p>
							<input type="text" style="padding-bottom: 3px;margin: auto;" name="SearchAdherent" placeholder="Rechercher" class="">
							<button type="submit" id="button_loupe" name="valider_search_adherent">
							<i class="fa fa-search white" aria-hidden="true" style="font-size: 14px;margin: auto;"></i>
							</button>
						
						</div>
					</form>

					<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
						<div style="display: inline-flex;">
							<p class="h1 bleu" style="font-size:22px;margin-right: 7px;">Classer par: </p>
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
							<select name="classer" class="classemment">
								<option value="Nom">Nom</option>
								<option value="Prenom">Prénom</option>
							</select>
							<button type="submit" name="valider_classer_adherent" id="button_classer" >
							<i class="fa fa-long-arrow-right white" aria-hidden="true" style="font-size: 14px;margin: auto;"></i>
							</button>
						
						</div>
					</form>

					<div>
<?php
							$i = '';
							if(isset($_POST['valider_classer_adherent'])){
								$ClasserPar = $_POST['classer'];
								
								$i = 'ORDER BY '.$ClasserPar.' ASC';
	
							}

							$req = $bdd->query('SELECT * FROM adherent '.$i.'');

							if(isset($_POST['valider_search_adherent'])){

								if (!empty($_POST['SearchAdherent'])) {

									include "../php/connectBDD.php";

								 	$searchAdherent = $_POST['SearchAdherent'];

								 	$req = $bdd->query('SELECT * FROM adherent WHERE Nom LIKE "%'.$searchAdherent .'%" OR Prenom LIKE "%'.$searchAdherent .'%" '.$i.'');
									


									$nb = $req->rowCount();
									if ($nb <= 0) {
										echo '<p class="h1 bleu" style="font-size:18px;">Aucun résultat pour "'.$searchAdherent.'"</p>';
									}
									else {
										echo '<p class="h1 bleu" style="font-size:18px;">'.$nb.' résultats pour "'.$searchAdherent.'"</p>';
									}
								}
							}

							echo "<table class=\"table-admin\">
										<tr>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Date de naissance</th>
											<th>Mail</th>
											<th>Téléphone</th>
											<th>Fiche Adhérent</th>
											</tr>";

								while ($donnees = $req->fetch()){

									$DateNaissance = dateFR($donnees['DateNaissance']);
									echo '<tr>
									<td>'.$donnees['Nom'].'</td>
									<td>'.$donnees['Prenom'].'</td>
									<td>'.$DateNaissance.'</td>
									<td>'.$donnees['Email'].'</td>
									<td>'.$donnees['Téléphone'].'</td>
									<td><a clas="" target="_blank" class="bleu t-center" href="Edit.php?post=ficheAdherent&&fiche='.$donnees['Id_adherent'].'">Accéder à la fiche adhérent</a></td>
									</tr>';
								}
								echo "</table>";

?>
</div>
