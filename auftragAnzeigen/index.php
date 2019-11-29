<? session_start(); ?>

<!DOCTYPE html>
<html class="htmlTag"><!------------------------------------------Auftrag (PDF) anzeigen--------------------------------------------------->

	<head> <? include("../includes/head.inc.php"); ?> </head>

	<body>
		
		<header> <? include("../includes/header.inc.php"); ?> </header>
		
		<main>
			<?
					include("./includes/auftragAnzeigen.inc.php"); //if user logged in
					//echo("<br>");
					//include("../includes/indexUNLI.inc.php"); //if user not logged in
			?>
		</main>
		
		<script>getInputAuftragsnummerPDF();</script>

		<footer> <? include("../includes/footer.inc.php"); ?> </footer>

	</body>

</html>