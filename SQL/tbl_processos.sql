CREATE TABLE tbl_processos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    numero_sei VARCHAR(100),
    tipo VARCHAR(100),
    representante1 INT NULL,
    representante2 INT NULL,
    sei_link VARCHAR(255),
    valor DECIMAL(10, 2),
    andamento TEXT,
    ultima_atualizacao DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


ALTER TABLE tbl_processos
ADD CONSTRAINT fk_processo_representante1
FOREIGN KEY (representante1) REFERENCES tbl_representante(id)
ON DELETE SET NULL
ON UPDATE CASCADE;

ALTER TABLE tbl_processos
ADD CONSTRAINT fk_processo_representante2
FOREIGN KEY (representante2) REFERENCES tbl_representante(id)
ON DELETE SET NULL
ON UPDATE CASCADE;

-- ALTER TABLE sedf.tbl_processos DROP FOREIGN KEY fk_representante;
-- ALTER TABLE sedf.tbl_processos DROP COLUMN representante_id;

-- SELECT * FROM tbl_processos;