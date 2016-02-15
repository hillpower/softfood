INSERT INTO tipoproduto (tipo) VALUES
	('Lanche'),
	('Bebida'),
	('Sobremesa');
	
INSERT INTO produto (tipoproduto_id, nome, descricao, preco) VALUES
	(1, 'X-SALADA', 'Pão, carne, alface e tomate', '5'),
	(1, 'X-BACON', 'Pão, bacon, alface e tomate', '7'),
	(1, 'X-EGG', 'Pão, ovo, alface e tomate', '6');
	
INSERT INTO situacao (situacao) VALUES
	('Aberto'),
	('Preparando'),
	('Trânsito'),
	('Finalizado'),
	('Cancelado');