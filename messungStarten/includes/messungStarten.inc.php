<!-- Eingabe der 6 Stelligen Auftragsnummer - beim Ancklicken Messung Starten und Stoppuhr anzeigen-->
<div class="auftragsnummerInput">
    <h2>Auftragsnummer Eingeben:</h2>
    <input name="auftragsnummer" id="inputAuftragsnummer" required type="number" min="100000" max="999999" placeholder="Auftragsnummer">
</div>


<!-- hier werden gefundenen Aufträge angezeigt -->
<div class="divSelectAuftrag">
    <h3 class="selectAuftragText">Bitte Auftrag Auswählen</h3>
    <p id="selectAuftrag"></p>
</div>


<!-- Ausgewählter Auftrag -->
<div class="divSelectedAuftrag">
    <h4>Folgender Auftrag wurde ausgewählt</h4>
    <p class="selectedAuftrag"></p>
</div>


<!-- Bei falscher Auswahl Messung zurücksetzen -->
<div><a class="wrongSelected" href="./index.php">Messung zurücksetzen</a></div>


<!-- Zeit messen -->
<div class="stopwatch">

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
    <button id="messungBeenden">messung Beenden</button>

</div>


<!-- Mitarbeiter und Tätigkeitsart Auswählen -->
<div class="selectEmployeeAndActivity">

    <h4>Bitte Mitarbeiter und Tätigkeitsart auswählen</h4>
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