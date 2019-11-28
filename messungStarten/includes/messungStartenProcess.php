<?
/* Auswahl generieren von den Übereinstimmungen von Suche nach Auftragsnummer */
	if (isset($_POST["compareNumber"])) {
		$inputAuftragsnummer = $_POST["compareNumber"];
		
		if (!empty($inputAuftragsnummer)) {
			
			$splitRow = file("http://localhost/files/Aufträge.txt");

			foreach ($splitRow as $row) {

				$getAuftragsnummer = splitRowAuftrag($row); 
				
				if (strpos($getAuftragsnummer[0], $inputAuftragsnummer) !== false) {
					//$getAuftragsnummer[0] = Auftragsnummer; [1] = Abschnitsnummer; [2] = Abschnittsname; [3] = Adresse
					echo '<p  onclick="stopwatchFunctions(' . $getAuftragsnummer[0] . ', ' . $getAuftragsnummer[1] . ', \'' . $getAuftragsnummer[2] . '\')">' . $getAuftragsnummer[0] . "+" . $getAuftragsnummer[1] . " " . $getAuftragsnummer[2] . "||" . $getAuftragsnummer[3] . "</p>";
				}
			}
		}
	}

	/* Auftragsnummer, Abschnitsnummer, Abschnittsnamen voneinaner trennen */
	function splitRowAuftrag($row) {

        $delimiters = array("+", ";");
        $rowStartReplace = str_replace($delimiters, $delimiters[0], $row);

        $pos = strpos($row, " ");

        if ($pos !== false) {
            $rowReadyReplacing = substr_replace($rowStartReplace, $delimiters[0], $pos, " ");
        }

        $inputs = explode($delimiters[0], $rowReadyReplacing);

        return $inputs;

    }

	/* Auswahl von Mitarbeiter erstellen, die in der Textdatei gefunden wurden */
	function selectEmployee() {

        $splitRows = file("http://localhost/files/Mitarbeiter.txt");

        foreach ($splitRows as $row) {

            $getOption = explode(";", $row);
            
            echo '<option class="employees" value="' . $getOption[0] . '">' . $getOption[0] . "</option>";
            
        }
    }

    /* Auswahl von Tätigkeitsarten erstellen, die in der Textdatei gefunden wurden */
    function selectActivity() {

        $splitRows = file("http://localhost/files/Tätigkeitsarten.txt");

        foreach ($splitRows as $row) {

            $getOptions = explode(";", $row);

            foreach ($getOptions as $option) {
                echo '<option class="typeOfActivity" value="' . $option . '">' . $option . "</option>";
            }
        }
	}
	
	/* Beendete Messung in Arbeitszeit.txt speichern */
	if (isset($_POST["time"])) {
		$time = $_POST["time"];
		$getAuftragsnummer = $_POST["getAuftragsnummer"];
		$getAbschnittsnummer = $_POST["getAbschnittsnummer"];
		$employee = $_POST["employee"];
		$activity = $_POST["activity"];
		
		$getWorkHours = explode(":", $time);
		$workHours = $getWorkHours[0] + $getWorkHours[1]/60 + $getWorkHours[2]/3600;
		$fileLink = $_SERVER['DOCUMENT_ROOT'] . "/files/Arbeitszeit.txt";
		$input = $getAuftragsnummer . "+" . $getAbschnittsnummer . ";" . $employee . ";" . $workHours . ";" . $activity . "\n";

		$file = fopen($fileLink, 'ab');
		fwrite($file, $input);
		fclose($file);
	}

?>