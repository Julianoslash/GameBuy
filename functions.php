<?php
	if(!isset($_SESSION)){
		session_start();
	}
	include('conexao.php');

	function adm($email, $senha){
		$admEmail = "juliano@yahoo.com.br";
		$admSenha = 123;

		$_SESSION['adm'] = "Juliano";
		$_SESSION['admImg'] = "./admImg/adm.jfif";

		if($admEmail == $email && $admSenha == $senha){
			return 1;
		}else{
			return 0;
		}
	}

	function edit($string, $oper){
		switch($oper){
			case 0:
				editar($string, "nome");
				break;
			case 1:
				editar($string, "rua");
				break;
			case 2:
				editar($string, "numero");
				break;
			case 3:
				editar($string, "bairro");
				break;
			case 4:
				editar($string, "cidade");
				break;
			case 5:
				editar($string, "cep");
				break;
			case 6:
				editar($string, "estado");
				break;
		}
	}

	function editar($string, $dest){
		$ucfirst = ucfirst($dest);
		echo "<p>$ucfirst:</p>";
		echo "<p>$string</p>";
		$post = $dest."Edit";
		$salvar = $dest."Salvar";
		if(isset($_POST[$post])){
			echo "<form method='post' action='userEdit1.php'>";
			echo "<p>Digite outro {$dest}:</p>";
			echo "<input type='text' name='{$dest}'>";
			echo "<input class='user2' type='submit' class='user' value='salvar' name='{$salvar}'>";
			echo "</form>";
		}else{
			echo "<form method='post' action='usuario.php'>";
			echo "<input class='user' type='submit' value='Editar' name='{$post}'>";
			echo "</form>";
		}
	}

	function editSenha(){
		echo "<p>Editar Senha:</p>";
		if(isset($_POST["editarSenha"])){
			echo "<form method='post' action='userEdit1.php'>";
			echo "<p>Digite uma senha:</p>";
			echo "<input type='password' name='senhaEdit1'>";
			echo "<input type='password' name='senhaEdit2'>";
			echo "<input class='user2' type='submit' class='user' value='salvar' name='salvarSenha'>";
			echo "</form>";
		}else{
			echo "<form method='post' action='usuario.php'>";
			echo "<input class='user' type='submit' value='Editar' name='editarSenha'>";
			echo "</form>";
		}
	}

	function testUpdate(){
		if($_SESSION['update'] == 2){
			echo "Senha 1 nao é igual a senha 2!";
		}elseif ($_SESSION['update'] == 1) {
			echo "Alteração feita com sucesso!!";
		}elseif ($_SESSION['update'] == 0) {
			echo "Não foi possivel alterar campo";
		}
		unset($_SESSION['update']);
	}

	function newShopList($email){
		if(!file_exists("./docs/shoplist/".$email.".txt")){
			$arquivo = fopen("./docs/shoplist/".$email.".txt", "a+");
			if($arquivo == false) die("ERRO AO CRIAR O ARQUIVO");
			fclose($arquivo);
		}

		if(!file_exists("./docs/pedidos/".$email.".txt")){
			$arquivo2 = fopen("./docs/pedidos/".$email.".txt", "a+");
			if($arquivo2 == false) die("ERRO AO CRIAR O ARQUIVO");
			fclose($arquivo2);
		}

		return 0;
	}

	function user($nome, $email, $senha, $date, $ender, $bairro, $city, $file){

		$_SESSION['nome'] = $nome;
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		$_SESSION['date'] = $date;
		$_SESSION['ender'] = $ender;
		$_SESSION['bairro'] = $bairro;
		$_SESSION['city'] = $city;
		$_SESSION['file'] = $file;

		return 0;
	}

	function userEdit($nome, $senha, $senha2, $date, $ender, $bairro, $city, $file){

		$email = $_SESSION['email'];
		$cont = $_SESSION['cont'];
		$img = $_SESSION['file'];

		$dados = array();

		if($senha != $senha2){
			return 0;
		}

		$arqcad = fopen('./docs/cadastro/arqcad.txt', 'r');
		if ($arqcad == false) die('ERRO 01.');

		do{
			$cad = fgets($arqcad);
			if($cad == null) break;

			$dados[] = $cad;

		}while($arqcad!=null);

		fclose($arqcad);

		if($img == $file){
			$var = "$nome;$email;$senha;$date;$ender;$bairro;$city;$file";
		}else{
			$var = "$nome;$email;$senha;$date;$ender;$bairro;$city;$file\r\n";
		}
		$dados[$cont] = $var;

		$arqcad = fopen('./docs/cadastro/arquivo.txt', 'w');
		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			fwrite($arqcad, $value);
		}

		fclose($arqcad);

		unlink('./docs/cadastro/arqcad.txt');
		rename('./docs/cadastro/arquivo.txt', './docs/cadastro/arqcad.txt');

		ordenar();

		login($email, $senha);

		return 1;
	}

	function login($email, $senha){

		$arqlog = fopen('./docs/cadastro/arqcad.txt', 'r');

		$dados = array();
		$cont = -1;

		while(true){
			$cont ++;

			$logdados = fgets($arqlog);
			if($logdados == null) break;

			$dados = explode(";", $logdados);

			if($dados[1] == $email && $dados[2] == $senha){

				user($dados[0], $dados[1], $dados[2], $dados[3], $dados[4], $dados[5], $dados[6], $dados[7]);

				fclose($arqlog);

				$_SESSION['cont'] = $cont;

				return 1;
			}
		}

		fclose($arqlog);

		return 0;

	}

	function ordenar(){
		$arqcad = fopen('./docs/cadastro/arqcad.txt', 'r');
		if ($arqcad == false) die('ERRO 01.');

		$dados = array();

		do{
			$cadastro = fgets($arqcad);
			if($cadastro == null) break;

			$dados[] = $cadastro;

		}while($arqcad!=null);

		fclose($arqcad);

		asort($dados);

		$arqcad = fopen('./docs/cadastro/arqcad.txt', 'w');
		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			fwrite($arqcad, $value);
		}

		fclose($arqcad);
	}

	function destroy(){
		session_destroy();
	}

	//funções cards

	function xbox(){
		$xbox = fopen('./docs/produtos/xbox.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($xbox);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($xbox);

		return $prod;
	}

	function playstation(){
		$xbox = fopen('./docs/produtos/playstation.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($xbox);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($xbox);

		return $prod;
	}

	function nintendo(){
		$xbox = fopen('./docs/produtos/nintendo.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($xbox);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($xbox);

		return $prod;
	}

	function consoles(){
		$xbox = fopen('./docs/produtos/consoles.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($xbox);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($xbox);

		return $prod;
	}

	function prodDados($name, $desc, $price, $cat, $file){

		$_SESSION['prodName'] = $name;
		$_SESSION['prodDesc'] = $desc;
		$_SESSION['prodPrice'] = $price;
		$_SESSION['prodFile'] = $file;
		$_SESSION['prodCat'] = $cat;

		return 0;
	}

	function cards($nome, $desc, $valor, $cat, $file, $cont){
		$produto = "$nome;$desc;$valor;$cat;$file;$cont";

		echo "<content class='coluna col3'>";
			echo "<div class='content jogo'>";
				echo "<div class='coluna col12'>";
					echo "<img class='home' src='./uploads/produtos/$cat/".$file."'>";
				echo "</div>";

				echo "<div class='coluna col12'>";
					echo "<h2><b class='title'>".$nome."</b></h2>";
					echo "<p><b>".$cat."</b></p>";
					echo "<p>R$ ".$valor."</p>";
				echo "</div>";

				if(isset($_SESSION['nome'])){
					$pagina = "./logado.php";
				}else{
					$pagina = "./login.php";
				}

				echo "<div class='coluna col12 valuecard'>";
					echo "<form action='$pagina' method='post'>";
						echo "<button type='submit' name='btn' value='$produto'>Comprar</button>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		echo "</content>";

		return 0;
	}

	function compra($name, $desc, $price, $cat, $local){

		echo "<div class='content col5 jogo'>";
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

		echo "</div>";

		echo "<div class='content col4 jogo'>";

			echo "<div class='coluna col12'>";
				echo "<p><b>Valor</b> R$ ".$price."</p>";
			echo "</div>";

			echo "<div class='coluna col12 valuecard'>";
				echo "<form action='./produto.php' method='post'>";
					echo "<button type='submit' name='btn' value=''>Comprar</button>";
				echo "</form>";
			echo "</div>";
		echo "</div>";

		return 0;
	}

	function shopList($name, $desc, $price, $cat, $local, $email){

		$dados = "$name;1;$desc;$price;$cat;$local";

		$list = fopen('./docs/shoplist/'.$email.'.txt', 'a+');
		if ($list == false) die('ERRO 01.');

		fwrite($list, $dados);

		fclose($list);

		return 0;
	}

	function shopCar(){

		$dados = array();
		$valor = 0;
		$itens = -1;

		$email = $_SESSION['email'];

		$list = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		while($list != null){
			$itens++;

			$linha = fgets($list);
			if($linha == null) break;

			$dados = explode(';', $linha);

			//Tranformando valores em numericos
			$qtd = floatval ( $dados[1] );
			$x = floatval ( $dados[3] );
			$x = $x * $qtd;
			$valor += $x;
			$a = number_format($x, 2, ',', '');

			cardShopList($dados[0], $dados[1], $dados[3], $dados[4], $dados[5], $itens, $a);
		}

		$valor = number_format($valor, 2, ',', '');
		valorFinal($valor, $itens);

		return 1;
	}

	function shopCar2(){

		$dados = array();
		$valor = 0;
		$itens = -1;

		$email = $_SESSION['email'];

		$list = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		while($list != null){
			$itens++;

			$linha = fgets($list);
			if($linha == null) break;

			$dados = explode(';', $linha);

			//Tranformando valores em numericos
			$qtd = floatval ( $dados[1] );
			$x = floatval ( $dados[3] );
			$x = $x * $qtd;
			$valor += $x;
		}

		$valor = number_format($valor, 2, ',', '');
		valorFinal($valor, $itens);

		return 1;
	}

	function valorFinal($valor, $itens){

		$_SESSION['valorfinal'] = $valor;
		$_SESSION['totalitens'] = $itens;

		return 0;
	}

	function testeShopList(){
		$email = $_SESSION['email'];

		$list = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		$teste = fgets($list);
		$dados = explode(';', $teste);

		fclose($list);

		if(count($dados) < 5){
			return 0;
		}else{
			return 1;
		}
	}

	function qtd($qtd, $item){
		$email = $_SESSION['email'];
		$pos = $item;

		$dados = array();
		$edit = array();

		$arqcad = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($arqcad == false) die('ERRO 01.');

		do{
			$cad = fgets($arqcad);
			if($cad == null) break;

			$dados[] = $cad;

		}while($arqcad!=null);

		fclose($arqcad);

		if($item >= 0){

			$edit = explode(';', $dados[$pos]);
			$edit[1] = $qtd;
			$troc = $edit[0].";".$edit[1].";".$edit[2].";".$edit[3].";".$edit[4].";".$edit[5];
			$dados[$pos] = $troc;

			$arqcad = fopen('./docs/shoplist/temp.txt', 'a+');
			if ($arqcad == false) die('ERRO 01.');

			foreach ($dados as $key => $value) {
				fwrite($arqcad, $value);
			}

			fclose($arqcad);

			unlink('./docs/shoplist/'.$email.'.txt');
			rename("./docs/shoplist/temp.txt", "./docs/shoplist/".$email.".txt");
		}

		shopCar2();

		return 0;
	}

	function cardShopList($name, $qtd, $price, $cat, $local, $item, $valor){

		echo "<div class='content col12 jogo' style='text-align:center'>";

			echo "<div class='coluna col2'>";
				echo "<img class='home' src='$local'>";
			echo "</div>";

			echo "<div class='coluna col3'>";
				echo "<h2><b class='title'>".$name."</b></h2>";
			echo "</div>";

			echo "<div class='coluna col2'>";
				echo "<h3><p class='title'>".$cat."</p></h3>";
			echo "</div>";

			echo "<div class='coluna col2'>";
				echo "<h3>Valor uni.<br>R$ ".$price."</h3>";
			echo "</div>";

			echo "<form method='post' action='./shoplist.php'> ";

				echo "<div class='coluna col2'>";
					echo "Qtd.<br>";
					echo "<select name='vezes'>";
						echo "<option value='$qtd'>".$qtd."</optino>";
						echo "<option value='1'>1x</optino>";
						echo "<option value='2'>2x</optino>";
						echo "<option value='3'>3x</optino>";
						echo "<option value='4'>4x</optino>";
						echo "<option value='5'>5x</optino>";
					echo "</select>";

					echo "<button type='submit' name='item' value='$item' >qtd</button>";
				echo "</div>";
			echo "</form>";

			echo "<div class='coluna col2'>";
				echo "<h3>Valor final<br>R$ ".$valor."</h3>";
			echo "</div>";

			echo "<form method='post' action='./shoplist.php'> ";

				echo "<div class='coluna col2'>";
					echo "<button type='submit' name='btnremove' value='$item'>Remover</button>";
				echo "</div>";

			echo "</form>";

		echo "</div>";

		return 0;
	}

	function remove($indice){
		$email = $_SESSION['email'];

		$dados = array();

		$arqcad = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($arqcad == false) die('ERRO 01.');

		do{
			$cad = fgets($arqcad);
			if($cad == null) break;

			$dados[] = $cad;

		}while($arqcad!=null);

		fclose($arqcad);

		unset($dados[$indice]);
		$dados = array_values($dados);

		$arqcad = fopen('./docs/shoplist/'.$email.'.txt', 'w');
		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			fwrite($arqcad, $value);
		}

		fclose($arqcad);

		shopCar2();

		return 0;
	}

	function pedidos(){
		$email = $_SESSION['email'];

		$dados = array();
		$itens = 0;
		$cont = 1;

		$list = fopen('./docs/pedidos/'.$email.'.txt', 'a+');
		if ($list == false) die('ERRO 01.');

		while($list != null){
			$teste = fgets($list);
			if($teste == null) break;

			if($teste == "Fim do pedido\r\n"){
				$cont++;
			}

		}

		fwrite($list, "Pedido $cont\r\n");
		fwrite($list, "Dados da compra\r\n");
		fwrite($list, "Total de Produtos: ".$_SESSION['totalitens']."\r\n");
		fwrite($list , "Valor total: R$ ".$_SESSION['valorfinal']."\r\n");
		fwrite($list, "Total de Parcelas: ".$_SESSION['nota1']."x de R$ ".$_SESSION['nota2']."\r\n");

		$list2 = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($list2 == false) die('ERRO 01.');

		while($list2 != null){
			$itens++;

			$linha = fgets($list2);
			if($linha == null) break;
			fwrite($list, "Produto $itens\r\n");
			fwrite($list, $linha);
		}

		fclose($list2);

		fwrite($list, "Fim do pedido\r\n");

		fclose($list);

		return 1;

	}

	function testePedidos(){
		$email = $_SESSION['email'];

		$list = fopen('./docs/pedidos/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		$teste = fgets($list);

		fclose($list);

		if($teste == null){
			return 0;
		}else{
			return 1;
		}
	}

	function historico(){
		$email = $_SESSION['email'];

		$dados = array();
		$pos = 0;

		$list = fopen('./docs/pedidos/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		while($list != null){
			$linha = fgets($list);
			if($linha == null) break;

			$dados[] = $linha;

		}

		fclose($list);

		historicoList($dados[$pos], $dados[$pos+2], $dados[$pos+3], $dados[$pos+4], $pos);

		for($i = 0; $i < count($dados); $i++){
			if($dados[$i] == "Fim do pedido\r\n" && $i != count($dados)-1){
				historicoList($dados[$pos+1], $dados[$pos+3], $dados[$pos+4], $dados[$pos+5], ($pos+1));
			}

			$pos++;

		}

		return 1;
	}

	function historicoList($pedido, $qtdprod, $valortotal, $totalparc, $pos){
		//style='border-right: 1px solid black; text-align:center; height:100%; margin-top:-5px'>

		echo "<div class='content col12 jogo' style='height:100px; text-align:center;'>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; height:100%'>";
				echo "<h3>$pedido</h3><br>";
			echo "</div>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; height:100%'>";
				echo "<h3><b>$qtdprod</b></h3>";
			echo "</div>";

			echo "<div class='coluna col3' style='border-right: 1px solid black; height:100%'>";
				echo "<h3>$valortotal</h3>";
			echo "</div>";

			echo "<div class='coluna col3' style='border-right: 1px solid black; height:100%'>";
				echo "<h3>$totalparc</h3>";
			echo "</div>";

			echo "<form method='post' action='./cardhistorico.php'> ";

				echo "<div class='coluna col2' style='margin-top: 25px'>";
					echo "<button type='submit' name='ver' value='$pos'>Ver Pedido</button>";
				echo "</div>";

			echo "</form>";

		echo "</div>";

		return 0;
	}

	function cardHistorico($pos){
		$email = $_SESSION['email'];

		$dados = array();
		$str = null;

		$list = fopen('./docs/pedidos/'.$email.'.txt', 'r');
		if ($list == false) die('ERRO 01.');

		while($list != null){
			$linha = fgets($list);
			if($linha == null) break;

			$dados[] = $linha;

		}

		fclose($list);

		for($i = $pos; $dados[$i] != "Fim do pedido\r\n"; $i++){
			if(preg_match('/^Produto/', $dados[$i])){
				if($str == null){
					$str = $dados[$i+1];
				}else{
					$str = $str.":".$dados[$i+1];
				}

				echo "<br>";
			}
		}

		cardPedido($dados[$pos], $dados[$pos+2], $dados[$pos+3], $dados[$pos+4], $str);

		return 1;
	}

	function cardPedido($pedido, $qtdprod, $valortotal, $totalparc, $str){
		$dados = array();
		$arr = array();
		$dados = explode(':', $str);

		echo "<div class='content col12 jogo'>";

			echo "<div class='coluna col12' style='text-align:center'>";
				echo "<h1>$pedido</h1>";
			echo "</div>";
			echo "<hr></hr>";

			foreach ($dados as $key => $value) {
				$arr = explode(';', $value);
				$valor = 0;

				//Tranformando valores em numericos
				$qtd = floatval ( $arr[1] );
				$x = floatval ($arr[3]);
				$x = $x * $qtd;
				$valor += $x;
				$valor = number_format($valor, 2, ',', '');

				cardHistProd($arr[0], $arr[1], $arr[3], $arr[4], $arr[5], $valor);
			}

			echo "<div class='coluna col4' style='border-right: 1px solid black; margin-left: -20px; height:70px'>";
				echo "<h3><b>$qtdprod</b></h3>";
			echo "</div>";

			echo "<div class='coluna col4' style='border-right: 1px solid black; height:70px; margin-left: 10px'>";
				echo "<h3>$valortotal</h3>";
			echo "</div>";

			echo "<div class='coluna col4' style='margin-left: 10px'>";
				echo "<h3>$totalparc</h3>";
			echo "</div>";

		echo "</div>";

		return 0;
	}

	function cardHistProd($name, $qtd, $price, $cat, $local, $valor){

		echo "<div class='coluna col12' style='height:165px; text-align:center'>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; margin-left:-20px; height:100%; margin-top:-5px; width:150px'>";
				echo "<p><img class='home' src='$local'></p>";
			echo "</div>";

			echo "<div class='coluna col2' style='border-right: 1px solid black;
			height:100%; margin-top:-5px'>";
				echo "<h2><b class='title'>$name</b></h2>";
			echo "</div>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; height:100%; margin-top:-5px'>";
				echo "<h3>$cat</h3>";
			echo "</div>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; height:100%; margin-top:-5px'>";
				echo "<h3>Valor uni.<br>R$ $price</h3>";
			echo "</div>";

			echo "<div class='coluna col2' style='border-right: 1px solid black; height:100%; margin-top:-5px'>";
				echo "<h3>Qtd.: $qtd</h3>";
			echo "</div>";

			echo "<div class='coluna col2' style=''>";
				echo "<h3>Valor final<br>R$ $valor</h3>";
			echo "</div>";

		echo "</div>";

		echo "<hr></hr>";

		return 0;
	}

	function finalizarCompra(){

		$dados = array();
		$valor = 0;
		$itens = -1;

		$nota = md5(rand(1, 999));

		$list = fopen('./docs/notafiscal/'.$nota.'.txt', 'a+');
		if ($list == false) die('ERRO 01.');

		$teste = fgets($list);
		$dados = explode(';', $teste);

		fwrite($list, "--------------------- ShopBuy --------------------\r\n\r\n");
		fwrite($list, "Nota Fiscal Nº $nota\r\n\r\n");
		fwrite($list, "--------------------------------------------------\r\n\r\n");

		$email = $_SESSION['email'];

		$list2 = fopen('./docs/shoplist/'.$email.'.txt', 'r');
		if ($list2 == false) die('ERRO 01.');

		while($list2 != null){
			$itens++;

			$linha = fgets($list2);
			if($linha == null) break;

			$dados = explode(';', $linha);

			//Tranformando valores em numericos
			$qtd = floatval ( $dados[1] );
			$x = floatval ( $dados[3] );
			$x = $x * $qtd;
			$valor += $x;
			$a = number_format($x, 2, ',', '');

			notaFiscal($dados[0], $dados[1], $dados[3], $dados[4], $itens, $a, $nota);
		}

		fclose($list2);
		fwrite($list, "--------------------------------------------------\r\n\r\n");

		fwrite($list, "--- Dados da compra ---\r\n\r\n");
		fwrite($list, "Total de Produtos: ".$_SESSION['totalitens']."\r\n");
		fwrite($list , "Valor total: R$ ".$_SESSION['valorfinal']."\r\n");
		fwrite($list, "Total de Parcelas: ".$_SESSION['nota1']."x de R$ ".$_SESSION['nota2']."\r\n\r\n");
		fwrite($list, "--------------------------------------------------\r\n\r\n");
		fwrite($list, "--- Dados do comprador ---\r\n\r\n");
		fwrite($list, "Nome: ".$_SESSION['nome']."\r\n");
		fwrite($list, "Email: ".$_SESSION['email']."\r\n");
		fwrite($list, "Endereço: ".$_SESSION['ender']."\r\n");
		fwrite($list, "Bairro: ".$_SESSION['bairro']."\r\n");
		fwrite($list, "Cidade: ".$_SESSION['city']."\r\n\r\n");
		date_default_timezone_set('America/Sao_Paulo');
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		fwrite($list, "Compra feita as ".date('H:i:s')."hrs, do dia ".date('d').", de ".date('F').", de ".date('Y')."\r\n\r\n");
		fwrite($list, "--------------------------------------------------");

		fclose($list);

		return 1;

	}

	function notaFiscal($name, $qtd, $price, $cat, $item, $valor, $nota){

		$list = fopen('./docs/notafiscal/'.$nota.'.txt', 'a+');
		if ($list == false) die('ERRO 01.');
		$item += 1;

		fwrite($list, "--- Produto $item ---\r\n");
		fwrite($list, "- Prduto: $name\r\n");
		fwrite($list, "- Categoria: $cat\r\n");
		fwrite($list, "- Valor Unitario: $price\r\n");
		fwrite($list, "- Qtd.: $qtd\r\n");
		fwrite($list, "- Valor final: $valor\r\n\r\n");

		fclose($list);

		return 0;
	}

	function delete(){
		$email = $_SESSION['email'];

		$arqcad = fopen('./docs/shoplist/'.$email.'.txt', 'w');
		if ($arqcad == false) die('ERRO 01.');

		fclose($arqcad);

		shopCar2();

		return 0;
	}
?>