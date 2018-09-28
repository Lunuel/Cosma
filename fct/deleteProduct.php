<?php
if (isset($_SESSION['Statut'])) {
	$statut = $_SESSION['Statut'];
}
else {
	$statut = false;
}
if(isset($_POST['deleteProductSubmit']) && $statut == true){

		$idClient = $_SESSION['id_client'];
	 	$idProduct = $_POST['idProduct'];

		$bdd->query('DELETE FROM commande WHERE Id_client= "'.$idClient.'" AND Id_produit = "'.$idProduct.'"');
	}

?>