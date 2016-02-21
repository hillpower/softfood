<?php 
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "", "softfood");
	
	if ($_GET['uTipo'] == "salvar" && $_GET['uId'] == 0) {
		$nome = $_GET['uNome'];
		$descricao = $_GET['uDescricao'];
		$preco = $_GET['uPreco'];
		$tipoproduto = $_GET['uTipoProduto'];
		
		$preco = str_replace(".", "", $preco);
		$preco = str_replace(",", ".", $preco);
		
		$query = "INSERT INTO produto (tipoproduto_id, nome, descricao, preco) VALUES
		($tipoproduto, '$nome', '$descricao', $preco)";
		
		mysqli_query($link, $query);
		$produto_id = mysqli_insert_id($link);
		echo $produto_id;
	}
	else if ($_GET['uTipo'] == "remover") {
		$id = $_GET['uId'];
		
		$query = "DELETE FROM produto WHERE id = $id";
		
		mysqli_query($link, $query);
	}
	else {
		$id = $_GET['uId'];
		$nome = $_GET['uNome'];
		$descricao = $_GET['uDescricao'];
		$preco =($_GET['uPreco']);
		$tipoproduto = $_GET['uTipoProduto'];
		
		$preco = str_replace(".", "", $preco);
		$preco = str_replace(",", ".", $preco);
		
		$query = "UPDATE produto SET tipoproduto_id=$tipoproduto, nome='$nome', descricao='$descricao', preco=$preco WHERE id = $id";
		
		mysqli_query($link, $query);
		echo $id;	
	}
	
	mysqli_close($link);
	
	//error_log($query);
?>