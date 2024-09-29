<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/assets/css/inc/style.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
            </div>
            <div class="cabecalho_link">
                <li>
                    <a href="cadastrar_vaga.php">Cadastrar Vaga</a>
                </li>
                <li>
                    <form method="POST">
                        <button type="submit" name="sair">Sair</button>
                    </form>
                </li>
            </div>
        </header>
        <main>
            <div class="curriculos-disponiveis">
                <h2>Usuários</h2>
                <table class="usuarios">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Área de atuação</th>
                            <th>Experiência</th>
                            <th>Escolaridade</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usuário A</td>
                            <td>Desenvolvedor</td>
                            <td>6 anos</td>
                            <td>Sup. Completo</td>
                            <td><button><i class="bi bi-search"></i></button></td>
                        </tr>
                        <tr>
                            <td>Usuário B</td>
                            <td>Designer</td>
                            <td>6 meses</td>
                            <td>Médio Completo</td>
                            <td><button><i class="bi bi-search"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
</body>
</html>

