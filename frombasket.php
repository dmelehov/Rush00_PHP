<?php

require_once 'session.php';

$total = 0;

$fd  = fopen('private/items.csv', 'r');

$i = 0;

$arritems = array();

$basketitems = array();

$summ = 0;

while ($arr = fgetcsv($fd)) {
	$arritems[$arr[0]][0] = $arr[0];
	$arritems[$arr[0]][1] = $arr[1];
	$arritems[$arr[0]][2] = $arr[2];
	$arritems[$arr[0]][3] = $arr[3];
	$i++;
}



foreach ($_SESSION['basket'] as $item) {
	echo '<div class="iteminbasket"><img class="item-image-b" src="' . $arritems[$item][2] . '">';
	echo '<div class="item-descr-b" align="center"><h4>' . $arritems[$item][1] .'</h4></div>';
	echo '<div class="item-price-b" align="center"><h4>' . $arritems[$item][3] .'$</h4></div></div>';
	if (!$basketitems[$item])
		$basketitems[$item] = 1;
	else
		$basketitems[$item] += 1;
	$summ += $arritems[$item][3];
}

if ($summ)
	echo '<hr>';
echo '<div class="total"><h2 align="left" style="width: 50%; height: 100%; margin-left: 10%;">';
echo 'Total</h2><h2 align="right" style="width: 50%; height: 100%; margin-right: 8%;">';
echo $summ . '$</h2></div>';

echo '<hr><div clas="basketform" align="center">';
echo '<form action="frombasket.php" method="post" name="basketform.php">';
echo '<input type="submit" name="clearbasket" value="Clear Basket" style="width: 49%; height: 100%; font-size: xx-large">';
echo '<input type="submit" name="archiveorder" value="Proceed to Checkout" style="width: 49%; height: 100%; font-size: xx-large">';
echo '</form></div>';

if ($_POST['clearbasket']) {
	$_SESSION['basket'] = "";
	header('Location: index.php');
}
elseif ($_POST['archiveorder']) {
	if (!$summ) {
		header('Location: index.php');
	}
	elseif (!$_SESSION['login'])
		header('Location: plslogin.php');
	else {
		if (!($str = file_get_contents("private/orders.csv")))
			$str = "";
		else
			$str .= "\n";
		$str .= $_SESSION['login'] . ",total:" . $summ;
		foreach ($basketitems as $item => $kek)
			$str .= "," . $item . ":" . $kek;
		file_put_contents("private/orders.csv", $str);
		$_SESSION['basket'] = "";
		header('Location: index.php');
	}
}

/*while ($arr = fgetcsv($fd)) {
	echo '<div class="item"><img class="item-image" src="' . $arr[2] . '">';
	echo '<div class="item-descr" align="center">';
	echo '<h4>' . $arr[1]. '</h4>';
	echo '<p style="font-size: x-small;">(' . $arr[4] .')</p>';
	echo '<p style="font-size: smaller">' . $arr[5] . '</p>';
	echo '</div>';
	echo '<div class="item-price" align="center"><h4>' . $arr[3] . '$</h4>';
	echo '<br><br><form action="basket.php" method="post" name="basket.php">';
	echo '<input type="image" src="favicon.ico" name="addtobasket" title="Add to Basket">';
	echo '<input type="text" style="display: none" name="itemname" value="' . $arr[0] . '"></form></div>';
	echo '</div>';
}*/