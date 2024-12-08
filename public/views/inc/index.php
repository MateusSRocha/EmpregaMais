<?php
// Antes de qualquer HTML ser exibido, verifique e defina os cookies
if (!isset($_COOKIE['ultima_visita_empresa'])) {
    setcookie("ultima_visita_empresa", date("Y-m-d H:i:s"), time() + (365 * 24 * 60 * 60), "/");
}

// Abrindo a conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'empregamais');
if (!$con) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consultando os currículos
$query = "
    SELECT u.nome, u.telefone, c.area, c.experiencia, c.id_usuario
    FROM usuario u
    JOIN curriculo c ON u.id = c.id_usuario
";
$curriculos = mysqli_query($con, $query);

// Verifique se a consulta retornou dados
if (!$curriculos) {
    die("Erro na consulta SQL: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="public/assets/css/inc/style.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
                <div>
                    <?php 
                    if (isset($_SESSION['nome_empresa'])) {
                        echo '<h1>Olá, ' . htmlspecialchars($_SESSION['nome_empresa']) . '</h1>';
                    } else {
                        echo '<h1>Olá, visitante</h1>';
                    }
                    ?>
                </div>
            </div>
            <div class="cabecalho_link">
                <li>
                    <a href="cadastrar_vaga.php">Cadastrar Vaga</a>
                </li>
                <li>
                    <a href="vagas.php">Vagas Cadastradas</a>
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
                            <th>Contato</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($curriculos) > 0) : ?>
                            <?php while ($curriculo = mysqli_fetch_assoc($curriculos)) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($curriculo['nome']) ?></td>
                                    <td><?= htmlspecialchars($curriculo['area']) ?></td>
                                    <td><?= htmlspecialchars($curriculo['experiencia']) ?></td>
                                    <td><?= htmlspecialchars($curriculo['telefone']) ?></td>
                                    <td>
                                        <form action="detalhes.php" method="POST">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($curriculo['id_usuario']) ?>">
                                            <button type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Nenhum currículo encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <?php
            // Verificando a última visita da empresa
            if (isset($_COOKIE['ultima_visita_empresa'])) {
                echo "<p>Última visita da empresa: <span>" . htmlspecialchars($_COOKIE['ultima_visita_empresa']) . "</span></p>";
            } else {
                echo "<p>Bem-vindo! Esta é a primeira visita da sua empresa.</p>";
            }
            ?>
        </footer>
    </div>
</body>
</html>

<?php 
// Fechando a conexão com o banco
mysqli_close($con); 
?>
