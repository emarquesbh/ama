-- clube.sql
-- Script para criação das tabelas "cursos" e "turmas"
-- Estrutura oficial conforme definido no CURSOS.docx
-- Banco de dados: ama
-- Compatível com MySQL usado no XAMPP

-- Criação da base de dados (se ainda não existir)
CREATE DATABASE IF NOT EXISTS ama DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ama;

-- criar_cursos.sql
-- Script atualizado da tabela "cursos" com campos de log
-- Conforme padrão do projeto (CURSOS.docx + campos de log)
-- Banco: ama

USE ama;

DROP TABLE IF EXISTS cursos;

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    dias VARCHAR(100),
    horario VARCHAR(50),
    mensalidade DECIMAL(8,2),
    imagem_maior VARCHAR(255),
    imagem_menor VARCHAR(255),
    galeria1 VARCHAR(255),
    galeria2 VARCHAR(255),
    galeria3 VARCHAR(255),
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Tabela: turmas
DROP TABLE IF EXISTS turmas;
CREATE TABLE turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_curso INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    imagem_menor VARCHAR(255),
    imagem_maior VARCHAR(255),
    galeria1 VARCHAR(255),
    galeria2 VARCHAR(255),
    galeria3 VARCHAR(255),
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME,
    FOREIGN KEY (id_curso) REFERENCES cursos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE ginastica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar_yoga.sql
-- Script para criação da tabela "yoga" com campos de log
-- Conforme padrão do projeto (igual ginastica)
-- Banco: ama


DROP TABLE IF EXISTS yoga;

CREATE TABLE yoga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar_postura_alongamento.sql
-- Script para criação da tabela "postura_alongamento" com campos de log
-- Conforme padrão do projeto
-- Banco: ama

USE ama;

DROP TABLE IF EXISTS postura_alongamento;

CREATE TABLE postura_alongamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar_danca_salao.sql
-- Script para criação da tabela "danca_salao" com campos de log
-- Conforme padrão do projeto
-- Banco: ama

DROP TABLE IF EXISTS danca_salao;

CREATE TABLE danca_salao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar_celular.sql
-- Script para criação da tabela "celular" com campos de log
-- Conforme padrão do projeto
-- Banco: ama

USE ama;

DROP TABLE IF EXISTS celular;

CREATE TABLE celular (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- criar_informatica.sql
-- Script para criação da tabela "informatica" com campos de log
-- Conforme padrão do projeto
-- Banco: ama

USE ama;

DROP TABLE IF EXISTS informatica;

CREATE TABLE informatica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagem VARCHAR(255),
    titulo VARCHAR(255) NOT NULL,
    horarios VARCHAR(100),
    dia VARCHAR(100),
    valor DECIMAL(8,2),
    turma VARCHAR(100),
    descricao TEXT,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE grupo_reflexao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    palavra_padre TINYINT(1) DEFAULT 0,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE vida_ativa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE bonecando (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE coral (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE ginastica_cerebral (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela: danca_senior
CREATE TABLE danca_senior (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP
                     ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela: lian_gong
CREATE TABLE lian_gong (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP
                     ON UPDATE CURRENT_TIMESTAMP
);

-- Tabela: programacao
CREATE TABLE programacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    data DATE NOT NULL,
    atualizado_por VARCHAR(100),
    atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP
                     ON UPDATE CURRENT_TIMESTAMP
);
