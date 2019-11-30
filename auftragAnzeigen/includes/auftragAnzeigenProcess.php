<? session_start();

//includes
include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/connectDB.php");

//get Functions from fromTXT.php instead of fromDB.php
if (!isset($_COOKIE["getFromDB"])) {
	setcookie("getFromDB", false, time() + 43200, "/");
}

//switch between fromTXT.php and fromDB.php
if ($_COOKIE["getFromDB"]) {
	include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/fromDB.php"); 
} else {
	include_once($_SERVER['DOCUMENT_ROOT']."/AppVF/includes/fromTXT.php");
}


$db = new db();
$getFuncs = new getFuncs($db);


/* Auswahl generieren von den Übereinstimmungen von Suche nach Auftragsnummer */
if (isset($_POST["compareNumber"])) {
	$inputAuftragsnummer = $_POST["compareNumber"];
	
	if (!empty($inputAuftragsnummer)) {

        $getFuncs->getNumForPDF($inputAuftragsnummer);
        
	}	
}
?>