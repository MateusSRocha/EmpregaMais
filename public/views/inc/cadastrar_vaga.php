<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vaga</title>
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/assets/css/inc/cad_vaga.css">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
            </div>
            <div class="cabecalho_link">
                <li><a href="index.php">Home</a></li>
            </div>
        </header>

        <main>
            <div class="form">
                <form action="" method="post">
                    <div class="form-header">
                        <div class="title">
                            <h1>Informações da Vaga</h1>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="quantidade">Quantidade de Vagas</label>
                            <input id="quantidade" type="number" name="quantidade" placeholder="Informe o número de vagas" required>
                        </div>
                        <div class="input-box">
                            <label for="tipo">Tipo da Vaga</label>
                            <input id="tipo" type="text" name="tipo" placeholder="Ex: Professor, Desenvolvedor" required>
                        </div>
                        <div class="input-box">
                            <label for="experiencia">Experiência (em anos)</label>
                            <input id="experiencia" type="number" name="experiencia" placeholder="Informe a experiência requerida" required>
                        </div>
                        <div class="input-box">
                            <label for="nivel_escolar">Nível Escolar</label>
                            <select id="nivel_escolar" name="nivel_escolar" required>
                                <option value="Ensino Fundamental">Ensino Fundamental</option>
                                <option value="Ensino Fundamental Incompleto">Ensino Fundamental Incompleto</option>
                                <option value="Ensino Médio">Ensino Médio</option>
                                <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
                                <option value="Ensino Superior">Ensino Superior</option>
                                <option value="Pós-graduação">Pós-graduação</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="detalhe">Detalhe da Vaga</label>
                        <textarea id="detalhe" name="detalhe" rows="10" placeholder="Descreva mais detalhes da vaga" required></textarea>
                    </div>

                    <div class="botao-cad">
                        <button type="submit" name="cadVaga">Cadastrar Vaga</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
