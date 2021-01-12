<?php
	session_start();

	include('page.php');
	include('functions.php');
	include('conexao.php');

	if(isset($_SESSION['nome'])){
		$nome = $_SESSION['nome'];
		$file = $_SESSION['file'];
		$email = $_SESSION['email'];
	}

	$query = "select pro.*, categoria as Cat, Marca as Marc
				from produtos pro inner join categoria cat on pro.categoria_idCategoria = cat.idCategoria
				inner join Marca ma on pro.Marca_idMarca = ma.idMarca";
	$result = mysqli_query($conexao, $query);

	$query1 = "select * from categoria";
	$result1 = mysqli_query($conexao, $query1);

	if(isset($_POST['sair'])){
		destroy();
		header('LOCATION: ./index.php');
	}
?>

<!DOCTYPE  html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8" />
		<title>HOME</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="css/style.css?version=12" />
	</head>

	<body>
		<!--header-->
		<div class="linha wraphead">
			<?php
				head();
			?>
		</div>

		<!--nav-->
		<div class="wrapnav">
			<?php
				nav_1(); 
			?>

			<div class="linha">
				<?php 
					logo_1();

					pesquisa();

					if(isset($_SESSION['nome'])){
						cad_log($file);
						usuario($nome);
					}else{
						cad_log(1);
						usuario(1);
					}

					shop_car();
				?>
			</div>

			<div class="linha">
				<?php
					nav_bar();
				?>
			</div>
		</div>
		
		<!--conteudo-->
		<div class="wrapcontent">
			<div>
				<?php
					cat_cards($result1, $result);
				?>
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