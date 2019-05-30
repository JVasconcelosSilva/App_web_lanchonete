<?php 
require 'sessao.php';
$tipo = $_GET['tipo'] ?? null;
if(isset($tipo)){
    header("LOCATION: lista-itens.php?tipo=$tipo");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>OneTouch - Menu</title>
        <link rel="shortcut icon" href="_img/logo.png"/>
        <link rel="stylesheet" href="_css/menu.css">
        </head>

    <body>
        <header>
            <div class="content">
                <div class="main_header_logo">
                    <p><b style="color: white;">Menu</b></p>
                </div>
            </div>
        </header>
        <main>

            <div class="list-group lista">
                <a href="lista-itens.php?tipo=promocao" type="button" class="list-group-item list-group-item-action"><h6>PROMOÇÕES</h6><img src="_img/promocoes.png" id="img-promocao"></a>
                <div class="row col-12">
                    <div class="item1 col-6">

                        <a href="lista-itens.php?tipo=porcao" type="button" class="list-group-item list-group-item-action"><h6>PORÇÕES</h6><img src="_img/porcao.png"></a>

                    </div>
                    <div class="item2 col-6">
                        <a href="lista-itens.php?tipo=combo" type="button" class="list-group-item list-group-item-action"><h6>COMBOS</h6><img src="_img/combo.png"></a>

                    </div>

                </div>

                <button href="#" type="button" class="list-group-item list-group-item-action cardapio"><h6>CARDÁPIO</h6></button>

                <div class="row col-12">
                    <div class="item1 col-6">

                        <a href="lista-itens.php?tipo=carne" type="button" class="list-group-item list-group-item-action"><h6>HAMBÚRGUERES DE CARNE</h6><img src="_img/carne.png"></a>

                    </div>
                    <div class="item2 col-6">
                        <a href="lista-itens.php?tipo=frango" type="button" class="list-group-item list-group-item-action"><h6>HAMBÚRGUERES DE FRANGO</h6><img src="_img/frango.jpg"></a>

                    </div>

                </div>
                <div class="row col-12">
                    <div class="saladas col-6">

                        <a href="lista-itens.php?tipo=vegetariano" type="button" class="list-group-item list-group-item-action"><h6>SALADAS E VEGETARIANO</h6><img src="_img/salada.png"></a>

                    </div>
                    <div class="kingjr col-6">
                        <a href="lista-itens.php?tipo=kids" type="button" class="list-group-item list-group-item-action"><h6><br>KIDS</h6><img src="_img/kids.png"></a>

                    </div>

                </div>
                <a href="lista-itens.php?tipo=acompanhamento" type="button" class="list-group-item list-group-item-action"><h6>ACOMPANHAMENTOS</h6><img src="_img/acompanhamento2.png"></a>
                <div class="row col-12">
                    <div class="sobremesas col-6">

                        <a href="lista-itens.php?tipo=sobremesa" type="button" class="list-group-item list-group-item-action"><h6>SOBREMESAS</h6><img src="_img/sobremesa.png"></a>

                    </div>
                    <div class="bebidas col-6">
                        <a href="lista-itens.php?tipo=bebida" type="button" class="list-group-item list-group-item-action"><h6>BEBIDAS</h6><img src="_img/bebidas.png"></a>

                    </div>
                </div>
            </div>

        </main>
<?php
include 'menu-lateral.php';
?>
    </body>
</html>