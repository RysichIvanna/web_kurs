<div class="not-main-page container">
    <form class="py-3" action="" method="post" enctype="multipart/form-data">
        <h3 class="mb-3">Edit Driver</h3>
        <? if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <? endif; ?>
        <div class="input-group mb-3">
            <label class="input-group-text">Name</label>
            <input type="text" name="name" class="form-control" value="<?=$driver["name"]?>">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text">Surname</label>
            <input type="text" name="surname" class="form-control" value="<?=$driver["surname"]?>">
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Edit">
    </form>
</div>