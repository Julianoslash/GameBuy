<?php
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

					if(isset($_SESSION['nome'])){
						cad_log($file);
						usuario($nome);
					}else{
						cad_log(1);
						usuario(1);
					}

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
							<h3>Cadastro feito com sucesso, <a href="index.php">homepage</a></h3>
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