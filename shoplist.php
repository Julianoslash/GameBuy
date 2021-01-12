<?php
	session_start();
	include ('functions.php');
	include('page.php');

	$nome = $_SESSION['nome'];
	$file = $_SESSION['file'];

	if(isset($_POST['btnremove'])){
		$remove = $_POST['btnremove'];
		remove($remove);
	}

	if(isset($_POST['finalizar'])){
		pedidos();
		finalizarCompra();
		header('Location: finalcompra.php');
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
			<div class="linha">

				<div class="col12">
					<h2>Carrinho de compra</h2>
					<?php
						if(isset($_SESSION['totalitens'])){
							if($_SESSION['totalitens'] == 0){
								echo "<p>Você não possui itens no carrinho de compras!</p>
								";
							}else{

							}
						}

					?>

				</div>

				<div class="coluna col12">
					<div class="col10 left">


					</div>

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