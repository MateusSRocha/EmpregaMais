<?php 
header('Content-Type: application/json');

$texto = filter_input(INPUT_GET, 'texto', FILTER_DEFAULT);

$con = mysqli_connect('localhost', 'root', '', 'empregamais');

$query = "SELECT vaga.tipo_vaga, empresa.nome FROM vaga, empresa WHERE vaga.id_empresa=empresa.id AND (vaga.tipo_vaga LIKE '%$texto%' OR empresa.nome LIKE '%$texto%' OR vaga.experiencia LIKE '%$texto%' OR vaga.nivel_escolaridade LIKE '%$texto%' OR vaga.detalhes LIKE '%$texto%')";

$empresas = mysqli_query($con, $query);

$data = mysqli_fetch_all($empresas);

echo json_encode($data)
?>