CREATE TABLE tipoproduto (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE situacao (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  situacao VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE cliente (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  cpf VARCHAR(255) NULL,
  endereco VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  telefonefixo VARCHAR(255) NULL,
  telefonecelular VARCHAR(255) NULL,
  senha VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE usuario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  senha VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  PRIMARY KEY(id)
);

CREATE TABLE produto (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipoproduto_id INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(255) NULL,
  descricao VARCHAR(255) NULL,
  preco DECIMAL(10,2) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(id),
  INDEX produto_FKIndex1(tipoproduto_id),
  FOREIGN KEY(tipoproduto_id)
    REFERENCES tipoproduto(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE pedido (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  situacao_id INTEGER UNSIGNED NOT NULL,
  cliente_id INTEGER UNSIGNED NOT NULL,
  numeropedido BIGINT NULL,
  datacompra DATETIME NULL,
  total DECIMAL(10,2) NULL,
  obs TEXT NULL,
  PRIMARY KEY(id),
  INDEX pedido_FKIndex1(cliente_id),
  INDEX pedido_FKIndex2(situacao_id),
  FOREIGN KEY(cliente_id)
    REFERENCES cliente(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(situacao_id)
    REFERENCES situacao(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE itempedido (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  produto_id INTEGER UNSIGNED NOT NULL,
  pedido_id INTEGER UNSIGNED NOT NULL,
  quantidade INTEGER UNSIGNED NULL,
  valor DECIMAL(10,2) NULL,
  PRIMARY KEY(id),
  INDEX itempedido_FKIndex1(pedido_id),
  INDEX itempedido_FKIndex2(produto_id),
  FOREIGN KEY(pedido_id)
    REFERENCES pedido(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(produto_id)
    REFERENCES produto(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);
