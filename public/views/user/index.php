<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/assets/css/user/style.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
                <div>
                <?php 
                    if (isset($_SESSION['nome_usuario'])) {
                        echo '<h1>Olá, '. $_SESSION['nome_usuario']. '</h1>';
                    } else {
                        echo '<h1>Olá, visitante</h1>';
                    }
                ?>
            </div>
            </div>
            
            <div class="cabecalho_link">
                
                <li>
                    <a href="cadastrar_curriculo.php">Cadastrar curriculo</a>
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
                        <?php
                        $con = mysqli_connect('localhost', 'root', 'usbw', 'empregamais');

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
        <footer>
            <?php
            if (isset($_COOKIE['ultima_visita_cliente'])) {
                $ultima_visita = $_COOKIE['ultima_visita_cliente'];
                echo "<p>Sua última visita foi em: $ultima_visita</p>";
            } else {
                
                echo "<p>Bem-vindo! Esta é sua primeira visita.</p>";
            }

            $nome = "ultima_visita_cliente";
            $valor = date("Y-m-d H:i:s"); 
            $expiracao = time() + (365 * 24 * 60 * 60); 
            setcookie($nome, $valor, $expiracao, "/");
            ?>
        </footer>
    </div>
    <script src="public/assets/js/script.js"></script>
</body>
</html>
