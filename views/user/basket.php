<style>
    .log {
        background-color: white;
        width: 75%;
        margin-top: 2%;
        margin-bottom: 2%;
        padding: 30px;
        border-radius: 10px;
    }

    .imgProd {
        width: 150px;
    }
</style>
<? $totalPrice = 0;?>
<div class="container log">
    <h1 class="text-center">Basket
        <a class="btn btn-dark" href="/products/clearBasket">del</a>
    </h1>
    <ul class="list-group list-group-flush">
        <? if (!empty($_SESSION['prodInBus'])) : ?>
            <? foreach ($_SESSION['prodInBus'] as $value) : ?>
                <li class="list-group-item">
                    <img class="imgProd" src="<?= $value['src'] ?>">
                    <?= $value["title"] ?>.
                    <span class="text-muted mb-0">Ціна: <?= $value["price"] ?>$.</span>
                    <? $totalPrice += $value["price"]?>
                    <a class="btn btn-dark" href="/products/deleteFromBasket/<?= $value["id"] ?>">Del</a>
                </li>
            <? endforeach; ?>
            <li class="list-group-item text-center">
                <strong>Ціна замовлення: <span class="mb-0" style="color: green;"><?= $totalPrice ?>$.</span></strong>
            </li>
            <li class="list-group-item">
                <a class="btn btn-dark d-flex justify-content-center" href="/products/buyBasket">Buy</a>
            </li>

        <? else : ?>
            <li class="list-group-item text-center">
                <strong>Немає продуктів в корзині</strong>
            </li>
        <? endif; ?>
    </ul>
</div>