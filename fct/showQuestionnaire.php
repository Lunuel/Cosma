<?php
	function showQuestionnaire($questionnaire){
					include "./connectBDD.php";
					echo '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" enctype="multipart/form-data">';

					$req_Cat =  $bdd->query('SELECT Id_cat_questionnaire,Libelle_cat_questionnaire FROM liaison_questionnaire NATURAL JOIN   cat_questionnaire WHERE Id_questionnaire = "'.$questionnaire.'" GROUP BY Libelle_cat_questionnaire');


					while ($donnees = $req_Cat->fetch()){
						echo '<div class="C-Radio">';

							$Id_cat_questionnaire = $donnees['Id_cat_questionnaire'];
							echo '<p class="Yanone bleu t-cat">'.$donnees['Libelle_cat_questionnaire'].'</p>';

							$req_Check =  $bdd->query('SELECT Id_checkbox_questionnaire,Libelle_checkbox_questionnaire FROM liaison_questionnaire NATURAL JOIN   checkbox_questionnaire WHERE Id_cat_questionnaire = "'.$donnees['Id_cat_questionnaire'].'"');

							$i = 1 ;
							while ($donnees = $req_Check->fetch()){
								$for = $Id_cat_questionnaire.$i;

								echo '<input class="input-radio" id="'.$for.'" type="radio" name="'.$Id_cat_questionnaire.'" value="'.$donnees['Id_checkbox_questionnaire'].'">
									 <label for="'.$for.'" class="label-sexe">'.$donnees['Libelle_checkbox_questionnaire'].'</label><br>';


									 $i++;
							}

							echo '</div>';
					
					}
					echo '<input style="max-width: 200px;margin:8px 0px;" type="text" value="" name="divers" placeholder="Divers" class=""><br>';

					echo '<input type="submit" value="Soumettre" name="valider_questionnaire" class=" submit sub_qst">';
					echo "</form>";
			

	}					
      				//	
?>