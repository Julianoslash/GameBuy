<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	function testCadProd($name, $cat){

		if($cat == "nintendo"){
			$arqlog = fopen('../docs/produtos/nintendo.txt', 'r');
		}elseif($cat == "playstation"){
			$arqlog = fopen('../docs/produtos/playstation.txt', 'r');
		}elseif($cat == "xbox"){
			$arqlog = fopen('../docs/produtos/xbox.txt', 'r');
		}elseif($cat == "consoles"){
			$arqlog = fopen('../docs/produtos/consoles.txt', 'r');
		}

		$dados = array();

		while(true){

			$logdados = fgets($arqlog);
			if($logdados == null) break;

			$dados = explode(";", $logdados);

			if($dados[1] == $name){
				fclose($arqlog);
				
				return 0;
			}
		}

		fclose($arqlog);

		return 1;

	}

	function cadProd($cat, $name, $desc, $price, $file){

		$cad = array();

		$cad[] = $name.";";
		$cad[] = $desc.";";
		$cad[] = $price.";";
		$cad[] = $cat.";";
		$cad[] = $file."\r\n";

		if($cat == "nintendo"){
			$arqcad = fopen('../docs/produtos/nintendo.txt', 'a+');
		}elseif($cat == "playstation"){
			$arqcad = fopen('../docs/produtos/playstation.txt', 'a+');
		}elseif($cat == "xbox"){
			$arqcad = fopen('../docs/produtos/xbox.txt', 'a+');
		}elseif($cat == "consoles"){
			$arqcad = fopen('../docs/produtos/consoles.txt', 'a+');
		}

		if ($arqcad == false) die('ERRO 01.');

		foreach ($cad as $key => $value) {
			fwrite($arqcad, $value);
		}

		fclose($arqcad);

		return 1;
	}

	function edit($cat, $name, $desc, $price){
		$nameAnt = $_SESSION['prodName'];
		$descAnt = $_SESSION['prodDesc'];
		$priceAnt = $_SESSION['prodPrice'];
		$fileAnt = $_SESSION['prodFile'];
		$catAnt = $_SESSION['prodCat'];

		$var = $name.";".$desc.";".$price.";".$cat.";".$fileAnt;

		if($cat == "nintendo"){
			$arqcad = fopen('../docs/produtos/nintendo.txt', 'r');
		}elseif($cat == "playstation"){
			$arqcad = fopen('../docs/produtos/playstation.txt', 'r');
		}elseif($cat == "xbox"){
			$arqcad = fopen('../docs/produtos/xbox.txt', 'r');
		}elseif($cat == "consoles"){
			$arqcad = fopen('../docs/produtos/consoles.txt', 'r');
		}

		$dados = array();
		$prod = array();
		$i = 0;

		do{
			$cad = fgets($arqcad);
			if($cad == null) break;

			$dados[] = $cad;

		}while($arqcad!=null);

		fclose($arqcad);

		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			$prod = $prod = explode(";", $value);

			if($prod[0] == $nameAnt && $prod[1] == $descAnt && $prod[2] == $priceAnt){

				break;
			}

			$i++;

		}

		if($cat == "nintendo"){
			$arqcad = fopen('../docs/produtos/nintendo.txt', 'w');
		}elseif($cat == "playstation"){
			$arqcad = fopen('../docs/produtos/playstation.txt', 'w');
		}elseif($cat == "xbox"){
			$arqcad = fopen('../docs/produtos/xbox.txt', 'w');
		}elseif($cat == "consoles"){
			$arqcad = fopen('../docs/produtos/consoles.txt', 'w');
		}

		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			if($key == $i){
				fwrite($arqcad, $var);
			}else{
				fwrite($arqcad, $value);
			}
		}

		fclose($arqcad);

		prodDados($name, $desc, $price, $cat, $fileAnt);

		return 1;
	}

	function xbox(){
		$xbox = fopen('../docs/produtos/xbox.txt', 'r');

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
		$ps = fopen('../docs/produtos/playstation.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($ps);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($ps);

		return $prod;
	}

	function nintendo(){
		$ns = fopen('../docs/produtos/nintendo.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($ns);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($ns);

		return $prod;
	}

	function consoles(){
		$co = fopen('../docs/produtos/consoles.txt', 'r');

		$prod = array(array());
		$i = 0;

		while(true){

			$dados = fgets($co);
			if($dados == null) break;
			$prod[$i] = explode(";", $dados);
			$i++;
		}

		fclose($co);

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
					echo "<img class='home' src='../uploads/produtos/$cat/".$file."'>";
				echo "</div>";

				echo "<div class='coluna col12'>";
					echo "<h2><b class='title'>".$nome."</b></h2>";
					echo "<p><b>".$cat."</b></p>";
					echo "<p>R$ ".$valor."</p>";
				echo "</div>";

				echo "<div class='coluna col12 valuecard'>";
					echo "<form action='./adm.php' method='post'>";
						echo "<p><button type='submit' name='btn' value='$produto'>Editar</button>";
					echo "</form></p>";

					echo "<form action='./adm.php' method='post'>";
						echo "<p><button type='submit' name='excluir' value='$produto'>Excluir</button></p>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		echo "</content>";

		return 0;
	}

	function excluir($name, $desc, $price, $cat, $file){

		if($cat == "nintendo"){
			$arqcad = fopen('../docs/produtos/nintendo.txt', 'r');
		}elseif($cat == "playstation"){
			$arqcad = fopen('../docs/produtos/playstation.txt', 'r');
		}elseif($cat == "xbox"){
			$arqcad = fopen('../docs/produtos/xbox.txt', 'r');
		}elseif($cat == "consoles"){
			$arqcad = fopen('../docs/produtos/consoles.txt', 'r');
		}

		$dados = array();
		$prod = array();
		$i = 0;

		do{
			$cad = fgets($arqcad);
			if($cad == null) break;

			$dados[] = $cad;

		}while($arqcad!=null);

		fclose($arqcad);

		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			$prod = $prod = explode(";", $value);

			if($prod[0] == $name && $prod[1] == $desc && $prod[2] == $price && $prod[3] == $cat){

				break;
			}

			$i++;

		}

		unset($dados[$i]);
		$dados = array_values($dados);

		if($cat == "nintendo"){
			$arqcad = fopen('../docs/produtos/nintendo.txt', 'w');
		}elseif($cat == "playstation"){
			$arqcad = fopen('../docs/produtos/playstation.txt', 'w');
		}elseif($cat == "xbox"){
			$arqcad = fopen('../docs/produtos/xbox.txt', 'w');
		}elseif($cat == "consoles"){
			$arqcad = fopen('../docs/produtos/consoles.txt', 'w');
		}

		if ($arqcad == false) die('ERRO 01.');

		foreach ($dados as $key => $value) {
			fwrite($arqcad, $value);
		}

		fclose($arqcad);

		return 1;
	}

?>