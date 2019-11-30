<div class="cForms">

    <div class="cAnmeldung">

        <h1>Anmelden</h1>
            
            <form method="post" id="idLoginForm" action="./includes/loginProcess.php">

                <div class="inputBox">
                    <label>Username</label>
                    <input id="idInputUsername" type="text" name="vf_username" required="">
                </div>

                <div class="inputBox">
                    <label>Password</label>
                    <input id="idInputPassword" type="password" name="vf_password" required="">
                </div>

                <div><input class="cSubmit" type="submit" value="Anmelden"></div>

                <div class="cCheckBox">
                    <label>30 Tage angemeldet bleiben</label>
                    <input type="checkbox" name="stayLogedIn" id="idRememberLogIn">
                </div>



        </form>

    </div>



    <div class="registrierung">

        <h1>Registrieren</h1>

        <form method="post" id="idRegistrationForm" action="./includes/registrateProcess.php">

                <div class="inputBox">
                    <label>Username</label>
                    <input id="idInputRegUsername" type="text" name="regUsername" required="">
                </div>

                <div class="inputBox">
                    <label>Password</label>
                    <input id="idInputRegPassword" type="text" name="regPassword" required="">
                </div>

                <div class="inputBox">
                    <label>RegisterKey</label>
                    <input id="newRegKey" type="text" name="regKey" required="">
                </div>

                <input class="cSubmit" type="submit" value="registrieren">

        </form>

    </div>

</div>