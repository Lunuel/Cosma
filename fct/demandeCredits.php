<?php
/*Demande de crédits*/
if(isset($_POST['subValider'])){
			function verif_champvide()
		    {
		    	$champs_vide=array();

		    if (empty($_POST['nbCredits'])){
		         $champs_vide[]='"nbCredits"';
		    }

		    if (empty($_POST['numcarte'])){
		         $champs_vide[]='"numcarte"';
		    }

		    if (empty($_POST['mois'])){
		         $champs_vide[]='"mois"';
		    }

		    if (empty($_POST['annee'])){
		         $champs_vide[]='"annee"';
		    }

		    if (empty($_POST['codeVerif'])){
		         $champs_vide[]='"codeVerif"';
		    }



			if (empty($champs_vide)) {
			      return true;

			    } else {
			      return false;
			    }
		    }


		 

		    if ( verif_champvide() == true )  {

		    		include"../php_function/count.php";

					$element = $idClient;
					$BDDcol = 'Id_client';
					$table = 'demandecredits';

					$dateExpiration = date('d-m-Y');
					$dateExpiration = date('Y-m-d', strtotime($dateExpiration. ' + 2 days'));

					if (countElement($element,$BDDcol,$table) == true) {
						$request = $bdd->prepare('INSERT INTO demandecredits VALUES(?,?,?,?)');
						$request->execute(array($ref,$_POST['nbCredits'],$idClient,$dateExpiration));
						$demandeCredits = "Demande ajoutée";
					}
					else
						$DemandeEnCours ='Une demande est déjà en cours';	


		    	}
		    else {

		    		  $FDemande ='Il manque des informations';
		    }


}

?>
