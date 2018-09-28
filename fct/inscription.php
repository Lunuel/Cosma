<?php
include"connectBDD.php";
include"exist_ID.php";	

$RIBtype = $RIBtaille = $Ptype = $Ptaille = $Ffilephoto = $Ffilerib = $Fmdp = $FEmail = $ChampsVides = $InscriptionReussie = $AucunFichier ="";
	//Return True
	if(isset($_SESSION['InscriptionReussie'])){$InscriptionReussie = $_SESSION['InscriptionReussie'].'<br>';}

	//Return false
	if(isset($_SESSION['Fmdp'])){$Fmdp = $_SESSION['Fmdp'].'<br>';}
	if(isset($_SESSION['FEmail'])) {$FEmail = $_SESSION['FEmail'].'<br>';}
	if(isset($_SESSION['ChampsVides'])){$ChampsVides = $_SESSION['ChampsVides'].'<br>';}

unset($_SESSION['Fmdp'],$_SESSION['FEmail'],$_SESSION['ChampsVides'],$_SESSION['InscriptionReussie'],$_SESSION['AucunFichier'] );	

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


			if ( countElement($email,"Email","adherent") == true AND verif_champvide() == true AND equivalence($mdphache,$mdpChache) == true)  {		

				$code = exist_id("adherent");
				$key = GenerateurCodeMIN(30);

				$request = $bdd->prepare('INSERT INTO adherent VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,DEFAULT,?,DEFAULT)');
				$request->execute(array($code,$mdphache,$mdpChache,$nom,$prenom,$email,$bday,$adresse,$tel,$Sexe,$Unom,$Uprenom,$Utel,$key));

				$validIns = "Un email de confirmation a été envoyé à l'adresse  ".$email;

				// Préparation du mail contenant le lien d'activation
				$destinataire = $email;

				//=====Déclaration des messages au format texte et au format HTML. 
				$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

				$message = '<html><head></head><body><div>
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

				mail($destinataire,$sujet, $message, $header);
				
				$_SESSION['InscriptionReussie'] = "Vous êtes désormais adhérent(e) <br> Un email de confirmation a été envoyé. 
				";
				header('Location: '.$_SERVER['PHP_SELF'].'');


		    } else {


		    	if (countElement($email,"Email","adherent") == false) {
		    		$_SESSION['FEmail'] = 'Email déjà utilisé';}
		    	else if (verif_champvide()== false) {	
		    		$_SESSION['ChampsVides'] = 'Il manque des informations';}
		    	else if (equivalence($mdphache,$mdpChache) == false) {	
		    		$_SESSION['Fmdp'] ='Mots de passe différents';}

		    	else {	
		    		header('Location: ../index.php');	
	
		    	}
		    	header('Location: '.$_SERVER['PHP_SELF'].'');				

		    }

}
?>