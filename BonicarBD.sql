CREATE DATABASE ServicoAgendamento;
USE ServicoAgendamento;

-- Tabela de usuários
CREATE TABLE Usuarios (
    id_usu INT AUTO_INCREMENT PRIMARY KEY,
    nome_usu VARCHAR(100) NOT NULL,
    cpf_usu VARCHAR(14) UNIQUE NOT NULL,
    telefone_usu VARCHAR(15),
);

-- Tabela de serviços
CREATE TABLE Servicos (
    id_serv INT AUTO_INCREMENT PRIMARY KEY,
    prestador_id_serv INT NOT NULL,
    titulo_serv VARCHAR(150) NOT NULL,
    preco_serv DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (prestador_id) REFERENCES Usuarios(id) ON DELETE CASCADE
);

-- Tabela de agendamentos
CREATE TABLE Agendamentos (
    id_agen INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id_agen INT NOT NULL,
    servico_id_agen INT NOT NULL,
    data_hora_agen DATETIME NOT NULL,
    status ENUM('pendente', 'confirmado', 'cancelado', 'concluido') DEFAULT 'pendente',
    FOREIGN KEY (cliente_id_agen) REFERENCES Usuarios(id_usu) ON DELETE CASCADE,
    FOREIGN KEY (servico_id_agen) REFERENCES Servicos(id_serv) ON DELETE CASCADE
);
