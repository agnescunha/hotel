USE hotel;

CREATE TABLE cliente (
     id                 INTEGER PRIMARY KEY AUTO_INCREMENT
    ,nome               VARCHAR(50)
    ,rg                 VARCHAR(12) UNIQUE
    ,cpf                VARCHAR(12) UNIQUE
    ,endereco           VARCHAR(50)
    ,data_nascimento    DATE
    ,telefone1          VARCHAR(12)
    ,telefone2          VARCHAR(12)
    ,email              VARCHAR(100) UNIQUE
    ,senha              VARCHAR(100)
)ENGINE=InnoDB;

CREATE INDEX idx_CLIENTES_NOME  ON cliente(nome);
CREATE INDEX idx_CLIENTES_EMAIL ON cliente(email);
CREATE INDEX idx_CLIENTES_SENHA ON cliente(senha);

CREATE TABLE funcionario (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,nome       VARCHAR(50)
    ,funcao     VARCHAR(10)
    ,cpf        VARCHAR(12) UNIQUE
    ,rg         VARCHAR(12) UNIQUE
    ,celular    VARCHAR(12)
    ,salario    DECIMAL
    ,admissao   DATE
    ,demissao   DATE
    ,endereco   VARCHAR(100)
    ,login      VARCHAR(100) UNIQUE
    ,senha      VARCHAR(100) 
    ,eh_admin   BOOLEAN /*1 PARA ADMIN E 0 PARA FUNCIONARIO COMUM*/
)ENGINE=InnoDB;

CREATE INDEX idx_FUNCIONARIO_NOME   ON funcionario(nome);
CREATE INDEX idx_FUNCIONARIO_LOGIN  ON funcionario(login);
CREATE INDEX idx_FUNCIONARIO_SENHA  ON funcionario(senha);

CREATE TABLE quarto (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,num_quarto INTEGER UNIQUE
    ,descricao  VARCHAR(100)
    ,valor      DECIMAL
    ,classe     VARCHAR(1) /*A,B,C,D...*/
)ENGINE=InnoDB;

CREATE TABLE servico (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,descricao  VARCHAR(100)
    ,valor      DECIMAL
)ENGINE=InnoDB;

CREATE TABLE comanda (
     id             INTEGER PRIMARY KEY AUTO_INCREMENT
    ,id_cliente     INTEGER
    ,id_funcionario INTEGER
    ,id_servico     INTEGER
    ,id_quarto      INTEGER
    ,quantidade     INTEGER
    ,total          DECIMAL
    ,status         VARCHAR(20)
    ,FOREIGN KEY (id_cliente)       REFERENCES cliente(id)
    ,FOREIGN KEY (id_funcionario)   REFERENCES funcionario(id)
    ,FOREIGN KEY (id_servico)       REFERENCES servico(id)
    ,FOREIGN KEY (id_quarto)        REFERENCES quarto(id)
)ENGINE=InnoDB;

CREATE INDEX idx_COMANDA_STATUS ON comanda(status);

CREATE TABLE reserva (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,id_cliente INTEGER
    ,id_comanda INTEGER UNIQUE
    ,inicio     DATE
    ,saida      DATE
    ,motivo     VARCHAR(100)
    ,status     VARCHAR(15)
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
