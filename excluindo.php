<?php
    require 'conexao.php';
    $id = $_POST['id'];

    $sql = $pdo->prepare ("DELETE FROM Medicamentos WHERE id = :id");
    $sql-> bindValue (":id", $id);
    $sql->execute();

    echo "Registro excluído com sucesso!";
    echo "<br><a href='index.php'>Voltar para a tabela</a>";
?>