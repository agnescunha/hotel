create database hotel;

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
    ,id_servico     INTEGER 
    ,id_quarto      INTEGER NOT NULL
    ,quantidade     INTEGER NOT NULL
    ,total          DECIMAL NOT NULL
    ,status_        VARCHAR(20) NOT NULL
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

ALTER TABLE cliente ADD sexo VARCHAR(1) NOT NULL;

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

INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Agnes Cunha Marques', '9876543217', '012.345.678-89', 'Rua A nº 2', '1992-11-20', '(51)99999-9999', '(51)88888-8888', 'agnescunha20@gmail.com', '123456', 'F');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Adriana Machado', '2456859574', '321.654.987-84', 'Rua 9, n. 50 - Osório', '1985/10/11', '(51)99548-6251', '(51)99548-6251', 'adriana@gmail.com', '123456', 'F');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Adriano Azevedo', '2456859575', '221.654.987-84', 'Rua 10, n. 50 - Osório', '1985/10/10', '(51)99548-6252', '(51)99548-6252', 'adriano@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Rafael Cardoso', '2456859576', '121.654.987-84', 'Rua 8, n. 50 - Osório', '1985/10/12', '(51)99548-6253', '(51)99548-6253', 'rafael@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Carlos Adri', '2456859577', '421.654.987-84', 'Rua 7, n. 50 - Osório', '1985/10/13', '(51)99548-6254', '(51)99548-6254', 'carlos@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Eduardo Inglês', '2456859578', '521.654.987-84', 'Rua 6, n. 50 - Osório', '1985/10/14', '(51)99548-6255', '(51)99548-6255', 'eduardo@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Márcia Reck', '2456859579', '621.654.987-84', 'Rua 5, n. 50 - Osório', '1985/10/15', '(51)99548-6256', '(51)99548-6256', 'marcia@gmail.com', '123456', 'F');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Carla Miguel', '2456859573', '721.654.987-84', 'Rua 4, n. 50 - Osório', '1985/10/16', '(51)99548-6257', '(51)99548-6257', 'carla@gmail.com', '123456', 'F');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Carol Ferri', '2456859572', '821.654.987-84', 'Rua 3, n. 50 - Osório', '1985/10/17', '(51)99548-6258', '(51)99548-6258', 'carol@gmail.com', '123456', 'F');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Tiago Jesus', '2456859571', '921.654.987-84', 'Rua 2, n. 50 - Osório', '1985/10/18', '(51)99548-6259', '(51)99548-6259', 'tiago@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('André Pedry', '2456859570', '101.654.987-84', 'Rua 1, n. 50 - Osório', '1985/10/19', '(51)99548-6260', '(51)99548-6260', 'andre@gmail.com', '123456', 'M');
INSERT INTO cliente (nome, rg, cpf, endereco, data_nascimento, telefone1, telefone2, email, senha, sexo) VALUES ('Fernando Rossi', '2456859580', '111.654.987-84', 'Rua 11, n. 50 - Osório', '1985/10/20', '(51)99548-6261', '(51)99548-6261', 'fernando@gmail.com', '123456', 'M');

INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('root', 'admin', '000.000.000-00', '00000000-00', '(51)99000-0000', '3000.00', '2016/12/21', 'Rua 1 - Osório/RS', 'root', 'root', 1);
INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('Carolina Rossi', 'Recepção', '321.456.987-81', '9874561237-70', '(51)99000-0001', '1000.00', '2016/10/21', 'Rua 2 - Osório/RS', 'CarolinaRossi', '123456', 0);
INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('Andreia Soares', 'Recepção', '321.456.987-82', '9874561237-71', '(51)99000-0002', '1000.00', '2016/09/21', 'Rua 3 - Osório/RS', 'AndreiaSoares', '123456', 0);
INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('Carlos Rum', 'Administrativo', '321.456.987-83', '9874561237-72', '(51)99000-0003', '1000.00', '2016/08/21', 'Rua 4 - Osório/RS', 'CarlosRum', '123456', 0);
INSERT INTO funcionario (nome, funcao, cpf, rg, celular, salario, admissao, endereco, login, senha, eh_admin) VALUES ('Fernando Paz', 'admin', '321.456.987-84', '9874561237-73', '(51)99000-0004', '3000.00', '2015/12/21', 'Rua 5 - Osório/RS', 'FernandoPaz', '123456', 1);

INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (1, 2, 1, 2, 1, '500.00', 'Pago');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (2, 3, 1, 1, 3, '150.00', 'Pago');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (5, 2, 3, 3, 5, '50.00', 'Pago');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (11, 3, 4, 4, 1, '200.00', 'Pago');

INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (11, 2, 1, 2, 1, '500.00', 'Pendente');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (12, 3, 1, 1, 3, '150.00', 'Pendente');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (13, 2, 3, 3, 5, '50.00', 'Pendente');
INSERT INTO comanda (id_cliente, id_funcionario, id_servico, id_quarto, quantidade, total, status_) VALUES (14, 3, 4, 4, 1, '200.00', 'Pendente');

INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (1, 1, '2017/03/10', '2017/03/15', 'férias', 'Concluída');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (2, 2, '2017/01/10', '2017/02/10', '', 'Concluída');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (5, 9, '2017/03/10', '2017/03/15', 'férias', 'Concluída');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (11, 10, '2017/01/10', '2017/02/15', '', 'Concluída');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (11, 11, '2017/12/10', '2017/12/20', '', 'Aprovada');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (12, 12, '2017/12/12', '2017/12/27', '', 'Aprovada');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (13, 13, '2017/12/25', '2018/01/05', '', 'Solicitada');
INSERT INTO reserva (id_cliente, id_comanda, inicio, saida, motivo, status_reserva) VALUES (14, 14, '2017/12/20', '2018/01/02', '', 'Solicitada');
