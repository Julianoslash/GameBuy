<?php
	session_start();
	include('../conexao.php');

	$id = $_SESSION['prodId'];

	if(isset($_POST['novoProdName'])){
		$novoNome = $_POST['novoProdName'];
		echo $novoNome, $id;
		$query = "update produtos set nome = '{$novoNome}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 1;
			$_SESSION['prodNome'] = $novoNome;
		}else{
			$_SESSION['editProdError'] = -1;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_POST['novoProdPreco'])){
		$novoPreco = $_POST['novoProdPreco'];
		$query = "update produtos set preco = '{$novoPreco}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 2;
			$_SESSION['prodPreco'] = $novoPreco;
		}else{
			$_SESSION['editProdError'] = -2;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_POST['novoProdDesc'])){
		$novaDesc = $_POST['novoProdDesc'];
		$query = "update produtos set descricao = '{$novaDesc}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 3;
			$_SESSION['prodDesc'] = $novoPreco;
		}else{
			$_SESSION['editProdError'] = -3;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_POST['prodMarc'])){
		$novaMarc = $_POST['prodMarc'];
		$query = "update produtos set Marca_idMarca = '{$novaMarc}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 4;
			$_SESSION['prodIdMarc'] = $novaMarc;
		}else{
			$_SESSION['editProdError'] = -4;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_POST['prodCat'])){
		$novaCat = $_POST['prodCat'];
		$query = "update produtos set Categoria_idCategoria = '{$novaCat}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 5;
			$_SESSION['prodIdCat'] = $novaCat;
		}else{
			$_SESSION['editProdError'] = -5;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_POST['novoProdCond'])){
		$novaCond = $_POST['novoProdCond'];
		$query = "update produtos set condicao = '{$novaCond}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 6;
			$_SESSION['prodCond'] = $novaCond;
		}else{
			$_SESSION['editProdError'] = -6;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}

	if(isset($_FILES["novoProdFoto"])){
		$foto = $_SESSION['prodFoto'];
		unlink("../uploads/produtos/".$foto);

		$nome_temporario = $_FILES["novoProdFoto"]["tmp_name"];
		$foto = md5($_FILES["novoProdFoto"]["name"].rand(1,999)).".jpg";
		copy($nome_temporario,"../uploads/produtos/$foto");

		$query = "update produtos set foto = '{$foto}' where idProdutos = $id";
		if(mysqli_query($conexao, $query)){
			$_SESSION['editProdError'] = 7;
			$_SESSION['prodFoto'] = $foto;
		}else{
			$_SESSION['editProdError'] = -7;
		}
		header('LOCATION: prodEdit.php');
		exit();
	}
?>