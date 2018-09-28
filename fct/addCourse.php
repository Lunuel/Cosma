<?php
 $ChampsVides  = $Valid_course  = $succes =$erreur = $CRtype = $CRtaille = $CRtype = $CRtaille = "";

 if(isset($_SESSION['Erreur']))
{	
	if(isset($_SESSION['CRtype'])){$CRtype = $_SESSION['CRtype'];}
	if(isset($_SESSION['CRtaille'])){$CRtaille = $_SESSION['CRtaille'];}
	if(isset($_SESSION['Rtype'])){$CRtype= $_SESSION['Rtype'];}
	if(isset($_SESSION['Rtaille'])){$CRtaille = $_SESSION['Rtaille'];}
	if(isset($_SESSION['Valid_course'])){$Valid_course = $_SESSION['Valid_course'];}
	if(isset($_SESSION['ChampsVides'])){$ChampsVides = $_SESSION['ChampsVides'];}		
	
    unset($_SESSION['CRtype'],$_SESSION['CRtaille'],$_SESSION['Rtype'],$_SESSION['Rtaille'],$_SESSION['Valid_course'],$_SESSION['ChampsVides'],$_SESSION['Erreur']);
}

if(isset($_POST['valider_course'])){

			$title = $_POST['title'];
			$saison = $_POST['saison'];
			$resultat = $_FILES['resultat'];
			$compterendu = $_FILES['compterendu'];

			include "../fct/generateurCode.php";
			$Id_course = GenerateurCodeMIN(8);


			function verif_fileR($Id_course)
		    {
			// Fichier Resultat 
			$dossier = '../img/Courses/Resultats/';
			$fichierResultats = 'RES'.$_FILES['resultat']['name'];
			$taille_maxi = 1000000;
			$taille = filesize($_FILES['resultat']['tmp_name']);
			$extensions = array('.png','.jpg', '.jpeg');
			$extension = strrchr($_FILES['resultat']['name'], '.'); 

			if(!in_array($extension, $extensions))
			{
			     $_SESSION['$Rtype'] = 'Vous devez importer un fichier de type png, jpg pour les résultats';
			     $_SESSION['Erreur'] = true;
			     return false;
			}
			if($taille > $taille_maxi)
			{
			     $_SESSION['$Rtaille'] = 'Le fichier Resultat est trop gros...';
			     $_SESSION['Erreur'] = true;
			     return false;
			}
			if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
			{
			     //On formate le nom du fichier ici...
			     $fichierResultats = strtr($fichierResultats, 
			          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			     $fichierResultats = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierResultats);

			     if(move_uploaded_file($_FILES['resultat']['tmp_name'], $dossier . $fichierResultats)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			     {
			          return true;
			     }
			     else //Sinon (la fonction renvoie FALSE).
			     {
			          return false;
			     }
			}
			else
			{
			    return false;
			}
			}


			function verif_fileCR($Id_course)
		    {
			// Fichier Resultat 
				$dossier = '../img/Courses/ComptesRendus/';
				$fichierCompteRendu = 'CR'.$_FILES['compterendu']['name'];	
				$taille_maxi = 1000000;
				$taille = filesize($_FILES['compterendu']['tmp_name']);
				$extensions = array('.pdf');
				$extension = strrchr($_FILES['compterendu']['name'], '.'); 

				if(!in_array($extension, $extensions))
				{
				     $_SESSION['$CRtype'] = 'Vous devez importer un fichier de type pdf pour le compte rendu';
				     $_SESSION['Erreur'] = true;
				     return false;
				}
				if($taille > $taille_maxi)
				{
				    $_SESSION['$CRtaille']=  'Le compte rendu est trop gros...';
				    $_SESSION['Erreur'] = true;
				    return false;
				}
				if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
				{
				     //On formate le nom du fichier ici...
				     $fichierCompteRendu = strtr($fichierCompteRendu, 
				          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
				     $fichierCompteRendu = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierCompteRendu);

				     if(move_uploaded_file($_FILES['compterendu']['tmp_name'], $dossier . $fichierCompteRendu)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
				     {
				          return true;
				     }
				     else //Sinon (la fonction renvoie FALSE).
				     {
				          return false;
				     }
				}
				else
				{
				     return false;
				}
			}


			function verif_champvide()
		    {
		    	$champs_vide=array();

		    if (empty($_POST['saison'])){
		         $champs_vide[]='"saison"';
		    }
		    if (empty($_POST['title'])){
		         $champs_vide[]='"title"';
		    }
		    if (empty($_FILES['resultat'])){
		         $champs_vide[]='"resultat"';
		    }
		    if (empty($_FILES['compterendu'])){
		         $champs_vide[]='"compteredu"';
		    }		    

			if (empty($champs_vide)) {
				$title = $_POST['title'];
				$saison = $_POST['saison'];

			      return true;

			    } else {
			      return false;
			    }
		    }

		    
			if ( verif_champvide() == true & verif_fileR($Id_course) == true & verif_fileCR($Id_course)	 == true)  {

		   		if (empty($_POST['liensite'])){
		        $liensite =  $_POST['liensite'];
		   		}

		   		else {
		    	 $liensite = "";
		   		}	
				include"../php/connectBDD.php";

				$request = $bdd->prepare('INSERT INTO course VALUES(?,?,?,?,?,DEFAULT,?)');
				$request->execute(array($Id_course,$title,$saison,$fichierCompteRendu,$fichierResultats,$liensite));

				$_SESSION['Valid_course'] = "La course a été ajoutée avec succès";
				$_SESSION['Erreur'] = true;

				header('Location: '.$_SERVER['PHP_SELF'].'');
				exit();


		    } else {

		    	if ( verif_champvide() == false) {
		    		$_SESSION['ChampsVides'] = 'Il manque un champs';
		    		$_SESSION['Erreur'] = true;}

		    }
}
