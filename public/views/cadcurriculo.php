<?php
$email = $_POST['email'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$datanasc = $_POST['datanasc'];
$genero= $_POST['sexo'];
$endereco= $_POST['endereco'];
$area = $_POST['area'];
$temptrab = $_POST['temptrab'];
// $pdfCurri = $_POST['pdf_arquivo'];


$con = mysqli_connect('localhost', 'root', '', 'projeto');

if ($con) {
    $query = "SELECT * FROM curriculo WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "E-mail já cadastrado.";
        exit();
    }

       $query = "SELECT * FROM curriculo WHERE nome = '$nome'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Nome da empresa já cadastrado.";
        exit();
    }

$query = "SELECT * FROM curriculo WHERE telefone = '$telefone'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Telefone já cadastrado.";
        exit();
    }


$query = "SELECT * FROM curriculo WHERE datanasc = '$datanasc'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Data de nascimento já cadastrado.";
        exit();
    }

$query = "SELECT * FROM curriculo WHERE genero = '$genero'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Gênero já cadastrado.";
        exit();
    }


    $query = "SELECT * FROM curriculo WHERE endereco = '$endereco'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Endereço já cadastrado.";
        exit();
    }

$query = "SELECT * FROM curriculo WHERE area = '$area'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Área já cadastrado.";
        exit();
    }

$query = "SELECT * FROM curriculo WHERE temptrab = '$temptrab'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "Tempo de trabalho já cadastrado.";
        exit();
    }


    $query = "INSERT INTO curriculo (email, nome, telefone, datanasc, genero, endereco, area, temptrab) VALUES ('$email', '$nome', '$telefone','$datanasc', '$genero', '$endereco', '$area',$temptrab)";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo 'Dados inseridos com sucesso.';
    } else {
        echo 'Erro ao inserir dados: ' . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
}
?>

