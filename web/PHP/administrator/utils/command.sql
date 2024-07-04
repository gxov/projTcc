DROP TABLE IF EXISTS tb_usuarios;

CREATE TABLE IF NOT EXISTS tb_usuarios (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(100),
	username VARCHAR(32) UNIQUE,
	cpf BIGINT(11),
	dtnasc DATE,
	email VARCHAR(100),
	senha VARCHAR(32),
	ativo BOOLEAN,
	tipo VARCHAR(3),
    foto VARCHAR(100)
);

INSERT INTO tb_usuarios (nome, username, cpf, dtnasc, email, senha, ativo, tipo) VALUES ("Usuario1", "User_1", "12345678911", "2006/01/15", "teste@gmail.com", "12345", true, "ADM");
