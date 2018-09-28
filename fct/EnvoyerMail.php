<?php
				include"connectBDD.php";
				include"../fct/generateurCode.php";
				if (isset($_POST['email'])) {
					$email = $_POST['email'];
				}
				
				$key = GenerateurCodeMIN(30);

				if (isset($_POST['valider_mail'])) {
					$validIns = "Un email de confirmation a été envoyé à l'adresse  ".$email;

				$key = GenerateurCodeMIN(30);
				$code = 'fndrsioi';

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
				
				$_SESSION['InscriptionReussie'] = "Vous êtes désormais adhérent(e).".$message;
				}
				


		   
		?>