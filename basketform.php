<?php

require_once 'session.php';

if ($_POST['clearbasket']) {
	$_SESSION['basket'] = "";
	header('Location: index.php');
}
elseif ($_POST['archiveorder']) {

}