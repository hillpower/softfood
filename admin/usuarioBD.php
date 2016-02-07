<?php 
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "", "softfood");
	
	if ($_GET['uTipo'] == "salvar" && $_GET['uId'] == 0) {
		$nome = $_GET['uNome'];
		$email = $_GET['uEmail'];
		$senha = md5($_GET['uSenha']);
	
		$query = "INSERT INTO usuario (nome, email, senha) VALUES
		('$nome', '$email', '$senha')";
		
		mysqli_query($link, $query);
	}
	else if ($_GET['uTipo'] == "remover") {
		$id = $_GET['uId'];
		
		$query = "DELETE FROM usuario WHERE id = $id";
		
		mysqli_query($link, $query);
	}
	else {
		$id = $_GET['uId'];
		$nome = $_GET['uNome'];
		$email = $_GET['uEmail'];
		$senha = md5($_GET['uSenha']);
		
		$query = "UPDATE usuario SET nome='$nome', email='$email', senha='$senha' WHERE id = $id";
			
		mysqli_query($link, $query);
		
	}
	
	mysqli_close($link);
	
	//echo $query;
?>