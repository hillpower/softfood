<?php 
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "", "softfood");
	
	if ($_GET['uTipo'] == "salvar" && $_GET['uId'] == 0) {
		$nome = $_GET['uNome'];
		$descricao = $_GET['uDescricao'];
		$preco = $_GET['uPreco']	;
	
		$query = "INSERT INTO produto (nome, descricao, preco) VALUES
		('$nome', '$descricao', $preco)";
		
		mysqli_query($link, $query);
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
		
		$query = "UPDATE produto SET nome='$nome', descricao='$descricao', preco=$preco WHERE id = $id";
			
		mysqli_query($link, $query);
		
	}
	
	mysqli_close($link);
	
	//echo $query;
?>