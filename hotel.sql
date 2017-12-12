USE hotel;

CREATE TABLE cliente (
     id                 INTEGER PRIMARY KEY AUTO_INCREMENT
    ,nome               VARCHAR(50) NOT NULL
    ,rg                 VARCHAR(13) UNIQUE NOT NULL
    ,cpf                VARCHAR(15) UNIQUE NOT NULL
    ,endereco           VARCHAR(50) NOT NULL
    ,data_nascimento    DATE NOT NULL
    ,telefone1          VARCHAR(15) NOT NULL
    ,telefone2          VARCHAR(15)
    ,email              VARCHAR(100) UNIQUE NOT NULL
    ,senha              VARCHAR(100) NOT NULL
)ENGINE=InnoDB;

CREATE INDEX idx_CLIENTES_NOME  ON cliente(nome);
CREATE INDEX idx_CLIENTES_EMAIL ON cliente(email);
CREATE INDEX idx_CLIENTES_SENHA ON cliente(senha);

CREATE TABLE funcionario (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,nome       VARCHAR(50) NOT NULL
    ,funcao     VARCHAR(50) NOT NULL
    ,cpf        VARCHAR(15) UNIQUE NOT NULL
    ,rg         VARCHAR(13) UNIQUE NOT NULL
    ,celular    VARCHAR(15) NOT NULL
    ,salario    DECIMAL NOT NULL
    ,admissao   DATE NOT NULL
    ,demissao   DATE
    ,endereco   VARCHAR(100) NOT NULL
    ,login      VARCHAR(100) UNIQUE NOT NULL
    ,senha      VARCHAR(100) NOT NULL
    ,eh_admin   BOOLEAN NOT NULL/*1 PARA ADMIN E 0 PARA FUNCIONARIO COMUM*/
)ENGINE=InnoDB;

CREATE INDEX idx_FUNCIONARIO_NOME   ON funcionario(nome);
CREATE INDEX idx_FUNCIONARIO_LOGIN  ON funcionario(login);
CREATE INDEX idx_FUNCIONARIO_SENHA  ON funcionario(senha);

CREATE TABLE quarto (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL
    ,num_quarto INTEGER UNIQUE NOT NULL
    ,descricao  VARCHAR(100)
    ,valor      DECIMAL NOT NULL
    ,classe     VARCHAR(1) NOT NULL/*A,B,C,D...*/
)ENGINE=InnoDB;

CREATE TABLE servico (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL
    ,descricao  VARCHAR(100)
    ,valor      DECIMAL NOT NULL
)ENGINE=InnoDB;

CREATE TABLE comanda (
     id             INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL
    ,id_cliente     INTEGER NOT NULL
    ,id_funcionario INTEGER NOT NULL
    ,id_servico     INTEGER NOT NULL
    ,id_quarto      INTEGER NOT NULL
    ,quantidade     INTEGER NOT NULL
    ,total          DECIMAL NOT NULL
    ,status_         VARCHAR(20) NOT NULL
    ,FOREIGN KEY (id_cliente)       REFERENCES cliente(id)
    ,FOREIGN KEY (id_funcionario)   REFERENCES funcionario(id)
    ,FOREIGN KEY (id_servico)       REFERENCES servico(id)
    ,FOREIGN KEY (id_quarto)        REFERENCES quarto(id)
)ENGINE=InnoDB;
CREATE INDEX idx_COMANDA_STATUS ON comanda(status_);

CREATE TABLE reserva (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL
    ,id_cliente INTEGER NOT NULL
    ,id_comanda INTEGER UNIQUE NOT NULL
    ,inicio     DATE NOT NULL
    ,saida      DATE
    ,motivo     VARCHAR(100)
    ,status_reserva     VARCHAR(15) NOT NULL
    ,FOREIGN KEY (id_cliente) REFERENCES cliente(id)
    ,FOREIGN KEY (id_comanda) REFERENCES comanda(id)
)ENGINE=InnoDB;

CREATE INDEX idx_RESERVA_INICIO ON reserva(inicio);
CREATE INDEX idx_RESERVA_SAIDA  ON reserva(saida);

INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (101, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (102, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (103, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (104, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (105, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (106, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (107, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (108, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (109, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (110, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (111, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (112, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (113, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (114, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (115, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro, mesa de apoio.', '115.00', 'c');

INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (201, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (202, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (203, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (204, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (205, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (206, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (207, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (208, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (209, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (210, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (211, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (212, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (213, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (214, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (215, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (216, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (217, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (218, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (219, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (220, 'ar condicionado, ventilador, cama de casal Queen, closet, banheiro, poltrona, televisão, wifi', '170.00', 'b');

INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (301, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (302, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (303, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (304, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (305, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (306, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (307, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (308, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (309, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (310, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (311, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (312, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (313, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (314, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (315, 'ar condicionado, cama de casal Queen ou King, closet duplo, banheiro, hidromassagem, etc', '300.00', 'a');

INSERT INTO servico (descricao, valor) VALUES ('Aluguel do salão', '500.00');
INSERT INTO servico (descricao, valor) VALUES ('Piscinas - por pessoa', '50.00');
INSERT INTO servico (descricao, valor) VALUES ('Academia - diária', '10.00');
INSERT INTO servico (descricao, valor) VALUES ('Academia - mensal', '200.00');
INSERT INTO servico (descricao, valor) VALUES ('Sala de Jogos', '10.00');
INSERT INTO servico (descricao, valor) VALUES ('refeições (cada) - diária', '30.00');
INSERT INTO servico (descricao, valor) VALUES ('Estacionamento - diária', '10.00');
INSERT INTO servico (descricao, valor) VALUES ('Estacionamento - mensal', '100.00');

INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('root', 'admin', '000.000.000-00', '00000000-00', '(51)99000-0000', '3000.00', '2016/12/21', 'Rua 1 - Osório/RS', 'root', 'root', 1);


ALTER TABLE cliente ADD sexo VARCHAR(1) NOT NULL;