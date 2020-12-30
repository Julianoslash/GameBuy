<?php
	session_start();

	$nome = $_SESSION['nome'];
	$foto = $_SESSION['file'];
	$email = $_SESSION['email'];
	$rua = $_SESSION['rua'];
	$num = $_SESSION['num'];
	$bairro = 	$_SESSION['bairro'];
	$cidade = $_SESSION['cidade'];
	$estado = $_SESSION['estado'];
	$cep = $_SESSION['cep'];
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

				<nav class="col1 left">
					<div class="coluna col12 shop2">
						<a href="shoplist.php">
							<div class="col2 left shop2">
								<?php
									if(isset($_SESSION['totalitens'])){
										$print = $_SESSION['totalitens'];
										//echo $_SESSION['totalitens'];
									}else{
										$print = 0;
										//echo "0<br>";
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
				
				<div class="coluna col12 formlogcad">

					<div class="col6 left">
						<div class="clo12 logcad">
							<h3>Minha Conta</h3>

							<form method="post" action="./userEdit.php">
								<?php
									echo "<p><br><img clas='userImg' src='./uploads/cadastro/$foto'></p>";
									echo "<p>Nome: $nome</p>";
									echo "<p>Email: $email</p>";
									echo "<p>Rua: $rua</p>";
									echo "<p>Numero: $num</p>";
									echo "<p>Bairro: $bairro</p>";
									echo "<p>Cidade: $cidade</p>";
									echo "<p>Cep: $cep</p>";
									echo "<p>Estado: $estado</p>";
								?>
								<input class="sublogcad" type="submit" value="Editar">
							</form>

						</div>
					</div>

					<div class="col4 left">
						<div class="clo12 logcad">
							<a href="./historico.php">Ver Historico de Produtos!</a>
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