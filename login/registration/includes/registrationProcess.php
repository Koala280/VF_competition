<?

    function returnRegistrationSuccess() {

        if ($_GET['registrationSuccess']) { //If username is not used -> the registration was successfull
    
            echo "<p>Registriert als: " . $_GET['regUsername'] . "</p>";
            
        } elseif ($_GET['registrationSuccess'] === "") { //if username is used/registration was not successfull
        
            echo "Der Username ist leider schon vergeben, wähle bitte einen anderen.";
            
        } else {
        
            echo "Ein Fehler ist aufgetreten. Bitte wende dich an den Entwickler";
            
        }
    }
?>