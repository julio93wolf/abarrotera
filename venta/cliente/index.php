<?php
	include_once('../abarrotera.class.php');
	$rol[0]='Cliente';
	$abarrotera->guardia($rol);
	include('../header.php');
	echo "Bienvenido";
?>

<?php
	include('../footer.php');
?>