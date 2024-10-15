<?php
// Arquivo LoginUSER.php

require 'banco.php';

session_start();

if (isset($_POST['username']) && isset($_POST['senha'])) {
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    if (logarUsuario($username, $senha)) {
        // Login bem-sucedido, criar sessão e redirecionar para index.php
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        // Login falhou, exibir mensagem de erro
        $erro = 'Usuário ou senha incorretos!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="senha" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $erro ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>