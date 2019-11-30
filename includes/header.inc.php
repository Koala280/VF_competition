<!------------------------------------NAVIGATION/HEADER----------------------------->
<?  if (isset($_COOKIE["getFromDB"])) {
        if ($_COOKIE["getFromDB"]) {
            $getFromDB = "DB";
        } else {
            $getFromDB = "TXT";
        }
    } else {
        $getFromDB = "TXT";
    }
?>
<nav>

    <img class="logoSmall" src="https://www.vermessung-felshart.de/wp-content/uploads/2015/06/LogoKLEIN2-2.png" alt=""> <!-- für kleine Geräte -->
    <img class="logoBig" src="https://vermessung-felshart.de/wp-content/uploads/2015/10/Felshart-Logo-e1445518364174.jpg" alt=""> <!-- für große Geräte -->

    <div class="headerBtns">
        <span><? echo $getFromDB; ?></span>
        <a class="linkHP" href="http://localhost/AppVF/">Startseite</a>
    </div>
    
</nav>