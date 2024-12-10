<?php

$con = mysqli_connect('localhost', 'root', 'usbw', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error());
}

if (!isset($_SESSION['empresa_id'])) {
    die('Você precisa estar logado como empresa para acessar esta página.');
}

$id_empresa = $_SESSION['empresa_id']; 


if (isset($_POST['id_vaga'])) {
    $id_vaga = $_POST['id_vaga'];

    $query_verifica_vaga = "SELECT * FROM vaga WHERE id = '$id_vaga' AND id_empresa = '$id_empresa'";
    $result_vaga = mysqli_query($con, $query_verifica_vaga);

    if (mysqli_num_rows($result_vaga) == 0) {
        die('Vaga não encontrada ou você não tem permissão para visualizar.');
    }
    
    $query_candidatos = "SELECT u.id, u.nome, u.email, u.telefone, c.experiencia, c.area, ca.status
    FROM candidatura ca
    INNER JOIN usuario u ON ca.id_usuario = u.id
    INNER JOIN curriculo c ON u.id = c.id_usuario
    WHERE ca.id_vaga = '$id_vaga'";
    $result_candidatos = mysqli_query($con, $query_candidatos);

    if (!$result_candidatos) {
        die('Erro na consulta SQL: ' . mysqli_error($con));
    }
} else {
    die('ID da vaga não fornecido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatos para a Vaga</title>
    <link rel="stylesheet" href="public/assets/css/inc/candidatos.css">
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="logo">
            <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
        </div>
        <div class="cabecalho_link">
            <li><a href="index.php">Voltar</a></li>
        </div>
    </header>

    <main>
        <div class="candidatos-lista">
            <h2>Candidatos para a Vaga</h2>
            <div class="candidatos-container">
    <?php
        if (mysqli_num_rows($result_candidatos) > 0) {
            while ($candidato = mysqli_fetch_assoc($result_candidatos)) {
                echo "<div class='candidato-item'>
                        <h3>" . htmlspecialchars($candidato['nome']) . "</h3>
                        <p><strong>Email:</strong> " . htmlspecialchars($candidato['email']) . "</p>
                        <p><strong>Experiência:</strong> " . htmlspecialchars($candidato['experiencia']) . " anos</p>
                        <p><strong>Área:</strong> " . htmlspecialchars($candidato['area']) . "</p>

                        <!-- Formulário para solicitar entrevista (enviado para marcar_entrevista.php) -->
                        <form action='marcar_entrevista.php' method='POST'>
                            <input type='hidden' name='id_usuario' value='" . $candidato['id'] . "'>
                            <input type='hidden' name='id_vaga' value='" . $id_vaga . "'>
                            <button type='submit'>Solicitar Entrevista</button>
                        </form>
                    </div>";
            }
        } else {
            echo "<p>Não há candidatos para esta vaga.</p>";
        }
    ?>
</div>


        </div>
    </main>
</body>
</html>

<?php
mysqli_close($con);
?>
