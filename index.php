<? session_start(); ?>

<!DOCTYPE html>
<html class="htmlTag"><!----------------------------------------------STARTSEITE--------------------------------------------------->

	<head> <? include("./includes/head.inc.php"); ?> </head>

	<body>
		
		<header> <? include("./includes/header.inc.php"); ?> </header>
		
		<main>
			<div class="test">
			<?
					include("./includes/index.inc.php"); //if user logged in
					//echo("<br>");
					//include("../includes/indexUNLI.inc.php"); //if user not logged in
			?>
			</div>
		</main>

		<footer> <? include("./includes/footer.inc.php"); ?> </footer>

	</body>

</html>