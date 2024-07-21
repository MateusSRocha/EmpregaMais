<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Currículo</title>
    <link rel="stylesheet" href="public/assets/css/cadcurriculo.css">
</head>

<body>
    
    <div class="container">
        <div class="info">
            <h1>Bem-vindo ao cadastro de currículos</h1>
            <p>Complete o formulário ao lado para cadastrar seu currículo e se candidatar a oportunidades incríveis!</p>
        </div>
        <div class="form-container">
            <div class="form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-header">
                        <div class="title">
                            <h1>Cadastre seu currículo</h1>
                        </div>
                    </div>
                    <div class="input-group">
                        
                        <div class="input-box">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" placeholder="Informe seu nome completo" required>
                        </div>
                        <div class="input-box">
                            <label for="data_nascimento">Data de Nascimento:</label>
                            <input type="date" id="datanas" name="datanasc" required>
                        </div>
                        <div class="input-box">
                            <label for="genero">Gênero:</label>
                            <input type="radio" name="sexo" value="M"> Masculino
                            <input type="radio" name="sexo" value="F"> Feminino
                            <input type="radio" name="sexo" value="O"> Outro
                        </div>
                        <div class="input-box">
                            <label for="endereco">Endereço:</label>
                            <input type="text" id="endereco" name="endereco" placeholder="Informe seu endereço" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="area">Área de atuação:</label>
                            <input type="text" id="area" name="area" placeholder="Informe em que você trabalha" required>
                        </div>
                        <div class="input-box">
                            <label for="temptrab">Tempo de atuação:</label>
                            <input type="number" id="temptrab" name="temptrab" placeholder="Exemplo: 2" required>
                        </div>
                        <div class="input-box">
                            <label for="temptrab">Currículo Documentado:</label>
                            <input type="file" name="pdf_arquivo" accept=".pdf" required>
                        </div>
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
