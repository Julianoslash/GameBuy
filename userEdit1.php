<?php
	session_start();
	include('conexao.php');
	include('functions.php');

	$user = $_SESSION['email'];
	$result = 0;
	$session = "";

	if(isset($_POST['nome'])){
		$session = "nome";
		$valor = $_POST['nome'];
		$query = "update clientes set nome = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['rua'])){
		$session = "rua";
		$valor = $_POST['rua'];
		$query = "update clientes set rua = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['numero'])){
		$session = "num";
		$valor = $_POST['numero'];
		$query = "update clientes set numero = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['bairro'])){
		$session = "bairro";
		$valor = $_POST['bairro'];
		$query = "update clientes set bairro = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['cidade'])){
		$session = "cidade";
		$valor = $_POST['cidade'];
		$query = "update clientes set cidade = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['cep'])){
		$session = "cep";
		$valor = $_POST['cep'];
		$query = "update clientes set cep = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}
	if(isset($_POST['estado'])){
		$session = "estado";
		$valor = $_POST['estado'];
		$query = "update clientes set estado = '{$valor}' where Email like '{$user}'";
		$result = mysqli_query($conexao, $query);
	}

	if(isset($_POST['senhaEdit1']) && isset($_POST['senhaEdit2'])){
		if($_POST['senhaEdit1'] == $_POST['senhaEdit2']){
			$valor = $_POST['senhaEdit1'];
			$query = "update clientes set senha = '{$valor}' where Email like '{$user}'";
			$result = mysqli_query($conexao, $query);
		}else{
			$_SESSION['update'] = 2;
			header('LOCATION: usuario.php');
			exit();
		}
	}

	if($result == 1){
		if($_POST['senhaEdit1']){
			$_SESSION['update'] = 1;
			header('LOCATION: usuario.php');
			exit();
		}
		$_SESSION['update'] = 1;
		$_SESSION[$session] = $valor;
		header('LOCATION: usuario.php');
		exit();
	}else{
		$_SESSION['update'] = 0;
		header('LOCATION: usuario.php');
		exit();
	}