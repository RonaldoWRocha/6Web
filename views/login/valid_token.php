<form method="post" <?php echo ajaxForm("/login/updatePass", "form-signin") ?>>
<?php echo csrf(); ?>
    <div class="col-md-12 text-center">
        <img class="text-center mb-4" src="<?php echo back_url("/views/make/logo.png"); ?>" alt="" width="72" height="72">
    </div>

    <h3 class="text-center h3 mb-3 font-weight-normal">Insira uma nova senha</h3>

    <label for="inputPassword" class="sr-only">Password...</label>
    <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Password" >
    <input type="hidden" name="user_id" value="<?= $user_id; ?>">
    <input type="hidden" name="recover_id" value="<?= $recover_id; ?>">

    <?php echo btnAjaxForm("Alterar Senha", "btn btn-lg btn-primary btn-block") ?>
    <p class="text-center mt-5 mb-3 text-muted">&copy; MVC-git / 2017-2018</p>

</form>
