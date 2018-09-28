<?php
try
		{
	$bdd = new PDO('mysql:host=db753987560.db.1and1.com;dbname=db753987560;charset=utf8', 'dbo753987560', 'Running!94');
		}
catch(Exception $e)
		{
		die('Tu as fait une erreur quelque part, Bah Bravo NILS, GENIAL  : '.$e->getMessage());
		}
?>