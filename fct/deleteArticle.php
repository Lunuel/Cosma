<?php
if(isset($_POST['deleteArticle'])){

	 	$idArticle = $_POST['idArticle'];
		$nb_modifs = $bdd->exec('DELETE FROM article WHERE Id_article = "'.$idArticle.'"');

		header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'');
}
