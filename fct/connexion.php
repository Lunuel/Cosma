<?php

	$Message= '';
	
	if(isset($_SESSION['Message'])){$Message = $_SESSION['Message'].'<br>';}

	unset($_SESSION['Message']);	

if(isset($_POST['valider_connexion'])){

					if (verifIndex() == true){

		    			include "./fct/listValC.php";
		    			include "./php/connectBDD.php";

		    			
		      		}
		      		else {

		    			include"listValC.php";
		    			include"connectBDD.php";
		      		}
		    function connexionExistence()
		    { 		      	
					if (verifIndex() == true) {

		    			include "./fct/listValC.php";
		    			include "./php/connectBDD.php";

		    			
		      		}
		      		else {

		    			include"listValC.php";
		    			include"connectBDD.php";
		      		}


		      	$mdpConnecthache= crypt($mdpConnect,"LKCR");
		    		    	
				$compte = $bdd->query('SELECT * FROM adherent WHERE Email ="'.$emailConnect.'" AND Mdp ="'.$mdpConnecthache.'"');

				$nb = $compte->rowCount();
				if($nb != 0){

					return true;
				}
				else {
					return false;
				};

			}

			function CompteValide(){
					if (verifIndex() == true) {

		    			include "./fct/listValC.php";
		    			include "./php/connectBDD.php";

		    			
		      		}
		      		else {

		    			include"listValC.php";
		    			include"connectBDD.php";
		      		}
		      	$mdpConnecthache= crypt($mdpConnect,"LKCR");

				$compte = $bdd->query('SELECT Validation FROM adherent WHERE Email ="'.$emailConnect.'" AND Mdp ="'.$mdpConnecthache.'"');


					$n = $compte->rowCount();
					if ($n < 1) {return false; }
					else {

						while ($donnees = $compte->fetch()){
						$validation =  $donnees['Validation'];}
						if ($validation == 0) {
						return false; 
						}
						else{ 
						return true;
					}
				}	

			}

			if ( connexionExistence() == true)  {

				if (CompteValide() == true) {
					$reponse = $bdd->query('SELECT id_adherent FROM adherent WHERE Email ="'.$emailConnect.'"');

				while ($donnees = $reponse->fetch())
				{
					$membre =  $donnees['id_adherent'];
				}	

				$_SESSION['id_adherent'] = $membre;

				}
				else {
					$Message = 'Email en attente de confirmation';
					header('Location: '.$_SERVER['PHP_SELF'].'');	
				}
				header('Location: '.$_SERVER['PHP_SELF'].'');	

		    } else {
		    	$Message = 'Erreur de connexion';
		    	header('Location: '.$_SERVER['PHP_SELF'].'');	
		    		
		    }

		    $_SESSION['Message'] = $Message;
}
?>