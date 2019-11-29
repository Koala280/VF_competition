<?
/* Auswahl generieren von den Übereinstimmungen von Suche nach Auftragsnummer */
if (isset($_POST["compareNumber"])) {
	$inputAuftragsnummer = $_POST["compareNumber"];
	
	if (!empty($inputAuftragsnummer)) {

		$splitRows = file("http://localhost/AppVF/files/Aufträge.txt");
        $auftragsnummer = array();
        
        foreach ($splitRows as $row) {

            $rowSplitted = explode("+", $row);
            $auftragsnummer[] = $rowSplitted[0];
            
        }

        if (strpos($auftragsnummer[0], $inputAuftragsnummer) !== false) {
            echo "<h3 class='selectAuftragText'>Auftrag Auswählen</h3>";
        }

        foreach (array_unique($auftragsnummer) as $a) {

            if (strpos($a, $inputAuftragsnummer) !== false) {

                echo '<p class="optionAuftragsnummer" onclick="auftragsnummerPDFAnzeigen(' . $a . ')">' . $a . "</p>";
            }
        }
	}	
}
?>