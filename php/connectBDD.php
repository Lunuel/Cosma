<?php
try
		{
	$bdd = new PDO('mysql:host=localhost;dbname=cosma;charset=utf8', 'root', '');
		}
catch(Exception $e)
		{
		die('Tu as fait une erreur quelque part, Bah Bravo NILS, GENIAL  : '.$e->getMessage());
		}
?>