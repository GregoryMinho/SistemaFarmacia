<?php
require 'conexao.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_medicamento = $_POST['id_medicamento'];
    $quantidade_vendida = $_POST['quantidade_vendida'];

    $stmt = $pdo->prepare("SELECT quantidade_estoque FROM Medicamentos WHERE id = ?");
    $stmt->execute([$id_medicamento]);
    $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($medicamento && $medicamento['quantidade_estoque'] >= $quantidade_vendida) {
        $novo_estoque = $medicamento['quantidade_estoque'] - $quantidade_vendida;
        $stmt = $pdo->prepare("UPDATE Medicamentos SET quantidade_estoque = ? WHERE id = ?");
        $stmt->execute([$novo_estoque, $id_medicamento]);

        $mensagem = "Venda realizada com sucesso! Estoque atualizado.";
    } else {
        $mensagem = "Erro: Estoque insuficiente ou medicamento não encontrado.";
    }
}

$stmt = $pdo->query("SELECT id, nome_medicamento FROM Medicamentos");
$medicamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Registrar Venda</h1>

        <?php if ($mensagem): ?>
            <div class="alert alert-info"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="id_medicamento">Medicamento:</label>
                <select class="form-control" id="id_medicamento" name="id_medicamento" required>
                    <option value="">Selecione um medicamento</option>
                    <?php foreach ($medicamentos as $medicamento): ?>
                        <option value="<?php echo $medicamento['id']; ?>"><?php echo $medicamento['nome_medicamento']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quantidade_vendida">Quantidade Vendida:</label>
                <input type="number" class="form-control" id="quantidade_vendida" name="quantidade_vendida" required min="1">
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venda</button>
        </form>

        <a href="menu.php" class="btn btn-secondary mt-3">Voltar ao Menu</a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/po