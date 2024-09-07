<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/assets/css/user/style.css">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <h1>EMPREGA<span>MAIS - CLIENTE</span></h1>
            </div>
            <div class="cabecalho_link">
                <li>
                    <a href="#">Cadastrar curriculo</a>
                </li>
                <li class="search-item">
                    <input type="text" name="procura" id="procura" placeholder="O que você procura?" oninput="opcoes(this.value)">
                    <button onclick="procura()"><i class="bi bi-search"></i></button>
                </li>
                <li>
                    <form method="POST">
                        <button type="submit" name="sair">Sair</button>
                    </form>
                </li>
            </div>
        </header>
        <main>
            <div class="empresas-recrutando">
                <h2>Empresas que estão recrutando</h2>
                <table class="vagasEmprego">
                    <thead>
                        <tr>
                            <th>Qt.</th>
                            <th>Nome da empresa</th>
                            <th>Vaga</th>
                            <th>Experiência</th>
                            <th>Escolaridade</th>
                            <th>Detalhes da Vaga</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Empresa A</td>
                            <td>Desenvolvedor</td>
                            <td>6 anos</td>
                            <td>Sup. Completo</td>
                            <td></td>
                            <td><button><i class="bi bi-search"></i></button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Empresa B</td>
                            <td>Designer</td>
                            <td>6 meses</td>
                            <td>Médio Completo</td>
                            <td>Ter trabalhado em equipes que usavam modelo espiral</td>
                            <td><button><i class="bi bi-search"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <script src="public/assets/js/script.js"></script>
</body>
</html>