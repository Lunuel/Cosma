<?php
	function InfosAdherent($id){

		include"connectBDD.php";


		$req = $bdd->query(
      	'SELECT *
     	FROM adherent 
     	 WHERE Id_adherent = "'.$id.'"');

		while ($donnees = $req->fetch()){

			$Nom = $donnees['Nom'];
			$Prenom = $donnees['Prenom'];
			$DateNaissance = $donnees['DateNaissance'];
			$email = $donnees['Email'];
			$Unom = $donnees['Unom'];
			$Uprenom = $donnees['Uprenom'];
			$adresse = $donnees['Adresse'];
			$tel = $donnees['Téléphone'];
			$Utel = $donnees['Utel'];

			$photo = $donnees['Photo_profil'];
			$rib = $donnees['Rib'];
			$certificat = $donnees['CertificatMedical'];
			$licence = $donnees['Licence'];

			$DateNaissance = dateFR($donnees['DateNaissance']);



		}		
		echo '
			<div style="display:flex;">
				<div style="padding:15px;">
					<img style="max-width:100%;max-height:100%;width:170px;
					height:200px;"   src="../img/Adherent/Profil/'.$photo.'">
				</div>
				<div style="padding:15px;">
					<p class="h1">Adhérent</p>
					<hr class="sep2 bleu" style="max-width:75px;width:100%;">
					<p>Nom: '.$Nom.'</p>
					 <p>Prenom: '.$Prenom.'</p>
					 <p>Date de Naissance: '.$DateNaissance.'</p>
					 <p>Email: '.$email.'</p>
					 <p>Adresse: '.$adresse .'</p>
					 <p>Téléphone: '.$tel .'</p>
				</div>
			</div>
			<div>
			 
			 <p class="h1 Yanone">Personne à contacter en cas d\'urgence</p>
			 <hr class="sep2 bleu" style="max-width:320px;width:100%;">
			 <p>'.$Unom.'</p>
			 <p>'.$Uprenom.'</p>
			 <p>'.$Utel.'</p>

			 <p class="h1 Yanone\">Documents renseignés</p>
			 <hr class="sep2 bleu" style="max-width:190px;width:100%;">
			 <p><a target="_blank" class="bleu" href="../img/Adherent/RIB/'.$rib.'""><i class="fa fa-file-o" style="font-size:16px;margin-right:3px;"></i>Voir le RIB</a></p>

			 <p><a target="_blank" class="bleu" href="../img/Adherent/Certificat_Medical/'.$certificat.'""><i class="fa fa-file-o" style="font-size:16px;margin-right:3px;"></i>Voir le Certificat médical</a></p>

			 <p><a target="_blank" class="bleu" href="../img/Adherent/Licence/'.$licence.'""><i class="fa fa-file-o" style="font-size:16px;margin-right:3px;"></i>Voir la Licence</a></p></div>';
	


	$req = $bdd->query('SELECT * FROM res_questionnaire WHERE Id_adherent = "'.$id.'"');
	$n = $req->rowCount();
	if ($n == 0) {
		echo "<p class=\" marg10 Yanone bleu\">Le questionnaire n'a pas encore été enregistré</p>";
	}
	else{
		echo '<p class="h1 marg10 ">Questionnaire<p>
					<hr class="sep2 bleu" style="max-width: 115px;">';
		echo "<br><p class=\" marg10 Yanone bleu\">Le questionnaire a été retenu</p>";
		echo '<br> <p class="Yanone">Vos réponses au questionnaire</p>';
		echo '<br><table class="table-admin">';

		$cat =  $bdd->query('SELECT * FROM cat_questionnaire');
		while ($donnees = $cat->fetch()){

		$idCat = $donnees['Id_cat_questionnaire'];
		$libelleCat = $donnees['link'];

			$idlibelle =  $bdd->query('SELECT '.$libelleCat.' FROM res_questionnaire  WHERE Id_adherent = "'.$id.'"');

				while ($d = $idlibelle->fetch()){

					$libelle =  $bdd->query('SELECT Libelle_checkbox_questionnaire FROM checkbox_questionnaire  WHERE  id_checkbox_questionnaire = "'.$d[''.$libelleCat.''].'"');

					while ($p = $libelle->fetch()){
						echo'<tr><td class="bleu">'.$donnees['Libelle_cat_questionnaire'].'</td><td>'.$p['Libelle_checkbox_questionnaire'].'</td></tr>';	

					}				
				}	
		}
	echo "</table>";
	}
		
	}
				
?>