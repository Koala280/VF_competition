<? session_start();
            /*************Head Bereich + anmelden falls angemeldet bleiben aktiviert wurde***************/

    //Cookie abfrage
    if (isset($_COOKIE["vf_user"]) and isset($_COOKIE["vf_password"])) {


        include_once($_SERVER['DOCUMENT_ROOT'] . "/AppVF/includes/connectDB.php");
        include_once($_SERVER['DOCUMENT_ROOT'] . "/AppVF/login/includes/user.php");

        $db = new db();
        $user = new user($db);

        $username = $_COOKIE["vf_user"];
        $password = $_COOKIE["vf_password"];

        $login = $user->login($username, $password);

        if ($login) {
            $_SESSION['vf_userloggedin'] = true;
        }
    
    }
?>

<meta charset="UTF-8">
<meta property="og:title"		content="Vermessung Fehlshart App" />
<meta property="og:type" 		content="App Wettbewerb" />
<meta property="og:url"   		content="./" />
<meta property="og:site_name"	content="Vermessung Fehlshart App" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="http://localhost/AppVF/css/style.css" media="all, screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://localhost/AppVF/js/script.js"></script>
<title>Vermessung Fehlshart App</title>