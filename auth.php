<?php

require_once 'session.php';

function create($login, $passwd)
{
	if (!file_exists("private/passwd")) {
		mkdir("private");
		$arr = array();
		$str = array();
		$str['login'] = $login;
		$str['passwd'] = hash('whirlpool', $passwd);
		$arr[] = $str;
		$arr = serialize($arr);
		file_put_contents("private/passwd", $arr);
		return True;
	} else {
		$arr = unserialize(file_get_contents("private/passwd"));
		foreach ($arr as $str) {
			if ($str['login'] === $login) {
				return False;
			}
		}
		$kek['login'] = $login;
		$kek['passwd'] = hash('whirlpool', $passwd);
		$arr[] = $kek;
		$arr = serialize($arr);
		file_put_contents("private/passwd", $arr);
		return True;
	}
}

function auth($login, $passwd)
{
	if (!($arr = file_get_contents("private/passwd")))
	{
		echo "Please, use \"install.php\"\n";
		return False;
	}
	else
	{
		$arr = unserialize($arr);
		foreach ($arr as $str)
		{
			if ($str['login'] === $login)
			{
				if ($str['passwd'] === hash('whirlpool', $passwd))
					return True;
				else
					return False;
			}
		}
		return False;
	}
}

if (($_POST['submit'] || $_POST['newacc']) && (!$_POST['login'] || !$_POST['passwd']))
	$_SESSION['error'] = "input";
else if ($_POST['submit']) {
	if (auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['error'] = "";
	} else
		$_SESSION['error'] = "wrong";
}
else if ($_POST['newacc']) {
	if (create($_POST['login'], $_POST['passwd'])) {
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['error'] = "";
	} else
		$_SESSION['error'] = "exist";
}

header('Location: index.php');

?>