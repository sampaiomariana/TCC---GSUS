INSERT INTO postodesaude(id_posto, email, identificacao,estado, cidade, horario_funcionamento, endereco, cep, numero, UF) 
VALUES (1, 'posto1@posto1.com','posto1','estado1','cidade1','horario1','endereco1','cep1','numero1','UF1'),
       (2, 'posto2@posto2.com','posto2','estado2','cidade2','horario2','endereco2','cep2','numero2','UF2');


INSERT INTO telefone_postodesaude(id_telefone, telefone, id_posto)
VALUES (1, '999000111', 1),
       (2, '886699552', 2);

INSERT INTO exame_postodesaude(id_exame, id_posto, exame)
VALUES (1, 1, 'exame1'),
       (2, 2, 'exame2');

INSERT INTO medicamento(id_posto, id_medicamento, nome, classificacao_medicamento, informacoes, preco)
VALUES (1, 1, 'medicamento1', 'classificacao1', 'informacoes1', '55,90'),
       (2, 2, 'medicamento2', 'classificacao2', 'informacoes2', '88,90'),
       (1, 3, 'medicamento3', 'classificacao3', 'informacoes3', '99,90'),
       (2, 4, 'medicamento4', 'classificacao4', 'informacoes4', '100,90'),
       (1, 5, 'medicamento5', 'classificacao5', 'informacoes5', '200,90'),
       (2, 6, 'medicamento6', 'classificacao6', 'informacoes6', '300,90'),
         (1, 7, 'medicamento7', 'classificacao7', 'informacoes7', '400,90'),
         (2, 8, 'medicamento8', 'classificacao8', 'informacoes8', '500,90'),
         (1, 9, 'medicamento9', 'classificacao9', 'informacoes9', '600,90'),
         (2, 10, 'medicamento10', 'classificacao10', 'informacoes10', '700,90');


INSERT INTO gestor(id, nome, email, telefone, data_nascimento, data_cadastro, id_posto,senha)
VALUES (1, 'gestor1', 'gestor1@gsus.com', '999000111', '1990-01-01', '2020-01-01', 1),
       (2, 'gestor2', 'gestor2@gsus.com', '886699552', '1990-01-01', '2020-01-01', 2);
