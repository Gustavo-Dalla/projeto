-- Criação do banco de dados para o modelo apresentado

CREATE TABLE Usuario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    data_cad DATE NOT NULL,
    cpf VARCHAR(14) UNIQUE
);

CREATE TABLE Imoveis (
    id SERIAL PRIMARY KEY,
    lote VARCHAR(50) NOT NULL,
    longitude DECIMAL(10,7),
    latitude DECIMAL(10,7),
    area DECIMAL(12,2),
    tipo VARCHAR(50),
    status VARCHAR(50),
    descricao TEXT,
    imagem VARCHAR(255),
    logradouro VARCHAR(100),
    endereco VARCHAR(100),
    bairro VARCHAR(100)
);

CREATE TABLE Drone (
    num_serie VARCHAR(50) PRIMARY KEY,
    status VARCHAR(50),
    modelo VARCHAR(50),
    fabricante VARCHAR(50),
    data_aquisicao DATE,
    observacoes TEXT
);

CREATE TABLE Alerta (
    id_alerta SERIAL PRIMARY KEY,
    motivo TEXT,
    data_criacao DATE NOT NULL,
    status VARCHAR(50),
    prioridade VARCHAR(50)
);

-- Relacionamento Usuario <-> Imoveis (Assumindo que um usuário pode ter vários imóveis)
CREATE TABLE Usuario_Imoveis (
    usuario_id INT REFERENCES Usuario(id) ON DELETE CASCADE,
    imovel_id INT REFERENCES Imoveis(id) ON DELETE CASCADE,
    PRIMARY KEY (usuario_id, imovel_id)
);

-- Relacionamento Drone <-> Alerta (Assumindo que um drone pode gerar vários alertas)
CREATE TABLE Drone_Alerta (
    num_serie VARCHAR(50) REFERENCES Drone(num_serie) ON DELETE CASCADE,
    id_alerta INT REFERENCES Alerta(id_alerta) ON DELETE CASCADE,
    PRIMARY KEY (num_serie, id_alerta)
);

-- Relacionamento Imoveis <-> Alerta (Assumindo que um imóvel pode ter vários alertas)
CREATE TABLE Imovel_Alerta (
    imovel_id INT REFERENCES Imoveis(id) ON DELETE CASCADE,
    id_alerta INT REFERENCES Alerta(id_alerta) ON DELETE CASCADE,
    PRIMARY KEY (imovel_id, id_alerta)
);