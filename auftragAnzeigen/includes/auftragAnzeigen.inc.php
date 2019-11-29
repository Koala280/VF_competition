<!-- Eingabe der 6 Stelligen Auftragsnummer - beim Ancklicken Nach der PDF suchen und sie Auswählen-->
<div class="auftragsnummerInput">
    <h2 class="hideTitle">Auftragsnummer Eingeben:</h2>
    <input name="auftragsnummer" id="inputAuftragsnummer" required type="number" min="100000" max="999999" placeholder="Auftragsnummer">
    <a class="reloadButton" href="./index.php">Zurück</a>
</div>

<!-- hier werden gefundenen Aufträge angezeigt -->
<div class="divSelectAuftrag">
    <p id="selectAuftrag"></p>
</div>

<!-- Die Angezeigte PDF zur passenden Auftragsnummer -->
<div class="divPDFViewer">
    <object id="pdfViewer"></object>
</div>
