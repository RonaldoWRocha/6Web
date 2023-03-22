<div class="row">
  <div class="col-12 mt-3">
    <div class="nav-tabs-responsive">
      <form method="POST" action="redirectRegistro" enctype="multipart/form-data">
        <div class="card callout callout-info">
          <div class="card-header">
            Selecione o projeto
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="form-group">
                  <div class="input-group">
                    <select type="text" name="auditoriaSetor" class="form-control" placeholder="projeto" data-live-search="true">
                      <?php
                      foreach ($viewData['setores'] as $key => $value) {
                        ?>
                        <option value="<?= $value->idSetor; ?>; <?= $value->nmSetor; ?>; <?= $value->tipo; ?>"><?= $value->nmSetor; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button action="submit" class="btn btn-primary mr-1">Iniciar Audição</button>
        </div>
      </form>
    </div>
  </div>
</div>
