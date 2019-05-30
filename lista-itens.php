<?php
require 'sessao.php';
$tipo = $_GET['tipo'] ?? null;
$id = $_GET['id'] ?? null;
$img = $_GET['img'] ?? null;
$vl = $_GET['vl'] ?? null;
$nome = $_GET['nm'] ?? null;
$qt = $_GET['qt'] ?? null;

require 'Banco.php';
require 'Funcoes.php';
$tabela = new Funcoes('produtos', $tipo);
$registros = $tabela->obterRegistros($tipo);

if (!is_null($qt)) {
    $tabela = new Funcoes('carrinho');
    $registro = $tabela->gravarCarrinho($id, $img, $vl, $nome, $qt);
    $qt = null;
    header('LOCATION: carrinho.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch - Lista</title>
        <link rel="shortcut icon" href="_img/logo.png" />
        <link rel="stylesheet" href="_css/lista-itens.css">
    </head>
    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Lista</b></p>
                </div>
            </div>
        </header>
        <main>

            <div class="list-group">
                <?php foreach ($registros as $produtos): ?>
                    <a class="list-group-item list-group-item-action" >
                        <form>
                            <input type="hidden" name="id" value="<?= $produtos['id_produto'] ?>">
                            <input type="hidden" name="img" value="<?= $produtos['img_ref'] ?>">
                            <input type="hidden" name="vl" value="<?= $produtos['valor_produto'] ?>">
                            <input type="hidden" name="nm" value="<?= $produtos['nome_produto'] ?>">
                            <h6><?= $produtos['nome_produto'] ?></h6>
                            <p><?= $produtos['descricao_produto'] ?></p>
                            <img src="<?= $produtos['img_ref'] ?>"><br>
                            <p id="preco">R$ <?= number_format($produtos['valor_produto'], 2, ',', '.') ?></p><br>
                            <div style="width: 40%; float: right" class="input-group mb-3">
                                <input type="number" class="form-control" aria-label="Recipient's username" name="qt" aria-describedby="button-addon2" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Comprar</button>
                                </div>
                            </div>
                        </form>
                    </a>
                <?php endforeach ?>
                <form>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Selecione a quantidade</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <input type="number" class="form-control" name="qt">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary" value="adcCarrinho">Inserir no carrinho</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <?php
        include 'menu-lateral.php';
        ?>
    </body>
</html>
