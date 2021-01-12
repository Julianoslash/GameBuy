<?php
	if(!isset($_SESSION)){
		session_start();
	}

	function categoria($result){
		echo "
			<p>Categoria:</p>
			<select name='prodCat' required>
			<option></option>
		";
		foreach ($result as $key => $value) {
			$id = $value['idCategoria'];
			$valor = $value['Categoria'];
			echo "
				<option value='$id'>{$valor}</option>
			";
		}
		echo "</select>";
	}

	function marca($result){
		echo "
			<p>Marca:</p>
			<select name='prodMarc' required>
			<option></option>
		";
		foreach ($result as $key => $value) {
			$id = $value['idMarca'];
			$valor = $value['Marca'];
			echo "
				<option value='$id'>{$valor}</option>
			";
		}
		echo "</select>";
	}

	function categoriaProd($result, $cat){
		foreach ($result as $key => $value) {
			$id = $value['idProdutos'];
			$nome = $value['Nome'];
			$desc = $value['Descricao'];
			$preco = $value['Preco'];
			$foto = $value['Foto'];
			$condicao = $value['Condicao'];
			$cat = $value['Cat'];
			$marc = $value['Marc'];

			cards2($nome, $desc, $preco, $cat, $foto, $id, $marc);
		}
	}

	function cards2($nome, $desc, $valor, $cat, $file, $id, $marc){
		echo "<content class='coluna col3'>";
			echo "<div class='content jogo'>";
				echo "<div class='coluna col12'>";
					echo "<img class='home' src='../uploads/produtos/$file'>";
				echo "</div>";

				echo "<div class='coluna col12'>";
					echo "<h2><b class='title'>".$nome."</b></h2>";
					echo "<p><b>".$cat."</b></p>";
					echo "<p><b>".$marc."</b></p>";
					echo "<p><b>".$desc."</b></p>";
					echo "<p>R$ ".$valor."</p>";
				echo "</div>";

				echo "<div class='coluna col12 valuecard'>";
					echo "<form action='./adm.php' method='post'>";
						echo "<p><button type='submit' name='editar' value='$id'>Editar</button>";
					echo "</form></p>";

					echo "<form action='./adm.php' method='post'>";
						echo "<p><button type='submit' name='excluir' value='$id'>Excluir</button></p>";
					echo "</form>";
				echo "</div>";
			echo "</div>";
		echo "</content>";
	}

	function destroy(){
		session_destroy();
	}

	function prodDados($name, $desc, $price, $cat, $file){

		$_SESSION['prodNome'] = $name;
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