<?php

session_start();

if (empty($_GET['url'])) {
    $url = 'index.php';
} else {
    $url = $_GET['url'];
}

if (!isset($_SESSION['login'])) {
    require('./views/log/' . $url);
} else {
    require('./views/src/' . $url);
}

$con = mysqli_connect('localhost', 'root', '', 'empregamais');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($con) {
        $analisa = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $analisa);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['login'] = true;
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

if (isset($_POST['cadastro'])) {
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $genero = $_POST['sexo'];

    if ($con) {
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email já existente')</script>";
            echo "<script>window.location.href = './cadastro.php'</script>";
            die();
        }

        $query = "SELECT * FROM usuario WHERE telefone = '$telefone'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Telefone já existente')</script>";
            echo "<script>window.location.href = './cadastro.php'</script>";
            die();
        }

        $query = "INSERT INTO usuario VALUES (NULL, '$email', '$nome', '$telefone','$senha', '$genero')";
        $result = mysqli_query($con, $query);

        mysqli_close($con);
        $_SESSION['login'] = true;
        echo "<script>window.location.href = './'</script>";
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
            $_SESSION['login'] = true;
            echo "<script>window.location.href = './'</script>";
        } else {
            echo 'Erro ao inserir dados: ' . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}
