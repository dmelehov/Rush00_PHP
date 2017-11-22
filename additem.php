<?php

require_once 'session.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>UNIT Shopio - super amazing shop ever</title>
</head>
<body>

<?php require_once 'header.php';?>

<div class="content">
	<?php require_once 'leftmenu.php';?>
	<div class="center-menu" align="center">
		<h1>Add New Item</h1>
		<form method="post" action="newitem.php" name="newitem.php">
			Name (max 10 symb): <input type="text" name="itemname" value=""><br>
			Img-link: <input type="text" name="itemimg" value=""><br>
			Img-name (max 5 symb): <input type="text" name="itemimgname" value=""><br>
			Price (max 20000): <input type="text" name="itemprice" value="">$<br>
			Description (max over9k symb): <input type="text" name="itemdescr" value=""><br>
			Apple: <input type="checkbox" name="isapple" value="Apple"><br>
			For work: <input type="checkbox" name="isforwork" value="For work"><br>
			Phone: <input type="checkbox" name="isphone" value="Phone"><br>
			<input type="submit" name="submitbutt" value="ADD ITEM"><br>
		</form>
	</div>
	<?php require_once 'rightmenu.php';?>
</div>
<div class="footer"></div>

</body>
</html>
