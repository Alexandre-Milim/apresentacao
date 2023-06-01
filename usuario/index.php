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
    <title>index</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            font-size: 24px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Seja bem vindo <?= $_GET["nome"] ?> 💙</h1>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/0f05c75053.js"></script>
</body>
</html>
