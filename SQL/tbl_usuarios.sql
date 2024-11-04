ALTER TABLE tbl_projetos
ADD CONSTRAINT fk_representante1
FOREIGN KEY (representante1) REFERENCES tbl_usuarios(id);



ALTER TABLE tbl_projetos
ADD CONSTRAINT fk_representante2
FOREIGN KEY (representante2) REFERENCES tbl_usuarios(id);
