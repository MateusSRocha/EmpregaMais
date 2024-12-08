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
    if (!isset($_SESSION['empresa'])) {
        require('./views/user/' . $url);
    } else {
        require('./views/inc/' . $url);
    }
}

setcookie("ultima_visita", date("Y-m-d H:i:s"), time() + (365 * 86.400), "/");

$con = mysqli_connect('localhost', 'root', '', 'empregamais');

// Login do usuário
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($con) {
        $analisa = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $analisa);
        if (mysqli_num_rows($result) > 0) {
            $usuario = mysqli_fetch_assoc($result);
            $_SESSION['login'] = true;
            $_SESSION['email_usuario'] = $email;
            $_SESSION['id_usuario'] = $usuario['id'];  // Armazena o ID do usuário
            $_SESSION['nome_usuario'] = $usuario['nome'];
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

// Cadastro do usuário
if (isset($_POST['cadastro'])) {
    $email = $_POST['email'];
    $nome_usu = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $genero = $_POST['sexo'];
    $datacadastro = date('Y-m-d');

    if ($con) {
        // Verifica se o email já está cadastrado
        $query = "SELECT * FROM usuario WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email já existente')</script>";
            echo "<script>window.location.href = './cadastro.php'</script>";
            die();
        }

        // Verifica se o telefone já está cadastrado
        $query = "SELECT * FROM usuario WHERE telefone = '$telefone'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Telefone já existente')</script>";
            echo "<script>window.location.href = './cadastro.php'</script>";
            die();
        }

        // Insere o usuário no banco
        $query = "INSERT INTO usuario VALUES (NULL, '$email', '$nome_usu', '$telefone','$senha', '$genero','$datacadastro')";
        $result = mysqli_query($con, $query);

        // Recupera o ID do usuário após a inserção
        $usuario_id = mysqli_insert_id($con);

        // Armazena o ID do usuário na sessão
        $_SESSION['login'] = true;
        $_SESSION['email_usuario'] = $email;
        $_SESSION['id_usuario'] = $usuario_id;  // Armazena o ID
        $_SESSION['nome_usuario'] = $nome_usu;
        echo "<script>window.location.href = './'</script>";
        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

// Cadastro da empresa
if (isset($_POST['cadEmpresa'])) {
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    $endereco = $_POST['endereco'];
    $nome_emp = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $datacadastro = date('Y-m-d');

    if ($con) {
        $query = "INSERT INTO empresa  VALUES (NULL, '$cnpj', '$senha', '$endereco', '$nome_emp', '$telefone','$datacadastro')";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['login'] = true;
            $_SESSION['empresa'] = true;
            $_SESSION['empresa_id'] = mysqli_insert_id($con);  // Armazena o ID da empresa
            $_SESSION['nome_empresa'] = $nome_emp;
            echo "<script>window.location.href = './'</script>";
        } else {
            echo 'Erro ao inserir dados: ' . mysqli_error($con);
        }
        mysqli_close($con);
    } else {
        echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
    }
}

// Login da empresa
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
            $_SESSION['empresa_id'] = $empresa['id'];  // Armazena o ID da empresa
            $_SESSION['nome_empresa'] = $empresa['nome'];
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

// Sair
if (isset($_POST['sair'])) {
    session_unset();
    session_destroy();
    echo "<script>window.location.href = './index.php'</script>";
    exit();
}

// Cadastro de vaga pela empresa
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

if (isset($_POST['cadCurriculo'])) {
    $email_usuario = $_SESSION['email_usuario'];

    $query_usuario = "SELECT id FROM usuario WHERE email='$email_usuario' LIMIT 1";
    $result_usuario = mysqli_query($con, $query_usuario);
    
    if ($result_usuario && mysqli_num_rows($result_usuario) > 0) {
        $usuario_id = mysqli_fetch_assoc($result_usuario)['id'];

        $endereco = $_POST['endereco'];
        $area = $_POST['area'];
        $objetivo = $_POST['objetivo'];
        $formacao = $_POST['formacao'];
        $experiencia = $_POST['experiencia'];
        $habilidades = $_POST['habilidades'];
        $idiomas = $_POST['idiomas'];
        $linkedin = $_POST['linkedin'];

        if ($con) {
            $query = "INSERT INTO curriculo VALUES (NULL,'$usuario_id', '$endereco', '$area', '$objetivo', '$formacao', '$experiencia', '$habilidades', '$idiomas', '$linkedin')";

            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>alert('Currículo cadastrado com sucesso!'); window.location.href = './';</script>";
            } else {
                echo 'Erro ao inserir dados: ' . mysqli_error($con);
            }
            mysqli_close($con);
        } else {
            echo 'Erro na conexão com o banco de dados: ' . mysqli_connect_error();
        }
    } else {
        echo 'Usuário não encontrado.';
    }
}


?>



