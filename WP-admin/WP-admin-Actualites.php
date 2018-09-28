	

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'] ?>" enctype="multipart/form-data" >
					<p class="h1">Rédaction d'une actualité</p>
					<hr class="sep2 bleu" style="max-width:210px">
					<label>Titre de l'actualité</label><input type="text" name="title" class="input-title">

            		<textarea name="editor"></textarea>
					<input type="submit" class="submit" value="Ajouter un article" id="submit-Connexion" name="valider_article">
					</form>


					<p><?php echo $ErreurConnexion;echo $Valid_article ; ?></p>

			        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
			        <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
			        <script>
			            CKEDITOR.replace( 'editor' );
			        </script>

			        <p class="h1">Liste des actualités</p>
					<hr class="sep2 bleu" style="max-width:160px">

			        <?php 
					$Larticles =  $bdd->query('SELECT Id_article,Titre_article, DateArticle,Contenu FROM article Order by DateArticle DESC');

					echo '<table class="table-admin">
						<tr>
							<th>Date Actualité</th>
							<th>Titre de l\'actualité</th><th></th></tr>';

					while ($donnees = $Larticles->fetch()){

						$dateArticle = dateFR($donnees['DateArticle']);
					echo '<tr><form method="POST" action="'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'">
							<td>'.$dateArticle.'</td>
							<td>'.$donnees['Titre_article'].'</th>
							<td>
							<div style="display:flex">
								<input   type="radio" checked value="'.htmlspecialchars($donnees['Id_article']).'" name="idArticle" hidden>
								<button type="submit"  value="Supprimer" name="deleteArticle" class="butt-close"><i class="fa fa-close bleu" style="font-size:15px"></i></button>
								</div>

	     
							</td></form>
								</tr>';

					}
					?>
				</table>