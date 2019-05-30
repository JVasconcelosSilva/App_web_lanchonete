<link rel="stylesheet" href="_css/menu-lateral.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--MASCARANDO VALORES-->

<div class="mobile_btn" z-index="2" onclick="abreMenu();"></div>

<ul class="menu menuClosed">
    <li>
        <a href="pedido.php">PEDIDOS</a>
    </li>
    <li>
        <a href="carrinho.php">CARRINHO</a>
    </li>
    <li>
        <a href="menu.php">MENU</a>
        <ul class="subnav">
            <li>
                <a href="menu.php?tipo=promocao">Promoções</a>
            </li>
            <li>
                <a href="menu.php?tipo=porcao">Porções</a>
            </li>
            <li>
                <a href="menu.php?tipo=combo">Combos</a>
            </li>
            <li>
                <a href="menu.php?tipo=carne">Hambúrgueres de carne</a>
            </li>
            <li>
                <a href="menu.php?tipo=frango">Hambúrgueres de frango</a>
            </li>
            <li>
                <a href="menu.php?tipo=vegetariano">Saladas e vegetariano</a>
            </li>
            <li>
                <a href="menu.php?tipo=kids">Kids</a>
            </li>
            <li>
                <a href="menu.php?tipo=acompanhamento">Acompanhamentos</a>
            </li>
            <li>
                <a href="menu.php?tipo=sobremesa">Sobremesas</a>
            </li>
            <li>
                <a href="menu.php?tipo=bebida">Bebidas</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="sair.php">SAIR</a>
    </li>
</ul>
<script src="_js/script.js"></script>
