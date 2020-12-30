<?php
	session_start();
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
					<a class="efeito" href="index.php">Home</a>
					<a class="efeito" href="login.php">Login</a>
					<a class="efeito" href="cadastro.php">Cadastro</a>
				</nav>
			</div>

			<div class="linha">
				<nav class="col2 left">
					<a href='./index.php'><img class='logo2' src='./img/logo/gamebuy2.png'></a>
				</nav>

				<nav class="col7 left search">
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

					<div class="col6 left">
						<div class="col12 logcad">
							<h3>Faça Login</h3>
							<form method="post" action="login1.php">
								<?php
									if(isset($_SESSION['nao_autenticado'])):
								?>
								<div class="warning">
									<p>
										Login ou senha invalido(s)!<br>
									</p>
								</div>
								<?php 
									endif;
									unset($_SESSION['nao_autenticado']);
								 ?>
								<p>
									Digite seu Email<br>
									<input type="email" name="email" required>
								</p>
								
								<p>
									Digite sua Senha<br>
									<input type="password" name="password" required>
								</p>

								<p>
									<button class="sublogcad" type="submit">Entrar</button>
								</p>
							</form>
						</div>
					</div>

					<div class="col6 left">
						<div class="col12 logcad">
							<h3>Ou Cadastre-se</h3>

							<form method="post" action="./cadastro.php">
								<p>
									<button class="sublogcad" type="submit">Cadastrar</button>
								</p>
							</form>
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