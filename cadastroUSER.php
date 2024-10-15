<?php
require 'conexao.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    // Criptografar a senha antes de armazená-la
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    $sql = $pdo->prepare("INSERT INTO Usuarios (username, senha, email) VALUES (?, ?, ?)");
    $sql->execute([$username, $hashed_password, $email]);

    header("Location: index.php");
    exit;
} else {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Usuários</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Cadastro de Usuários (ADM)</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="senha" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}