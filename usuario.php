<?php
	session_start();
	include('functions.php');
	include('page.php');

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
						cad_log($foto);
						usuario($nome);
					}else{
						cad_log(1);
						usuario(1);
					}

					shop_car();
				?>
			</div>
		</div>
		
		<!--conteudo-->
		<div class="wrapcontent">
			<div class="linha">
				
				<div class="coluna col12 formlogcad">

					<div class="col6 left">
						<div class="clo12 logcad">
							<h3>Minha Conta</h3>
							<fieldset class='user_2'>
								<?php 
									fotoEdit($foto);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 9){
										if ($_SESSION['error'] == 9 && $_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar foto!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>

							<fieldset class='user_2'>
								<?php
									editSenha();
									if(isset($_SESSION['error']) && $_SESSION['error'] == 8){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
									if(isset($_SESSION['update']) && $_SESSION['update'] == 2){
										echo "<font color='red'><p>Senha 1 nao é igual a senha 2!</p></font>";
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($nome, 0);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($rua, 1);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 2){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($num, 2);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 3){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($bairro, 3);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 4){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($cidade, 4);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 5){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($cep, 5);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 6){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
							<fieldset class='user_2'>
								<?php
									edit($estado, 6);
									if(isset($_SESSION['error']) && $_SESSION['error'] == 7){
										if ($_SESSION['update'] == 1) {
											echo "<font color='blue'><p>Alteração feita com sucesso!</p></font>";
										}elseif ($_SESSION['update'] == 0) {
											echo "<font color='red'><p>Não foi possivel alterar campo!</p></font>";
										}
										unset($_SESSION['error']);
										unset($_SESSION['update']);
									}
								?>
							</fieldset>
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
			<?php 
				footer();
			 ?>
		</div>

	</body>

</html>