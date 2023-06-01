<?php

    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "senailivre";
    $dns = "mysql:host=$host;dbname=$banco;";

    try {
        $conexao = new PDO($dns, $usuario, $senha);
    } catch (\PDOException $e) {
        throw new PDOException($e->getMessage());
    }
?>
