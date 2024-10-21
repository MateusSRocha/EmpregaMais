<?php
    $con = mysqli_connect('localhost', 'root', '', 'empregamais');
    $query = "
        SELECT u.nome, u.telefone, c.area, c.temptrab
        FROM usuario u
        JOIN curriculo c ON u.id = c.id_usuario
    ";
    $curriculos = mysqli_query($con, $query);
?>

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
                <div>
                <?php 
                    if (isset($_SESSION['nome_empresa'])) {
                        echo '<h1>Olá, '. $_SESSION['nome_empresa']. '</h1>';
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
                        <?php
                        while ($curriculo = mysqli_fetch_assoc($curriculos)) {
                        ?>
                                <tr>
                                    <td><?= $curriculo['nome'] ?></td>
                                    <td><?= $curriculo['area'] ?></td>
                                    <td><?= $curriculo['temptrab'] ?></td>
                                    <td><?= $curriculo['telefone'] ?></td>
                                    <td><button><i class="bi bi-search"></i></button></td>
                                </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <?php
            if (isset($_COOKIE['ultima_visita_empresa'])) {
                echo "<p>Última visita da empresa: <span>{$_COOKIE['ultima_visita_empresa']}</span></p>";
            } else {
                echo "<p>Bem-vindo! Esta é a primeira visita da sua empresa.</p>";
            }

            setcookie("ultima_visita_empresa", date("Y-m-d H:i:s"), time() + (365 * 24 * 60 * 60), "/");
            ?>
        </footer>
    </div>
</body>

</html>
