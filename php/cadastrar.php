<?php
	include "conexao.php";
	session_start();
	
	if($_GET["tipo"] == 1){
		$email = $_POST["inputEmail2"];
		$senha = $_POST["inputPassword2"];
		
		$query = "select * from cliente where email='$email' and senha='$senha'";
		
		//error_log($query);
		
		$result = mysqli_query($link, $query);
		
		if(mysqli_num_rows($result)>0) {
			$row    = mysqli_fetch_assoc($result);
		
			$_SESSION['usuarioid'] = $row['id'];
			$_SESSION['usuario'] = $row['nome'];
		}
		else {
			$_SESSION['usuarioid'] = 0;
		}
		
	}
	else {
		$nome = $_POST["inputNome3"];
		$email = $_POST["inputEmail3"];
		$senha = $_POST["inputPassword3"];
		$end = $_POST["inputEnd3"];
		$tel = $_POST["inputTel3"];
		
		$queryins = "INSERT INTO cliente (nome,email,senha,endereco,telefonecelular) VALUES ('$nome','$email','$senha','$end','$tel')";
		mysqli_query($link, $queryins);
		$cliente_id = mysqli_insert_id($link);
		
		$_SESSION['usuarioid'] = $cliente_id;
		$_SESSION['usuario'] = $nome;
	}
	
	$redirect = "delivery.php";
	header("location:$redirect");
?>
