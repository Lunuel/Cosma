<?php
	function countElement($element,$BDDcol,$table){
			
		include"./connectBDD.php";
		$count = $bdd->query('SELECT COUNT(*) FROM '.$table.' WHERE '.$BDDcol.' = "'.$element.'" ');


		$nb = $count->fetchColumn();

		if($nb != 0){
			return false;
		}
		else {
			return true;
		};
	}
 ?>