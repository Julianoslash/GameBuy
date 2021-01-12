<?php
	include('../conexao.php');
	$query1 = "select * from categoria";
	$result1 = mysqli_query($conexao, $query1);

	$query2 = "select * from marca";
	$result2 = mysqli_query($conexao, $query2);

	echo "
		<select name='prodCat' required>
		<option></option>
	";
	foreach ($result1 as $key => $value) {
		$id = $value['idCategoria'];
		$valor = $value['Categoria'];
		echo "
			<option value='$id'>{$valor}</option>
		";
	}
	echo "<input type='submit' name='enviar'>";
	echo "</select>";

	echo "
		<select name='prodMarc' required>
		<option></option>
	";

	foreach ($result2 as $key => $value) {
		$id = $value['idMarca'];
		$valor = $value['Marca'];
		echo "
			<option value='$id'>{$valor}</option>
		";
	}
	echo "<input type='submit' name='enviar'>";
	echo "</select>";
?>