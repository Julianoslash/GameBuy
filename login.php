<?php
	session_start();
	include('page.php');
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
			<?php
				footer(); 
		 	?>
		</div>

	</body>

</html>