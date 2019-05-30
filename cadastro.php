<?php
$nome = $_POST['nome'] ?? null;
$cpf = $_POST['cpf'] ?? null;
$tel = $_POST['tel'] ?? null;
$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;

if(!is_null($login)){
require 'Banco.php';
require 'Funcoes.php';
$tabela = new Funcoes('usuarios');
$registros = $tabela->cadastrarUsuario($nome, $cpf, $login, $senha);
header('LOCATION: index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch - Cadastro</title>
        <link rel="shortcut icon" href="img/logo.png" />
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <style type="text/css">
        .col-12{
            margin-top: 30px;
            margin-bottom: 30px;
        }
        h3{
            text-align: center;
        }
        #oplogin{
            text-align: center;
        }
    </style>
    <body>
        <header>

        </header>

        <form class="col-12" method="post">
            <h3>Cadastro</h3>
            <br><label for="exampleInputEmail1">Nome Completo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" required maxlength="100">
            <br><label for="exampleInputEmail1">CPF </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cpf" placeholder="000.000.000-00" required min="0100000000" max="99999999999">
            <br><label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login" required maxlength="150">
            <br><label for="exampleInputPassword1">Senha</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="senha" required maxlength="100">
            <br><label for="exampleInputPassword1">Concordo com os <a href="#">Termos de Uso</a> e a <a href="#">Politica de Privacidade</a></label>
            <br><button type="submit" class="btn btn-primary btn-lg btn-block" name="entrar">Cadastrar</button>
            <br><div id="oplogin"> Já tem conta? <a href="index.php">Entrar</a></div><br>
        </form>

    </body>
</html>