<?
	//neue user class für registrierung/login
	class user {
		
		private $loggedIn;
		private $db;

		/**
		 * @param db - Referenz zu einer bereits erstellten Datenbankverbindung
		 */

		function __construct($db){

			$this->db = $db;
			$this->loggedIn = false;

		}
		
		/**
		 * @param username	username fürs einloggen
		 * @param password	password fürs einloggen
		 * @return boolean
		 */
		
		function logIn($username, $password) {

			$queryGetHashOfPW = "SELECT * FROM Benutzer WHERE username = '$username'";
			$getHashOfPW = $this->db->query($queryGetHashOfPW);
			$hashOfPW = $getHashOfPW->fetchAll();

			$verifyPassword = password_verify($password, $hashOfPW[0]["password"]);

			return $verifyPassword;
		}

		/**
		 * @param regUsername 	username fürs registrieren
		 * @param regPassword 	password fürs registrieren
		 */

		function registrate($regUsername, $regPassword){

			$hashPassword = password_hash($regPassword, PASSWORD_DEFAULT);
			$queryIns = "INSERT INTO Benutzer (username, password) VALUES ('$regUsername', '$hashPassword')";
			$checkUsername = "SELECT COUNT(*) FROM Benutzer WHERE BINARY username = '$regUsername'";


            //Erst prüfen, ob username schon vergeben ist
            $checkExistingUsername = $this->db->query($checkUsername);

			$queryOutputExistingUsername = $checkExistingUsername->fetchColumn() > 0;

			if($queryOutputExistingUsername > 0) {

					$registrationSuccess = false; //falls der selbe username bereits vorhanden ist

			} else {

					$this->db->query($queryIns);
					$registrationSuccess = true;
			}

			return $registrationSuccess;
		}

		//get password for stay loged in
		function getHash($username) {
			$queryGetHashOfPW = "SELECT * FROM Benutzer WHERE username = '$username'";
			$getHashOfPW = $this->db->query($queryGetHashOfPW);
			$hashOfPW = $getHashOfPW->fetchAll();

			return $hashOfPW[0]["password"];
		}
		
	}


?>