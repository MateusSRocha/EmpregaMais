<?php
$con = mysqli_connect('localhost', 'root', 'usbw', 'empregamais');
$pes = $_GET['pesquisa'];

$query = "SELECT vaga.*, empresa.nome AS nome_empresa FROM vaga, empresa WHERE vaga.id_empresa=empresa.id AND (vaga.tipo_vaga LIKE '%$pes%' OR empresa.nome LIKE '%$pes%' OR vaga.experiencia LIKE '%$pes%' OR vaga.nivel_escolaridade LIKE '%$pes%' OR vaga.detalhes LIKE '%$pes%')";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaga: <?= htmlspecialchars($pes) ?></title>
    <link rel="stylesheet" href="public/assets/css/user/style.css"> 
    <style>
        body {
            background-image: linear-gradient(135deg, #8e2de2, #b55ba1);;
        }
        h1 {
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="public/assets/images/botao-logo.png" alt="Logo da Empresa: E+">
        </div>
        <h1>Resultados de Pesquisa</h1>
        <nav class="cabecalho_link">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="empresas-recrutando">
            <h2>Empresas Encontradas</h2>
            <?php
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="vagasEmprego">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Quantidade</th>';
                echo '<th>Empresa</th>';
                echo '<th>Tipo da Vaga</th>';
                echo '<th>Experiência</th>';
                echo '<th>Nível Escolaridade</th>';
                echo '<th>Detalhes</th>';
                echo '<th>Ação</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($vaga = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($vaga['quantidade']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['nome_empresa']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['tipo_vaga']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['experiencia']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['nivel_escolaridade']) . '</td>';
                    echo '<td>' . htmlspecialchars($vaga['detalhes']) . '</td>';
                    echo '<td>';
                    echo '<form action="enviar_curriculo.php" method="POST">';
                    echo "<input type='hidden' name='id_vaga' value='" . htmlspecialchars($vaga['id']) . "'>";
                    echo '<button type="submit">Ver Detalhes</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Nenhuma vaga encontrada.</p>';
            }
            ?>
        </div>
    </main>
</body>
</html>
