<?php
try
		{
	$bdd = new PDO('mysql:host=localhost;dbname=id6154890_cosmarunning;charset=utf8', 'id6154890_cosmaadmin', 'lunuel91');
		}
catch(Exception $e)
		{
		die('Tu as fait une erreur quelque part, Bah Bravo NILS, GENIAL  : '.$e->getMessage());
		}
?>