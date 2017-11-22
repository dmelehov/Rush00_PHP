<?php

function giffme() {
	$fd  = fopen('private/items.csv', 'r');
	$tmp = 0;
	while ($arr = fgetcsv($fd))
		$tmp = $arr[0];
	fclose($fd);
	return ($tmp + 1);
}

function ohgodwhy() {
	$str = "";
	if ($_POST['isapple']) {
		if ($str)
			$str .= "-";
		$str .= "Apple";
	}
	if ($_POST['isforwork']) {
		if ($str)
			$str .= "-";
		$str .= "For work";
	}
	if ($_POST['isphone']) {
		if ($str)
			$str .= "-";
		$str .= "Phone";
	}
	return ($str);
}

if ($_POST['submitbutt']) {
	$str = file_get_contents("private/items.csv");
	$str .= "\n" . giffme() . "," . $_POST['itemname'] . "," . $_POST['itemimg'] . "," . $_POST['itemprice'] . "," . ohgodwhy() . "," . $_POST['itemdescr'];
	file_put_contents("private/items.csv", $str);
	header('Location: index.php');

}

