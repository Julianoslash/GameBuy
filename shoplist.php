<?php
	include 'functions.php';

	shopCar2();
	
	$var = null;

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
			<header class="col12">
				<img class="logo" src="./img/logo/gamebuy.png">
			</header>
		</div>

		<!--nav-->
		<div class="wrapnav">
			<div class="linha">
				<nav class="col6 right">
					<a class="efeito" href="logado.php">Home</a>
					<a class="efeito" href="login.php">Login</a>
					<a class="efeito" href="cadastro.php">Cadastro</a>
				</nav>
			</div>

			<div class="linha">
				<nav class="col2 left">
					<?php
						if(isset($_SESSION['email'])){
							echo "<a href='./logado.php'><img class='logo2' src='./img/logo/gamebuy2.png'></a>";
						}else{
							echo "<a href='./index.php'><img class='logo2' src='./img/logo/gamebuy2.png'></a>";
						}
					?>
				</nav>

				<nav class="col5 left search">
					<div class="coluna col12 busca">
						<form class="" action="" method="get">
							<div class="col10 left">
						    	<input class="caixabusca" type="search" name="q" placeholder="Buscar...">
							</div>
							<div class="col2 left">
						    	<button class="ok" type="submit"><img class="imgbusca" src="./img/busca/buscar.png"></button>
						    </div>
						</form>
					</div>
				</nav>

				<nav class="col1 left">

					<!-- teste de cadastro -->
					<div class="dropdown">
						<div class="col4">
							<?php 
								echo "<img class='logadoimg' src='./uploads/cadastro/$file'/><br>";
							?>
							<div class="dropdown-child">
								<a href="./usuario.php">Minha conta</a>
								<a href="./index.php">Sair</a>
							</div>
						</div>
					</div>
				</nav>

				<nav class="col2 left">

					<div class="col8 left nome">
						<?php 
							echo "Bem vindo<br>Sr.(a) $nome";
						?>
					</div>
				</nav>

				<nav class="col1 left">
					<div class="coluna col12 shop2">
						<a href="shoplist.php">
							<div class="col2 left shop2">
								<?php
									if(isset($_SESSION['totalitens'])){
										$print = $_SESSION['totalitens'];
									}else{
										$print = 0;
									}
								?>
								<button class="num" ><?php echo "<b>$print</b>"; ?><img class="shopcar" src="./img/car/car.png"></button>
							</div>
						</a>
					</div>
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
			<div class="linha">

				<div class="col12">
					<h2>Carrinho de compra</h2>
				</div>

				<div class="coluna col12">
					<div class="col10 left">

						<?php
							if(testeShopList() == 0){
								echo "<p>Você não tem produtos no carrinho de compras!</p><br>";
								unset($_SESSION['valorfinal']);
								unset($_SESSION['totalitens']);
							}else{

								if(isset($_POST['vezes'])){
									$vezes = $_POST['vezes'];
									$item = $_POST['item'];
									qtd($vezes, $item);
								}else{
									qtd(1, -1);
								}

								if(isset($_POST['parc'])){
									$qtd = floatval($_POST['parc']);
									$varParc = floatval($_SESSION['valorfinal']);
									$varParc = $varParc / $qtd;
									$varParc = number_format($varParc, 2, ',', '');
								}else{
									$qtd = 1;
									$varParc = $_SESSION['valorfinal'];
								}

								$_SESSION['nota1'] = $qtd;
								$_SESSION['nota2'] = $varParc;

								shopCar();

								echo "<div class='center'>";
									echo "<div class='content col12 jogo'>";

										echo "<div class='coluna col2'>";
											echo "Valor total<br>";
											echo "R$ ".$_SESSION['valorfinal'];
										echo "</div>";

										echo "<div class='coluna col3'>";
											echo "Total de produtos<br>";
											echo $_SESSION['totalitens'];
										echo "</div>";

										echo "<form method='post' action='./shoplist.php'> ";

											echo "<div class='coluna col2'>";
												echo "Parc.<br>";
												echo "<select name='parc'>";
													echo "<option value='$qtd'>".$qtd."</optino>";
													echo "<option value='1'>1</optino>";
													echo "<option value='2'>2</optino>";
													echo "<option value='3'>3</optino>";
													echo "<option value='4'>4</optino>";
													echo "<option value='5'>5</optino>";
												echo "</select>";

												echo "<button type='submit' name='qtdparc' >qtd</button>";
											echo "</div>";

										echo "</form>";

										echo "<div class='coluna col2'>";
											echo "Parcelas<br>";
											echo $qtd." de R$ ".$varParc;
 										echo "</div>";

										echo "<div class='coluna col3'>";
											echo "<form method='post' action='./shoplist.php' >";
												echo "<button type='submit' name='finalizar'>Finalizar compra</button> ";
											echo "</form>";
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
						?>

					</div>

				</div>
			</div>
		</div>

		<!--footer-->
		<div class="footer">
			<footer class="linha">

				<div class="coluna col12">
					
				</div>
				<div class="coluna col12 asign">
					<p><b>&#169;2019-Juliano Vieira</b></p>
				</div>

				<content class="coluna col12">
					<p>Contato</p>
					<p>Fone: (+55) 51 9999-9999</p>
					<p>Whatsapp: (+55) 51 9999-9999</p>
					<p>Cidade: Charqueadas</p>
					<p>Estado: Rio Grande do Sul</p>
					<p>País: Brasil</p>
				</content>
			</footer>
		</div>

	</body>

</html>