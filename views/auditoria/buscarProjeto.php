<!doctype html>
<div class="row">
  <div class="col-12 mt-3">
    <div class="nav-tabs-responsive">
      <form method="POST" action="redirectRegistroSetor" enctype="multipart/form-data">
        <div class="card callout callout-info">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="form-group">
                  <label>Selecione o Usuario</label>
                  <div class="input-group">
                    <select type="text" name="registroSetor" class="form-control" placeholder="projeto" data-live-search="true">
                      <?php
                      foreach ($viewData['setores'] as $key => $value) {
                        ?>
                        <option value="<?= $value->idSetor; ?>;<?= $value->nmSetor; ?>"><?= $value->nmSetor; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>Data Inicial</label>
                  <div class="input-group">
                    <input type="date" value="<?= date("Y-m-d"); ?>" name="dtInicial" class="form-control">
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>Data Final</label>
                  <div class="input-group">
                    <input type="date" name="dtFinal" value="<?= date("Y-m-d"); ?>" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button action="submit" class="btn btn-primary mr-1">Buscar</button>
        </div>
      </form>
    </div>
  </div>
</div>
