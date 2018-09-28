				<div style="margin-bottom: 50px;">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data" >
						<p class="h1">Ajouter une course: </p>
						<hr class="sep2 bleu" style="max-width:160px">
						<label>Nom de la course</label><input type="text" name="title" class="input-title">
						<br>

						<label>Année</label><input  type="text" name="saison" maxlength="4"><span style="font-size: 14px;">Ex: 2018</span>

						<br>
						<label>Lien du site de la course</label><input type="text" name="liensite">


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
						<hr class="sep2 bleu" style="max-width:140px">
					<table class="table-admin">
						<tr>
							<th>Course</th>
							<th style="">Saison</th>
							<th>Compte Rendu</th>
							<th>Résultats</th>
						<th></th></tr>					


							<?php 

							$rep =  $bdd->query('SELECT Id_course,libelle,Saison,CompteRendu,Resultats FROM course');

							while ($donnees = $rep->fetch()){

							echo '<tr>
									<td style="text-align:left;">'.$donnees['libelle'].'</td>
									<td style="text-align:left;">'.$donnees['Saison'].'</td>
									<td style="text-align:left;font-size:15px;"><a target="_blank" class="bleu" href="../img/Courses/ComptesRendus/'.$donnees['CompteRendu'].'">'.$donnees['CompteRendu'].'</a></td>
									<td style="text-align:left;font-size:15px;"><a target="_blank" class="bleu" href="../img/Courses/Resultats/'.$donnees['Resultats'].'">'.$donnees['Resultats'].'</a></td>
										<td><form method="POST" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'" enctype="multipart/form-data">
									     
								            <input   type="radio" checked value="'.htmlspecialchars($donnees['Id_course']).'" name="idCourse" hidden>

								            <button type="submit"  value="Supprimer" name="deleteCourse" class="butt-close"><i class="fa fa-close bleu" style="font-size:15px"></i></button></form>
								          
								          </td>
								</tr>';}
							?>
					</table>