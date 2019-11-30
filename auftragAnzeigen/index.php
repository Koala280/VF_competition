<? session_start(); ?>

<!DOCTYPE html>
<html class="htmlTag"><!-------------------------------Auftrag (PDF) anzeigen--------------------------------------------------->

	<head> <? include_once("../includes/head.inc.php"); ?> </head>

	<body>
		
		<header> <? include_once("../includes/header.inc.php"); ?> </header>
		
		<main>
			<?
				if (isset($_SESSION['vf_userloggedin']) AND ($_SESSION['vf_userloggedin'] == true)) {
					include_once("./includes/auftragAnzeigen.inc.php"); //if user logged in
				} else {
					echo '<a href="http://localhost/AppVF/login">Hier Anmelden</a>'; //if user not logged in
				}
			?>
		</main>
		
		<script>getInputAuftragsnummerPDF();</script>

		<footer> <? include_once("../includes/footer.inc.php"); ?> </footer>

	</body>

</html>