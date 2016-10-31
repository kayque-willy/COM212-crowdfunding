CREATE TABLE criterio (
                id INT AUTO_INCREMENT NOT NULL,
                criterio VARCHAR(1000) NOT NULL,
                status BOOLEAN NOT NULL,
                peso INT NOT NULL,
                categoriaProjeto VARCHAR(255) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE avaliacao (
                id INT AUTO_INCREMENT NOT NULL,
                codAvaliador INT NOT NULL,
                codProjeto INT NOT NULL,
                nomeAvaliador VARCHAR NOT NULL,
                data DATE NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE nota (
                id_criterio INT NOT NULL,
                id_avalicao INT NOT NULL,
                notas INT NOT NULL,
                sugestoes VARCHAR(1000) NOT NULL,
                PRIMARY KEY (id_criterio, id_avalicao)
);


ALTER TABLE nota ADD CONSTRAINT criterios_notas_fk
FOREIGN KEY (id_criterio)
REFERENCES criterio (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE nota ADD CONSTRAINT avaliacao_notas_fk
FOREIGN KEY (id_avalicao)
REFERENCES avaliacao (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;