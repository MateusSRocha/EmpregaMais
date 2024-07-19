<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo</title>
    <link rel="stylesheet" href="public/assets/css/login.css">
</head>
<body>
    <a href="index.html"><ion-icon name="arrow-back-outline"></ion-icon></a>
    <div class="container">
        <div class="form">
            <form action="login.php" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>LOGIN</h1>
                    </div>
                    <div class="botao-login">
                        <button><a href="index.php">Início</a></button>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Informe seu e-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Informe sua senha" required>
                    </div>
                    <div class="botao-login">
                        <button type="submit">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
