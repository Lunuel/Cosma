<?php
if(isset($_POST['valider_questionnaire'])){
	include "../php/connectBDD.php";


	$IdAdherent = $_SESSION['id_adherent'];

function verif_champvide(){

		    $champs_vide=array();

		    if (empty($_POST['C1'])){
		         $champs_vide[]='"c1"';
		    }

		    if (empty($_POST['C2'])){
		         $champs_vide[]='"c2';
		    }
		   	
		   	if (empty($_POST['C3'])){
		         $champs_vide[]='"c3';
		    }
		    
		    if (empty($_POST['C4'])){
		         $champs_vide[]='"c4';
		    }
		    
		    if (empty($_POST['C5'])){
		         $champs_vide[]='"c5';
		    }
		    

			if (empty($champs_vide)) {
				$C1 = $_POST['C1'];
				$C2 = $_POST['C2'];
				$C3 = $_POST['C3'];
				$C4 = $_POST['C4'];
				$C5 = $_POST['C5'];
			      return true;

			    } else {
			      return false;
			    }
		    }

		    if (isset($_POST['divers'])){
		        $divers = $_POST['divers'];
		    }
		    else $divers = "";

				
		    if (verif_champvide() == true) {
		    	include_once"../fct/generateurCode.php";
				$Id_res_questionnaire = generateurCodeMIN(8);

				$C1 = $_POST['C1'];
				$C2 = $_POST['C2'];
				$C3 = $_POST['C3'];
				$C4 = $_POST['C4'];
				$C5 = $_POST['C5'];
				
				$reponse = $bdd->prepare('INSERT INTO res_questionnaire VALUES(?,?,?,?,?,?,?,?)');

				$reponse->execute(array($Id_res_questionnaire,$IdAdherent,$C1,$C2,$C3,$C4,$C5,$divers));
				echo "Le questionnaire a été rempli avec succès";
				header('Location: '.$_SERVER["PHP_SELF"].'');
		    }
		    else{
		    	echo "Il manque un champs";
		    }



}
