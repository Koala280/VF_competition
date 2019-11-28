<!DOCTYPE html>
<html><!----------------------------------------------Planer (Excel Tabelle) Anzeigen--------------------------------------------------->

	<head> <? include("../includes/head.inc.php"); ?> </head>

	<body>
		
		<header> <? include("../includes/header.inc.php"); ?> </header>
		
		<main>
			<?
					include("./includes/simplexlsx.inc.php"); //if user logged in
					//echo("<br>");
					//include("../includes/indexUNLI.inc.php"); //if user not logged in
			?>
		</main>
		
		<footer> <? include("../includes/footer.inc.php"); ?> </footer>

	</body>
	
</html>