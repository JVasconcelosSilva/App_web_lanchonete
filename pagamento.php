<?php
require 'sessao.php';
$total = $_GET['total'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Onetouch - Pagamento</title>
        <link rel="shortcut icon" href="_img/logo.png" />
        <link rel="stylesheet" href="_css/pagamento.css">
    </head>
    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Pagamento</b></p>
                </div>
            </div>
        </header>
    <body>	
        <main>
            <h3>Pagamento</h3>
            <form action="pedido.php" method="post" class="forma-pagamento col-12">
                <h5>Pagamento em Dinheiro</h5>
                <p>Valor: R$ <?= number_format($total, 2, ',', '.') ?></p>
                <input type="hidden" name="total" value="<?= $total ?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="entrar">Pagar na retirada</button>
            </form>
            <hr>

            <form action="pedido.php" method="post" class="forma-pagamento col-12">
                <h5>Pagar com Credito/Débito</h5>
                <form action="#">
                    <br><label for="labelncartao">N° Cartão</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="ncartao" placeholder="0000 0000 0000 0000" required>
                    <div class="bandeiras col-12">
                        <img src="_img/master.png">
                        <img class="bandeira" src="_img/visa.jpg">
                        <img class="bandeira" src="_img/hipercard.png">
                        <img class="bandeira" src="_img/elo.jpg">
                        <img class="bandeira" src="_img/dclub.png">
                        <img class="bandeira" src="_img/aexpress.png">
                        <br>
                    </div>
                    <br><label for="labelncartao">Nome do titular impresso</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nometitular" required>
                    <div class="row">
                        <div class="col-4">

                            <br>
                            <label for="labelvalidade">Validade</label>
                            <input type="number" class="form-control" placeholder="00/00" required>
                        </div>
                        <div class="col-3">
                            <br>
                            <label for="labelcvv">CVV</label><input type="number" class="form-control" placeholder="CVV" required>
                        </div>
                        <div class="pagseguro col-5">
                            <br>
                            <img src="_img/pagseguro.png">
                        </div>
                    </div>

                </form>
                <div class="content">
                    <form action="pedido.php" method="post">
                        <input type="hidden" name="total" value="<?= $total ?>">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="entrar">Finalizar Pagamento</button>
                    </form>
                </div>
        </main>
        <?php
        include 'menu-lateral.php';
        ?>
    </body>
</html>