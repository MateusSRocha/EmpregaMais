<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <title>Cadastrar Currículo</title>
    <link rel="stylesheet" href="public/assets/css/user/cad_curriculo.css">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
            </div>
            <h1>Cadastrar currículo</h1>
            <div class="cabecalho_link">
                <li><a href="index.php">Home</a></li>
            </div>
        </header>

        <main>
            <div class="form">
                <form action="" method="POST">
                    <div class="input-group">
                        <div class="input-box">
                            <label for="area">Área de Atuação</label>
                            <input type="text" name="area" required>
                        </div>
                        <div class="input-box">
                            <label for="objetivo">Objetivo Profissional</label>
                            <textarea name="objetivo" required></textarea>
                        </div>
                        
                        <div class="input-box">
                            <label for="formacao">Formação Acadêmica</label>
                            <textarea name="formacao" required></textarea>
                        </div>

                        <div class="input-box">
                            <label for="experiencia">Experiência Profissional</label>
                            <textarea name="experiencia" required></textarea>
                        </div>

                        <div class="input-box">
                            <label for="habilidades">Habilidades</label>
                            <textarea name="habilidades" required></textarea>
                        </div>

                        <div class="input-box">
                            <label for="idiomas">Idiomas</label>
                            <input type="text" name="idiomas">
                        </div>
                        <div class="input-box">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" required>
                        </div>
                        <div class="input-box">
                            <label for="linkedin">LinkedIn (opcional)</label>
                            <input type="url" name="linkedin" placeholder="https://linkedin.com/in/usuario">
                        </div>
                    </div>

                    <div class="botao-cad">
                        <button type="submit" name="cadCurriculo">Cadastrar</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
