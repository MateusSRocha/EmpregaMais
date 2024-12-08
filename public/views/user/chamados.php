<?php
// Inicie a sessão no início do arquivo e garanta que não há espaços antes de <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error());
}

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: ./views/log/index.php');
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Consultas para candidaturas
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

// Consultas para entrevistas
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
        <h2>Vagas às quais você se candidatou</h2>
        <?php if (mysqli_num_rows($result_candidaturas) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($vaga = mysqli_fetch_assoc($result_candidaturas)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vaga['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['empresa_nome']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não se candidatou a nenhuma vaga.</p>
        <?php endif; ?>

        <h2>Vagas nas quais você foi chamado para entrevista</h2>
        <?php if (mysqli_num_rows($result_entrevistas) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Empresa</th>
                        <th>Data da Entrevista</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($vaga = mysqli_fetch_assoc($result_entrevistas)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vaga['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($vaga['empresa_nome']); ?></td>
                            <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($vaga['data_entrevista']))); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Você ainda não foi chamado para nenhuma entrevista.</p>
        <?php endif; ?>
    </main>
</body>
</html>
