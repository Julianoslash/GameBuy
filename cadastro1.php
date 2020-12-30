<?php
	session_start();
	include('conexao.php');


	if(empty($_POST['cademail']) || empty($_POST['cadpassword'])){
		echo "teste 3";
		header('LOCATION: cadastro.php');
		exit();
	}

	$nome = mysqli_real_escape_string($conexao, $_POST['cadnome']);
	$email = mysqli_real_escape_string($conexao, $_POST['cademail']);
	$senha = mysqli_real_escape_string($conexao, $_POST['cadpassword']);
	$senha2 = mysqli_real_escape_string($conexao, $_POST['cadpassword2']);
	$rua = mysqli_real_escape_string($conexao, $_POST['cadrua']);
	$num = mysqli_real_escape_string($conexao, $_POST['cadnum']);
	$bairro = mysqli_real_escape_string($conexao, $_POST['cadbairro']);
	$cidade = mysqli_real_escape_string($conexao, $_POST['cadcidade']);
	$estado = mysqli_real_escape_string($conexao, $_POST['cadestado']);
	$cep = mysqli_real_escape_string($conexao, $_POST['cadcep']);

	if(isset($_FILES["arquivo"])){
		$nome_temporario = $_FILES["arquivo"]["tmp_name"];
		echo $nome_temporario."\n";
		$foto = md5($_FILES["arquivo"]["name"].rand(1,999)).".jpg";
		echo $foto."\n";
		copy($nome_temporario,"./uploads/cadastro/$foto");
	}

	$query = "select email from clientes where email = '{$email}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

	if($row == 1){
		$_SESSION['teste'] = 1;
		header('LOCATION: cadastro.php');
		exit();
	} else if($senha != $senha2){
		echo "teste 2";
		$_SESSION['teste'] = 2;
		header('LOCATION: cadastro.php');
		exit();
	}else if($row == 0){
		$_SESSION['nome'] = $nome;
		$_SESSION['file'] = $foto;
		$_SESSION['email'] = $email;
		$_SESSION['rua'] = $rua;
		$_SESSION['num'] = $num;
		$_SESSION['bairro'] = $bairro;
		$_SESSION['cidade'] = $cidade;
		$_SESSION['estado'] = $estado;
		$_SESSION['cep'] = $cep;
		$_SESSION['senha'] = $senha;

		$query = "insert into clientes(nome, email, senha, rua, numero, bairro, cidade, cep, estado, foto) 
			values ('{$nome}', '{$email}', '{$senha}', '{$rua}', '{$num}', '{$bairro}', '{$cidade}', '{$cep}', '{$estado}', '{$foto}')";
		$result = mysqli_query($conexao, $query);
		header('LOCATION: cadend.php');
		exit();
	}