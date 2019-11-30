<!-- 3 Buttons auf der Startseite + zusatzbuttons-->
<div class="section">

	<a class="hpLinks" href="./messungStarten">Messung starten</a>
	<a class="hpLinks" href="./auftragAnzeigen">Auftrag anzeigen</a>
	<a class="hpLinks" href="./planerAnzeigen">Planer anzeigen</a>
    <a class="hpLinks" onclick="triggerDarkmode()">Akkusparmodus</a>
	<a class="hpLinks" href="./logout">Ausloggen</a>
    <form method="post" action="./includes/indexProcess.inc.php"><input name="submit" class="toggleGetInfFromDB" type="submit" value="Umschalten DB/TXT"></input></form>
</div>