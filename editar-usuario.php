<?php
require 'sessao.php';
$id = $_POST['id'] ?? null;
$nome = $_POST['nome'] ?? null;
$cpf = $_POST['cpf'] ?? null;
$deleta = $_POST['deleta'] ?? null;

require 'Banco.php';
require 'Funcoes.php';
$tabela = new Funcoes('usuarios');
$registros = $tabela->loginUsuario($_SESSION['usuario']);

if (!is_null($id)) {
    $tabela2 = new Funcoes('usuarios');
    $registro2 = $tabela->editarUsuario($id, $nome, $cpf);
    header('LOCATION: menu.php');
}

if (!is_null($deleta)) {
    $tabela2 = new Funcoes('usuarios');
    $registro2 = $tabela->deletarUsuario($deleta);
    session_destroy();
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
        <link rel="stylesheet" href="_css/menu.css">
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
    <script>
        function setaDadosModal(deleta) {
            document.getElementById('deleta').value = deleta;
        }
    </script>
    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Menu</b></p>
                </div>
            </div>
        </header>
        <main style="position: static">
            <form class="col-12" method="post">
                <?php foreach ($registros as $registro): ?>
                    <h3>Alterar dados: <?= $registro['login'] ?></h3>
                    <br><label for="exampleInputEmail1">Nome Completo</label>
                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required maxlength="100" value="<?= $registro['id_usuario'] ?>">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nome" required maxlength="100" value="<?= $registro['nome_usuario'] ?>">
                    <br><label for="exampleInputEmail1">CPF</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cpf" required min="0100000000" max="99999999999" value="<?= $registro['cpf'] ?>">
                    <br><button type="submit" class="btn btn-primary btn-lg btn-block" name="entrar">Alterar dados</button>

                <?php endforeach; ?>
            </form>
            <div class="content" style="position: absolute; bottom: 0">
                <form method="post">
                    <?php foreach ($registros as $registro): ?>
                        <input type="hidden" name="deleta" value="<?= $registro['id_usuario'] ?>">

                    <?php endforeach; ?>
                    <button type="submit" class="btn btn-danger btn-lg btn-block">Excluir conta</button>
                </form>
            </div>
        </main>
        <?php
        include 'menu-lateral.php';
        ?>
    </body>
</html>