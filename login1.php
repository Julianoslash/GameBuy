<?php
	session_start();
	include('conexao.php');


	if(empty($_POST['email']) || empty($_POST['password'])){
		header('LOCATION: login.php');
		exit();
	}

	$usuario = mysqli_real_escape_string($conexao, $_POST['email']);
	$senha = mysqli_real_escape_string($conexao, $_POST['password']);

	$query = "select * from clientes where email = '{$usuario}' and senha = '{$senha}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

	if($row == 1){
		$dados = mysqli_fetch_array($result);
		$_SESSION['nome'] = $dados['Nome'];
		$_SESSION['file'] = $dados['Foto'];
		$_SESSION['email'] = $dados['Email'];
		$_SESSION['rua'] = $dados['Rua'];
		$_SESSION['num'] = $dados['Numero'];
		$_SESSION['bairro'] = $dados['Bairro'];
		$_SESSION['cidade'] = $dados['Cidade'];
		$_SESSION['estado'] = $dados['Estado'];
		$_SESSION['cep'] = $dados['Cep'];
		$_SESSION['senha'] = $_POST['password'];

		header('LOCATION: logado.php');
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		header('LOCATION: login.php');
		exit();
	}
	