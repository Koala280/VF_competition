<?
    //Funktionsklasse die mit TXT files abreitet
    class getFuncs {

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

        //findet Auftragsnummer in der Textdatei, die den übergebenen Input beinhalten
        function getMatchingNumbers($auftragsnummer) {

            $splitRow = file("http://localhost/AppVF/files/Aufträge.txt");

            foreach ($splitRow as $row) {

                $getAuftragsnummer = $this->splitRowAuftrag($row); 
                
                if (strpos($getAuftragsnummer[0], $auftragsnummer) !== false) {
                    //$getAuftragsnummer[0] = Auftragsnummer; [1] = Abschnitsnummer; [2] = Abschnittsname
                    echo '<p class="optionAuftragsnummer" onclick="stopwatchFunctions(' . $getAuftragsnummer[0] . ', ' . $getAuftragsnummer[1] . ', \'' . $getAuftragsnummer[2] . '\')">' . $getAuftragsnummer[0] . "+" . $getAuftragsnummer[1] . " " . $getAuftragsnummer[2] . "</p>";
                }
            }
        }

        

        /* Auswahl von Mitarbeiter erstellen, die in der Textdatei gefunden wurden */
	    function selectEmployee() {

            $splitRows = file("http://localhost/AppVF/files/Mitarbeiter.txt");

            foreach ($splitRows as $row) {

                $getOption = explode(";", $row);
                
                echo '<option class="employees" value="' . $getOption[0] . '">' . $getOption[0] . "</option>";
                
            }
        }

        /* Auswahl von Tätigkeitsarten erstellen, die in der Textdatei gefunden wurden */
        function selectActivity() {

            $splitRows = file("http://localhost/AppVF/files/Tätigkeitsarten.txt");

            foreach ($splitRows as $row) {

                $getOptions = explode(";", $row);

                foreach ($getOptions as $option) {
                    echo '<option class="typeOfActivity" value="' . $option . '">' . $option . "</option>";
                }
            }
        }   
        
        /* Beendete Messung und in Arbeitszeit.txt speichern */
        function writeArbeitszeit($getAuftragsnummer, $getAbschnittsnummer, $employee, $time, $activity) {
            $fileLink = $_SERVER['DOCUMENT_ROOT'] . "/AppVF/files/Arbeitszeit.txt";
            $input = $getAuftragsnummer . "+" . $getAbschnittsnummer . ";" . $employee . ";" . $time . ";" . $activity . "\n";

            $file = fopen($fileLink, 'ab');
            fwrite($file, $input);
            fclose($file);
        }

        //findet Auftragsnummer, die den übergebenen Input beinhalten und sortiert doppelte Austragsnummer aus
        function getNumForPDF($inputAuftragsnummer) {
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