<?php
$Valid_Commande  = "";
if(isset($_POST['valider_Commande'])){


			$IdTypeVetement = $_POST['idProduit'];
			$taille = $_POST['taille'];
			$IdProduit = $_POST['idProduit'];
			$IdAdherent = $_SESSION['id_adherent'];
			$date = date("Y-m-d"); 

			include "../fct/generateurCode.php";
			$Id_Commande = GenerateurCodeMIN(8);

				include"../php/connectBDD.php";

			$request = $bdd->prepare('INSERT INTO commande VALUES(?,?,?,?,?,DEFAULT)');
			$request->execute(array($Id_Commande,$IdAdherent ,$IdTypeVetement,$taille,$date));

			$Valid_Commande = "L'article a été ajouté";

}