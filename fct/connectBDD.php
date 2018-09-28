<?php
try
		{
	$bdd = new PDO('mysql:host=cosmarunning.fr;dbname=db753987560;charset=utf8', 'root', '');
		}
catch(Exception $e)
		{
		die('Tu as fait une erreur quelque part, Bah Bravo NILS, GENIAL  : '.$e->getMessage());
		}
?>