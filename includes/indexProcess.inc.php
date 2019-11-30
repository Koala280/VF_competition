<?

    if (isset($_POST["submit"])) {
        if (!$_COOKIE["getFromDB"]) {
            setcookie("getFromDB", true, time() + 43200, "/");
    	} else {
            setcookie("getFromDB", false, time() + 43200, "/");
        }
        header("Location: http://localhost/AppVF/");
    }
?>
