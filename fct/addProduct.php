<?php
if (isset($_SESSION['Statut'])) {
	if ($_SESSION['Statut'] == true) {
	$statut = $_SESSION['Statut'];
	}
}
else {
	$statut = false;
}

$add = $dejaAddCollection = $dejaAddCommande = $NonConnecte = "";

if(isset($_POST['addProductSubmit']) && isset($_SESSION['Statut'])== true){

			$idClient = $_SESSION['id_client'];
	 		$idProduct = $_POST['idProduct'];

			function existCommande(){
				include "php/connectBDD.php";
				$idClient = $_SESSION['id_client'];
		 		$idProduct = $_POST['idProduct'];
				$reponse = $bdd->query('SELECT COUNT(*) FROM commande WHERE Id_produit ="'.$idProduct.'" AND Id_client ="'.$idClient.'"');
				$nb = $reponse->fetchColumn();
				if($nb != 0){
					return false;
				}
				else {
					return true;
				}

           };
           	function existCollection(){
				include "php/connectBDD.php";
				$idClient = $_SESSION['id_client'];
		 		$idProduct = $_POST['idProduct'];
				$reponse = $bdd->query('SELECT COUNT(*) FROM collection WHERE Id_produit ="'.$idProduct.'" AND Id_client ="'.$idClient.'"');
				$nb = $reponse->fetchColumn();
				if($nb != 0){
					return false;
				}
				else {
					return true;
				}

           };

			if ( existCollection()==true)  {
				if (existCommande()== true) {
					# code...
				include_once"php_function/generateurCode.php";
				$idCommande = generateurCodeMIN(8);
				$idClient = $_SESSION['id_client'];
	 			$idProduct = $_POST['idProduct'];

				$reponse = $bdd->prepare('INSERT INTO commande (Id_commande,Id_client,Id_produit) VALUES(?,?,?)');
				$reponse->execute(array($idCommande,$idClient, $idProduct));

				$add = 'Votre commande a été prise en compte !';
				}
		    	else  {

				$dejaAddCommande =  'Votre commande a déjà été enregistré';
				}
					
		    	
		    } else {
				$dejaAddCollection =  'Exite déjà dans votre collection';
					
		    }

		
};

if(isset($_POST['addProductSubmit']) && isset($_SESSION['Statut'])== false){
	$NonConnecte = "Pour ajouter un article il faut être connecté";
}	


?>