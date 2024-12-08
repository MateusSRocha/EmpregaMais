<?php
// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error());
}

if (isset($_POST['id_vaga'])) {
    $id_vaga = $_POST['id_vaga'];

    $query = "SELECT vaga.*, empresa.nome AS nome_empresa, empresa.endereco AS localizacao_empresa, empresa.telefone AS telefone_empresa
              FROM vaga
              INNER JOIN empresa ON vaga.id_empresa = empresa.id
              WHERE vaga.id = $id_vaga";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Erro na consulta SQL: ' . mysqli_error($con)); 
    }

    if (mysqli_num_rows($result) > 0) {
        $vaga = mysqli_fetch_assoc($result);
    } else {
        die('Vaga não encontrada.');
    }
} else {
    die('ID da vaga não fornecido.');
}

if (isset($_POST['candidatar'])) {
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        $query_verifica_candidatura = "SELECT * FROM candidatura WHERE id_usuario = '$id_usuario' AND id_vaga = '$id_vaga'";
        $result_verifica = mysqli_query($con, $query_verifica_candidatura);

        if (mysqli_num_rows($result_verifica) > 0) {
            echo '<script>alert("Você já está cadastrado para esta vaga.");</script>';
        } else {
            $query_candidatura = "INSERT INTO candidatura (id_usuario, id_vaga) VALUES ('$id_usuario', '$id_vaga')";
            if (mysqli_query($con, $query_candidatura)) {
                echo '<script>alert("Candidatura realizada com sucesso!");</script>';
            } else {
                echo '<script>alert("Erro ao realizar candidatura: ' . mysqli_error($con) . '");</script>';
            }
        }
    } else {
        echo '<script>alert("Você precisa estar logado para se candidatar.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Vaga</title>
    <link rel="stylesheet" href="public/assets/css/user/enviar_curriculo.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
            </div>

            <div class="cabecalho_link">
                <li><a href="index.php">Voltar</a></li>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="detalhes-vaga">
                    <h2>Detalhes da Vaga</h2>
                    <?php if (isset($vaga)) { ?>
                        <div class="section">
                        <div class="vaga-info">
                            <h3>Vaga: <?php echo htmlspecialchars($vaga['tipo_vaga']); ?></h3>
                            <p><strong>Nome da Empresa:</strong> <?php echo htmlspecialchars($vaga['nome_empresa']); ?></p>
                            <p><strong>Quantidade de Vagas:</strong> <?php echo htmlspecialchars($vaga['quantidade']); ?></p>
                            <p><strong>Experiência Requerida:</strong> <?php echo htmlspecialchars($vaga['experiencia']); ?> anos</p>
                            <p><strong>Escolaridade Requerida:</strong> <?php echo htmlspecialchars($vaga['nivel_escolaridade']); ?></p>
                            <p><strong>Detalhes da Vaga:</strong> <?php echo htmlspecialchars($vaga['detalhes']); ?></p>
                            <p><strong>Data de Publicação:</strong> <?php echo date('d/m/Y', strtotime($vaga['data_publicacao'])); ?></p>
                        </div>
                        </div>
                        <div class="section">
                        <h2>Informações da Empresa</h2>
                        <div class="empresa-info">
                            <p><strong>Nome da Empresa:</strong> <?php echo htmlspecialchars($vaga['nome_empresa']); ?></p>
                            <p><strong>Contato:</strong> <?php echo htmlspecialchars($vaga['telefone_empresa']); ?></p>
                            <p><strong>Localização:</strong> <?php echo htmlspecialchars($vaga['localizacao_empresa']); ?></p>
                        </div>
                        </div>
                        <!-- Formulário de candidatura -->
                        <form action="" method="POST">
                            <input type="hidden" name="id_vaga" value="<?php echo $id_vaga; ?>">
                            <button type="submit" name="candidatar">Candidatar-se</button>
                        </form>
                    <?php } else { ?>
                        <p>Detalhes não disponíveis para a vaga selecionada.</p>
                    <?php } ?>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 E+ - Todos os direitos reservados.</p>
        </footer>
    </div>
</body>
</html>

<?php
mysqli_close($con);
?>
