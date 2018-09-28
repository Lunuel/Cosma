<p class="h1">Questionnaire global</p>
<hr class="sep2 bleu" style="max-width:170px">
<table class="table-admin">
<?php
	$cat =  $bdd->query('SELECT * FROM cat_questionnaire');
	while ($donnees = $cat->fetch()){
		echo'<tr><td colspan="2" style="border:none;padding:30px 0px 4px 0px;"><p class="h1">'.$donnees['Libelle_cat_questionnaire'].'</p></td></tr>';
		$idCat = $donnees['Id_cat_questionnaire'];
		$libelleCat = $donnees['link'];

			$libelle =  $bdd->query('SELECT Id_checkbox_questionnaire,Libelle_checkbox_questionnaire FROM liaison_questionnaire NATURAL JOIN checkbox_questionnaire WHERE id_cat_questionnaire = "'.$idCat.'"');

			$total =  $bdd->query('SELECT * FROM res_questionnaire');
			$nbTotal = $total->rowCount();



			
			echo "<tr><th>Réponses</th><th style=\"text-align:center\">Nombre de réponse</th></tr>";
				while ($d = $libelle->fetch()){
					
					$idCheckbox = $d['Id_checkbox_questionnaire'];

					$count =  $bdd->query('SELECT COUNT(*) FROM res_questionnaire WHERE '.$libelleCat.' = "'.$idCheckbox.'"');
					$nb = $count->fetchColumn();

					$percent = ( $nb / $nbTotal) * 100;

					echo '<tr><td>'.$d['Libelle_checkbox_questionnaire'].'</td><td class="t-center"><span class="bleu"> '.$nb.'</span> ('.$percent.'%)</td>';
				}

			echo '<tr><td class="bleu">Total</td><td class="t-center">'.$nbTotal.'</td>';	

		}

				

?>
	</table>				


<p class="h1" style="ma">Questionnaire par adhérent</p>
<hr class="sep2 bleu" style="max-width:226px"><br>

<p class="Yanone">Voici une liste des adhérent du site ayant répondu au questionnaire</p><br>


<table class="table-admin">
	<tr><th>Nom/Prénom</th><th style="text-align:center">Fiche adhérent</th></tr>
<?php
	$liste =  $bdd->query('SELECT * FROM res_questionnaire NATURAL JOIN adherent');
	while ($donnees = $liste->fetch()){
		echo '<tr><td>'.$donnees['Nom'].' '.$donnees['Prenom'].'</td><td class="t-center" ><a class="t-center bleu" target="_blank" class="bleu" href="Edit.php?post=ficheAdherent&&fiche='.$donnees['Id_adherent'].'">Accéder à la fiche adhérent</a></td></tr>';

	}

				

?>
	
</table>