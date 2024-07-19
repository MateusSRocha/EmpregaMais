<?php
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    $con = mysqli_connect('localhost', 'root', '', 'projeto');
if($con) {
    $query = "INSERT INTO empresa (cnpj, endereco, nome, telefone) VALUES ( '$cnpj', '$endereco', '$nome', '$telefone')";
    $result = mysqli_query($con, $query);



    if ($result) {
        echo 'Dados inseridos com sucesso.';
        header("location: index.html");
        exit();
    } else {
        echo 'Erro ao inserir dados: ' . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
?>

