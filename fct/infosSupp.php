<?php

					if(isset($_POST['valider_InfosSupp'])){
						$rib = $_FILES['rib'];
			$erreurRib = false;
			if ($_FILES['rib']['error'] == UPLOAD_ERR_NO_FILE) {
    				$_SESSION['AucunFichier'] =  'Aucun fichier envoyé';
    				$erreurRib = true;
			}
			else{


				$keyFile = GenerateurCodeMIN(4);

				$dossier = '../img/Adherent/RIB/';
				$fichierRib = 'RIB'.$keyFile.$_FILES['rib']['name'];	
				$taille_maxi = 1000000;
				$taille = filesize($_FILES['rib']['tmp_name']);
				$extensions = array('.pdf');
				$extension = strrchr($_FILES['rib']['name'], '.'); 
				

				if(!in_array($extension, $extensions))
				{
				     $_SESSION['$RIBtype'] = 'Vous devez importer un fichier de type pdf pour le RIB';
				     $erreurRib = true;
				}
				if($taille > $taille_maxi)
				{
				    $_SESSION['$RIBtaille']=  'Le RIB est trop gros...';
				    $erreurRib = true;


				}
				if($erreurRib == false) //S'il n'y a pas d'erreur, on upload
				{
				     //On formate le nom du fichier ici...
				    $fichierRib = strtr($fichierRib, 
				          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				     $fichierRib = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierRib);
				}
				else
				{
					$erreurRib = true;
				}
			}



			
							$certificat = $_FILES['certificat'];
							$licence = $_FILES['licence'];
							if ($_FILES['certificat']['error'] == UPLOAD_ERR_NO_FILE AND $_FILES['licence']['error'] == UPLOAD_ERR_NO_FILE) {
								echo "Aucun fichier n'a été transmis";
							}
							else {
								$erreurCertificat = false;
								$erreurLicence = false;
								if ($_FILES['certificat']['error'] =! UPLOAD_ERR_NO_FILE){


									$keyFile = GenerateurCodeMIN(4);

									$dossier = '../img/Adherent/Certificat_Medical/';
									$fichierCertificat = 'CERTIF'.$keyFile.$_FILES['certificat']['name'];	
									$taille_maxi = 10000;
									$taille = filesize($_FILES['certificat']['tmp_name']);
									$extensions = array('.pdf','.png','.jpg');
									$extension = strrchr($_FILES['certificat']['name'], '.'); 
									

									if(!in_array($extension, $extensions))
									{
									     $_SESSION['$RIBtype'] = 'Vous devez importer un fichier de type pdf pour le RIB';
									     $erreurCertificat = true;
									}
									if($taille > $taille_maxi)
									{
									    $_SESSION['$RIBtaille']=  'Le RIB est trop gros...';
									    $erreurCertificat = true;
									}

									if($erreurCertificat == false) //S'il n'y a pas d'erreur, on upload
									{
									     //On formate le nom du fichier ici...
									    $fichierCertificat = strtr($fichierCertificat, 
									          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
									          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
									     $fichierCertificat = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierCertificat);     									move_uploaded_file($_FILES['certificat']['tmp_name'], $dossier . $fichierCertificat);

									    $nb_modifs = $bdd->exec('UPDATE adherent SET CertificatMedical = '.$fichierCertificat.' WHERE Id_adherent = "'.$idAdherent.'"');
									    echo "2";									}
									else
									{
										$erreurCertificat = true;
									}
								}
								if ($_FILES['licence']['error'] =! UPLOAD_ERR_NO_FILE){


									$keyFile = GenerateurCodeMIN(4);

									$dossierLicence = '../img/Adherent/Licence/';
									$fichierLicence = 'CERTIF'.$keyFile.$_FILES['licence']['name'];	
									$taille_maxi = 10000;
									$taille = filesize($_FILES['licence']['tmp_name']);
									$extensions = array('.pdf','.png','.jpg');
									$extension = strrchr($_FILES['licence']['name'], '.'); 
									

									if(!in_array($extension, $extensions))
									{
									     $_SESSION['$RIBtype'] = 'Vous devez importer un fichier de type pdf pour le RIB';
									     $erreurLicence = true;
									}
									if($taille > $taille_maxi)
									{
									    $_SESSION['$RIBtaille']=  'Le RIB est trop gros...';
									    $erreurLicence = true;
									}

									if($erreurLicence == false) //S'il n'y a pas d'erreur, on upload
									{
									     //On formate le nom du fichier ici...
									    $fichierLicence = strtr($fichierLicence, 
									          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
									          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
									     $fichierLicence = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierLicence);									move_uploaded_file($_FILES['licence']['tmp_name'], $dossierLicence .  $fichierLicence);
									     echo "3";
									$nb_modifs = $bdd->exec('UPDATE adherent SET CertificatMedical = '.$fichierCertificat.' WHERE Id_adherent = "'.$idAdherent.'"');
									}
									else
									{
										$erreurLicence = true;
									}
								}

							}

						}

					 ?>