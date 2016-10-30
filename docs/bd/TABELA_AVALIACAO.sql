
CREATE TABLE Notas (
                criterios VARCHAR(255) NOT NULL,
                notas INTEGER NOT NULL,
                sugestoes VARCHAR(1000) NOT NULL,
                CONSTRAINT criterios PRIMARY KEY (criterios)
);


CREATE TABLE Criterios (
                Notas_criterios VARCHAR(255) NOT NULL,
                criterios VARCHAR(1000) NOT NULL,
                status BOOLEAN NOT NULL,
                peso INTEGER NOT NULL,
                categoriaProjeto VARCHAR(255) NOT NULL,
                CONSTRAINT id PRIMARY KEY (Notas_criterios)
);


CREATE TABLE Avaliacao (
                codigo INTEGER NOT NULL,
                nome VARCHAR(255) NOT NULL,
                categoria VARCHAR(100) NOT NULL,
                codAvaliador INTEGER NOT NULL,
                nomeAvaliador VARCHAR(255) NOT NULL,
                data DATE NOT NULL,
                CONSTRAINT codigo PRIMARY KEY (codigo)
);


ALTER TABLE Criterios ADD CONSTRAINT Notas_Criterios_fk
FOREIGN KEY (Notas_criterios)
REFERENCES Notas (criterios)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;
