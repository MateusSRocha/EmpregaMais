<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculo</title>
    <link rel="stylesheet" href="public/assets/css/cadcurriculo.css">
</head>

<body>
    <a href="index.html"><ion-icon name="arrow-back-outline"></ion-icon></a>
    <div class="container">
        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre seu currículo</h1>
                    </div>
                    <div class="botao-login">
                        <button><a href="index.php">Inicio</a></button>
                    </div>
                </div>
                <div class="input-box">
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" name="email" placeholder="Informe seu e-mail" required><br><br>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Informe seu nome completo" required><br><br>
                    <label for="data_nascimento">Data de Nascimento:</label><br>
                    <input type="date" id="datanas" name="datanasc" required><br><br>
                    <label for="genero">Gênero:</label>
                    <input type="radio" name="sexo" value="M"> Masculino
                    <input type="radio" name="sexo" value="F"> Feminino
                    <input type="radio" name="sexo" value="O"> Outro<br><br>
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Informe seu endereço" required><br><br>
                    <label for="telefone">Telefone:</label>
                    <input type="number" id="telefone" name="telefone" placeholder="Informe seu telefone" required><br><br>
                    <label for="area">Área de atuação:</label>
                    <input type="text" id="area" name="area" placeholder="Informe em que você trabalha" required><br><br>
                    <label for="temptrab">Tempo de atuação:</label>
                    <input type="text" id="temptrab" name="temptrab" placeholder="Exemplo: 2 anos" required><br><br>
                    <input type="file" name="pdf_arquivo" accept=".pdf" required><br>
                </div>
                <div class="botao-login">
                    <button type="submit" name="cadCurriculo">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>