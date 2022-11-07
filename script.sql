CREATE TABLE usuarios (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    cpf varchar(15),
    email varchar(255),
    senha varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    PRIMARY KEY (id)
    
    UNIQUE KEY 'email' ('email'),
	UNIQUE KEY 'cpf' ('cpf')
);


INSERT INTO usuarios(nome, cpf, email, senha) VALUES ("Igor", "01234567890", "igor@gmail.com", "teste123");
INSERT INTO usuarios(nome, cpf, email, senha) VALUES ("Bruce", "00234567899", "bruce@gmail.com", "teste1234");




CREATE TABLE produtos (
	id int NOT NULL AUTO_INCREMENT,
    nome varchar(255),
    preco decimal(8,2),
    
    PRIMARY KEY (id)
);

INSERT INTO produtos(nome, preco) VALUES ("notebook", "4000"); 
INSERT INTO produtos(nome, preco) VALUES ("livro php", "50"); 
INSERT INTO produtos(nome, preco) VALUES ("Monitor Oled", "1570");




CREATE TABLE produtos_usuarios (
	id int NOT NULL AUTO_INCREMENT,
	id_produto int NOT NULL,
	id_usuario int NOT NULL,
	
	PRIMARY KEY (id),
	KEY `FK_produtos_usuarios_produto` (`id_produto`),
	KEY `FK_produtos_usuarios_usuario` (`id_usuario`),
	
	CONSTRAINT 'FK_produtos_usuarios_produto' FOREIGN KEY (id_produto) REFERENCES produtos(id) on delete cascade, 
	CONSTRAINT 'FK_produtos_usuarios_usuario' FOREIGN KEY (id_usuario) REFERENCES usuarios(id) on delete cascade 
);

INSERT INTO produtos_usuarios(id_produto, id_usuario) VALUES (1, 1);
INSERT INTO produtos_usuarios(id_produto, id_usuario) VALUES (2, 1);
INSERT INTO produtos_usuarios(id_produto, id_usuario) VALUES (3, 2);
INSERT INTO produtos_usuarios(id_produto, id_usuario) VALUES (1, 2);

