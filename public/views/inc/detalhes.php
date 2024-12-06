<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="public/assets/css/inc/detalhes.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
        </div>
        <div class="cabecalho_link">
            <li><a href="index.php">Home</a></li>
            <li><form method="POST"><button type="submit" name="sair">Sair</button></form></li>
        </div>
    </header>
    <div class="container">
        <h1>Detalhes do Usuário</h1>
        <?php
        if (isset($_POST['id'])) {
            $id_usuario = intval($_POST['id']); 

            $con = mysqli_connect('localhost', 'root', '', 'empregamais');
            if (!$con) {
                die("<p style='color: red;'>Erro na conexão: " . mysqli_connect_error() . "</p>");
            }

            $query = "
                SELECT 
                    u.nome, u.email, u.telefone, u.genero, u.datacadastro, 
                    c.endereco, c.area, c.objetivo, c.formacao, c.experiencia, c.habilidades, c.idiomas, c.linkedin
                FROM usuario u
                LEFT JOIN curriculo c ON u.id = c.id_usuario
                WHERE u.id = $id_usuario
            ";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $usuario = mysqli_fetch_assoc($result);

                // Dados pessoais
                echo "<div class='section'>";
                echo "<h2>Dados Pessoais</h2>";
                echo "<p><strong>Nome:</strong> " . htmlspecialchars($usuario['nome']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($usuario['email']) . "</p>";
                echo "<p><strong>Telefone:</strong> " . htmlspecialchars($usuario['telefone']) . "</p>";
                echo "<p><strong>Gênero:</strong> " . htmlspecialchars($usuario['genero']) . "</p>";
                echo "<p><strong>Data de Cadastro:</strong> " . htmlspecialchars($usuario['datacadastro']) . "</p>";
                echo "</div>";

                // Dados do currículo
                echo "<div class='section'>";
                echo "<h2>Dados do Currículo</h2>";
                if (!empty($usuario['endereco'])) {
                    echo "<p><strong>Endereço:</strong> " . htmlspecialchars($usuario['endereco']) . "</p>";
                    echo "<p><strong>Área de atuação:</strong> " . htmlspecialchars($usuario['area']) . "</p>";
                    echo "<p><strong>Objetivo:</strong> " . htmlspecialchars($usuario['objetivo']) . "</p>";
                    echo "<p><strong>Formação:</strong> " . htmlspecialchars($usuario['formacao']) . "</p>";
                    echo "<p><strong>Experiência:</strong> " . htmlspecialchars($usuario['experiencia']) . "</p>";
                    echo "<p><strong>Habilidades:</strong> " . htmlspecialchars($usuario['habilidades']) . "</p>";
                    echo "<p><strong>Idiomas:</strong> " . htmlspecialchars($usuario['idiomas']) . "</p>";
                    
                    if ($usuario['linkedin'] != null) {
                    echo "<p><strong>LinkedIn:</strong> <a href='" . htmlspecialchars($usuario['linkedin']) . "' target='_blank'>Perfil</a></p>";
                    } else {
                    echo "<p style='color:red;'>LinkedIn não informado.</p>";
                    }
    
                } else {
                    echo "<p>Este usuário ainda não possui currículo cadastrado.</p>";
                }
                echo "</div>";
            } else {
                echo "<p style='color: red;'>Usuário não encontrado.</p>";
            }

            mysqli_close($con);
        } else {
            echo "<p style='color: red;'>ID do usuário não fornecido.</p>";
        }
        ?>
    </div>
    <div>
        <a href="falar_com_usuário.php">Contatar</a>
    </div>
    <footer>
        <p>&copy; 2024 EmpregaMais - Todos os direitos reservados.</p>
    </footer>
</body>

</html>
