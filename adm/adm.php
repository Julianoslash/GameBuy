<?php
	session_start();
	include './functionAdm.php';
	include('../conexao.php');
	include('../page.php');

	$adm = $_SESSION['adm'];
	$img = $_SESSION['admImg'];

	$query = "select pro.*, categoria as Cat, Marca as Marc
				from produtos pro inner join categoria cat on pro.categoria_idCategoria = cat.idCategoria
				inner join Marca ma on pro.Marca_idMarca = ma.idMarca";
	$result = mysqli_query($conexao, $query);

	if(isset($_POST['editar'])){
		$id = $_POST['editar'];
		$query = "select pro.*, categoria as Cat, Marca as Marc
				from produtos pro inner join categoria cat on pro.categoria_idCategoria = cat.idCategoria
				inner join Marca ma on pro.Marca_idMarca = ma.idMarca
				where pro.idProdutos = $id";

		$result1 = mysqli_query($conexao, $query);
		foreach ($result1 as $key => $value) {
			$_SESSION['prodId'] = $value['idProdutos'];
			$_SESSION['prodNome'] = $value['Nome'];
			$_SESSION['prodDesc'] = $value['Descricao'];
			$_SESSION['prodPreco'] = $value['Preco'];
			$_SESSION['prodFoto'] = $value['Foto'];
			$_SESSION['prodCond'] = $value['Condicao'];
			$_SESSION['prodIdCat'] = $value['Categoria_idCategoria'];
			$_SESSION['prodIdMarc'] = $value['Marca_idMarca'];
			$_SESSION['prodMarca'] = $value['Marc'];
			$_SESSION['prodCat'] = $value['Cat'];

			header('Location: ./prodEdit.php');
		}
	}

	if(isset($_POST['excluir'])){
		$id = $_POST['excluir'];
		$query = "delete from produtos where idprodutos = $id";
		$result2 = mysqli_query($conexao, $query);
	}
?>

<!DOCTYPE  html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8" />
		<title>HOME</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="../css/style.css?version=12" />	
	</head>

	<body>

		<!--header-->
		<div class="linha wraphead">
			<header class="col12">
				<img class="logo" src="../img/logo/gamebuy.png">
			</header>
		</div>

		<!--nav-->
		<div class="wrapnav">

			<div class="linha">
				<nav class="col4 right">
					<p class="efeito" style="color: red">Página do Administrador!</p>
				</nav>
			</div>
			
			<div class="linha">
				<nav class="col2 left">
					</a><img class="logo2" src="../img/logo/gamebuy2.png">
				</nav>

				<nav class="col5 left search">
					<div class="coluna col12 busca">
						<form class="" action="" method="get">
							<div class="col10 left">
						    	<input class="caixabusca" type="search" name="q" placeholder="Buscar...">
							</div>
							<div class="col2 left">
						    	<button class="ok" type="submit"><img class="imgbusca" src="../img/busca/buscar.png"></button>
						    </div>
						</form>
					</div>
				</nav>

				<nav class="col1 left">
					<!-- teste de cadastro -->
					<div class="dropdown">
						<div class="col4">
							<?php 
								echo "<img class='logadoimg' src='$img'/><br>";
							?>
							<div class="dropdown-child">
								<a href="../index.php" onClick="?>">Sair</a>
							</div>
						</div>
					</div>
				</nav>

				<nav class="col2 left">
					<div class="col12 left nome">
						<?php 
							echo "Bem vindo<br>Sr.(a) $adm";
						?>
					</div>
				</nav>

				<nav class="col2 left">
					<a class="efeito" href="./cadProdut.php">Cadastrar produtos</a>
				</nav>

			</div>

			<div class="linha">
				<nav class="col3 left ps">
					<p>PLAYSTATION</p>
				</nav>

				<nav class="col3 left xbox">
					<p>XBOX</p>
				</nav>

				<nav class="col3 left nintendo">
					<p>NINTENDO</p>
				</nav>

				<nav class="col3 left pc">
					<p>CONSOLES</p>
				</nav>
			</div>
		</div>
		
		<!--conteudo-->
		<div class="wrapcontent">
			<div>

				<div class="linha">
					<?php
						categoriaProd($result, 1);
					?>
				</div>

			</div>
		</div>

		<!--footer-->
		<div class="footer">
			<?php 
				footer();
			?>
		</div>

	</body>

</html>