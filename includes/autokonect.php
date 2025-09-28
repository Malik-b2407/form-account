<?php

	$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);

	if ( !isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password']) )	{

		echo '<br/>step1';

		$q = $db -> prepare('SELECT * FROM users WHERE email = :email');
		$q -> execute([
				'email' => $_COOKIE['email'],
			]);
		$result = $q -> fetch();

		if ($result == true) {

			echo '<br/>step2';

			$hashpassword = $result['password'];

			if ($_COOKIE['password'] == $hashpassword) {

				echo "<br/> Mot de passe correct, connexion en cours <br/><br/>";

				$_SESSION['name'] = $result['name'];
				$_SESSION['email'] = $result['email'];
				$_SESSION['perm'] = $result['perm'];
				$_SESSION['date'] = $result['date'];

				// header ('Location: /');

			}

		}

	}

?>