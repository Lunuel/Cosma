<?php
$ErreurConnexion = $Valid_article  ="";
if(isset($_POST['valider_article'])){

			$title = $_POST['title'];
			$post = $_POST['editor'];
			$date = date("Y-m-d");

			include "../fct/generateurCode.php";
			$Id_Article = GenerateurCodeMIN(8);

			function verif_champvide()
		    {
		    	$champs_vide=array();

		    if (empty($_POST['editor'])){
		         $champs_vide[]='"editor"';
		    }
		    if (empty($_POST['title'])){
		         $champs_vide[]='"title"';
		    }

			if (empty($champs_vide)) {
				$post = $_POST['editor'];
				$title = $_POST['title'];
			      return true;

			    } else {
			      return false;
			    }
		    }

			if ( verif_champvide() == true)  {

				include"../php/connectBDD.php";

				$request = $bdd->prepare('INSERT INTO article VALUES(?,?,?,?)');
				$request->execute(array($Id_Article,$title,$date,$post));

				$Valid_article = "L'article a été ajouté";


		    } else {

		    	if ( verif_champvide() == false) {
		    		$ErreurConnexion = 'Il manque un champs';}

		    }
}
