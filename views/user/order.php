<div class="container log">
    <h1 class="text-center">Order <?= $array_data[0]["order_id"] ?>.</h1>
    <hr>
    <ul class="list-group list-group-flush">
        <?

        use models\Product;

        foreach ($array_data as $value) : ?>
            <li class="list-group-item">
                Товар: <?= Product::getProductById($value["prod_id"])['title'] ?>.

                <img src="<?= Product::getProductById($value["prod_id"])["src"] ?>" style="width: 100px;">

            </li>
        <? endforeach; ?>
        <a class="btn btn-dark d-flex justify-content-center" href="/user/profile">Back</a>
    </ul>
</div>