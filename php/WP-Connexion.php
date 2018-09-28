<?php

      		if (verifIndex()== true){
      			include "./fct/connexion.php";
      		}
      		else {
      			include "../fct/connexion.php";
      		}
			
			 ?>
			<div class="Wrapper-Connexion C1">

				<?php 
				if (isset($_SESSION['id_adherent'])) {
					include "C-Connected.php";
				}
				else {
					include "C-Connexion.php";
				}
?>	


				<div class="C-Horaires" >
					<div>
						<p class="h1 t-center">Entraînements</p>
						<p class="p-entrainements">Entraînements sur le stade Louis Frébault</p>			
							<ul class="">
						<li class="content-li-accueil"><i class="fa fa-angle-right bleu" style="font-size:16px;margin-right: 4px;"></i>mardi de 18h30 à 20h00</li><br>

						<li class="content-li-accueil">
						<i class="fa fa-angle-right bleu" style="font-size:16px;margin-right: 4px;"></i>jeudi de 19h00 à 20h30</li> <br>

						<li class="content-li-accueil"><i class="fa fa-angle-right bleu" style="font-size:16px;margin-right: 4px;"></i>vendredi de 18h30 à 20h00</li></ul>
						<p class="p-entrainements">Entraînement hors stade</p>			
							<ul class="t-center">
						<li class="content-li-accueil"><i class="fa fa-angle-right bleu" style="font-size:16px;margin-right: 4px;"></i>samedi de 10h00 à 11h30 au Parc de Sceaux (rendez-vous devant la statue de l’orangerie, entrée à gauche de l’entrée principale)</li>
					</ul>
					
					</div>
				</div>	

			</div>