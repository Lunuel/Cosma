<?php
if(isset($_POST['revente'])){

		$idClient = $_SESSION['id_client'];

		$req = $bdd->query(
      	'SELECT SUM(Prix_Unit) as sommeRevente
     	FROM produit NATURAL JOIN collection
     	 WHERE Id_client = "'.$idClient.'" ');

		while ($donnees = $req->fetch()){
			$sommeRevente = $donnees['sommeRevente'];
		}

     	$bdd->query('UPDATE client SET Credits = Credits + "'.$sommeRevente.'" WHERE Id_client = "'.$idClient.'" ');


		$bdd->query('DELETE FROM collection WHERE Id_client= "'.$idClient.'"');
}

?>
