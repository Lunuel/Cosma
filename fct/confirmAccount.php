<?php
include"../php/connectBDD.php";

if (isset($_GET['key']) && isset($_GET['idAdherent'])) {
	$key = $_GET['key'];
	$adherent = $_GET['idAdherent'];

	$req = $bdd->query('SELECT * FROM adherent WHERE Id_adherent = "'.$adherent.'" AND Clef = "'.$key.'"');

	while ($donnees = $req->fetch()){
		$validation =  $donnees['Validation'];
	}
	echo $n = $req->rowCount();


	if ($n > 0) {

		if ($validation == false) {
		$bdd->exec('UPDATE adherent SET Validation = true WHERE Id_adherent = "'.$adherent.'" AND Clef = "'.$key.'"');
		$Compte = "Votre compte a été validé";}	

		else {
			$Compte = "Votre compte a déjà été validé";
		}
	}
	else{
		$Compte = "Aucun adhérent ne correspond à votre demande";	}
	}
else{
	header('Location: ../index.php');
}

?>