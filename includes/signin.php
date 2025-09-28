<?php

	if (isset($_POST['formsignin'])) {
		extract($_POST);

		if ( !empty($name) && !empty($signemail) && !empty($signpassword) && !empty($cpassword) ) {

			if ($signpassword == $cpassword) {

				$options = [
					'cost' => 12
				];

				$hashpass = password_hash($signpassword, PASSWORD_BCRYPT, $options);

				global $db;

				$c = $db -> prepare('SELECT email FROM users WHERE email = :email');
				$c -> execute([
					'email' => $signemail,
				]);

				$cc = $db -> prepare('SELECT name FROM users WHERE name = :name');
				$cc -> execute([
					'name' => $name,
				]);

				$resultc = $c -> rowCount();
				$resultcc = $cc -> rowCount();

				echo $resultc . " et " . $resultcc;

				if ($resultc == 0 && $resultcc == 0 ) {

					$q = $db -> prepare('INSERT INTO users(name, email, password) VALUES(:name,:email,:password)');
					$q -> execute([
						'name' => $name,
						'email' => $signemail,
						'password' => $hashpass,
					]);
					echo "Votre compte à bien était créer";

				} elseif ($resultc >= 1) {
					echo "Vous posséder déjà un compte avec cet email : " . $signemail;
				} else {
					echo "Cet utilisateur existe déjà, choisissez un autre nom";
				}

			} else {
				echo "Les mots de passes ne sont identiques";
			}


		}
	}
	

?>