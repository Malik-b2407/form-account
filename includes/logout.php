<?php

	if (isset($_POST['exit'])) {
		setcookie('email', '', time() - 24 * 60 * 60);
		setcookie('password', '', time() - 24 * 60 * 60);
		session_unset();
		session_destroy();
		header('Location: /');
	}

?>