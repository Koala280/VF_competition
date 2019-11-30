<? session_start();


include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/connectDB.php");

//cookie setzen falls noch keiner gesetzt (txtdatei statt datenbank nutzen)
if (!isset($_COOKIE["getFromDB"])) {
	setcookie("getFromDB", false, time() + 43200, "/");
}

//zwischen DB und TXT switchen
if ($_COOKIE["getFromDB"]) {
	include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/fromDB.php");
} else {
	include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/fromTXT.php");
}


$db = new db();
//if change to txt no need $db in getFuncs
$getFuncs = new getFuncs($db);


/* Auswahl generieren von den Übereinstimmungen von Suche nach Auftragsnummer */
	if (isset($_POST["compareNumber"])) {
		$inputAuftragsnummer = $_POST["compareNumber"];
		
		if (!empty($inputAuftragsnummer)) {
			
			echo '<h3 class="selectAuftragText">Bitte Auftrag Auswählen</h3>';

			$getFuncs->getMatchingNumbers($inputAuftragsnummer);
		}
	}

	/* Daten für Arbeitszeit.txt sammeln und eintragen */
	if (isset($_POST["time"])) {
		$time = $_POST["time"];
		$getAuftragsnummer = $_POST["getAuftragsnummer"];
		$getAbschnittsnummer = $_POST["getAbschnittsnummer"];
		$employee = $_POST["employee"];
		$activity = $_POST["activity"];
		
		$getFuncs->writeArbeitszeit($getAuftragsnummer, $getAbschnittsnummer, $employee, $time, $activity);
	}
?>