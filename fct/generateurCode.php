<?php
	 function GenerateurCodeMAJ($nb){

		$tabMAJ = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', '1', '2', '3','4', '5', '6', '7', '8', '9');

		$list = array();

		for ($i=1; $i < $nb+1; $i++) { 
			$nbAle = rand(0,31);
			$list[] = $tabMAJ[$nbAle];
		}
		$Code = implode ($list);
		return $Code;
	};

	function GenerateurCodeMIN($nb){

		$tabMAJ = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', '1', '2', '3','4', '5', '6', '7', '8', '9');

		$list = array();

		for ($i=1; $i < $nb+1; $i++) { 
			$nbAle = rand(0,31);
			$list[] = $tabMAJ[$nbAle];
		}
		$Code = implode ($list);
		return $Code;
	};
?>