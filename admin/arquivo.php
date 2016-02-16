<?php 
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "", "softfood");
	
	$id = $_POST["uId"];
	$foto = $_FILES["arquivo"];
	
	if (!empty($foto["name"])) {
		// Pega extensão da imagem
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

		// Gera um nome único para a imagem
		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

		// Caminho de onde ficará a imagem
		$caminho_imagem = "fotos/" . $nome_imagem;

		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
		$query = "UPDATE produto SET imagem='$nome_imagem' WHERE id = $id";
		mysqli_query($link, $query);
	}
	else {
		$nome_imagem = "semfoto.jpg";
		if($_POST["uImg"] == 0) {
			$query = "UPDATE produto SET imagem='$nome_imagem' WHERE id = $id";
			mysqli_query($link, $query);
		}
	}
	
	//error_log($query);	
	$redirect = "cardapioAdm.php";
	header("location:$redirect");
?>