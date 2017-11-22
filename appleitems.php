<?php

require_once 'session.php';

$fd  = fopen('private/items.csv', 'r');

while ($arr = fgetcsv($fd)) {
	if (strpos($arr[4], "Apple") !== False) {
		echo '<div class="item"><img class="item-image" src="' . $arr[2] . '">';
		echo '<div class="item-descr" align="center">';
		echo '<h4>' . $arr[1] . '</h4>';
		echo '<p style="font-size: x-small;">(' . $arr[4] . ')</p>';
		echo '<p style="font-size: smaller">' . $arr[5] . '</p>';
		echo '</div>';
		echo '<div class="item-price" align="center"><h4>' . $arr[3] . '$</h4>';
		echo '<br><br><form action="basket.php" method="post" name="basket.php">';
		echo '<input type="image" src="favicon.ico" name="addtobasket" title="Add to Basket">';
		echo '<input type="text" style="display: none" name="itemname" value="' . $arr[0] . '"><br></form></div>';
		echo '</div>';
	}
}