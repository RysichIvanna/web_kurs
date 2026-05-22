<div class="subscribe-box">
    <h2 style="color: black;">Замовити таксі</h2>
    <form class="subscribe" action="" method="post" enctype="multipart/form-data">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>
        <input type="text" placeholder="380000000000" autocomplete="off" name="customer_phone_number" required>
        <input class="button-form" type="submit" name="submit" value="Замовити">
    </form>
</div>