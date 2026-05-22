<div class="wrapper">
    <div class="profile" style='background: url("<?= $car["img"] ?>")'>
        <div class="overlay">
            <div class=" about d-flex flex-column">
                <h4>
                    <?= $car["brand"] ?>
                    <?= $car["model"] ?>
                </h4> <span>
                    <?= $car["year"] ?>
                </span>
            </div>
            <a href="/trips/car/<?= $car["id"] ?>" class="social-icons">
                Trips:
                <?= $car["number_of_trips"] ?>
            </a>
        </div>
    </div>
</div>


<div style="width: 400px; margin-right: auto; margin-left: auto; text-align: center; margin-bottom: 50px; margin-top: -50px;">
    <p>Driver: <?=$driver["name"]?> <?=$driver["surname"]?></p>
</div>