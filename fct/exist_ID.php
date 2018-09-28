<?php
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

			function exist_id($table){
				include"connectBDD.php";
				do {

					
					$code = generateurCodeMIN(8);

					$countID = $bdd->query('SELECT COUNT(*) FROM '.$table.' WHERE Id_adherent = "'.$code.'" ');
					$nb = $countID->fetchColumn();
					if($nb != 0){
						$p = false;
					}
					else {
						$p = true;
					}
				} while($p == false);
				return $code;
           }  