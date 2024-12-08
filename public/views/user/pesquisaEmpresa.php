<?php
$con = mysqli_connect('localhost', 'root', '', 'empregamais');
$pes = $_GET['pesquisa'];

$query = "SELECT vaga.*, empresa.nome AS nome_empresa FROM vaga, empresa WHERE vaga.id_empresa=empresa.id AND (vaga.tipo_vaga LIKE '%$pes%' OR empresa.nome LIKE '%$pes%' OR vaga.experiencia LIKE '%$pes%' OR vaga.nivel_escolaridade LIKE '%$pes%' OR vaga.detalhes LIKE '%$pes%')";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaga: <?= $pes ?></title>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($vaga = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $vaga['quantidade'] . '</td>';
            echo '<td>' . $vaga['nome_empresa'] . '</td>';
            echo '<td>' . $vaga['tipo_vaga'] . '</td>';
            echo '<td>' . $vaga['experiencia'] . '</td>';
            echo '<td>' . $vaga['nivel_escolaridade'] . '</td>';
            echo '<td>' . $vaga['detalhes'] . '</td>';
            echo '<td>';
            echo '<form action="enviar_curriculo.php" method="POST">';
            echo     "<input type='hidden' name='id_vaga' value='" . htmlspecialchars($vaga['id']) . "'>";
            echo     '<button type="submit">';
            echo         '<i class="bi bi-search"></i>';
            echo     '</button>';
            echo  '</form>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="7">Nenhuma vaga encontrada.</td></tr>';
    }
    ?>
</body>

</html>