<?php

$arrayCode = array();
$app = false;

$req = $bdd->query(
	'SELECT  Lib_codeCadeau
  	FROM codeCadeau');

while ($donnees = $req->fetch()){
	array_push($arrayCode, $donnees['Lib_codeCadeau']);
}	

if(isset($_POST['codeCadeau'])){
			function verif_champvide()
		    {
		    	$champs_vide=array();

		    if (empty($_POST['codeCadeau'])){
		         $champs_vide[]='"codeCadeau"';
		    }

			if (empty($champs_vide)) {
			      return true;

			    } else {
			      return false;
			    }
		    }

		    function valideCode($arrayCode){

				foreach ($arrayCode as $value ) {
					if ($_POST['codeCadeau'] == $value) {
						$app = true;
						$code = $value;
						break;
					}
		    	
		    		else
		    			$app = false;;
				}
				return $app;

		    }

		    if ( verif_champvide() == true )  {
		    	if (valideCode($arrayCode) == true) {
		    		include"../php_function/count.php";

		    		foreach ($arrayCode as $value ) {
						if ($_POST['codeCadeau'] == $value) {
							$code = $value;
							break;
						}

					}

					$rep = $bdd->query(
						'SELECT  nbCredits, Lib_codeCadeau
					  	FROM codeCadeau
					  	WHERE  Lib_codeCadeau = "'.$code.'"');

					while ($donnees = $rep->fetch()){
						$CreditsAdd = $donnees['nbCredits'];
						$Lib_codeCadeau = $donnees['Lib_codeCadeau'];
					}		


					$element = $idClient;
					$BDDcol = 'Id_client';
					$table = 'demandecodecadeau';
					if (countElement($element,$BDDcol,$table) == true) {
					$request = $bdd->prepare('INSERT INTO demandecodecadeau VALUES(?,?)');
					$request->execute(array($Lib_codeCadeau,$idClient));
		   				$bdd->query('UPDATE client SET Credits = Credits + "'.$CreditsAdd.'"');
		   				$BonCode ='Code valide, <span style="font-family:"Dosis"">'.$CreditsAdd.'</span> crédits ont été ajoutés à votre compte';	
					}
					else
						$CodeUtil ='Code déjà utilisé';	


		    	}
		    	else {

		    		  $MauvaisCode ='Code invalide';
		    	}



		    } else {

		     $CcodeCadeau ='Aucun code rentré';

		    }
}

?>