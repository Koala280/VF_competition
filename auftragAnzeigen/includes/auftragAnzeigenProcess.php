<?
/* Auswahl generieren von den Übereinstimmungen von Suche nach Auftragsnummer */
if (isset($_POST["compareNumber"])) {
	$inputAuftragsnummer = $_POST["compareNumber"];
	
	if (!empty($inputAuftragsnummer)) {

		$splitRow = file("http://localhost/files/Aufträge.txt");

        foreach ($splitRow as $row) {

            $auftragsnummer = explode("+", $row);
            if (strpos($auftragsnummer[0], $inputAuftragsnummer) !== false) {
                echo '<p onclick="auftragsnummerPDFAnzeigen(' . $auftragsnummer[0] . ')">' . $auftragsnummer[0] . "</p>";
            }
        }
	}
	
}
?>