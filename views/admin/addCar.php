<div class="not-main-page container">
    <form class="py-3" action="" method="post" enctype="multipart/form-data">
        <h3 class="mb-3">New Car</h3>
        <? if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <? endif; ?>
        <div class="input-group mb-3">
            <label class="input-group-text">Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Model</label>
            <input type="text" name="model" class="form-control">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Year</label>
            <input type="text" name="year" class="form-control">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Number of trips</label>
            <input type="text" name="number_of_trips" class="form-control">
        </div>
        <div class="input-group mb-3">
            <select name="driver_id" class="form-control">
                <?php foreach ($drivers as $driver): ?>
                    <option value="<?= htmlspecialchars($driver['id']) ?>">
                        <?= htmlspecialchars($driver['name'] . ' ' . $driver['surname']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <span class="input-group-text">Driver id</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">img src</span>
            <input type="type" name="img" class="form-control" step="any" min="0">
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Add">
    </form>
</div>