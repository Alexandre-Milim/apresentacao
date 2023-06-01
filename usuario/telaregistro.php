<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="mobile.css">
    <style>
        body {
            background-color: #000000;
            margin-top: 130px; /* Adicione uma margem superior para ajustar o conteúdo */
        }

        label {
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <main id="zedamanga">
        <section id="form">
            <div id="">
                <h1>Registrar-se</h1>
            </div>
            <div id="form-formulario">
                <form action="" method="POST">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" required placeholder="Informe seu nome">

                    <label for="email">E-mail</label>
                    <input type="email" name="email" required placeholder="Informe seu E-mail">

                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" required placeholder="Informe seu telefone">

                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" required placeholder="Informe sua cidade">

                    <label for="login">Login</label>
                    <input type="text" name="login" required placeholder="Informe seu login">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha" required placeholder="Informe sua senha">

                    <div class="form-formulario-registrar-se">
                        <button id="cadastrar" type="submit" class="btn button-spacing">Registrar-se</button>
                    </div>
                    <br>
                </form>

                <!-- Código HTML e CSS -->

<?php
// Conectar com o banco
include("../conexao.php");

// Função para verificar se o usuário já está cadastrado
function usuario_cadastrado($email)
{
    global $conexao;

    $sql = "SELECT COUNT(*) FROM usuario WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(["email" => $email]);
    $count = $stmt->fetchColumn();

    return $count > 0;
}

// Formulário foi enviado?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se as chaves estão definidas antes de usá-las
    if (isset($_POST["nome"])) {
        $nome = $_POST["nome"];
    } else {
        $nome = "";
    }
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if (usuario_cadastrado($email)) {
        echo "<div class='error'>Este e-mail já está cadastrado.</div>";
    } else {
        // Verifique se o nome não está vazio
        if (!empty($nome)) {
            $sql = "INSERT INTO usuario (nome, email, telefone, cidade, login, senha) VALUES (:nome, :email, :telefone, :cidade, :login, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute([
                "nome" => $nome,
                "email" => $email,
                "telefone" => $telefone,
                "cidade" => $cidade,
                "login" => $login,
                "senha" => $senha,
            ]);

            if ($stmt->rowCount() > 0) {
                echo "<div class='success'>Usuário cadastrado com sucesso.</div>";
            } else {
                echo "<div class='error'>Erro ao cadastrar o usuário.</div>";
            }
        } else {
            echo "<div class='error'>Por favor, informe um nome válido.</div>";
        }
    }

    // Fechar a conexão
    $conexao = null;
}
?>

            </div>
        </section>
    </main>

    <footer>
        <div class="footer" id="footer" style="background-color: #000000e8;">
            <div class="imgfundo" style="background-color: #000000e8;">
            </div>
            <div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
