<?php
				include"connectBDD.php";
				include"../fct/generateurCode.php";
				if (isset($_POST['email'])) {
					$email = $_POST['email'];
				}
				
				$key = GenerateurCodeMIN(30);

				if (isset($_POST['valider_mail'])) {
					$validIns = "Un email de confirmation a été envoyé à l'adresse  ".$email;

				// Préparation du mail contenant le lien d'activation
				$destinataire = $email;
				$sujet = "Cosma: Activation de votre compte" ;
				//$entete = "From: inscription@votresite.com" ;
				$entete = "From: zkillerkawai@gmail.com" ;
				// Le lien d'activation est composé du login(log) et de la clé(cle)
				$message = 'Ceci est un mail automatique, Merci de ne pas y répondre.
				---------------
				Bienvenue sur notre Site,
				Pour activer votre compte, veuillez cliquer sur le lien ci dessous
				ou copier/coller dans votre navigateur internet.
				http://127.0.0.1:8080/Cosma/php/confirmation.php?code='.$key.'';

				mail($destinataire,$sujet, $message, $entete);
				
				$_SESSION['InscriptionReussie'] = "Vous êtes désormais adhérent(e)";
				}
				


		   
		?>