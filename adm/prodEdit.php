<?php
	include ('./functionAdm.php');
	include ('../conexao.php');

	$adm = $_SESSION['adm'];
	$img = $_SESSION['admImg'];

	$nome = $_SESSION['prodNome'];
	$desc = $_SESSION['prodDesc'];
	$preco = $_SESSION['prodPreco'];;
	$foto = $_SESSION['prodFoto'];
	$cond = $_SESSION['prodCond'];
	$cat = $_SESSION['prodIdCat'];
	$marc = $_SESSION['prodIdMarc'];
	$marca = $_SESSION['prodMarca'];
	$categoria = $_SESSION['prodCat'];

	$local = "../uploads/produtos/$foto";

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
								<a href="../index.php" onClick="">Sair</a>
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

				?>

				<div class="linha">
					<?php
						echo "<content class='coluna col6'>";
							echo "<div class='content jogo'>";
								echo "<div class='coluna col12'>";
									echo "<img class='home' src='$local'>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h2><b class='title'>".$nome."</b></h2>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$desc."</p></h3>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$categoria."</p></h3>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<p>R$ ".$preco."</p>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$cond."</p></h3>";
								echo "</div>";

								echo "<div class='coluna col12'>";
									echo "<h3><p class='title'>".$marca."</p></h3>";
								echo "</div>";

							echo "</div>";
						echo "</content>";
					?>

					<div class="coluna col6">
						<div class="content jogo">
							<h3>Editar dados do produto</h3>

							<p>
								<?php
									echo "
									<fieldset>
										<p>Nome</p>
										<form enctype='multipart/form-data' method='post' action='./prodEdit1.php'>
											<p><input type='text' name='novoProdName' value=''></p>
											<p><button class='sublogcad' type='submit' name='salvar' >Salvar
											</button></p>
										</form>";
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 1){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -1){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									echo "</fieldset>";
								?>
							</p>

							<p>
								<?php
									echo "
									<fieldset>
										<p>Descrição</p>
										<form enctype='multipart/form-data' method='post' action='./prodEdit1.php'>
											<p><textarea style='font-family: arial' cols='25' rows='5' value='$desc' name='novProdDesc'>
											</textarea></p>
											<p><button class='sublogcad' type='submit' name='salvar' >Salvar
											</button></p>
										</form>";
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 3){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -3){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									echo "</fieldset>";
								?>
							</p>

							<p>
								<?php
									echo "
									<fieldset>
										<p>Preço</p>
										<form enctype='multipart/form-data' method='post' action='./prodEdit1.php'>
											<p><input type='text' name='novoProdPreco' value=''></p>
											<p><button class='sublogcad' type='submit' name='salvar' >Salvar
											</button></p>
										</form>";
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 2){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -2){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									echo "</fieldset>";
								?>
							</p>

							<p>
								<?php
									echo "
									<fieldset>
										<form enctype='multipart/form-data' method='post' action='./prodEdit1.php'>
										<p>
									";
									categoria($result1);
									echo "
										</p>
											<p><button class='sublogcad' type='submit' name='salvar' >Salvar
											</button></p>
										</form>";
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 4){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -4){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									echo "</fieldset>";
								?>
							</p>

							<p>
								<?php
									echo "
									<fieldset>
										<form enctype='multipart/form-data' method='post' action='./prodEdit1.php'>
										<p>
									";
									marca($result2);
									echo "
										</p>
											<p><button class='sublogcad' type='submit' name='salvar' >Salvar
											</button></p>
										</form>";
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 5){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -5){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									echo "</fieldset>";
								?>
							</p>

							<p>
								<fieldset>
									<form enctype="multipart/form-data" method="post" action="./prodEdit1.php">
											<p>Nova Condição</p>
											<input type="radio" name="novoProdCond" value='novo'><label for='novo'>Novo</label><br>
											<input type="radio" name="novoProdCond" value='seminovo'><label for='seminovo'>Seminovo</label>
											<p><button class="sublogcad" type="submit" name="salvar" >Salvar</button></p>
									</form>
									<?php
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 6){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -6){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									?>
								</fieldset>
							</p>

							<p>
								<fieldset>
									<form enctype="multipart/form-data" method="post" action="./prodEdit1.php">
										<p>Nova Imagem</p>
										<p><input type="file" name="novoProdFoto" id="arquivo"></p>
										<p><button class="sublogcad" type="submit" name="salvar" >Salvar</button></p>
									</form>
									<?php 
										if(isset($_SESSION['editProdError'])){
											if($_SESSION['editProdError'] == 7){
												echo "<p>Alteração feita com sucesso!</p>";
											}elseif($_SESSION['editProdError'] == -7){
												echo "<font color='red'><p>Campo não foi alterado!</p></font>";
											}
											unset($_SESSION['editProdError']);
										}
									?>
								</fieldset>
							</p>
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