<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="public/assets/css/user/style.css">
</head>
<body>
    <div class="fundo">
        <header>
            <div class="logo">
                <h1>EMPREGA<span>MAIS - CLIENTE</span></h1>
            </div>
            <div class="cabecalho_link">
                <li>
                    <a href="cadastro.php">Cadastrar curriculo</a>
                </li>
                <li>
                    <form method="POST">
                        <button type="submit" name="sair">Sair</button>
                    </form>
                </li>
            </div>
        </header>
        <main>
            <div class="empresas-recrutando">
                <h2>Empresas que estão recrutando</h2>
                <div class="empresa">
                    <h3>Empresa A</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore repellat quas magnam doloremque ducimus est unde odio natus facere quam ratione ullam, inventore rem illum, deserunt deleniti voluptatum suscipit aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nobis voluptatibus ex repellat nam et, blanditiis dolore voluptatum, reiciendis quia esse tempore ipsum eum harum ad aperiam eius impedit asperiores.</p>
                    <button type="button" onclick="location.href='enviar_curriculo.php?empresa=EmpresaA'">Enviar currículo</button>
                </div>
                <div class="empresa">
                    <h3>Empresa B</h3>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore repellat quas magnam doloremque ducimus est unde odio natus facere quam ratione ullam, inventore rem illum, deserunt deleniti voluptatum suscipit aspernatur? Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nobis voluptatibus ex repellat nam et, blanditiis dolore voluptatum, reiciendis quia esse tempore ipsum eum harum ad aperiam eius impedit asperiores.</p>
                    <button type="button" onclick="location.href='enviar_curriculo.php?empresa=EmpresaB'">Enviar currículo</button>
                </div>
            </div>
        </main>
</body>
</html>