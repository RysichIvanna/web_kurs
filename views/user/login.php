<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<form action="" method="post" class="input-group-vertical" style="width: 20rem;">
    <h3 class="text-center mb-3">Login</h3>
    <?if (isset($error)):?>
        <div class="alert alert-danger" role="alert">
            <?=$error ?>
        </div>
    <?endif;?>
    <div class="mb-3">
        <div class="form-floating">
            <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Login" value=<?=$login?>>
            <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
    </div>
    <a href="/user/reg">Reg</a>
    <input type="submit" name="submit" class="btn btn-primary w-100" value="Login">
</form>