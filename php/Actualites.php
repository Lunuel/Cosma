<?php session_start(); ?>
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
	    <link rel="shortcut icon" href="./ico/.ico">

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


			<?php include"../php/WP-Nav.php";  ?>

			<?php include"../php/WP-Connexion.php";  ?>



			<div class="Wrapper-Content C2-C3">
				<div>
					<p class="bleu t-justify">Cosma Running met à jour régulièrement ses dernières actualités.</p> <br>

						<button class="butt-article Yanone active-butt-article" id="butt-article1">La dernière actualité </button>
						<button   id="butt-article2" class="butt-article Yanone">Toutes les actualités</button>
						<div class="C-article active-article" id="DernierArticle">
							<?php include"../fct/articles.php"; ?>
						</div>
						</div>
						<div class="C-article" id="ListeArticles">
							<?php include"../fct/listeArticle.php"; ?>
						</div>
						
					
				</div>
			</div>

			<?php include"../php/WP-Footer.php"  ?>

		</div>


	<!-- Initialisation des animation prédéfinies: https://daneden.github.io/animate.css/-->
 	<script src="./js/wow.min.js"></script>
    <script> new WOW().init();</script>
            <script>
        $(function() {
          $("#butt-article1").click(function() {

          	$(".C-article").removeClass( "active-article" );
            $("#DernierArticle").addClass( "active-article" )

            $(".butt-article").removeClass( "active-butt-article" );
            $("#butt-article1").addClass( "active-butt-article" );
            });  
        });

        $(function() {
          $("#butt-article2").click(function() {

          	$(".C-article").removeClass( "active-article" );
            $("#ListeArticles").addClass( "active-article" )

            $(".butt-article").removeClass( "active-butt-article" );
            $("#butt-article2").addClass( "active-butt-article" );
            });  
        });

        </script>



	</body>

	</html>