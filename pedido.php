<?php
require 'sessao.php';
$total = $_POST['total'] ?? null;
$confirma = $_POST['confirma'] ?? null;


require 'Banco.php';
require 'Funcoes.php';
$tabela = new Funcoes('carrinho');
$registros = $tabela->pesquisarCarrinho();

if (!is_null($confirma)) {
    $tabela = new Funcoes('carrinho');
    $registros = $tabela->confirmaPedido();
    header('LOCATION: menu.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch - Pedido</title>
        <link rel="shortcut icon" href="_img/logo.png" />
        <link rel="stylesheet" href="_css/pedido.css">
    </head>
    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Pedido</b></p>
                </div>
            </div>
        </header>
        <main>
            <?php if (!is_null($total)) { ?>
            <div class="pedido col-12">
                <div class="npedido">
                    <h6>n° do pedido</h6>
                    <h1>APP0<?= rand(001, 999) ?></h1>
                    <p>Acompanhe no painel do restaurante, quando este número aparecer significa que seu pedido está pronto!</p>
                </div>
            </div>

            <div class="list-group">
                <?php foreach ($registros as $produto): ?>
                    <a type="button" class="list-group-item list-group-item-action">
                        <form method="post">
                            <h6><?= $produto['nm_produto'] ?></h6><br>
                            <img src="<?= $produto['img_ref'] ?>">
                            <p id="preco"><br>Vl. Unit. R$ <?= number_format($produto['vl_produto'], 2, ',', '.') ?></p>
                            <p id="preco">Qtde. x<?= $produto['qt_produto'] ?></p>
                            <p id="preco1" name="<?= $totalItem ?>">R$ <?= number_format($produto['vl_produto'] * $produto['qt_produto'], 2, ',', '.') ?></p>
                            <?php $total += doubleval($produto['vl_produto'] * $produto['qt_produto']) ?>
                        </form>
                    </a>
                <?php endforeach; ?>
            </div>
            <form method="post">
                <h5 style="margin-left: 10px; margin-top: 10px" id="total" name="total">TOTAL: R$ <?= number_format($total, 2, ',', '.') ?></h5>

                <input type="hidden" name="confirma" value="confirma">
                <hr>
                <div class="finalizar col-12">
                    <p style="text-align: center">Seu pedido foi entregue?</p>
                    <button type="submit" id="finalizar" type="button" class="btn btn-primary btn-lg btn-block">Confirmar pedido</button>
                </div>
            </form>
            <?php } else { ?>
                    <h4 style="text-align: center; margin-top: 20px;">Nenhum pedido feito ainda</h4>
                <?php } ?>
        </main>
        <?php
        include 'menu-lateral.php';
        ?>
    </body>
</html>