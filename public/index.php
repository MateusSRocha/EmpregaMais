<?php

if (empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

require('./views/' . $url);

$con = mysqli_connect('localhost', 'root', '', 'empregamais');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($con) {
        $analisa = "SELECT * FROM cliente WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $analisa);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>window.location.href = './'</script>";
        } else {
            echo "<script>alert('Email ou senha incorretos')</script>";
            echo "<script>window.location.href = './logins.php'</script>";
        }

        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco : ';
    }
}

if (isset($_POST['cadCurriculo'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $datanasc = $_POST['datanasc'];
    $genero = $_POST['sexo'];
    $endereco = $_POST['endereco'];
    $area = $_POST['area'];
    $temptrab = $_POST['temptrab'];
    // $pdfCurri = $_POST['pdf_arquivo'];

    if ($con) {
        $query = "SELECT * FROM curriculo WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email já existente')</script>";
            echo "<script>window.location.href = './cadcurriculos.php'</script>";
            die();
        }

        $query = "SELECT * FROM curriculo WHERE telefone = '$telefone'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Telefone já existente')</script>";
            echo "<script>window.location.href = './cadcurriculos.php'</script>";
            die();
        }

        $query = "INSERT INTO curriculo VALUES (NULL, '$email', '$nome', '$telefone','$datanasc', '$genero', '$endereco', '$area', '$temptrab')";
        $result = mysqli_query($con, $query);

        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

if (isset($_POST['cadEmpresa'])) {
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

    if ($con) {
        $query = "INSERT INTO empresa  VALUES (NULL, '$cnpj', '$endereco', '$nome', '$telefone')";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo "<script>window.location.href = './'</script>";
        } else {
            echo 'Erro ao inserir dados: ' . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}
