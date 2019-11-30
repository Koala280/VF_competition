<?
session_start();

    //includes
    include_once("../../includes/connectDB.php");
    include_once("user.php");

    //get username password von Input
    $regUsername = $_POST['regUsername'];
    $regPassword = $_POST['regPassword'];
    $regKey = $_POST['regKey'];

    //Only registrate if you have the right regKey (1234567890)
    if ($regKey == 1234567890) {

        $db = new db();
        $user = new user($db);

        $registrationSuccess = $user->registrate($regUsername, $regPassword);
        header("Location: http://localhost/AppVF/login/registration?registrationSuccess=".$registrationSuccess."&regUsername=".$regUsername);


    } else {

        header("Location: http://localhost/AppVF/");
        
    }

    
?>