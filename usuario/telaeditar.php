<?php
include("../conexao.php");

if (!isset($_GET['id'])) {
    die("ID do usuário inválido");
}

$id = $_GET['id'];

$sql = "SELECT * FROM usuario WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Usuário não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $email = $_POST['email'];

    $sql = "UPDATE usuario SET nome = :nome, login = :login, email = :email WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':login', $login);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Redirecionar de volta para a página de listagem
        header("Location: Telalistagem.php");
        exit(); // Encerrar a execução do script após o redirecionamento
    } else {
        echo "Erro ao atualizar o usuário.";
    }
}
?>

<div class="container">
    <h1>Atualizar seus dados</h1>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome'] ?>">

        <label for="login">Login</label>
        <input type="text" name="login" id="login" placeholder="Informe o seu login" required value="<?php echo $row['login'] ?>">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Informe o seu email" required value="<?php echo $row['email'] ?>">

        <button type="submit">Atualizar</button>
    </form>
</div>
