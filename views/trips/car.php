<div class="not-main-page container">
    <ul class="trip-list">
        <? foreach ($trips as $value): ?>
            <li class="trip-li"> Trip date:
                <?= $value["date"] ?>; Range:
                <?= $value["trip_range"] ?>
            </li>
        <? endforeach; ?>
    </ul>
</div>