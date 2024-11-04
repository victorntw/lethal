CREATE TABLE tbl_projetos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    representante_id INT, -- Este campo deve referir-se a um ID de representante
    sei_link VARCHAR(255),
    executar_ate DATE,
    ultima_atualizacao DATE,
    tipo VARCHAR(100),
    valor DECIMAL(10, 2), -- Usado para valores monetários, ajuste conforme necessário
    descricao TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- ALTER TABLE tbl_projetos
-- ADD CONSTRAINT fk_representante
-- FOREIGN KEY (representante_id) REFERENCES tbl_representante(id)
-- ON DELETE SET NULL
-- ON UPDATE CASCADE;


ALTER TABLE sedf.tbl_projetos ADD representante1 INT NULL;
ALTER TABLE sedf.tbl_projetos ADD representante2 INT NULL;



ALTER TABLE tbl_projetos
ADD CONSTRAINT fk_representante1
FOREIGN KEY (representante1) REFERENCES tbl_representante(id)
ON DELETE SET NULL
ON UPDATE CASCADE;

ALTER TABLE tbl_projetos
ADD CONSTRAINT fk_representante2
FOREIGN KEY (representante2) REFERENCES tbl_representante(id)
ON DELETE SET NULL
ON UPDATE CASCADE;

ALTER TABLE sedf.tbl_projetos DROP FOREIGN KEY fk_representante;
ALTER TABLE sedf.tbl_projetos DROP COLUMN representante_id;


ALTER TABLE sedf.tbl_projetos ADD numero_sei varchar(200) NULL;


ALTER TABLE sedf.tbl_projetos ADD status TEXT NULL;


