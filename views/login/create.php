<form method="post" <?php echo ajaxForm("/login/store", "form-signin") ?>>
<?php echo csrf(); ?>
    <div class="col-md-12 text-center">
        <img class="text-center mb-4" src="<?php echo back_url("/views/make/logo.png"); ?>" alt="" width="72" height="72">
    </div>

    <h3 class="text-center h3 mb-3 font-weight-normal">Insira seus dados para o cadastro</h3>

    <label for="inputId" class="sr-only">Id...</label>
    <input type="text" name="idUsuario" id="inputId" class="form-control" placeholder="Nome"  autofocus>

    <label for="inputName" class="sr-only">Nome...</label>
    <input type="text" name="nmUsuario" id="inputName" class="form-control" placeholder="Nome"  autofocus>

    <label for="inputPassword" class="sr-only">Senha...</label>
    <input type="password" name="cdSenha" id="inputPassword" class="form-control" placeholder="Password" >

    <div class="checkbox mb-3">
        <label>
            <a href="<?= BASE_URL("/login/index") ?>">Login</a>
        </label>
    </div>

    <?php echo btnAjaxForm("Cadastrar", "btn btn-lg btn-primary btn-block") ?>
    <p class="text-center mt-5 mb-3 text-muted">&copy; MVC-git / 2017-2018</p>

</form>
