<?php
	include 'functions.php';

	destroy();

	$xbox = array(array());
	$ps = array(array());
	$ns = array(array());
	$co = array(array());
	$btn = -1;

	if(isset($_POST['btn'])){
		header('Location: ./login.php');
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
					<a class="efeito" href="index.php">Home</a>
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
				<div class="col12 XBOX">
					<h2>Xbox One</h2>
				</div>

				<div class="linha">
					<?php
						$xbox = xbox();

						if($xbox > 0){
							$Xcont = 0;

							foreach ($xbox as $line) {
								foreach ($line as $key => $value){
									if($key == 0){
										$Xnome = $value;
									}elseif($key == 1){
										$Xdesc = $value;
									}elseif($key == 2){
										$Xvalor = $value;
									}elseif($key == 3){
										$Xcat = $value;
									}
									elseif($key == 4){
										$Xfile = $value;
									}
								}

								if(isset($Xnome)){
									cards($Xnome, $Xdesc, $Xvalor, $Xcat, $Xfile, $Xcont);

									$Xcont ++;
								}else{
									echo "Não temos produtos no momento!!!<br>";
								}
							}
						}else{
							echo "Não temos produtos no momento!!!<br>";
						}
					?>
				</div>

			</div>

			<div>
				<div class="col12 PS">
					<h2>Playstation</h2>
				</div>

				<div class="linha">
					<?php
						$ps = playstation();

						if($ps != null){
							$Pcont = 0;

							foreach ($ps as $line) {
								foreach ($line as $key => $value){
									if($key == 0){
										$Pnome = $value;
									}elseif($key == 1){
										$Pdesc = $value;
									}elseif($key == 2){
										$Pvalor = $value;
									}elseif($key == 3){
										$Pcat = $value;
									}
									elseif($key == 4){
										$Pfile = $value;
									}
								}

								if(isset($Pnome)){
									cards($Pnome, $Pdesc, $Pvalor, $Pcat, $Pfile, $Pcont);

									$Pcont ++;
								}else{
									echo "Não temos produtos no momento!!!<br>";
									break;
								}
							}
						}else{
							echo "Não temos produtos no momento!!!<br>";
						}
					?>
				</div>

			</div>

			<div>
				<div class="col12 NS">
					<h2>Nintendo</h2>
				</div>

				<div class="linha">
					<?php
						$ns = nintendo();

						if($ns > 0){
							$Ncont = 0;

							foreach ($ns as $line) {
								foreach ($line as $key => $value){
									if($key == 0){
										$Nnome = $value;
									}elseif($key == 1){
										$Ndesc = $value;
									}elseif($key == 2){
										$Nvalor = $value;
									}elseif($key == 3){
										$Ncat = $value;
									}
									elseif($key == 4){
										$Nfile = $value;
									}
								}

								if(isset($Pnome)){
									cards($Nnome, $Ndesc, $Nvalor, $Ncat, $Nfile, $Ncont);

									$Ncont ++;
								}else{
									echo "Não temos produtos no momento!!!<br>";
								}
							}
						}else{
							echo "Não temos produtos no momento!!!<br>";
						}
					?>
				</div>

			</div>

			<div>
				<div class="col12 CO">
					<h2>Consoles</h2>
				</div>

				<div class="linha">
					<?php
						$co = consoles();

						if($co > 0){

							$Ccont = 0;

							foreach ($co as $line) {
								foreach ($line as $key => $value){
									if($key == 0){
										$Cnome = $value;
									}elseif($key == 1){
										$Cdesc = $value;
									}elseif($key == 2){
										$Cvalor = $value;
									}elseif($key == 3){
										$Ccat = $value;
									}
									elseif($key == 4){
										$Cfile = $value;
									}
								}

								if(isset($Cnome)){
									cards($Cnome, $Cdesc, $Cvalor, $Ccat, $Cfile, $Ccont);

									$Ccont ++;
								}else{
									echo "Não temos produtos no momento!!!<br>";
								}
							}
						}else{
							echo "Não temos produtos no momento!!!<br>";
						}
					?>
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