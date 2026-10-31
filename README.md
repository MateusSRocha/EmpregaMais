# EmpregaMais

Plataforma de vagas de emprego feita em PHP, que conecta candidatos e empresas. O projeto foi concebido em 2023 como avaliação prática da disciplina de Programação para Web.

> **Esta é a versão 1 (PHP procedural).** A v2 está sendo reescrita como API em Node/TypeScript: link do repositório novo, quando existir.

## Funcionalidades

**Candidato**
- Cadastro e login
- Criação e edição de currículo
- Candidatura a vagas

**Empresa**
- Cadastro e login
- Publicação de vagas
- Visualização dos candidatos de cada vaga
- Agendamento de entrevistas

## Tecnologias

- PHP (procedural)
- MySQL
- HTML, CSS e JavaScript

## Modelo de dados

Tabelas: `usuario`, `curriculo`, `empresa`, `vaga`, `candidatura` e `entrevistas`.

O script de criação do banco está em `database/`.

## Como rodar

1. Instale o [XAMPP](https://www.apachefriends.org/) e inicie o Apache e o MySQL.
2. Clone o repositório dentro da pasta `htdocs` do XAMPP:
   ```bash
   git clone https://github.com/MateusSRocha/EmpregaMais.git
   ```
3. No phpMyAdmin (`http://localhost/phpmyadmin`), crie um banco chamado `empregamais` e importe o arquivo `.sql` pela aba **Importar**.
4. Acesse `http://localhost/EmpregaMais/public/`.

A conexão usa o padrão do XAMPP (usuário `root`, sem senha). Se o seu MySQL tiver senha, ajuste a conexão nos arquivos PHP.
