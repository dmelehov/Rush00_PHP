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
	<div class="center-menu">
		<?php require_once 'appleitems.php';?>
	</div>
	<?php require_once 'rightmenu.php';?>
</div>
<div class="footer"></div>

</body>
</html>
