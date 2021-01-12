<?php
	session_start();
	include('../conexao.php');

	$prodNome = mysqli_real_escape_string($conexao, $_POST['prodNome']);
	$prodDesc = mysqli_real_escape_string($conexao, $_POST['prodDesc']);
	$prodPreco = mysqli_real_escape_string($conexao, $_POST['prodPreco']);
	$prodCond = mysqli_real_escape_string($conexao, $_POST['prodCond']);
	$prodCat = mysqli_real_escape_string($conexao, $_POST['prodCat']);
	$prodMarc = mysqli_real_escape_string($conexao, $_POST['prodMarc']);

	if(isset($_FILES["prodFoto"])){
		$nome_temporario = $_FILES["prodFoto"]["tmp_name"];
		$prodFoto = md5($_FILES["prodFoto"]["name"].rand(1,999)).".jpg";
		copy($nome_temporario,"../uploads/produtos/$prodFoto");
	}

	$query = "insert into produtos(nome, descricao, preco, foto, condicao, categoria_idCategoria, marca_idMarca) 
	values('{$prodNome}', '{$prodDesc}', '{$prodPreco}', '{$prodFoto}', '{$prodCond}', '{$prodCat}', '{$prodMarc}')";

	$mysqli_error = "";
	$result = mysqli_query($conexao, $query) or die ($mysqli_error);

	if($mysqli_error == ""){
		$_SESSION['cadProdError'] = 1; 
		header('LOCATION: cadProdut.php');
		exit();
	}else{
		$_SESSION['cadProdError'] = 0;
		header('LOCATION: cadProdut.php');
		exit();
	}