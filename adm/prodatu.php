<?php
	include './functionAdm.php';

	$admName = $_SESSION['adm'];
	$img = $_SESSION['admImg'];

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
				<nav class="col2 left">
					<a href="./adm.php"><img class="logo2" src="../img/logo/gamebuy2.png"></a>
				</nav>

				<nav class="col7 left search">
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
								<a href="../index.php">Sair</a>
							</div>
						</div>
					</div>
				</nav>

				<nav class="col2 left">
					<div class="col12 left nome">
						<?php 
							echo "Bem vindo<br>Sr.(a) $admName";
						?>
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
				
				<div class="coluna col12 formlogcad">
					<p>Produto atualizado com sucesso
					!</p>

					<div class="col6 left">
						<div class="col12 logcad">
							<a href="./adm.php">Deseja ir para pagina inicial!</a>
						</div>
					</div>

					<div class="col6 left">
						<div class="col12 logcad">
							<a href="./cadProdut.php">Deseja ir para o cadastro de produtos!</a>
						</div>
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