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
					<a class="efeito" href="logado.php">Home</a>
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

					<div class="col3 left">
						
					</div>

					<div class="col6 left">
						<div class="clo12 logcad">
							<h3>Cadastre-se</h3>

							<form enctype="multipart/form-data" method="post" action="cadastro1.php">
								<?php
									if(isset($_SESSION['teste']) && $_SESSION['teste'] == 1){
										echo "<font color='red'>Email ja existe!</font>";
									}else if(isset($_SESSION['teste']) and $_SESSION['teste'] == 2){
										echo "<font color='red'>Senha nao confere!</font>";
									}
									unset($_SESSION['teste']);
								?>

								<p>
									Digite seu Nome Completo<br>
									<input type="text" name="cadnome" required>
								</p>

								<p>
									Digite seu Email<br>
									<input type="email" name="cademail" required>
								</p>

								<p>
									Digite uma Senha<br>
									<input type="password" name="cadpassword" required>
								</p>

								<p>
									Digite sua Senha Novamente<br>
									<input type="password" name="cadpassword2" required>
								</p>

								
								<p>
									Escolha uma Foto<br>
									<input type="file" name="arquivo" id="arquivo">
								</p>
								
								<p>
									Digite seu endereço<br>
									<input type="text" name="cadrua" required>
								</p>

								<p>
									Digite o numero de sua casa<br>
									<input type="text" name="cadnum" required>
								</p>

								<p>
									Digite seu bairro<br>
									<input type="text" name="cadbairro" required>
								</p>

								<p>
									Digite sua cidade<br>
									<input type="text" name="cadcidade" required>
								</p>

								<p>
									Digite seu Estado<br>
									<input type="text" name="cadestado"required>
								</p>

								<p>
									Digite seu CEP<br>
									<input type="text" name="cadcep" required>
								</p>

								<p>
									<button class="sublogcad" type="submit">Cadastrar</button>
								</p>
							</form>
						</div>
					</div>

					<div class="col3 left">
						
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