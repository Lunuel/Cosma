<?php
include"connectBDD.php";
include"exist_ID.php";	

	$Message= '';
	
	if(isset($_SESSION['Message'])){$Message = $_SESSION['Message'].'<br>';}

	unset($_SESSION['Message']);	

if(isset($_POST['valider_inscription'])){

		    include "listValI.php";
			function verif_champvide()
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

			include"count.php";

			$mdphache= crypt($mdp,"LKCR");
			$mdpChache= crypt($mdpC,"LKCR");
			include"equivalence.php";


			if ( countElement($email,"Email","adherent") == true AND verif_champvide() == true AND equivalence($mdphache,$mdpChache) == true )  {		

				$code = exist_id("adherent");
				$key = GenerateurCodeMIN(30);

				$request = $bdd->prepare('INSERT INTO adherent VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,DEFAULT,?,DEFAULT)');
				$request->execute(array($code,$mdphache,$mdpChache,$nom,$prenom,$email,$bday,$adresse,$tel,$Sexe,$Unom,$Uprenom,$Utel,$key));

				$validIns = "Un email de confirmation a été envoyé à l'adresse  ".$email;

				// Préparation du mail contenant le lien d'activation
				$destinataire = $email;

				//=====Déclaration des messages au format texte et au format HTML. 
				$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

				$message_html = '<html><head></head><body><div>
				<img src="" style="width:100%;height:auto">
				<div>
				<p style="text-align:center">Ceci est un mail automatique, Merci de ne pas y repondre.</p>
				<p style="text-align:center;">---------------</p>
				<p style="text-align:center;">Bienvenue sur notre site <br>
				Pour activer votre compte, veuillez cliquer sur le lien ci dessous</p><p style="text-align:center;" ><a style="color:#485d96;text-decoration:none;"  
				href="http://www.cosmarunning.fr/php/ConfirmationAccount?key='.$key.'&&idAdherent='.$code.'">Cliquez-ici</a></p>
				</div>
				<p style="text-align:center;" >
				ou copier ce lien <br>http://www.cosmarunning.fr/php/ConfirmationAccount?key='.$key.'&&idAdherent='.$code.'</p>
				</div>
				</div></body></html>';
				//==========

				//=====Définition du sujet.
				$sujet = "Cosma: Activation de votre compte" ;
				//=========
				 
				//=====Création du header de l'e-mail.
				$header = "From: <secretariat@cosma-marathon.fr>\n";
				$header.= "MIME-Version: 1.`\n";
				$header.= "Content-type: text/html; charset= iso-8859-1\n";

				mail($destinataire,$sujet, $message_html, $header);
				
				$Message.= "Vous êtes désormais adhérent(e) <br> Un email de confirmation a été envoyé. 
				";
				header('Location: '.$_SERVER['PHP_SELF'].'');


		    } else {

				if (verif_champvide()== false) {	
		    		$Message.= 'Il manque des informations<br>';}

		    	else if (countElement($email,"Email","adherent") == false) {
		    		$Message.= 'Email déjà utilisé<br>';}
		    	
		    	else if (equivalence($mdphache,$mdpChache) == false) {	
		    		$Message.='Mots de passe différents<br>';}

		    	else {	
		    		header('Location: ../index.php');	
		    	}

		    	header('Location: '.$_SERVER['PHP_SELF'].'');				

		    }

		    $_SESSION['Message'] = $Message;


}
?>