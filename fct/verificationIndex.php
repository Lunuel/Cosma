<?php
function verifIndex(){

    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $host = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



   	if ($url == $_SERVER['HTTP_HOST']."/Cosma/index.php" | $url ==  $_SERVER['HTTP_HOST']."/Cosma/" | $host == "https://cosma-running.000webhostapp.com/index.php" | $host == "https://cosma-running.000webhostapp.com/") {
   		return true;
   	}	
   	else {
   		return false;
   	}
   }


 ?>