<table id="table-liste-articles">
	
<?php
		include"../php/connectBDD.php";

		$req = $bdd->query(
      	'SELECT Titre_article, DateArticle,Contenu
     	FROM article
     	 Order by DateArticle DESC LIMIT 5');

		while ($donnees = $req->fetch()){

			$Titre_article = $donnees['Titre_article'];
			$DateArticle = $donnees['DateArticle'];
			$Contenu = $donnees['Contenu'];


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
					

		

		$tab=str_word_count($Titre_article ,2);
		$mot=array_keys($tab);

		if(count($mot)>8)
		{
			$Titre_article  =  substr($Titre_article ,0,$mot[8])."(...)";

		}

		echo '<tr><td style="font-size: 14px;">'.$jour.'/'.$mois.'/'.$annee.'</td>
		<td>'.$Titre_article.'</td>
		<td style="text-align:right;font-size: 14px;"><a href="Article.php?article='.$idArticle .'  ">En savoir plus</a></td></tr>';
		}
?>


	
</table>		