<?php
	$teste = (int)2;
	//$id = $_SESSION['id'];
	/*session_start();
	session_unset($_SESSION['shopCar']);
	session_unset($_SESSION[$teste]);
	session_unset($_SESSION[$id]);*/

	$teste = (int)2;
	foreach ($_SESSION['shopCar'] as $key => $value) {
		echo "<br>Key = ".$key;
		foreach ($value as $key => $value) {
			echo "<br>Key = ".$key;
			foreach ($value as $key => $value) {
				echo "<br>Key = ".$key.", value = ".$value;
			}
		}
	}
?>