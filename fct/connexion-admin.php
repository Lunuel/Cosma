<?php 

$ErreurConnexion = '';
if(isset($_POST['valider_connexion-admin'])){

				$mdp = $_POST['mdp'];
				$pseudo = $_POST['pseudo'];
		   
		    function connexionExistence()
		    { 

		    	include"../php/connectBDD.php";

				$mdp = $_POST['mdp'];
				$pseudo = $_POST['pseudo'];

				$ce = $bdd->query('SELECT COUNT(*) FROM admin WHERE Pseudo = "'.$pseudo.'" AND Mdp = "'.$mdp.'"');

				$nb = $ce->fetchColumn();

				if($nb != 0){
					return true;
				}
				else {
					return false;
				};

			}

			if ( connexionExistence() == true)  {
				include "../php/connectBDD.php";
				$reponse = $bdd->query('SELECT Id_admin FROM admin WHERE Pseudo ="'.$pseudo.'"');

				while ($donnees = $reponse->fetch())
				{
					$admin =  $donnees['Id_admin'];
				}	
				header('Location: ../php/Edit.php');
				
		    } else {
		    		$ErreurConnexion = '
		    		Erreur lors de la connexion';

		    }
}

?>