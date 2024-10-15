<?php
    require 'conexao.php';
    $id = $_REQUEST ["id"];

    $sql = $pdo->prepare ("DELETE FROM Medicamentos WHERE id = :id");
    $sql-> bindValue (":id", $id);
    $sql->execute();

    header("Location: index.php");
?>