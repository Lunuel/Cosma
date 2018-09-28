<?php
	//Return false
	if(isset($_SESSION['ErreurConnexion'])){$ErreurConnexion = $_SESSION['ErreurConnexion'];}

	if(isset($_SESSION['CompteNonValide'])){$CompteNonValide= $_SESSION['CompteNonValide'];}


	unset($_SESSION['ErreurConnexion'],$_SESSION['CompteNonValide']);	

if(isset($_POST['valider_connexion'])){

		    	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			    $host = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		      		if ($url == $_SERVER['HTTP_HOST']."/Cosma/index.php" | $url == $_SERVER['HTTP_HOST']."/Cosma/" | $host == "https://cosma-running.000webhostapp.com/index.php" | $host == "https://cosma-running.000webhostapp.com") {

		    			include "./fct/listValC.php";
		    			include "./php/connectBDD.php";

		    			
		      		}
		      		else {

		    			include"listValC.php";
		    			include"connectBDD.php";
		      		}
		    function connexionExistence()
		    { 		      	

		    	$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			    $host = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		      		if ($url == $_SERVER['HTTP_HOST']."/Cosma/index.php" | $url == $_SERVER['HTTP_HOST']."/Cosma/" | $host == "https://cosma-running.000webhostapp.com/index.php" | $host == "https://cosma-running.000webhostapp.com") {

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
				 $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		    	    $host = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

					
		      		if ($url == $_SERVER['HTTP_HOST']."/Cosma/index.php" | $url == $_SERVER['HTTP_HOST']."/Cosma/" | $host == "https://cosma-running.000webhostapp.com/index.php" | $host == "https://cosma-running.000webhostapp.com") {

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
						if ($validation == 0) { $_SESSION['CompteNonValide'] = '<p class="Yanone bleu">Email en attente de confirmation</p>';
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

				header('Location: '.$_SERVER['PHP_SELF'].'');

				}

		    } else {
		    	if (connexionExistence() == false) {
		    		$_SESSION['ErreurConnexion'] = '<p class="Yanone bleu">Erreur de connexion</p>';
		    		header('Location: '.$_SERVER['PHP_SELF'].'');
		    	}

		    	
		    		
		    }
}
?>