<?
use models\Drivers;
?>

<div class="not-main-page container">
    <div class="stellar-container">
        <a href="/admin/addDriver" class="button-form">Додати</a>
        <?php foreach ($drivers as $value): ?>
            <div class="galactic-card">
                <div class="info-constellation">
                    <p class="car-title" style="color: black;">
                        <?= $value['name'] ?>
                        <?= $value['surname'] ?>
                        <a href="/admin/editDriver/<?=$value['id']?>" class="button-form">Редагувати</a>
                        <a href="/admin/deleteDriver/<?=$value['id']?>" class="button-form">Видалити</a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>