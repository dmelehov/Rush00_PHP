<?php

if ($_POST['submit'])
{
	if ($_POST['login'] && $_POST['passwd']) {
		if (!file_exists("private/passwd")) {
			mkdir("private");
			$arr = array();
			$str = array();
			$str['login'] = $_POST['login'];
			$str['passwd'] = hash('whirlpool', $_POST['passwd']);
			$arr[] = $str;
			$arr = serialize($arr);
			file_put_contents("private/passwd", $arr);
			echo "OK\n";
		} else {
			$arr = unserialize(file_get_contents("private/passwd"));
			foreach ($arr as $str) {
				if ($str['login'] === $_POST['login']) {
					echo "ERROR\n";
					return;
				}
			}
			$kek['login'] = $_POST['login'];
			$kek['passwd'] = hash('whirlpool', $_POST['passwd']);
			$arr[] = $kek;
			$arr = serialize($arr);
			file_put_contents("private/passwd", $arr);
			echo "OK\n";
		}
	}
}
else
	echo "Please, fill in \"Login\" and \"Password\"\n";

?>
