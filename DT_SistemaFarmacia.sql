create database SistemaFarmacia;
use SistemaFarmacia;

CREATE TABLE Medicamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_medicamento VARCHAR(100) NOT NULL,
    preco_unitario INT NOT NULL,
    quantidade_estoque INT NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    data_validade DATE NOT NULL
);

INSERT INTO Medicamentos (nome_medicamento, preco_unitario, quantidade_estoque, categoria, data_validade) VALUES
('Paracetamol', 10, 100, 'Analgésico', '2025-12-31'),
('Ibuprofeno', 15, 50, 'Anti-inflamatório', '2024-05-15'),
('Amoxicilina', 25, 30, 'Antibiótico', '2026-03-01'),
('Loratradina', 20, 70, 'Antialérgico', '2025-08-20'),
('Metformina', 30, 60, 'Antidiabético', '2024-11-30'),
('Atorvastatina', 40, 80, 'Hipolipemiante', '2025-01-10'),
('Omeprazol', 18, 90, 'Inibidor de bomba de prótons', '2024-09-25'),
('Dipirona', 12, 40, 'Analgésico', '2025-02-14'),
('Captopril', 22, 55, 'Antihipertensivo', '2024-07-22'),
('Cetirizina', 19, 75, 'Antialérgico', '2025-03-17');