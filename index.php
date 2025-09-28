<?php

	if (isset($_COOKIE['user_id'])) {
		echo "oui";
	}

	session_start();

	// setcookie('pseudo', 'malik', time() + (30 * 24 * 60 * 60));
	// setcookie('id', 18, time() + 60);

	// setcookie('id', '', time());

	// var_dump($_COOKIE);

	var_dump($_SESSION);


	var_dump($_COOKIE);




?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>php</title>
</head>
<body>
<!-- 
	<h1>Bvn sur votre profil</h1>
	<?php 

		// if (isset($_SESSION['email']) && isset($_SESSION['date'])) {	?>

			<p>email : <?php // echo $_SESSION['email']; ?></p>
			<p>date : <?php // echo $_SESSION['date']; ?> </p>

			<?php 
		// } else { echo "Veuillez vous connecter";}

	?>


	<?php // include 'includes/database.php'; ?>


	<h1>Login</h1>
	<form method="post" action="/">
		<input type="email" name="lemail" id="lemail" placeholder="email" required> <br/>
		<input type="text" name="lpassword" id="lpassword" placeholder="password" required> <br/>
		<input type="submit" name="formlogin" id="formlogin" value="login">
	</form>

	<?php // include 'includes/login.php'; ?>

	<h1>Sign In</h1>
	<form method="post">
		<input type="email" name="email" id="email" placeholder="email" required> <br/>
		<input type="text" name="password" id="password" placeholder="password" required> <br/>
		<input type="text" name="cpassword" id="cpassword" placeholder="confirm password" required> <br/>
		<input type="submit" name="formsend" id="formsend" value="sign in">
	</form>

	<?php // include 'includes/signin.php'; ?>
-->

	<div class="profil">
		<h1>Vos information</h1>
	</div>

	<?php 

		if (isset($_SESSION['email']) && isset($_SESSION['date'])) {	?>

			<p>email : <?php echo $_SESSION['email']; ?></p>
			<p>date : <?php echo $_SESSION['date']; ?> </p>

			<?php 
		} else { echo "Veuillez vous connecter";}

	?>


	<?php 
		include ('includes/database.php');
	?>

	<div class="login">
		<form method="post" action="#">
			<input type="text" name="logemail" id="logemail" placeholder="email" required>
			<input type="password" name="logpassword" id="logpassword" placeholder="password" required>
			<label class="checkbox" >
				Stay connected
				<input type="checkbox" name="remember" id="remember">
			</label>
			<input type="submit" name="formlogin" id="formlogin" value="log in">
		</form>
	</div>
	<div class="exit">
		<form method="post">
			<input type="submit" name="exit" id="exit" value="Déconnexion">
		</form>
	</div>
	<?php 
		include ('includes/autokonect.php');
		include ('includes/login.php');
		include ('includes/logout.php');
	?>

	<div class="signin">
		<form method="post" action="#" > <!-- action go to form login -->
			<input type="text" name="name" id="name" placeholder="name" required>
			<input type="text" name="signemail" id="signemail" placeholder="email" required>
			<input type="password" name="signpassword" id="signpassword" placeholder="password" required>
			<input type="password" name="cpassword" id="cpassword" placeholder="cpassword" required>
			<input type="submit" name="formsignin" id="formsignin" value="sign in">
		</form>
	</div>
	<?php 
		include ('includes/signin.php');
	?>

	<?php

		// Doit être précédée d'un formulaire de login pour récupérer les variable $_SESSION['']

		if (isset($_SESSION['perm'])) {
			if ($_SESSION['perm'] == 1) {
				echo "Page introuvable, vous devez vous reconnecter pour mettre à jour votre accréditation";
			} elseif ($_SESSION['perm'] == 2) {
				echo "Accés commande, vous devez vous reconnecter pour mettre à jour votre accréditation";
			} elseif ($_SESSION['perm'] == 3) {
				echo "Accés admin, vous devez vous reconnecter pour mettre à jour votre accréditation";
			} else {
				echo "niveau d'accréditation inconu : Page introuvable, vous devez vous reconnecter pour mettre à jour votre accréditation";
			}
		} else {
			echo "Veuillez vous connectez d'abord";
		}


	?>



</body>
</html>