<?php 
	function prochainStatut($statut,$nbStatut){
		
		if ($statut  < $nbStatut) {
			$statut = $statut + 1;
			return $statut;
		}
		else {
			$statut = 1;
			return $statut;
		}

	}


?>
