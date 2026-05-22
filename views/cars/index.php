<div class="not-main-page container">
    <div class="figure-list">
        <? foreach ($cars as $key => $value): ?>
            <a href="/cars/page/<?=$value["id"]?>" style="text-decoration: none;">
                <figure>
                    <img src="<?=$value["img"]?>" alt="<?=$value["brand"]?><?=$value["id"]?>">
                    <figcaption><?=$value["brand"]?> <?=$value["model"]?></figcaption>
                </figure>
            </a>
        <? endforeach; ?>
    </div>
</div>
