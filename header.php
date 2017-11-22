<?php
	require_once 'session.php';

function error_handle($str) {
	if ($_SESSION['error'] !== $str)
		return True;
	return False;
}

?>

<div class="header">
	<a class="logo" href="index.php">
		<img src="img/logo.png" id="logotype">
	</a>

	<div class="login-form" align="center" <?php if (strlen($_SESSION['login']) > 0) { echo 'style="display: none"'; }?>>
		<form action="auth.php" method="post" name="auth.php">
			Login: <input type="text" name="login" value=""><br>
			Password: <input type="password" name="passwd" value=""><br>
			<input type="submit" value="Log In" name="submit">
			<input type="submit" value="New account" name="newacc">
		</form>
		<div class="input-error" <?php if (error_handle("input")) { echo 'style="display: none"'; }?>>
			<p>
				Pls, input login AND password for log in.
			</p>
		</div>

		<div class="input-error" <?php if (error_handle("wrong")) { echo 'style="display: none"'; }?>>
			<p>
                Hey, your login or password is not correct. Pls, try again
			</p>
		</div>

		<div class="input-error" <?php if (error_handle("exist")) { echo 'style="display: none"'; }?>>
			<p>
                Hey, we already have account with that login. Try another or contact us
			</p>
		</div>
	</div>

	<div class="account" align="center" <?php if (strlen($_SESSION['login']) == 0) { echo 'style="display: none"'; }?>>
		<p>
			Login: <?php echo $_SESSION['login']; ?>
		</p>
		<form action="logout.php" method="post" name="logout.php">
			<input type="submit" value="Log Out" name="logout">
		</form>
	</div>

</div>