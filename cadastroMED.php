<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Medicamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

    <?php
    require 'conexao.php'
    ?>

    <div class="container">
        <h1 class="text-center">Cadastro de Medicamentos</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome_medicamento">Nome do Medicamento:</label>
                <input type="text" class="form-control" id="nome_medicamento" name="nome_medicamento">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <div class="form-group">
                <label for="preco_unitario">Preço Unitário:</label>
                <input type="number" class="form-control" id="preco_unitario" name="preco_unitario">
            </div>
            <div class="form-group">
                <label for="quantidade_estoque">Quantidade em Estoque:</label>
                <input type="number" class="form-control" id="quantidade_estoque" name="quantidade_estoque">
            </div>
            <div class="form-group">
                <label for="data_validade">Data de Validade:</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade">
            </div>
            <button type="submit" class="btn btn-primary" name="Cadastrar">Cadastrar</button>
        </form>
    </div>

    <?php
    if (isset($_POST['Cadastrar'])) {
        $nome_medicamento = $_POST['nome_medicamento'];
        $categoria = $_POST['categoria'];
        $preco_unitario = $_POST['preco_unitario'];
        $quantidade_estoque = $_POST['quantidade_estoque'];
        $data_validade = $_POST['data_validade'];

        $sql = $pdo->prepare("INSERT INTO Medicamentos (nome_medicamento, categoria, preco_unitario, quantidade_estoque, data_validade) VALUES (?, ?, ?, ?, ?)");
        $sql->execute([$nome_medicamento, $categoria, $preco_unitario, $quantidade_estoque, $data_validade]);

        header("Location: index.php");
        exit;
    } else {
    }
    ?>

</body>

</html>