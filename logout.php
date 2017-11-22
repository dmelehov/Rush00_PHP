<?php

if ($_POST['logout']) {
	session_start();
	$_SESSION['login'] = "";
	$_SESSION['error'] = "";
}

header('Location: index.php');

?>

