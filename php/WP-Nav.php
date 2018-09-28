<?php

function verifIndex(){

    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $host = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

   	if ($url == $_SERVER['HTTP_HOST']."/Cosma/index.php" | $url ==  $_SERVER['HTTP_HOST']."/Cosma/" | $host == "http://www.cosmarunning.fr/" | $host == "http://www.cosmarunning.fr/index.php") {
   		return true;
   	}	
   	else {
   		return false;
   	}
   }
			
      		if(isset($_SESSION['id_adherent'])) {
      				$register = "";
      				$registerI  = "";
					$courses = '<li><a href="Courses.php">Les courses</a></li>';
					$coursesI = '<li><a href="./php/Courses.php">Les courses</a></li>';
				}
			else {
					$register = '<li><a href="Register.php">S\'inscrire</a></li>';
					$registerI = '<li><a href="./php/Register.php">S\'inscrire</a></li>';
					$courses = "";
					$coursesI = "";
				}

      		if (verifIndex() == true) {
      			$img = '<div><img style="display: block;margin: auto;"  src="./img/logo-Cosma.png"></div>';

      			$nav = '		<li><a href="./index.php">Accueil</a></li>'.$registerI.'<li><a href="./php/Actualites.php">Actualités</a>
								<li><a href="./php/PlansEntrainements.php">Plans d\'entrainements</a></li>
								<li><a href="./php/Qualifications.php">Qualifications</a></li>'.$coursesI.'
					  			<li><a href="./php/APropos.php">La section</a></li>';



				$nav_reponsive = '<li><a href="./index.php">Accueil</a></li>'
					.$registerI.'
					<li><a href="./php/Actualites.php">Actualités</a>
					 					<li><a href="./php/PlansEntrainements.php">Plans d\'entrainements</a></li>
					 					<li><a href="./php/Qualifications.php">Qualifications</a></li>'.$coursesI.'
					 					<li><a href="./php/APropos.php">La section</a></li>';
      		}
      		else {

      			$img = '<div><img style="display: block;margin: auto;"  src="../img/logo-Cosma.png"></div>';
      			
      			$nav = '<li><a href="../index.php">Accueil</a></li>'.$register.'<li><a href="../php/Actualites.php">Actualités</a>
					 	<li><a href="../php/PlansEntrainements.php">Plans d\'entrainements</a></li>
					 	<li><a href="../php/Qualifications.php">Qualifications</a></li>'.$courses.'
					  	<li><a href="../php/APropos.php">La section</a></li>';


				$nav_reponsive = '<li><a href="../index.php">Accueil</a></li>'.$register.'
								<li><a href="../php/Actualites.php">Actualités</a></li>
					 			  <li><a href="../php/PlansEntrainements.php">Plans d\'entrainements</a></li>
					 			  <li><a href="../php/Qualifications.php">Qualifications</a></li>'.$courses.'

					  			  <li><a href="../php/APropos.php">La section</a></li>';
      		}
?>

			<div class="Wrapper-Navbar C1-C3">
				<?php echo $img;?>
				<div class="horizontal-menu">	
					<ul style="margin-top: 10px">
						<?php echo $nav;?>
						<button id="butt-menu" value="hidden" ><i id="ico-navbar" class="fa fa-bars" style="font-size: 20px;"></i></button>
					</ul>
				</div>	
				<div id="vertical-menu">
					<ul>
						<?php echo $nav_reponsive;?>
					</ul>
				</div>			
			</div>

<script>
    $("#butt-menu").click(function(){
    	if($("#butt-menu").val() == "hidden"){
	       $("#vertical-menu").animate({opacity: '1',height:'show'},"slow");
		   $("#butt-menu").val("show");
		    $("#ico-navbar").removeClass("fa fa-bars").addClass("fa fa-close");
		}
		else{
			$("#vertical-menu").animate({opacity: '0',height:'hide'},"slow"); 
			$("#butt-menu").val("hidden");
			$("#ico-navbar").removeClass("fa fa-close").addClass("fa fa-bars");
		}

   });

</script>

