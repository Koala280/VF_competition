<!-- Eingabe der 6 Stelligen Auftragsnummer - beim Ancklicken Messung Starten und Stoppuhr anzeigen-->
<div class="auftragsnummerInput">
    <h2>Auftragsnummer Eingeben:</h2>
    <input name="auftragsnummer" id="inputAuftragsnummer" type="number" min="100000" max="999999" placeholder="Auftragsnummer" require>
</div>


<!-- hier werden gefundenen Aufträge angezeigt -->
<div class="divSelectAuftrag">
    <p id="selectAuftrag"></p>
</div>


<!-- Ausgewählter Auftrag + bei falscher Auswahl Messung zurücksetzen-->
<div class="divSelectedAuftrag">
    <h4>Folgender Auftrag wurde ausgewählt</h4>
    <p class="selectedAuftrag"></p>
    <div>
        <a class="wrongSelected" href="./index.php">Messung zurücksetzen</a>
    </div>
</div>


<!-- Zeit messen -->
<div class="stopwatch">

    <br><h4>Messung Läuft</h4>

    <!-- Angezeigte Zeit -->
    <div class="stopwatchTime">
        <span id="hours">00</span> : <span id="minutes">00</span> : <span id="seconds">00</span>
    </div>

    <!-- Stoppuhr Buttons für Korrekturen -->
    <div class="stopwatchControls">
        <button id="pause">pause</button>
        <button id="restart">restart</button>
        <button id="reset">reset</button>
    </div>

    <!-- Messung beenden - weitere verborgene Selects anzeigen -->
    <button id="messungBeenden">Messung Beenden</button>

</div>


<!-- Mitarbeiter und Tätigkeitsart Auswählen -->
<div class="selectEmployeeAndActivity">

    <h4>Mitarbeiter und Tätigkeitsart auswählen</h4>
    <div class="selectEmployee">

        <select name="nameSelectEmployee" id="idSelectEmployee">
            <? selectEmployee(); ?>
        </select>

    </div>

    <div class="selectActivity">

        <select name="nameSelectActivity" id="idSelectActivity">
            <? selectActivity(); ?>
        </select>

    </div>

</div>


<!-- Einträge speichern - zurück zur Startseite  -->
<div>
    <button id="safeArbeitszeit">Speichern</button>
</div>