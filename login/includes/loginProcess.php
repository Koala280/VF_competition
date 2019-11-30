<?
session_start();

//includes
include_once("../../includes/connectDB.php");
include_once("user.php");

//username und passwort von input abfangen
$username = $_POST['vf_username'];
$password = $_POST['vf_password'];

$db = new db();
$user = new user($db);


//security against Brute Force
if ($_SESSION['vf_countlogintries'] >= 10) {

    if (!isset($_SESSION['vf_timeout'])) { //set timeout for 60 sec.

        $_SESSION['vf_timeout'] = time();
        $_SESSION['vf_settimeout'] = 60;

    }
    
    if ((time() - $_SESSION['vf_timeout']) > $_SESSION['vf_settimeout']) { //if timeout is passed set counter to 0 and delete timeout

        $_SESSION['vf_countlogintries'] = 0;
        unset($_SESSION['vf_timeout']);

    } else {

        header("Location: http://localhost/AppVF/loginLocked/"); //nur weiterleiten falls timeout nicht abgelaufen ist
    
    }

}

//try user to log in
if ($_SESSION['vf_countlogintries'] < 10) {

    $logInSuccess = $user->logIn($username, $password);

    if($logInSuccess) {

        $_SESSION['vf_userloggedin'] = true;

        //falls angemeldet bleiben aktiv -> cookies speichern für automatische anmeldung
        if($_POST['stayLoggedIn']) {

            $passwordHash = $user->getHash($username);

            setcookie("vf_user", $username, time() + (86400 * 30), "/");
            setcookie("vf_password", $passwordHash, time() + (86400 * 30), "/");
        }

    } else { // security against Brute Force

        if (!isset($_SESSION['vf_countlogintries'])) {
            $_SESSION['vf_countlogintries'] = 0;
        }

        $_SESSION['vf_countlogintries'] += 1;

    }

    header("Location: http://localhost/AppVF/");

}

?>