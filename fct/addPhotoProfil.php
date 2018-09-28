<?php
			// Fichier Photo de profil
				$dossier = '../img/Adherent/Profil/';
				$fichierPhoto= 'PP'.$_FILES['photoProfil']['name'];	
				$taille_maxi = 1000000;
				$taille = filesize($_FILES['photoProfil']['tmp_name']);
				$extensions = array('.png','.jpg','.jpeg');
				$extension = strrchr($_FILES['photoProfil']['name'], '.'); 
				$erreurPhoto = false;

				if(!in_array($extension, $extensions))
				{
				     $_SESSION['$Ptype'] = 'Vous devez importer un fichier de type png, jpg, jpeg pour la photo de profil';
				     $erreurPhoto = true;

				}
				if($taille > $taille_maxi)
				{
				    $_SESSION['$Ptaille'] =  'La photo est trop volumineuse...';
				    	$erreurPhoto= true;

				}
				if($erreurPhoto == false) //S'il n'y a pas d'erreur, on upload
				{
				     //On formate le nom du fichier ici...
				   $fichierPhoto = strtr($fichierPhoto, 
				          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				    $fichierPhoto = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierPhoto);
				   $erreurPhoto = false;
				     //if(move_uploaded_file($_FILES['photoProfil']['tmp_name'], $dossier . $fichierPhoto)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				     //{

				     //     return true;
				     //}
				     //else //Sinon (la fonction renvoie FALSE).
				     //{
				     //	echo "echoué";
				     //     return false;
				     //}
				}
				else
				{
				    $erreurPhoto = true;
				}
