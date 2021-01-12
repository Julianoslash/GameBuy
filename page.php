<?php
	if(!isset($_SESSION)){
		session_start();
	}

	function head(){
		echo"
			<header class='col12'>
				<img class='logo' src='./img/logo/gamebuy.png'>
			</header>
		";
	}

	function nav_1(){
		echo "
			<div class='linha'>
				<nav class='col6 right'>
					<a class='efeito' href='index.php'>Home</a>
					<a class='efeito' href='login.php'>Login</a>
					<a class='efeito' href='cadastro.php'>Cadastro</a>
				</nav>
			</div>
		";
	}

	function logo_1(){
		echo "
			<nav class='col2 left'>
			<a href='./index.php'>
				<img class='logo2' src='./img/logo/gamebuy2.png'>
			</a>
			</nav>
		";
	}

	function pesquisa(){
		echo "
			<nav class='col5 left search'>
				<div class='coluna col12 busca'>
					<form class='' action='' method='post'>
						<div class='col10 left'>
					    	<input class='caixabusca' type='search' name='q' placeholder='Buscar...'>
						</div>
						<div class='col2 left'>
					    	<button class='ok' type='submit'><img class='imgbusca' src='./img/busca/buscar.png'></button>
					    </div>
					</form>
				</div>
			</nav>
		";
	}

	function cad_log($file){
		if($file == 1){
			echo"
				<nav class='col1 left'>
					<div class='dropdown'>
						<div class='col4'>
							<img class='logadoimg' src='./img/usuario/user.jpg'/><br>
						</div>
					</div>
				</nav>
			";
		}else{
			echo"
				<nav class='col1 left'>
					<div class='dropdown'>
						<div class='col4'>
							<img class='logadoimg' src='./uploads/cadastro/$file'/><br>
							<div class='dropdown-child'>
								<a href='./usuario.php'>Minha conta</a>
								<form class='' action='./index.php' method='post'>
									<button class='btn-logout' name='sair'><p>Sair</p></button>
								</form>
							</div>
						</div>
					</div>
				</nav>
			";
		}
	}

	function usuario($nome){
		if($nome == 1){
			echo"
				<nav class='col2 left'>
					<div class='col8 left nome'>
						<p>Bem vindo<br>Sr.(a), cadastre-se</p>
					</div>
				</nav>
			";
		}else{
			echo"
				<nav class='col2 left'>
					<div class='col8 left nome'>
						<p>Bem vindo<br>Sr.(a) $nome</p>
					</div>
				</nav>
			";
		}
	}

	function shop_car(){
		if(isset($_SESSION['totalitens'])){
			$print = $_SESSION['totalitens'];
		}else{
			$print = 0;
		}
		echo"
			<nav class='col1 left'>
					<div class='coluna col12 shop2'>
						<a href='shoplist.php'>
							<div class='col2 left shop2'>
							<button class='num' >
								<b>$print</b>
								<img class='shopcar' src='./img/car/car.png'>
							</button>
						</div>
					</a>
				</div>
			</nav>
		";
	}

	function nav_bar(){
		echo"
			<nav class='col3 left ps'>
				<p>PLAYSTATION</p>
			</nav>

			<nav class='col3 left xbox'>
				<p>XBOX</p>
			</nav>

			<nav class='col3 left nintendo'>
				<p>NINTENDO</p>
			</nav>

			<nav class='col3 left pc'>
				<p>CONSOLES</p>
			</nav>
		";
	}

	function footer(){
		echo "
			<footer class='linha'>
				<div class='coluna col12 asign'>
					<p><b>&#169;2020-Powered By</b></p>
				</div>

				<div class='coluna col4'>
					<p><b>Juliano Vieira</b></p>
				</div>

				<div class='coluna col4'>
					<p><b>João Machado</b></p>
				</div>

				<div class='coluna col4'>
					<p><b>André Martins</b></p>
				</div>

				<content class='coluna col4'>
					<p>Contato</p>
					<p>Fone: (+55) 51 9999-9999</p>
					<p>Whatsapp: (+55) 51 9999-9999</p>
					<p>Cidade: Charqueadas</p>
					<p>Estado: Rio Grande do Sul</p>
					<p>País: Brasil</p>
				</content>

				<content class='coluna col4'>
					<p>Contato</p>
					<p>Fone: (+55) 51 9999-9999</p>
					<p>Whatsapp: (+55) 51 9999-9999</p>
					<p>Cidade: Charqueadas</p>
					<p>Estado: Rio Grande do Sul</p>
					<p>País: Brasil</p>
				</content>

				<content class='coluna col4'>
					<p>Contato</p>
					<p>Fone: (+55) 51 9999-9999</p>
					<p>Whatsapp: (+55) 51 9999-9999</p>
					<p>Cidade: Charqueadas</p>
					<p>Estado: Rio Grande do Sul</p>
					<p>País: Brasil</p>
				</content>
				<div class='coluna col12 asign'>
					
				</div>

				<div class='coluna col12'>
					<p><b>GameBuy - Licensed 010101010</b></p>
				</div>
			</footer>
		";
	}
 ?>