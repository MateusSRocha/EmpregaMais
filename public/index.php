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
    if(!isset($_SESSION['empresa'])) {
        require('./views/user/' . $url);
    } else {
        require('./views/inc/' . $url);
    }
}

$nome = "ultima_visita";
$valor = date("Y-m-d H:i:s");
$expiracao = time() + (365 * 86.400);
setcookie($nome, $valor, $expiracao, "/");


$con = mysqli_connect('localhost', 'root', '', 'empregamais');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($con) {
        $analisa = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $analisa);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['login'] = true;
            $_SESSION['usuario_id'] = $usuario['id']; 
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
    $datacadastro = date('Y-m-d');

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

        $query = "INSERT INTO usuario VALUES (NULL, '$email', '$nome', '$telefone','$senha', '$genero','$datacadastro')";
        $result = mysqli_query($con, $query);

        mysqli_close($con);
        $_SESSION['login'] = true;
        $_SESSION['usuario_id'] = $usuario['id']; 
        echo "<script>window.location.href = './'</script>";
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

if (isset($_POST['cadEmpresa'])) {
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $datacadastro = date('Y-m-d');

    if ($con) {
        $query = "INSERT INTO empresa  VALUES (NULL, '$cnpj', '$senha', '$endereco', '$nome', '$telefone','$datacadastro')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['login'] = true;
            $_SESSION['empresa'] = true;
            $_SESSION['empresa_id'] = mysqli_insert_id($con);
            echo "<script>window.location.href = './'</script>";
        } else {
            echo 'Erro ao inserir dados: ' . mysqli_error($con);
        }

        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

if (isset($_POST['loginEmpresa'])) {
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];

    if ($con) {
        $analisa = "SELECT * FROM empresa WHERE cnpj='$cnpj' AND senha='$senha'";
        $result = mysqli_query($con, $analisa);
        if (mysqli_num_rows($result) > 0) {
            $empresa = mysqli_fetch_assoc($result); 
            $_SESSION['login'] = true;
            $_SESSION['empresa'] = true;
            $_SESSION['empresa_id'] = $empresa['id']; 
            echo "<script>window.location.href = './';</script>";
        } else {
            echo "<script>alert('CNPJ ou senha incorretos');</script>";
            echo "<script>window.location.href = './loginempresa.php';</script>";
        }
        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco: ' . mysqli_connect_error();
    }    
}

if (isset($_POST['sair'])) {
    session_unset();
    session_destroy();
    echo "<script>window.location.href = './index.php'</script>";
    exit();
}

if (isset($_POST['cadVaga'])) {
    if (isset($_SESSION['empresa_id'])) {
        $id_empresa = $_SESSION['empresa_id']; 
        $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);
        $tipo_vaga = mysqli_real_escape_string($con, $_POST['tipo']);
        $experiencia = mysqli_real_escape_string($con, $_POST['experiencia']);
        $nivel_escolaridade = mysqli_real_escape_string($con, $_POST['nivel_escolar']);
        $detalhes = mysqli_real_escape_string($con, $_POST['detalhe']);
        $data_publicacao = date('Y-m-d');

        if ($con) {
            $query = "INSERT INTO vaga VALUES (NULL, '$id_empresa', '$quantidade', '$tipo_vaga', '$experiencia', '$nivel_escolaridade', '$detalhes', '$data_publicacao')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>alert('Vaga cadastrada com sucesso!'); window.location.href = './';</script>";
            } else {
                echo 'Erro ao inserir dados: ' . mysqli_error($con); 
            }
            mysqli_close($con);
        } else {
            echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
        }
    } else {
        echo "<script>alert('Você precisa estar logado como empresa para cadastrar uma vaga.');</script>";
    }
}

