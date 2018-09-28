<?php
		include"../php/connectBDD.php";

		$req = $bdd->query(
      	'SELECT *
     	FROM article
     	 Order by DateArticle DESC LIMIT 1');

		while ($donnees = $req->fetch()){

			$Titre_article = $donnees['Titre_Article'];
			$DateArticle = $donnees['DateArticle'];
			$Contenu = $donnees['Contenu'];
			$idArticle = $donnees['Id_article'];


			$date = date_parse($donnees['DateArticle']);
		    $jour = $date['day'];
		    $mois = $date['month'];
		    $annee = $date['year'];


			if ($jour < 10) {
				$jour = '0'.$jour;
			}
			if ($mois < 10) {

				 $mois = '0'. $mois;
			}
		echo'

			<p class="Date-article">'.$jour.'/'.$mois.'/'.$annee.'</p>
			<p class="Title-article">'.$Titre_article.'</p>
			<div class="C-Contenu">'.$Contenu.'

			</div>
		';}
?>
					