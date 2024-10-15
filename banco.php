<?php
require 'conexao.php';

$nome_medicamento = $_POST['nome_medicamento'] ?? null;
$preco_unitario = $_POST['preco_unitario'] ?? null;
$quantidade_estoque = $_POST['quantidade_estoque'] ?? null;
$categoria = $_POST['categoria'] ?? null;
$data_validade = $_POST['data_validade'] ?? null;

if ($nome_medicamento && $preco_unitario && $quantidade_estoque && $categoria && $data_validade) {
    $sql = $pdo->prepare("INSERT INTO Medicamentos (nome_medicamento, preco_unitario, quantidade_estoque, categoria, data_validade) VALUES (:nome_medicamento, :preco_unitario, :quantidade_estoque, :categoria, :data_validade)");
    $sql->bindValue(':nome_medicamento', $nome_medicamento);
    $sql->bindValue(':preco_unitario', $preco_unitario);
    $sql->bindValue(':quantidade_estoque', $quantidade_estoque);
    $sql->bindValue(':categoria', $categoria);
    $sql->bindValue(':data_validade', $data_validade);

    if ($sql->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql->errorInfo()[2];
    }
} else {
}
?>