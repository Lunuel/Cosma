				<div class="C-Connexion">
					<div  class="WC-id">Identification</div>
					<div>
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
							<table class="table-connexion">
								<tr>
									<th><label >Email</label><br><input type="text" class="" name="emailConnect"></th>
								</tr>
								<tr >
									<th><label >Mot de passe</label><br><input type="password" class="" name="mdpConnect"></th>
								</tr>
														
								<tr>
									<th ><input type="submit" class="submit" value="Se connecter" id="submit-Connexion" name="valider_connexion"></th>
								</tr>
								<tr>
									<th><p class="Yanone bleu"><?php echo $Message;
									?> </p></th>
								</tr>
								
							</table>
						</form>
					</div>
				</div>