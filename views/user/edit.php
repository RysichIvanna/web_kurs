<form class="py-3" action="" method="post" enctype="multipart/form-data">
    <h3 class="mb-3">Edit User</h3>
    <? if (isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <? endif; ?>    
    <div class="input-group mb-3">
        <span class="input-group-text">Login</span>
        <input type="text" name="email" class="form-control" value="<?= $_SESSION["user"]["email"] ?>">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Password</span>
        <input type="password" name="password" class="form-control">
    </div>
    <input class="btn btn-primary" type="submit" name="submit" value="Save">
</form>