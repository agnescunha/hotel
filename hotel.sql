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

INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (101, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (102, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (103, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (104, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (105, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (106, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (107, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (108, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (109, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (110, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (111, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (112, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (113, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (114, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');
INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (115, 'ar condicionado, cama de casal ou solteiro, televisão, guarda-roupa, banheiro completo, e mesa de apoio.', '115,00', 'c');

INSERT INTO quarto (num_quarto, descricao, valor, classe) VALUES (201, '', '170,00', 'c');

CREATE TABLE quarto (
     id         INTEGER PRIMARY KEY AUTO_INCREMENT
    ,num_quarto INTEGER UNIQUE
    ,descricao  VARCHAR(100)
    ,valor      DECIMAL
    ,classe     VARCHAR(1) /*A,B,C*/
)ENGINE=InnoDB;