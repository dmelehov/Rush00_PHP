<?php

require_once 'session.php';

if (!$_SESSION['basket'])
	$_SESSION['basket'] = array();

if (strlen($_POST['addtobasket_x']) > 0 || strlen($_POST['addtobasket']) > 0) {
	array_push($_SESSION['basket'], $_POST['itemname']);
}

header('Location: index.php');

