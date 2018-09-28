<?php
if(isset($_POST['deleteCourse'])){

	 	$idCourse = $_POST['idCourse'];
		$nb_modifs = $bdd->exec('DELETE FROM course WHERE Id_course = "'.$idCourse.'"');

		header('Location: '.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'].'');
}
