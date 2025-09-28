<?php

	if (isset($_POST['formlogin'])) {

		extract($_POST);

		if ( !empty($logemail) && !empty($logpassword) ) {

			$q = $db -> prepare('SELECT * FROM users WHERE email = :email');
			$q -> execute([
					'email' => $logemail,
				]);
			$result = $q -> fetch();

			if ($result == true) {

				$hashpassword = $result['password'];

				if (password_verify($logpassword, $hashpassword)) {

					if (isset($_POST['remember'])) {

						setcookie('email', $logemail, time() + 24 * 60 * 60);
						setcookie('password', $hashpassword, time() + 24 * 60 * 60);
					}

					echo "Mot de passe correct, connexion en cours";

					$_SESSION['name'] = $result['name'];
					$_SESSION['email'] = $result['email'];
					$_SESSION['perm'] = $result['perm'];
					$_SESSION['date'] = $result['date'];

					header('Location: /');
				} else {
					echo "Mot de passe incorrect";
				}

			} else {
				echo "Cette email n'est relier à aucun compte";
			}

		} else {
			echo "Veuillez remplir les informations";
		}

	}

?>