<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/assets/css/log/empresa.css">
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
                    <a href="index.php">Para Clientes</a>
                </li>
                <li>
                    <a href="loginempresa.php">Login</a>
                </li>
                <li>
                    <a href="cadempresas.php">Cadastre-se</a>
                </li>
            </div>
        </header>
        <!-- <div class="meio">
            <h1>EMPREGA<span>MAIS</span></h1>
            <div class="links">
                <div class="link-emp">
                    <button><a href="cadempresas.php">Cadastra empresa</a></button>
                    <button><a href="loginempresa.php">Login como empresa</a></button>

                </div>
                <div class="link-usu">
                    <button><a href="cadastro.php">Cadastro Profissinal</a></button>
                    <button><a href="logins.php">Login</a></button>
                </div>
            </div>
        </div> -->
        <main>
            <div class="meio">
                <h1>EMPREGA<span>MAIS</span></h1>
                <form action="" method="post" class="barra-pesquisa">
                    <input type="text" name="Informacao" id="idinformacao" placeholder="Digite um cargo ou uma localização">
                    <button><i class="bi bi-search"></i></button>
                </form>
            </div>
            <h2>Veja algumas oportunidades de trabalho</h2>
            <div class="empresas-recrutando">
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
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'empregamais');

                        if (!$con) {
                            die('Erro na conexão: ' . mysqli_connect_error());
                        }
                        $query = "SELECT vaga.*, empresa.nome AS nome_empresa
                            FROM vaga
                            INNER JOIN empresa ON vaga.id_empresa = empresa.id";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($vaga = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $vaga['quantidade'] . '</td>'; 
                                echo '<td>' . $vaga['nome_empresa'] . '</td>'; 
                                echo '<td>' . $vaga['tipo_vaga'] . '</td>'; 
                                echo '<td>' . $vaga['experiencia'] . '</td>'; 
                                echo '<td>' . $vaga['nivel_escolaridade'] . '</td>';
                                echo '<td>' . $vaga['detalhes'] . '</td>'; 
                                echo '<td><button><i class="bi bi-search"></i></button></td>'; 
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">Nenhuma vaga encontrada.</td></tr>';
                        }
                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
</body>

</html>