<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <title>Cadastrar Currículo</title>
    <link rel="stylesheet" href="public/assets/css/user/cad_curriculo.css">
    <style>
        
    </style>
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
            </div>
            <div class="cabecalho_link">
                <li><a href="index.php">Home</a></li>
                <li><form method="POST"><button type="submit" name="sair">Sair</button></form></li>
            </div>
        </header>

        <main>
            <div class="form">
                <form action="#" method="POST">
                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" required>
                        </div>
                        
                        <div class="input-box">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" required>
                        </div>
                        <div class="input-box">
                            <label for="datanasc">Data de Nascimento</label>
                            <input type="date" name="datanasc" required>
                        </div>
                        <div class="input-box">
                            <label for="genero">Gênero</label>
                            <select name="genero" required>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <label for="endereco">Endereço</label>
                            <input type="text" name="endereco" required>
                        </div>
                        <div class="input-box">
                            <label for="area">Área de Atuação</label>
                            <input type="text" name="area" required>
                        </div>
                        <div class="input-box">
                            <label for="temptrab">Tempo de Trabalho</label>
                            <input type="text" name="temptrab" required>
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
