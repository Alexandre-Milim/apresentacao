<!DOCTYPE html>
<html>
<head>
    <title>Listagem</title>
    <style>
        body {
            background-color: #000000;
            color: white;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-tabela.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Kanit:ital,wght@1,900&family=Montserrat:ital,wght@1,800&family=Noto+Sans:ital,wght@1,900&family=Poppins:ital,wght@0,700;1,900&family=Quicksand:wght@300&family=Roboto:ital,wght@0,900;1,900&family=Wix+Madefor+Display:wght@600;800&display=swap" rel="stylesheet">
</head>
<body>
<?php
include("../conexao.php");

$sql = "SELECT id, nome, email, telefone, cidade, login, senha FROM usuario";

$resultado = $conexao->query($sql);

if ($resultado->rowCount() > 0) {
    echo "<table border=1>";
    echo "
        <tr>
            <th>id</th>
            <th>nome</th>
            <th>email</th>
            <th>telefone</th>
            <th>cidade</th>
            <th>login</th>
            <th>senha</th>
            <th>deletar</th>
        </tr>
    ";
    foreach ($resultado as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['login'] . "</td>";
        echo "<td>" . $row['senha'] . "</td>";
        echo '<td><a href="telaeditar.php?id='.$row['id'].'">editar</a></td>';
        echo '<td><a href="deletar.php?id=' . $row['id'] . '">deletar</a></td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado!";
}
?>

</body>
</html>
