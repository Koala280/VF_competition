<?                  /***********USER ABMELDEN*******************/
session_start();

    //includes
    include_once("../includes/connectDB.php");
    
    $db = new db();

    //sessions zerstören
    session_unset();
    session_destroy();
    
    //cookies löschen
    unset($_COOKIE['vf_user']);
    unset($_COOKIE['vf_password']);

    setcookie("vf_user", null, -1, "/");
    setcookie("vf_password", null, -1, "/");

    //zurück zur Homepage
    header("Location: http://localhost/AppVF/");

?>