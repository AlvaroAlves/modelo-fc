# É recomendado que a a estrutura e os dados de exemplos estajam nessa pasta

CREATE TABLE IF NOT EXISTS medico(
    id INT UNSIGNED AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    data_alteracao timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Horario (
    id INT UNSIGNED AUTO_INCREMENT,
    id_medico INT UNSIGNED NOT NULL,
    data_horario DATETIME,
    horario_agendado TINYINT(1),
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    data_alteracao timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_medico) REFERENCES medico(id) ON DELETE CASCADE
);