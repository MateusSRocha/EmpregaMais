<?php

// Conexão com o banco de dados
$con = mysqli_connect('localhost', 'root', '', 'empregamais');
if (!$con) {
    die('Erro na conexão: ' . mysqli_connect_error());
}

if (!isset($_SESSION['empresa_id'])) {
    die('Você precisa estar logado como empresa para acessar esta página.');
}

$id_empresa = $_SESSION['empresa_id']; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Entrevista</title>
    <link rel="shortcut icon" href="public/assets/images/favicon.ico" type="image/x-icon">
    <style>
        
        :root {
            --verde-escuro: #2e8b57;
            --verde: #32cd32;
            --verde-claro: #DAF7A6;
            --preto: #333333;
            --cinza-claro: #f3f3f3;
            --branco: #ffffff;
            --gradiente: linear-gradient(135deg, #2e8b57, #32cd32);
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--cinza-claro);
            margin: 0;
            padding: 0;
            color: var(--preto);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            list-style: none;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5% 1rem 2%;
            background: var(--gradiente);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        
        .logo img {
            width: 3.5rem;
        }
        
        .cabecalho_link {
            display: flex;
            gap: 1.5rem;
        }
        
        .cabecalho_link a {
            margin-top: 8px;
            color: var(--branco);
            font-weight: 600;
            transition: color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }
        
        .cabecalho_link a:hover {
            color: var(--verde-claro);
            transform: scale(1.1);
        }
        
        .cabecalho_link li button {
            background-color: var(--verde-escuro);
            color: var(--branco);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
            width: 100%;
            font-size: 1rem;
        }
        
        .cabecalho_link li button:hover {
            color: var(--verde-claro);
        }
main {
    max-width: 600px;
    margin: 40px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

main h2 {
    text-align: center;
    color: #000;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

form label {
    font-weight: bold;
    color: #000;
}

form input[type="date"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

form button {
    background-color: var(--verde-escuro);
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

form button:hover {
    background-color: var(--verde);
}

p {
    text-align: center;
    margin: 10px;
}
    </style>
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
    <h2>Solicitar Entrevista</h2>
    <form method="POST" action="">
        <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_POST['id_usuario'] ?? ''); ?>">
        <input type="hidden" name="id_vaga" value="<?php echo htmlspecialchars($_POST['id_vaga'] ?? ''); ?>">
        <label for="data_entrevista">Data da Entrevista:</label>
        <input type="date" name="data_entrevista" required>
        <button type="submit">Enviar Solicitação</button>

        <?php 
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_usuario = $_POST['id_usuario'] ?? null;
                $id_vaga = $_POST['id_vaga'] ?? null;
                $data_entrevista = $_POST['data_entrevista'] ?? null;

                if (strtotime($data_entrevista) < strtotime(date('Y-m-d'))) {
                    echo "<p>A data da entrevista deve ser uma data futura.</p>";
                } else {
                    $id_usuario = mysqli_real_escape_string($con, $id_usuario);
                    $id_vaga = mysqli_real_escape_string($con, $id_vaga);
                    $data_entrevista = mysqli_real_escape_string($con, $data_entrevista);

                    // Insere a solicitação de entrevista no banco
                    $query = "INSERT INTO entrevistas (id_empresa, id_usuario, id_vaga, data_entrevista, status) 
                            VALUES ('$id_empresa', '$id_usuario', '$id_vaga', '$data_entrevista', 'Aguardando Resposta')";

                        if (mysqli_query($con, $query)) {
                            echo "<p style='color:green;'>Solicitação de entrevista enviada com sucesso!</p>";
                        } else {
                            echo "<p style='color:red;'>Erro ao enviar a solicitação: " . mysqli_error($con) . "</p>";
                        }
                    }
                }

        ?>
    </form>
</main>
</body>
</html>
