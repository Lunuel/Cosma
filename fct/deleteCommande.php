<?php
if(isset($_POST['deleteCommande'])){

	 	$idCommande= $_POST['idCommande'];
		$nb_modifs = $bdd->exec('DELETE FROM commande WHERE Id_commande = "'.$idCommande.'"');

		header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
}?>
