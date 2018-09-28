<?php
// On démarre la session
session_start ();
session_destroy();


// On redirige le visiteur vers la page d'accueil
header ('location: ../WP-admin/WP-login.php');
?>