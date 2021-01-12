<?php
	session_start();
	include('conexao.php');

	if(isset($_POST['btnCompra'])){
		$idProd = $_POST['btnCompra'];
		$query = "select pro.*, categoria, marca
				from produtos pro inner join categoria cat on pro.categoria_idCategoria = cat.idCategoria
				inner join Marca ma on pro.Marca_idMarca = ma.idMarca
				where pro.idProdutos = $idProd";
		$result = mysqli_query($conexao, $query);
		$row = mysqli_num_rows($result);
	}

	if($row == 1){
		foreach ($result as $key => $value) {
			$_SESSION['prodCompId'] = $value['idProdutos'];
			$_SESSION['prodCompNome'] = $value['Nome'];
			$_SESSION['prodCompDesc'] = $value['Descricao'];
			$_SESSION['prodCompPreco'] = $value['Preco'];
			$_SESSION['prodCompFoto'] = $value['Foto'];
			$_SESSION['prodCompCond'] = $value['Condicao'];
			$_SESSION['prodCompCat'] = $value['categoria'];
			$_SESSION['prodCompMarc'] = $value['marca'];
		}

		header('LOCATION: produto.php');
	}else{
		header('LOCATION: index.php');
	}
?>