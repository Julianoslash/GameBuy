<?php 
	define('HOST', 'localhost');
	define('USUARIO', 'root');
	define('SENHA', '123456');
	define('DB', 'gameBuy');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');
?>