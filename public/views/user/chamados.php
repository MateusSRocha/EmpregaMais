<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$con = mysqli_connect('localhost', 'root', 'usbw', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error());
}

if (!isset($_SESSION['id_usuario'])) {
    header('Location: ./views/log/index.php');
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

$query_candidaturas = "
    SELECT 
        vaga.tipo_vaga AS titulo, 
        vaga.detalhes AS descricao, 
        empresa.nome AS empresa_nome 
    FROM candidatura 
    INNER JOIN vaga ON candidatura.id_vaga = vaga.id 
    INNER JOIN empresa ON vaga.id_empresa = empresa.id 
    WHERE candidatura.id_usuario = '$id_usuario'";
$result_candidaturas = mysqli_query($con, $query_candidaturas);

if ($result_candidaturas === false) {
    die('Erro na consulta de candidaturas: ' . mysqli_error($con));
}

$query_entrevistas = "
    SELECT 
        vaga.tipo_vaga AS titulo, 
        vaga.detalhes AS descricao, 
        empresa.nome AS empresa_nome, 
        entrevistas.data_entrevista 
    FROM entrevistas 
    INNER JOIN vaga ON entrevistas.id_vaga = vaga.id 
    INNER JOIN empresa ON entrevistas.id_empresa = empresa.id 
    WHERE entrevistas.id_usuario = '$id_usuario'";
$result_entrevistas = mysqli_query($con, $query_entrevistas);

if ($result_entrevistas === false) {
    die('Erro na consulta de entrevistas: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Vagas</title>
    <link rel="stylesheet" href="public/assets/css/user/chamados.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
        </div>
        <h1>Minhas Candidaturas</h1>
        <div class="cabecalho_link">
            <li><a href="index.php">Home</a></li>
        </div>
    </header>
    <main>
        <div class="chamados">
            <h2>Vagas às quais você se candidatou</h2>
            <?php
            if (mysqli_num_rows($result_candidaturas) > 0):
                echo "<table class='table-chamados'>";
                echo '<thead>';
                echo '<tr>';
                echo '<th>Título</th>';
                echo '<th>Descrição</th>';
                echo '<th>Empresa</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($vaga = mysqli_fetch_assoc($result_candidaturas)):
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($vaga['titulo']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['descricao']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['empresa_nome']) . '</td>';
                    echo '</tr>';
                endwhile;
                echo '</tbody>';
                echo '</table>';
            else:
                echo '<p>Você ainda não se candidatou a nenhuma vaga.</p>';
            endif;
            ?>
            <h2>Vagas nas quais você foi chamado para entrevista</h2>
            <?php
            if (mysqli_num_rows($result_entrevistas) > 0):
                echo "<table class='table-chamados'>";
                echo '<thead>';
                echo '<tr>';
                echo '<th>Título</th>';
                echo '<th>Descrição</th>';
                echo '<th>Empresa</th>';
                echo '<th>Data da Entrevista</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($vaga = mysqli_fetch_assoc($result_entrevistas)):
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($vaga['titulo']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['descricao']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['empresa_nome']) . '</td>';
                    echo '<td>' . htmlspecialchars(date('d/m/Y', strtotime($vaga['data_entrevista']))) . '</td>';
                    echo '</tr>';
                endwhile;
                echo '</tbody>';
                echo '</table>';
            else:
                echo '<p>Você ainda não foi chamado para nenhuma entrevista.</p>';
            endif;
            ?>
        </div>
    </main>
</body>
</html>
