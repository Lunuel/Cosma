 <?php   
    function hashage($val){
		$valhache = crypt($val,"LKCR");
		return $valhache;
    }
?>        