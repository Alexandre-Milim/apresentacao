<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Kanit:ital,wght@1,900&family=Montserrat:ital,wght@1,900&family=Quicksand:wght@300&family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="login.html" rel="stylesheet">
    <link rel="stylesheet" href="mobile.css">
    <link href="registro.html" rel="stylesheet">
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/0f05c75053.js"></script>
    <title>Login</title>
    <style>
        body {
            background-color: #000000;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            border: 4px solid rgb(57 252 138 / 83%);
            padding: 70px;
            background: rgb(95 100 97 / 20%);
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 17px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form__group {
            position: relative;
            padding: 20px 0 0;
            width: 100%;
            max-width: 180px;
        }

        .form__field {
            font-family: inherit;
            width: 100%;
            border: none;
            outline: 0;
            font-size: 17px;
            color: #fff;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
            border-bottom: 2px solid white; /* Adicionando borda branca na parte inferior */
        }

        .form__field::placeholder {
            color: transparent;
        }

        .form__field:placeholder-shown ~ .form__label {
            font-size: 17px;
            cursor: text;
            top: 20px;
        }

        .form__field:focus ~ .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 17px;
            font-weight: 700;
        }

        /* reset input */
        .form__field:required,
        .form__field:invalid {
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="margin-top: -130px; text-shadow: 1px 1px 2px #ffffff8a, 0 0 1em rgb(42 247 127 / 74%), 0 0 0.2em #4db68a9e;">ENTRAR</h1>
        <br> <br>
        <br>
        <form action="" method="POST">
            <label for="login" style="font-size: 26px; text-shadow: 1px 1px 2px #ffffff8a, 0 0 1em rgb(42 247 127 / 74%), 0 0 0.2em #4db68a9e;">Login:</label>
            <div class="form__group field">
                <input type="text" name="login" class="form__field" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required placeholder="Informe seu login">
            </div>
<br> <br>
            <label for="senha" style="font-size: 26px; text-shadow: 1px 1px 2px #ffffff8a, 0 0 1em rgb(42 247 127 / 74%), 0 0 0.2em #4db68a9e;">Senha:</label>
            <div class="form__group field">
                <input type="password" name="senha" class="form__field" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" required placeholder="Informe sua senha">
            </div>

            <button id="cadastrar" type="submit" class="btn button-spacing" style="margin-left: -1px; margin-top: 20px;">Logar</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            require("../conexao.php");

            $login = $_POST["login"];
            $senha = $_POST["senha"];

            $query = "SELECT * FROM usuario WHERE login = :login and senha=:senha";
            $stmt  = $conexao->prepare($query);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                header("Location: index.php?nome=" . $result["nome"]);
                exit();
            } else {
                echo "<div class='error'>Usuário ou senha inválidos</div>";
            }
        }
        ?>
    </div>
</body>
</html>
