<!-- Nach der PDF suchen und sie Auswählen -->
<div>
    <input name="auftragsnummer" id="inputAuftragsnummer" required type="number" min="100000" max="999999" placeholder="Auftragsnummer">
    <a class="reloadButton" href="./index.php">Zurück</a>
    <p id="selectAuftrag"></p>
</div>

<!-- Die Angezeigte PDF zur passenden Auftragsnummer -->
<div class="divPDFViewer">
    <object id="pdfViewer"></object>
</div>
