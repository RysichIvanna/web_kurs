<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }   
</style>
<form action="" method="post" class="input-group-vertical" style="width: 20rem;">
    <h3 class="text-center mb-3">Registration</h3>
    <?if (isset($error)):?>
        <div class="alert alert-danger" role="alert">
            <?=$error ?>
        </div>
    <?endif;?>
    <div class="mb-3">
        <div class="form-floating">
            <input type="text" name="login" class="form-control" id="floatingInput" placeholder="name@example.com" value=<?=$login ?>>
            <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" value=<?=$password ?>>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" name="confirmPassword" class="form-control" id="floatingConfirmPassword" placeholder="Confirm password">
            <label for="floatingConfirmPassword">Confirm password</label>
        </div>
    </div>    
    <input type="submit" name="submit" class="btn btn-primary w-100" value="Sign-up">
</form>