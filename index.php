<?php
$login = $_POST['login'] ?? null;
$senha = $_POST['senha'] ?? null;
$status = null;

if (!is_null($login)) {
    require 'Banco.php';
    require 'Funcoes.php';
    $tabela = new Funcoes('usuarios');
    $registros = $tabela->loginUsuario($login);
    foreach ($registros as $registro) {
        if ($login == $registro['login']) {
            if ($senha == $registro['senha']) {
                session_start();
                $_SESSION['usuario'] = $registro['login'];
                header('LOCATION: menu.php');
            } else {
                $status = 'Senha incorreta';
            }
        } else {
            $status = 'Login incorreto';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch</title>
        <link rel="shortcut icon" href="_img/logo.PNG" />
        <link rel="stylesheet" href="_css/estilo.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="login">
            <form method="post">
                <img src="_img/logo.PNG" alt="logo OneTouch"><br>
                <label for="exampleInputEmail1">Login</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="login" required>
                <br><label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="senha" required>
                <br><button type="submit" class="btn btn-primary btn-lg btn-block" name="entrar">Entrar</button>
                <a href="cadastro.php" class="btn btn-secondary btn-lg btn-block" id="cadastrar">Cadastrar</a>
                <br><p><?= $status; ?></p>
            </form>
        </div>
    </body>
</html>
