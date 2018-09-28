<?php function verif_champvide()
		    {
		    	$champs_vide=array();

		    if (empty($_POST['nom'])){
		         $champs_vide[]='"nom"';
		    }

		    if (empty($_POST['email'])){
		         $champs_vide[]='"email';
		    }

		    if (empty($_POST['prenom'])){
		         $champs_vide[]='"prenom"';
		    }

		    if (empty($_POST['mdp'])){
		         $champs_vide[]='"mdp"';
		    }
		    if (empty($_POST['mdpC'])){
		         $champs_vide[]='"mdpC"';
		    }
		    if (empty($_POST['bday'])){
		         $champs_vide[]='"bday"';
		    }
		    if (empty($_POST['sexe'])){
		         $champs_vide[]='"sexe"';
		    }
		    if (empty($_POST['adresse'])){
		         $champs_vide[]='"adresse"';
		    }
		    if (empty($_POST['tel'])){
		         $champs_vide[]='"tel"';
		    }
		    if (empty($_POST['Unom'])){
		         $champs_vide[]='"Unom"';
		    }
		    if (empty($_POST['Uprenom'])){
		         $champs_vide[]='"Uprenom"';
		    }
		    if (empty($_POST['Utel'])){
		         $champs_vide[]='"Utel"';
		    }
			if (empty($champs_vide)) {
				include "listValI.php";
			      return true;

			    } else {
			      return false;
			    }
		    }