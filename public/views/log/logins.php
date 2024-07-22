<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="public/assets/css/log/login.css">
</head>
<body>
    <div class="container">
        <div class="info">
            <img src="public/assets/images/Login-amico.svg" alt="Login">
        </div>
        <div class="form-container">
            
            <div class="form">
                <form action="" method="post">
                    <div class="form-header">
                        <h1>LOGIN</h1>
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
                            <button type="submit" name="login">Confirmar</button>
                        </div>
                    </div>
                </form>
            </div>
            <a href="index.php" class="back-button"><ion-icon name="arrow-back-outline"></ion-icon> Voltar ao Início</a>
        </div>
    </div>
</body>
</html>