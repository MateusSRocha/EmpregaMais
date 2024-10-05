<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>
    <link rel="stylesheet" href="public/assets/css/log/cadempresa.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="info">
            <img src="public/assets/images/Sign up-cuate.svg" alt="">
        </div>
        <div class="form-container">
            
            <div class="form">
                <form action="" method="post">
                    <div class="form-header">
                        <div class="title">
                            <h1>Cadastre sua empresa</h1>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" id="cnpj" name="cnpj" placeholder="Informe o CNPJ da empresa" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" placeholder="Informe a senha para empresa" required>
                    </div>
                    <div class="input-box">
                        <label for="endereco">Endereço:</label>
                        <input type="text" id="endereco" name="endereco" placeholder="Informe o endereço da empresa" required>
                    </div>
                    <div class="input-box">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" placeholder="Informe o nome da empresa" required>
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone:</label>
                        <input type="number" id="telefone" name="telefone" placeholder="Informe o telefone da empresa" required>
                    </div>
                    <div class="botao-enviar">
                        <input type="submit" value="Enviar" name="cadEmpresa">
                    </div>
                </form>
            </div>
            <a href="empresa.php" class="back-button">
                <ion-icon name="arrow-back-outline"></ion-icon> Voltar ao Início
            </a>
        </div>
    </div>
    
</body>
</html>
