<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/assets/css/inc/style.css">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <h1>EMPREGA<span>MAIS - EMPRESA</span></h1>
            </div>
            <div class="cabecalho_link">
                <li>
                    <a href="cadastro.php">Cadastrar Vaga</a>
                </li>
                <li>
                    <form method="POST">
                        <button type="submit" name="sair">Sair</button>
                    </form>
                </li>
            </div>
        </header>
        <main>
            <div class="curriculos-disponiveis">
                <h2>Currículos de Usuários</h2>
                <div class="curriculo">
                    <h3>Usuário A</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore repellat quas magnam doloremque ducimus est unde odio natus facere quam ratione ullam, inventore rem illum, deserunt deleniti voluptatum suscipit aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nobis voluptatibus ex repellat nam et, blanditiis dolore voluptatum, reiciendis quia esse tempore ipsum eum harum ad aperiam eius impedit asperiores.</p>
                    <button type="button" onclick="location.href='falar_com_usuario.php?usuari=UsuarioA'">Falar com Usuário</button>
                </div>
                <div class="curriculo">
                    <h3>Usuário B</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore repellat quas magnam doloremque ducimus est unde odio natus facere quam ratione ullam, inventore rem illum, deserunt deleniti voluptatum suscipit aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nobis voluptatibus ex repellat nam et, blanditiis dolore voluptatum, reiciendis quia esse tempore ipsum eum harum ad aperiam eius impedit asperiores.</p>
                    <button type="button" onclick="location.href='falar_com_usuario.php?usuari=UsuarioB'">Falar com Usuário</button>
                </div>
            </div>
        </main>
</body>
</html>