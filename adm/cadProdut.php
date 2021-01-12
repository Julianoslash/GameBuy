<?php
	include('./functionAdm.php');
	include('../page.php');
	include('../conexao.php');

	$admName = $_SESSION['adm'];
	$img = $_SESSION['admImg'];

	$query1 = "select * from categoria";
	$result1 = mysqli_query($conexao, $query1);

	$query2 = "select * from marca";
	$result2 = mysqli_query($conexao, $query2);
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
								<a href="../index.php" onClick="">Sair</a>
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

					<div class="col3 left">

					</div>

					<div class="col6 left">
						<div class="clo12 logcad">
							<h3>Cadastre um produto</h3>

							<form enctype="multipart/form-data" method="post" action="cadProdut1.php">
								<p>
									Nome do produto<br>
									<input type="text" name="prodNome" required>
								</p>

								<p>
									Descrição do produto<br>
									<textarea name="prodDesc" maxlength="200" cols="25" rows="5" required></textarea>
								</p>

								<p>
									Digite o valor do produto<br>
									<input type="text" name="prodPreco" required>
								</p>

								<p>
									<?php
										categoria($result1);
									?>
								</p>

								<p>
									Selecione a condição do porduto<br>
									<input type="radio" name="prodCond" value='novo'><label for='novo'>Novo</label><br>
									<input type="radio" name="prodCond" value='seminovo'><label for='seminovo'>Seminovo</label>
								</p>

								<p>
									<?php
										marca($result2);
									?>
								</p>

								<p>
									Escolha a imagem do produto<br>
									<input type="file" name="prodFoto" id="arquivo">
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
			<?php 
				footer();
			?>
		</div>

	</body>

</html>