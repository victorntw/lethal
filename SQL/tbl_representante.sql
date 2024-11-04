CREATE TABLE tbl_representante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    representante VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE sedf.tbl_representante ADD representante2 varchar(255) NULL;
ALTER TABLE sedf.tbl_representante CHANGE representante representante1 varchar(255) CHARACTER SET utf8mb4 NOT NULL;

ALTER TABLE sedf.tbl_representante ADD representante varchar(255) NULL;

