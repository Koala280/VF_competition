<?
	session_start();
	include_once("./includes/indexProcess.inc.php");
?>
<!------------------------------------------STARTSEITE---------------------------------------------->
<!DOCTYPE html>
<html class="htmlTag">

	<head> <? include_once("./includes/head.inc.php"); ?> </head>

	<body> 
		
		<header> <? include_once("./includes/header.inc.php"); ?> </header>
		
		<main>
			<?
				if (isset($_SESSION['vf_userloggedin']) AND ($_SESSION['vf_userloggedin'] == true)) {
					include_once("./includes/index.inc.php"); //if user logged in
				} else {
					echo '<a href="http://localhost/AppVF/login">Hier Anmelden</a>'; //if user not logged in
				}
			?>
		</main>

		<footer> <? include_once("./includes/footer.inc.php"); ?> </footer>

	</body>

</html>