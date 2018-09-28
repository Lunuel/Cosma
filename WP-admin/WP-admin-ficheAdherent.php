<?php 
if (isset($_GET['fiche'])) {
	include '../fct/infosAdherents.php';
	InfosAdherent($_GET['fiche']);
}
else {
	header('Location: Edit.php');
}

?>