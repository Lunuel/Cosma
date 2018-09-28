<div>
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

		

		$tab=str_word_count($Contenu,2);
		$mot=array_keys($tab);

		if(count($mot)>100)
		{
			$Contenu_Article =  substr($Contenu,0,$mot[100])."(...)";

		}
		else
		{
			$Contenu_Article = $Contenu;
		}

		echo'

			<p class="Date-article">'.$jour.'/'.$mois.'/'.$annee.'</p>
			<p class="Title-article">'.$Titre_article.'</p>
			<div class="C-Contenu">'.$Contenu_Article.'

			</div><a href="Article.php?article='.$idArticle .'  " class="Suite-article">En savoir plus</a>
		';}
?>
					