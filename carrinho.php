<?php
require 'sessao.php';
$id_item_carrinho = $_POST['id_item_carrinho'] ?? null;
$qt = $_POST['qt'] ?? null;
$item = null;
$totalItem = null;
$total = null;
require 'Banco.php';
require 'Funcoes.php';
$tabela = new Funcoes('carrinho');
$registros = $tabela->pesquisarCarrinho();
if (!is_null($id_item_carrinho)) {
    $tabela = new Funcoes('carrinho');
    $registro = $tabela->deletarItemCarrinho($id_item_carrinho);
    $id_item_carrinho = null;
    header('LOCATION: carrinho.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch - Carrinho</title>
        <link rel="shortcut icon" href="_img/logo.png" />
        <link rel="stylesheet" href="_css/carrinho.css">
    </head>
    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Carrinho</b></p>
                </div>
            </div>
        </header>
        <main>
            <div class="list-group">
                <?php foreach ($registros as $produto): ?>

                    <a type="button" class="list-group-item list-group-item-action">
                        <form method="post">
                            <?=$item = 1?>
                            <h6><?= $produto['nm_produto'] ?></h6><br>
                            <img src="<?= $produto['img_ref'] ?>">
                            <p id="preco"><br>Vl. Unit. R$ <?= number_format($produto['vl_produto'], 2, ',', '.') ?></p>
                            <p id="preco">Qtde. x<?= $produto['qt_produto'] ?></p>
                            <p id="preco1" name="<?= $totalItem ?>">R$ <?= number_format($produto['vl_produto'] * $produto['qt_produto'], 2, ',', '.') ?></p>
                            <?php $total += doubleval($produto['vl_produto'] * $produto['qt_produto']) ?>
                            <input type="hidden" name="id_item_carrinho" value="<?= $produto['id_item_carrinho'] ?>">
                            <button style="float: right" type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </a>
                <?php endforeach; ?>
            </div>
            <form action="pagamento.php">
                <?php if (!is_null($item)) { ?>
                    <h5 style="margin-left: 10px; margin-top: 10px" id="total" name="total">TOTAL: R$ <?= number_format($total, 2, ',', '.') ?></h5>
                    <input type="hidden" name="total" value="<?= $total ?>"
                           <hr>
                    <div class="finalizar col-12">
                        <button type="submit" id="finalizar" type="button" class="btn btn-primary btn-lg btn-block" >Adicionar forma de pagamento</button>
                    </div>
                <?php } else { ?>
                    <h4 style="text-align: center; margin-top: 20px;">Seu carrinho está vazio</h4>
                <?php } ?>
            </form>
        </main>
        <?php
        include 'menu-lateral.php';
        ?>
    </body>
</html>