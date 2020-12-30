<?php
	include './functionAdm.php';

	$adm = $_SESSION['adm'];
	$img = $_SESSION['admImg'];
	$teste = 0;

	$name = $_SESSION['prodName'];
	$desc = $_SESSION['prodDesc'];
	$price = $_SESSION['prodPrice'];
	$file = $_SESSION['prodFile'];
	$cat = $_SESSION['prodCat'];
	$local = "../uploads/produtos/$cat/$file";

	if(isset($_POST['salvar'])){

		if(isset($_POST['prodName'])){
			$prodName = $_POST['prodName'];
		}else{
			$prodName = $name;
		}

		if(isset($_POST['prodDesc'])){
			$prodDesc = $_POST['prodDesc'];
		}else{
			$prodDesc = $desc;
		}

		if(isset($_POST['prodPrice'])){
			$prodPrice = $_POST['prodPrice'];
		}else{
			$prodPrice = $price;
		}

		$teste = edit($cat, $prodName, $prodDesc, $prodPrice);

		if($teste == 1){
			header('Location: ./prodatu.php');
		}
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
					<a href="./adm.php"><img class="logo2" src="../img/logo/gamebuy2.png"></a>
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
								<a href="../index.php">Sair</a>
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
				<?php
					if($cat == "xbox"){
						echo "<div class='col12 XBOX'>";
							echo "<h2>Xbox One</h2>";
						echo "</div>";
					}elseif($cat == "playstation"){
						echo "<div class='col12 PS'>";
							echo "<h2>Playstation</h2>";
						echo "</div>";
					}elseif($cat == "nintendo"){
						echo "<div class='col12 NS'>";
							echo "<h2>Playstation</h2>";
						echo "</div>";
					}elseif($cat == "consoles"){
						echo "<div class='col12 CO'>";
							echo "<h2>Playstation</h2>";
						echo "</div>";
					}
				?>

				<div class="linha">
					<?php
						echo "<content class='coluna col6'>";
							echo "<div class='content jogo'>";
								echo "<div class='coluna col12'>";
									echo "<img class='home' src='$local'>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h2><b class='title'>".$name."</b></h2>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$desc."</p></h3>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$cat."</p></h3>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<p>R$ ".$price."</p>";
								echo "</div>";
							echo "</div>";
						echo "</content>";
					?>

					<div class="coluna col6">
						<div class="content jogo">
							<h3>Editar dados do produto</h3>

							<form enctype="multipart/form-data" method="post" action="./prodEdit.php">
								<p>
									Nome<br>
									<?php
										echo "<input type='text' name='prodName' value='$name' required>"
									?>
								</p>

								<p>
									Descrição<br>
									<?php
										echo "<textarea style='font-family: arial' cols='25' rows='5' value='$desc' name='prodDesc'>$desc</textarea> ";
										
									?>
								</p>

								<p>
									Preço<br>
									<?php
										echo "<input type='text' name='prodPrice' value='$price' required>";
									?>
								</p>

								<p>
									<button class="sublogcad" type="submit" name="salvar" >Salvar</button>
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