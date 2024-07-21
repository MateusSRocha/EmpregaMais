<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Currículo</title>
    <link rel="stylesheet" href="public/assets/css/cadastro.css">
</head>

<body>
    
    <div class="container">
        <div class="info">
            <h1>Cadastre-se</h1>
            <p>Complete o formulário ao lado para cadastrar-se!</p>
        </div>
        <div class="form-container">
            <div class="form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-header">
                        <div class="title">
                            <h1>Cadastro</h1>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">E-mail:</label>
                            <input id="email" type="email" name="email" placeholder="Informe seu e-mail" required>
                        </div>
                        <div class="input-box">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe seu nome completo" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" placeholder="Informe seu telefone" required>
                        </div>
                        <div class="input-box">
                            <label for="password">senha:</label>
                            <input type="password" id="senha" name="senha" placeholder="Informe sua senha" required>
                        </div>
                    </div>
                    <div class="input-box">
                            <label for="genero">Gênero:</label>
                            <input type="radio" name="sexo" value="M"> Masculino
                            <input type="radio" name="sexo" value="F"> Feminino
                            <input type="radio" name="sexo" value="O"> Outro
                        </div>
                    <div class="botao-login">
                        <button type="submit" name="cadCurriculo">Confirmar</button>
                    </div>
                </form>
            </div><a href="index.php" class="back-button"><ion-icon name="arrow-back-outline"></ion-icon> Voltar para o início</a>
        </div> 
    </div>
   
</body>

</html>
