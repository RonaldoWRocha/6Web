<div class="page-sign sign-in">
  <div class="container-sign">
    <div class="card callout callout-info" style="width: 360px;">
      <div class="card-header" style="padding-bottom: 0px;">
        <img src="<?php echo base_url("/assets/img/logo_2.png"); ?>" style="max-width: 15rem;margin-top: 0px;margin-bottom: 0px;"><h1 style="margin-bottom: 0px;"></h1>
        <span>Faça login em sua conta</span>
      </div>
      <form method="post" <?php echo ajaxForm("/login/login", "form-signin") ?>>
        <?php echo csrf(); ?>
        <div class="card-body">
          <div class="form-group">
            <label>Matricula</label>
            <input type="text" name="idUsuario" value="<?php echo getCookie('cookie_idUsuario') ?>" id="inputEmail" class="form-control" placeholder="Matricula"  autofocus>
            <span class="validation idUsuario text-danger small"></span>
          </div>
          <div class="form-group"><label class="d-flex"><div>Senha</div>
            <a href="<?= BASE_URL("/login/recover") ?>" class="ml-auto">Esqueceu a senha?</a></label>
            <input type="password" name="cdSenha" value="<?php echo getCookie('cookie_cdSenha') ?>" id="inputPassword" class="form-control" placeholder="Password" >
            <span class="validation idUsuario text-danger small"></span>
          </div>
          <div class="form-group d-flex"><label class="checkbox">
            <input type="checkbox" name="lembrar" value="remember-me"> <span class="check-mark"></span> Lembre-me</label>
            <?php echo btnAjaxForm("Logar", "btn btn-primary ml-auto") ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
