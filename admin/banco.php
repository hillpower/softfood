<?php
	include "../php/conexao.php";
	//$link = mysqli_connect("localhost", "root", "root", "softfood");
	
	$query = "select * from usuario";
		
	$result = mysqli_query($link, $query);
	while($row = mysqli_fetch_assoc($result))
	{
		echo "{$row['id']} by {$row['nome']}";
	}	
	mysqli_free_result($result);
	
	mysqli_close($link);
	
	/* 
	CREATE TABLE usuario (
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
		nome VARCHAR(40),
		email VARCHAR(40),
		senha VARCHAR(20) 
	);	
	
	INSERT INTO usuario (nome, email, senha) VALUES
	('Vanessa', 'vanessa@gmail.com', '67890'),
	('Thiago', 'thiago@gmail.com', '13579'),
	('Batata', 'batata@gmail.com', '24680');
	('Batata2', 'batata@gmail.com', '24680');
	*/
	
	/* 
	CREATE TABLE tipoproduto (
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
		tipo VARCHAR(40) 
	);	
	
	INSERT INTO tipoproduto (tipo) VALUES
	('Lanche'),
	('Bebida'),
	('Sobremesa');
	*/
	
	/*
	CREATE TABLE produto (
		id INTEGER AUTO_INCREMENT PRIMARY KEY,
		tipoproduto_id INTEGER,
		nome VARCHAR(40),
		descricao VARCHAR(80),
		preco DECIMAL(10,2) 
	);	
	
	INSERT INTO produto (tipoproduto_id, nome, descricao, preco) VALUES
	(1, 'X-SALADA', 'Pão, carne, alface e tomate', '5'),
	(1, 'X-BACON', 'Pão, bacon, alface e tomate', '7'),
	(1, 'X-EGG', 'Pão, ovo, alface e tomate', '6')
	*/
?>

