<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<!-- Avant de demander de l'aide passez sur  https://www.w3schools.com/-->

	<head>
		<title>COSMA Running</title>
		<meta charset="utf-8">

		<!-- CSS -->
		<link href="../css/styleIndex.css" rel="stylesheet" >

		<!-- Polices -->
		<?php include"../link/polices.html" ?>


		<?php include"../link/icons.html" ?>



	    <!-- Icone sur navigateur -->
	    <link rel="shortcut icon" href="../ico/.ico">

  		<!-- jQuery pour bootstrap -->
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  		<!-- Initialisation du viewport-->		
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Icons references-->	
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>

	<body>
		<div class="wrapper">

			<?php include "./WP-Nav.php" ?>

			<?php include "../php/WP-Connexion.php"  ?>

			<div class="Wrapper-Content C2-C3">
				<div style="width: 100%;">

				<div style="width: 100%;" class="C-Performance">
					<p class="h1">CHPT DE FRANCE - QUALIFICATION</p>
					<hr class="sep2" style="width:100%;max-width:265px;">
					<p class="margTB5">Minimas Hors Stades:</p>
					<div class="C-Minimas" id="C-butt-Minimas">
						<button class="butt-Performances active" id="butt-10km">10km</button>
						<button class="butt-Performances" id="butt-semi">Semi</button>
						<button class="butt-Performances" id="butt-marathon">Marathon</button>
					</div>
					<div class="C-Minimas-tableaux" id="C-table-Minimas">

					<table class="table-minimas active-table" id="table-10km">
						<tr><td colspan="3" style="border:2px solid #5c6fa2; padding: 2px;" class="t-center bleu">Minimas 10km</td></tr>
						<tr><td>Catégories</td><td >Hommes</td><td>Femmes</td></tr>
						<tr><th>Juniors <span class="ages">(18-19 ans)</span></th><th>37'</th><th>46'</th></tr>
						<tr><th>Espoirs <span class="ages">(20-23 ans)</span></th><th>35'</th><th>44'</th></tr>
						<tr><th>Séniors <span class="ages">(24-41 ans)</span></th><th>34'15</th><th>43'</th></tr>
						<tr><th>Masters 1 <span class="ages">(40-49 ans)</span></th><th>37'</th><th>48'</th></tr>
						<tr><th>Masters 2 <span class="ages">(50-59 ans)</span></th><th>40'</th><th>51'</th></tr>
						<tr><th>Masters 3 <span class="ages">(60-69 ans)</span></th><th>46'</th><th>55'</th></tr>
						<tr><th>Masters 4 <span class="ages">(70-79 ans)</span></th><th>51'</th><th>60'</th></tr>
						<tr><th>Masters 5 <span class="ages">(86 ans et plus)</span></th><th>60'</th><th>70'</th></tr>
						
					</table>

					<table class="table-minimas" id="table-semi">
						<tr><td colspan="3" style="border:2px solid #5c6fa2; padding: 2px;" class="t-center bleu">Minimas Semi</td></tr>
						<tr><td>Catégories</td><td >Hommes</td><td>Femmes</td></tr>
						<tr><th>Juniors <span class="ages">(18-19 ans)</span></th><th>1h21</th><th>1h55'</th></tr>
						<tr><th>Espoirs <span class="ages">(20-23 ans)</span></th><th>1h17'</th><th>1h50'</th></tr>
						<tr><th>Séniors <span class="ages">(24-41 ans)</span></th><th>1h15'30</th><th>1h45'</th></tr>
						<tr><th>Masters 1 <span class="ages">(42-52 ans)</span></th><th>1h21'</th><th>1h50'</th></tr>
						<tr><th>Masters 2 <span class="ages">(53-63 ans)</span></th><th>1h30'</th><th>1h55'</th></tr>
						<tr><th>Masters 3 <span class="ages">(64-74 ans)</span></th><th>1h40'</th><th>2h00'</th></tr>
						<tr><th>Masters 4 <span class="ages">(75-85 ans)</span></th><th>1h55'</th><th>2h15'</th></tr>
						
						
					</table>
					<table class="table-minimas" id="table-marathon">
						<tr><td colspan="3" style="border:2px solid #5c6fa2; padding: 2px;" class="t-center bleu">Minimas Marathon</td></tr>
						<tr><td>Catégories</td><td >Hommes</td><td>Femmes</td></tr>
						<tr><th>Juniors <span class="ages">(18-19 ans)</span></th><th>1h21</th><th>1h55'</th></tr>
						<tr><th>Espoirs <span class="ages">(20-23 ans)</span></th><th>1h17'</th><th>1h50'</th></tr>
						<tr><th>Séniors <span class="ages">(24-41 ans)</span></th><th>1h15'30</th><th>1h45'</th></tr>
						<tr><th>Masters 1 <span class="ages">(42-52 ans)</span></th><th>1h21'</th><th>1h50'</th></tr>
						<tr><th>Masters 2 <span class="ages">(53-63 ans)</span></th><th>1h30'</th><th>1h55'</th></tr>
						<tr><th>Masters 3 <span class="ages">(64-74 ans)</span></th><th>1h40'</th><th>2h00'</th></tr>
						<tr><th>Masters 4 <span class="ages">(75-85 ans)</span></th><th>1h55'</th><th>2h15'</th></tr>
						
						
					</table>
				</div>	

				</div>			
			</div>
		</div>

			<?php include"./WP-Footer.php"  ?>

		</div>

	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>
        <!--ONlets Minimas -->
        <script>
        $(function() {
          $("#butt-10km").click(function() {
          	$(".table-minimas").removeClass( "active-table" );
            $("#table-10km").addClass( "active-table" )
            $(".butt-Performances").removeClass( "active" );
            $("#butt-10km").addClass( "active" );
            });  
        });

        $(function() {
          $("#butt-semi").click(function() {
          	$(".table-minimas").removeClass( "active-table" );
            $("#table-semi").addClass( "active-table" )
            $(".butt-Performances").removeClass( "active" );
            $("#butt-semi").addClass( "active" );
            });  
        });

        $(function() {
          $("#butt-marathon").click(function() {
          	$(".table-minimas").removeClass( "active-table" );
            $("#table-marathon").addClass( "active-table" )
            $(".butt-Performances").removeClass( "active" );
            $("#butt-marathon").addClass( "active" );
            });  
        });
        </script>
	</body>

	</html>