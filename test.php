<?php require('conn.php');
require 'top.php'; ?>

<?php 
		$x=1;
		$q = '';
		while ($x == 13) {
			echo '$command.$x = "UPDATE `stock` SET `count`= (`count` - '{$x}') WHERE `id` = (SELECT `id` FROM `drug` WHERE `name` = '$d$x')";'.'<br>';
		}	
 ?>