<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <?php
    require 'conexao.php'
    ?>

    <?php
    $sql = $pdo->query("SELECT * FROM Medicamentos");

    $lista = [];
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1 class="text-center mt-5 mb-5">FARMACIA - Cadastro de Medicamentos</h1>

    <div class="container">
        <form action="" method="get">
            <div class="form-group">
                <label for="nome_medicamento">Pesquisar por nome:</label>
                <input type="text" class="form-control" id="nome_medicamento" name="nome_medicamento" placeholder="Digite o nome do medicamento">
                <br>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>

        <?php
        if (isset($_GET['nome_medicamento'])) {
            $nome_medicamento = $_GET['nome_medicamento'];
            $sql = $pdo->prepare("SELECT * FROM Medicamentos WHERE nome_medicamento LIKE ?");
            $sql->execute(["%{$nome_medicamento}%"]);
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = $pdo->prepare("SELECT * FROM Medicamentos");
            $sql->execute();
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>

        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">QUANTIDADE</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">VALIDADE</th>
                    <th scope="col">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $dados) : ?>
                    <tr>
                        <td><?php echo $dados['id']; ?></td>
                        <td><?php echo $dados['nome_medicamento']; ?></td>
                        <td><?php echo $dados['preco_unitario']; ?></td>
                        <td><?php echo $dados['quantidade_estoque']; ?></td>
                        <td><?php echo $dados['categoria']; ?></td>
                        <td><?php echo $dados['data_validade']; ?></td>
                        <td>
                            <a href="editar.php?id=<?= $dados['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="excluir.php?id=<?= $dados['id']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="cadastroMED.php" class="btn btn-primary">Cadastrar Medicamento</a>

    </div>
</body>

</html>