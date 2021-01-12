<?php
	session_start();
	include('page.php');

	if(isset($_SESSION['nome'])){
		$nome = $_SESSION['nome'];
		$file = $_SESSION['file'];
		$email = $_SESSION['email'];
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

					cad_log(1);
					usuario(1);

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
			<?php
				footer(); 
		 	?>
		</div>

	</body>

</html>