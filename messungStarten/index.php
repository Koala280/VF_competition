<?
session_start(); 

/*********************************Messung Starten**********************************************/
    include_once("./includes/messungStartenProcess.php");
?>

<!DOCTYPE html>
<html class="htmlTag">

	<head> <? include("../includes/head.inc.php"); ?> </head>
	<script>getInputAuftragsnummer();</script>
	
	<body>
		
		<header> <? include("../includes/header.inc.php"); ?> </header>
		
		<main>
			<?
					include("./includes/messungStarten.inc.php"); //if user logged in
					//echo("<br>");
					//include("../includes/indexUNLI.inc.php"); //if user not logged in
			?>
			
		</main>

		<footer> <? include("../includes/footer.inc.php"); ?> </footer>

	</body>

</html>