/* logico_0612: */
DROP DATABASE IF EXISTS db_comlib;
CREATE DATABASE IF NOT EXISTS db_comlib;

CREATE TABLE IF NOT EXISTS tb_usuarios (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(100),
	username VARCHAR(32) UNIQUE,
	cpf BIGINT(11) ZEROFILL,
	dtcriacao DATE,
	dtnasc DATE,
	email VARCHAR(100),
	senha VARCHAR(32),
	ativo BOOLEAN DEFAULT true,
	tipo VARCHAR(3) CHECK (tipo IN ('USR', 'VER', 'ADM' )),
	imagem VARCHAR(100),
	descricao VARCHAR(700),
	token_recuperacao VARCHAR(255),
	token_expires INTEGER(11)
);

CREATE TABLE IF NOT EXISTS tb_livros (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(90),	
	descricao VARCHAR(1000),
	ativo BOOLEAN DEFAULT true,
	imagem VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS tb_categorias(
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(60),
	ativo BOOLEAN DEFAULT true
);

CREATE TABLE IF NOT EXISTS tb_forumcategorias(
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(60) NOT NULL,
	ativo BOOLEAN DEFAULT true
);

CREATE TABLE IF NOT EXISTS tb_foruns (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
   	ativo BOOLEAN DEFAULT true,
	dtinicio DATE,
   	nome VARCHAR(50),
	descricao VARCHAR(1000)
);

CREATE TABLE IF NOT EXISTS tb_autores (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(120),
  	dtnasc DATE,
descricao VARCHAR(1000),
imagem VARCHAR(130),
ativo BOOLEAN DEFAULT true
);


CREATE TABLE tb_bibliotecas (
    cod INTEGER PRIMARY KEY AUTO_INCREMENT,
ativo BOOLEAN DEFAULT true,
descricao VARCHAR(500),
    nome VARCHAR(60),
    codusuario INTEGER,
CONSTRAINT fk_codusuario FOREIGN KEY(codusuario) REFERENCES tb_usuarios(cod) 
);

CREATE TABLE IF NOT EXISTS tb_livros_usuarios (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
    codlivro INTEGER,
    codusuario INTEGER,
	CONSTRAINT fk_codlivro_pub FOREIGN KEY(codlivro) REFERENCES tb_livros(cod),
	CONSTRAINT fk_codpublicador FOREIGN KEY(codusuario) REFERENCES tb_usuarios(cod)
);

CREATE TABLE IF NOT EXISTS tb_livros_autores (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
    codlivro INTEGER,
    codautor INTEGER,
	CONSTRAINT fk_codlivro FOREIGN KEY(codlivro) REFERENCES tb_livros(cod),
	CONSTRAINT fk_codautor FOREIGN KEY(codautor) REFERENCES tb_autores(cod)
);

CREATE TABLE IF NOT EXISTS tb_categorias_livros(
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
codcategoria INTEGER,
   	codlivro INTEGER,
	CONSTRAINT fk_codlivro_cat FOREIGN KEY(codlivro) REFERENCES tb_livros(cod),
	CONSTRAINT fk_codcategoria_liv FOREIGN KEY(codcategoria) REFERENCES tb_categorias(cod)
);

CREATE TABLE IF NOT EXISTS tb_livros_bibliotecas (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	codbiblioteca INTEGER,
	codlivro INTEGER,
CONSTRAINT fk_codbiblioteca_liv FOREIGN KEY(codbiblioteca) REFERENCES tb_bibliotecas(cod),
CONSTRAINT fk_codlivro_bib FOREIGN KEY(codlivro) REFERENCES tb_livros(cod)
);

CREATE TABLE IF NOT EXISTS tb_comentarios (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
conteudo VARCHAR(700),
dtpostagem DATE,
   	codforum INTEGER,
   	codusuario INTEGER,
	CONSTRAINT fk_codcomentador FOREIGN KEY(codusuario) REFERENCES tb_usuarios(cod),
	CONSTRAINT fk_codforum_com FOREIGN KEY(codforum) REFERENCES tb_foruns(cod)
);

CREATE TABLE IF NOT EXISTS tb_avaliacoes (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
	nota FLOAT(3, 1),
descricao VARCHAR(1000),
   	codlivro INTEGER,
   	codusuario INTEGER,
	CONSTRAINT fk_codavaliador FOREIGN KEY(codusuario) REFERENCES tb_usuarios(cod),
	CONSTRAINT fk_codlivro_ava FOREIGN KEY(codlivro) REFERENCES tb_livros(cod)
);

CREATE TABLE IF NOT EXISTS tb_foruns_categorias (
	cod INTEGER PRIMARY KEY AUTO_INCREMENT,
   	codforum INTEGER,
   	codcategoria INTEGER,
	CONSTRAINT fk_codcategoria_for FOREIGN KEY(codcategoria) REFERENCES tb_usuarios(cod),
	CONSTRAINT fk_codforum_cat FOREIGN KEY(codforum) REFERENCES tb_foruns(cod)
);







/* obs: a senha para todos é 12345. */
INSERT INTO tb_usuarios (nome, username, cpf, dtnasc, email, senha, ativo, tipo, imagem) VALUES ('Usuario1', 'User_1', 11122233344, '2001/01/23', 'teste1@gmail.com' , MD5('12345'), true, 'ADM', '01.png');
INSERT INTO tb_usuarios (nome, username, cpf, dtnasc, email, senha, ativo, tipo, imagem) VALUES ('Usuario2', 'User_2', 55566677788, '2004/10/12', 'teste2@gmail.com', MD5('12345'), true, 'VER', '02.png');
INSERT INTO tb_usuarios (nome, username, cpf, dtnasc, email, senha, ativo, tipo, imagem) VALUES ('Usuario3', 'User_3', 99900011122, '2000/11/12', 'teste3@gmail.com', MD5('12345'), true, 'USR', '03.png');


INSERT INTO tb_livros (nome, ativo, descricao, imagem) VALUES ("O Mundo Como Idéia", true, 'Coletânea de poemas concebidos pelo autor durante 40 anos (1959-1999), dividido em três
capítulos: \n
"Lição de Modelagem": Poemas compostos de diversas formas, bem como a terça-rima, reproduzidos
tanto em inglês, francês e português. \n
"Lição de trevas": Mantendo a mesma estruturação de poemas, faz passeios entre outras línguas
como italiano e espanhol, sem força estética porém grande capacidade de manejo instrumental
poético. \n
"A Imitação de Música": Coleção de 101 sonetos que conclui o livro. \n
Essa coletânea percorre toda a tradição artística ocidental posterior ao século XV, poeticamente
dramatizando temas como a razão com poesia erudita.', "1.jpg");

INSERT INTO tb_livros (nome, ativo, descricao, imagem) VALUES ("Moby Dick, ou A Baleia", true, "A narrativa épica segue a jornada do Capitão Ahab, obcecado em caçar a gigantesca baleia branca, Moby Dick, que lhe causou uma terrível mutilação. Narrado por Ishmael, um marinheiro a bordo do navio baleeiro Pequod, o romance explora temas como a vingança, a luta contra a natureza e a busca pelo sentido da vida.\n Com uma prosa rica e detalhada, Melville oferece uma profunda reflexão sobre a condição humana e os limites da obsessão. Uma leitura indispensável para os amantes de aventuras marítimas e clássicos literários.", "2.jpg");

INSERT INTO tb_livros (nome, ativo, descricao, imagem) VALUES ("The Stranger", true, "“O Estrangeiro” de Albert Camus é uma obra-prima do existencialismo, publicada em 1942.\n A história segue Meursault, um homem indiferente e apático que vive na Argélia colonial. Após a morte de sua mãe, ele comete um crime aparentemente sem motivo e enfrenta um julgamento que questiona sua moralidade e humanidade.\n Camus explora temas profundos como a absurda condição humana, a alienação e a busca por sentido em um mundo indiferente. Este romance impactante desafia os leitores a refletirem sobre a natureza da existência e a liberdade individual. Uma leitura essencial para os amantes da literatura filosófica.", "3.jpg");

INSERT INTO tb_livros (nome, ativo, descricao, imagem) VALUES ("Demian", true, "Aos olhos de Sinclair, o mundo acontece de um modo revelador e epicurista. O desesperado anseio pelo alcance do hedonismo em seguida, do amor e do autoconhecimento sereno e maduro percorre linhas tênues e difusas.\n Obra que apresenta tensões sobre o sentido da vida e da humanidade existir, crises existenciais profundas de uma pessoa que viveu de perto a Primeira Guerra Mundial, que aparecem de forma tocante na obra, pode-se dizer que Demian demonstra como um autor de uma obra literária pode ser influenciado pelo seu tempo, com uma história que mescla influências de Nietzsche e da psicologia analítica de Carl Jung, com quem o autor Hesse fazia terapia.", "4.jpg");

INSERT INTO tb_autores(nome, descricao, imagem) VALUES ('Bruno Tolentino', 'autor1', '1.png');


INSERT INTO tb_autores(nome, descricao, imagem) VALUES ('Herman Melville', 'autor2', '2.png');


INSERT INTO tb_autores(nome, descricao, imagem) VALUES ('Albert Camus', 'autor3', '3.png');


INSERT INTO tb_autores(nome, descricao, imagem) VALUES ('Hermann Hesse', 'Hermann Karl Hesse (Calw, 2 de julho de 1877 — Montagnola, 9 de agosto de 1962) foi um escritor e pintor alemão, que em 1946, recebeu o Prêmio Goethe \n Nascido em uma família muito religiosa, filho de pais missionários protestantes (pietistas, como é típico da Suábia) que pregaram o cristianismo na Índia. Estudou no seminário de Maulbron em 1891, mas não seguiu a carreira de pastor, como era a vontade de seus pais. Embora fosse um estudante modelo, ele foi incapaz de se adaptar e saiu menos de um ano depois. \n Tendo recusado a religião cristã, ainda adolescente, rompeu com a família e emigrou para a Suíça, em 1912, trabalhando como livreiro e operário. Acumula, então, uma sólida cultura autodidata e resolve dedicar-se à literatura.', '4.png');

INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (1, 1);
INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (2, 2);
INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (3, 3);
INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (4, 4);

INSERT INTO tb_foruns(dtinicio, nome, descricao) VALUES ('2012-10-10', 'Fórum 1', 'primeiro forum');
INSERT INTO tb_foruns(dtinicio, nome, descricao) VALUES ('2012-11-11', 'Fórum 2', 'segundo forum');
INSERT INTO tb_foruns(dtinicio, nome, descricao) VALUES ('2012-12-12', 'Fórum 3', 'terceiro forum'); 

INSERT INTO tb_categorias(nome, ativo) VALUES ('Filosófico', true);
INSERT INTO tb_categorias(nome, ativo) VALUES ('Literatura Francesa', true);
INSERT INTO tb_categorias(nome, ativo) VALUES ('Existencialismo', true);
INSERT INTO tb_categorias(nome, ativo) VALUES ('Século XX', true);

INSERT INTO tb_categorias_livros(codcategoria, codlivro) VALUES (1, 3);
INSERT INTO tb_categorias_livros(codcategoria, codlivro) VALUES (2, 3);
INSERT INTO tb_categorias_livros(codcategoria, codlivro) VALUES (3, 3);
INSERT INTO tb_categorias_livros(codcategoria, codlivro) VALUES (4, 3);

INSERT INTO tb_bibliotecas(nome, codusuario) VALUES ('teste', 1)





