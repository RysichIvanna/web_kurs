<?
use models\Drivers;
?>

<div class="not-main-page container">
    <div class="stellar-container">
        <a href="/admin/addCar" class="button-form">Додати</a>
        <?php foreach ($cars as $value): ?>
            <div class="galactic-card">
                <img src="<?= $value['img'] ?>" alt="<?= $value['brand'] ?> Image" class="image-orbit">
                <div class="info-constellation">
                    <p class="car-title" style="color: black;">
                        <?= $value['brand'] ?>
                        <?= $value['model'] ?> (
                        <?= $value['year'] ?>)
                    </p>
                    <?php
                    $driver = Drivers::getDriverById($value['driver_id'])[0];
                    ?>
                    <p class="driver-name" style="color: black;">Driver:
                        <?= $driver['name'] ?>
                        <?= $driver['surname'] ?>
                    </p>
                    <a href="/admin/editCar/<?=$value['id']?>" class="button-form">Редагувати</a>
                    <a href="/admin/deleteCar/<?=$value['id']?>" class="button-form">Видалити</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>