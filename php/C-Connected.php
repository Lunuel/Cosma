				<div class="C-Connexion">
					<div  class="WC-id">Profil</div>
					<div class="t-center">
						<?php
						if (verifIndex() == true)  {
			      			echo '<p class="t-Acceder bleu" ><a href="./php/Profil.php"><i class="fa fa-user-o" style="font-size:16px;margin-right:3px;"></i>Accéder à votre profil</a></p>
			      				<p class="t-Acceder bleu" ><a href="./php/Commande.php">Je commande un équipement</a></p>

			      				<a href="./php/deconnexion.php"><button class="deco_button">
								<i class="fa fa-power-off " style="font-size: 16px;"></i>
								Deconnexion</button></a>';
			      		}
			      		else {
			      			echo '<p class="t-Acceder bleu"><a href="./Profil.php"><i class="fa fa-user-o" style="font-size:16px;margin-right:3px;"></i>Accéder à votre profil</a></p>
			      			<p class="t-Acceder bleu" ><a href="./Commande.php">Je commande un équipement</a></p>

			      				<a href="deconnexion.php"><button class="deco_button">
								<i class="fa fa-power-off " style="font-size: 16px;"></i>
								Deconnexion</button></a>';
			      		}
			      		?>
					</div>
				</div>