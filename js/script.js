var seconds = 0;
var minutes = 0;
var hours = 0;

var displaySeconds = 0;
var displayMinutes = 0;
var displayHours = 0;

var stopwatchRunning = false;
var stopwatchFirstRun = true;


/* Vergleiche eingegebene Zahl /messungStarten/ mit Auftragsnummer in Aufträge.txt */
function getInputAuftragsnummer() {

    $(document).ready(function() {

        $("#inputAuftragsnummer").keyup(function() {

            $(".selectAuftragText").css("display", "unset");

            var number = $("#inputAuftragsnummer").val();
            $.post("./includes/messungStartenProcess.php", {

                compareNumber: number

            }, function(data, status) {

                $("#selectAuftrag").html(data);

            });
        });
    });
}

/* Vergleiche eingegebene Zahl /auftragAnezigen/ mit Auftragsnummer in Aufträge.txt */
function getInputAuftragsnummerPDF() {

    $(document).ready(function() {

        $("#inputAuftragsnummer").keyup(function() {

            var number = $("#inputAuftragsnummer").val();
            $.post("./includes/auftragAnzeigenProcess.php", {

                compareNumber: number

            }, function(data, status) {

                $("#selectAuftrag").html(data);

            });
        });

    });
}

/* verstecke Input Feld und zeige PDF die zur auftragsnummer passt */
function auftragsnummerPDFAnzeigen(auftragsnummer) {

    $(document).ready(function() {
        
        $("#pdfViewer").attr("data", "../files/" + auftragsnummer + ".pdf");
        $("#selectAuftrag").css("display", "none");
        $(".reloadButton").css("display", "unset");;
        $("#inputAuftragsnummer").val(auftragsnummer);
        
    });
}

/* Stoppuhr mit Buttons  */
function stopwatchFunctions(getAuftragsnummer, getAbschnittsnummer, getAbschnittsname) {

    $(document).ready(function() {

        //Stoppuhr anzeigen, gefundene Aufträge + inputfeld versecken, ausgewählten Auftrag anzeigen
        $(".stopwatch").css("display", "unset");
        $(".divSelectAuftrag").css("display", "none");
        $(".auftragsnummerInput").css("display", "none");
        $(".divSelectedAuftrag").css("display", "unset");
        $(".wrongSelected").css("display", "unset");
        $(".selectedAuftrag").html(getAuftragsnummer + "+" + getAbschnittsnummer + " " + getAbschnittsname);


        if (stopwatchRunning) {
            clearInterval(stopwatchSetIntervall);
            stopwatchRunning = false;
            return;
        }

        if (stopwatchFirstRun) {
            stopwatchFirstRun = false;

        }

        stopwatchSetIntervall = setInterval(stopwatch, 1000);
        stopwatchRunning = true;

        $("#pause").click(function() {

            if (stopwatchRunning) {
                stopwatchRunning = false;
                clearInterval(stopwatchSetIntervall);
            }

        })

        $("#restart").click(function() {

            if (stopwatchRunning) {
                return;
            }

            stopwatchRunning = true;
            stopwatchSetIntervall = setInterval(stopwatch, 1);

        })

        $("#reset").click(function() {

            stopwatchRunning = false;
            clearInterval(stopwatchSetIntervall);

            seconds = "0";
            minutes = "0";
            hours = "0";

            displaySeconds = "0";
            displayMinutes = "0";
            displayHours = "0";

            $("#hours").html(hours+displayHours);
            $("#minutes").html(minutes+displayMinutes);
            $("#seconds").html(seconds+displaySeconds);

        })

        /* Stoppuhr beenden - mehr selects anzeigen */
        $("#messungBeenden").click(function() {

            stopwatchRunning = false;
            clearInterval(stopwatchSetIntervall);

            alert("Die gespeicherte Zeit: " + displayHours + ":" + displayMinutes + ":" + displaySeconds);

            $(".selectEmployeeAndActivity").css("display", "unset");
            $("#safeArbeitszeit").css("display", "unset");

        })

        /* Alle Einträge sammeln für Arbeitszeit.txt und an php logik schicken -> zurück zur Startseite */
        $("#safeArbeitszeit").click(function() {

            employee = $("select[name=nameSelectEmployee]").val();
            activity = $("select[name=nameSelectActivity]").val();
            /* immer Viertelstüdnlich runden */
            workHours = hours + minutes/60 + seconds/3600;
            workHoursRounded = Math.round(workHours*4) / 4;

            $.post("./includes/messungStartenProcess.php", {

                getAuftragsnummer: getAuftragsnummer,
                getAbschnittsnummer, getAbschnittsnummer,
                time: workHoursRounded,
                employee: employee,
                activity: activity

            }, function(data, status) {

                alertMsg = "Folgende Informationen wurden Gespeichert: Auftragsnummer + Abschnittsnummer: " + getAuftragsnummer + "+" + getAbschnittsnummer + "; Zeit, die gemessen wurde: " + displayHours + ":" + displayMinutes + ":" + displaySeconds + " bzw: " + workHoursRounded + "h; Mitarbeiterkürzel: " + employee + ", Tätigkeitsart: " + activity;
                alert(alertMsg);
                window.location.href = 'http://localhost/AppVF/';

            });
        });
    });
}


/* Stoppuhr Logik + Anzeige */
function stopwatch() {

    $(document).ready(function() {

        seconds++;

        //Logic to determine when to increment next value
        if(seconds / 60 >= 1){
            seconds = 0;
            minutes++;

            if(minutes / 60 >= 1){
                minutes = 0;
                hours++;
            }
        }

        //If seconds/minutes/hours are only one digit, add a 0 before the value
        if(seconds < 10){
            displaySeconds = "0" + seconds.toString();
        }
        else{
            displaySeconds = seconds;
        }

        if(minutes < 10){
            displayMinutes = "0" + minutes.toString();
        }
        else{
            displayMinutes = minutes;
        }

        if(hours < 10){
            displayHours = "0" + hours.toString();
        }
        else{
            displayHours = hours;
        }

        $("#hours").html(displayHours);
        $("#minutes").html(displayMinutes);
        $("#seconds").html(displaySeconds);

    });
}