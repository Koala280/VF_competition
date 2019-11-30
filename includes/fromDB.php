<?
    //Funktionsklasse die mit Datenbank abreitet
    class getFuncs {
        
        private $db;

        function __construct($db) {

            $this->db = $db;
        
        }

        //findet Auftragsnummer in der Datenbank, die den übergebenen Input beinhalten
        function getMatchingNumbers($auftragsnummer) {

            $query = "SELECT * FROM Auftraege WHERE Auftragsnummer LIKE '%" . $auftragsnummer . "%'";
            $getMatches = $this->db->query($query);
            $foundMatches = $getMatches->fetchAll();

            foreach ($foundMatches as $match) {
                echo '<p class="optionAuftragsnummer" onclick="stopwatchFunctions(' . $match["Auftragsnummer"] . ', ' . $match["Abschnittsnummer"] . ', \'' . $match["Abschnittsname"] . '\')">' . $match["Auftragsnummer"] . "+" . $match["Abschnittsnummer"] . " " . $match["Abschnittsname"] . "</p>";
            }

            return;
        }

        //zeigt alle in der Datenbank gespeicherten Mitarbeiter
        function selectEmployee() {

            $query = "SELECT * FROM Mitarbeiter";
            $getEmployees = $this->db->query($query);
            $employees = $getEmployees->fetchAll();

            foreach ($employees as $employee) {
                echo '<option class="employees" value="' . $employee["Kuerzel"] . '">' . $employee["Kuerzel"] . "</option>";
            }

            return;
        }

        //zeigt alle in der Datenbank gespeicherten Tätigkeitsarten
        function selectActivity() {
            $query = "SELECT * FROM Taetigkeitsarten";
            $getActivity = $this->db->query($query);
            $activitys = $getActivity->fetchAll();

            foreach ($activitys as $activity) {
                echo '<option class="typeOfActivity" value="' . $activity["Taetigkeitsart"] . '">' . $activity["Taetigkeitsart"] . "</option>";
            }

            return;
        }

        //schreibt alle ausgewählten Informationen in die Datenbank
        function writeArbeitszeit($getAuftragsnummer, $getAbschnittsnummer, $employee, $time, $activity) {

            $query = "INSERT INTO Arbeitszeit (Auftragsnummer, Abschnittsnummer, Mitarbeiter, Arbeitsstunden, Taetigkeitsart) VALUES ($getAuftragsnummer, $getAbschnittsnummer, '$employee', $time, '$activity')";
            $insertQuery = $this->db->query($query);

            return;
        }

        //findet Auftragsnummer, die den übergebenen Input beinhalten und sortiert doppelte Austragsnummer aus
        function getNumForPDF($inputAuftragsnummer) {

            $query = "SELECT Auftragsnummer FROM Auftraege WHERE Auftragsnummer LIKE '%" . $inputAuftragsnummer . "%'";
            $getMatches = $this->db->query($query);
            $foundMatches = $getMatches->fetchAll();
            $auftragsnummer = array();

            foreach ($foundMatches as $match) {
                $auftragsnummer[] = $match["Auftragsnummer"];
            }

            foreach (array_unique($auftragsnummer) as $a) {
                echo '<p class="optionAuftragsnummer" onclick="auftragsnummerPDFAnzeigen(' . $a . ')">' . $a . "</p>";
            }
            
            return;
        }


    }
?>