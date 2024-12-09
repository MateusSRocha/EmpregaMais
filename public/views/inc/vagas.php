<?php


$con = mysqli_connect('localhost', 'root', '', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error()); 
}

if (!isset($_SESSION['empresa_id'])) {
    echo "<script>alert('Você precisa estar logado como empresa para acessar esta página.');</script>";
    echo "<script>window.location.href = './loginempresa.php';</script>";
    exit();
}

$id_empresa = $_SESSION['empresa_id'];

$query_vagas = "SELECT * FROM vaga WHERE id_empresa = ?";
$stmt = mysqli_prepare($con, $query_vagas);
mysqli_stmt_bind_param($stmt, "i", $id_empresa); 
mysqli_stmt_execute($stmt);
$result_vagas = mysqli_stmt_get_result($stmt);

if (!$result_vagas) {
    die('Erro na consulta SQL: ' . mysqli_error($con));
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Candidatos</title>
    <link rel="stylesheet" href="public/assets/css/inc/vagas.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
        </div>
        <div class="cabecalho_link">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="vagas-lista">
            <h2>Minhas Vagas</h2>
            <?php
            if (mysqli_num_rows($result_vagas) > 0) {
                while ($vaga = mysqli_fetch_assoc($result_vagas)) {
                    $id_vaga = $vaga['id'];
                    echo "<div class='vaga-item'>";
                    echo "<h3>Vaga: " . htmlspecialchars($vaga['tipo_vaga']) . "</h3>";
                    echo "<p><strong>Id da Vaga:</strong> " . $id_vaga . "</p>";
                    echo "<p><strong>Detalhes:</strong> " . htmlspecialchars($vaga['detalhes']) . "</p>";
                    echo "<p><strong>Quantidade de Vagas:</strong> " . htmlspecialchars($vaga['quantidade']) . "</p>";

                    echo "<form action='candidatos.php' method='POST'>";
                    echo "<input type='hidden' name='id_vaga' value='$id_vaga'>";
                    echo "<button type='submit'>Ver Candidatos</button>";
                    echo "</form>";

                    echo "</div>";
                }
            } else {
                echo "<p>Não há vagas cadastradas.</p>";
            }
            ?>
        </div>
    </main>
</body>
</html>

<?php
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
