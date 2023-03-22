<div class="callout">
  <h5 style="padding-top: 16px;margin-bottom: 0px;"><b><?= Session::get('auditar')['nmSetor']; ?> | <?= Session::get('auditar')['tipo']; ?></b></h5>
</div>
<div class="row">
  <div class="col-12 mt-3">
    <div class="nav-tabs-responsive">
      <form method="post" <?php echo ajaxForm("/auditoria/registrar") ?>>
        <?php echo csrf(); ?>
        <div class="card callout callout-info">
          <div class="card-body">
            <div class="form-group d-flex"><label class="checkbox">
              <input type="checkbox" name="lembreme" <?php if(isset($_COOKIE["Sistema"])) { ?> checked <?php } ?>> <span class="check-mark"></span> Lembre-me</label>
            </div>
            <div class="row">
              <input type="hidden" value="<?= Session::get('auditar')['idSetor']; ?>" name="idSetor">
              <input type="hidden" value="<?= Session::get('auth')['idUsuario']; ?>" name="idAuditor">
              <input type="hidden" value="<?php if(isset($_COOKIE["tpm"])) { echo $_COOKIE["tpm"]; } ?>" name="tpm">

              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label>Date da Ligação</label>
                  <div class="input-group">
                    <input type="text" maxlength="23" OnKeyPress="formatar('##/##/#### ##:##:##.###', this)" value="<?php if(isset($_COOKIE["date"])) { echo $_COOKIE["date"]; } ?>" autocomplete="off" name="date" class="form-control" placeholder="Date">
                  </div>
                  <span class="validation date text-danger small"></span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-5">
                <div class="form-group">
                  <label>Usuario</label>
                  <div class="input-group">
                    <select type="text" name="idUsuario" class="form-control" placeholder="Nome" data-live-search="true">
                      <?php
					  if(isset($_COOKIE["idUsuario"])) {
                          echo "<option value=\"".$_COOKIE["idUsuario"]."\">".$_COOKIE["nmCompleto"]."";
                          echo "<option disabled>-----";
                        }
						
                      foreach ($viewData['infousuario'] as $key => $value) {
                        ?>
                        <option value="<?= $value->idUsuario; ?>;<?= $value->ramal; ?> - <?= $value->nmCompleto; ?>"><?= $value->ramal; ?> - <?= $value->nmCompleto; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-3">
                <div class="form-group">
                  <label>Classificação</label>
                  <div class="input-group">
                    <select type="text" name="classificacao" class="form-control" placeholder="projeto">
                      <?php
                      if(isset($_COOKIE["classificacao"])) {

                        if ($_COOKIE["classificacao"] == 0){
                          $classific = "Sem Erro";
                        }elseif ($_COOKIE["classificacao"] == 1){
                          $classific = "Erro de Si";
                        }elseif ($_COOKIE["classificacao"] == 2){
                          $classific = "Erro de Projeto";
                        }
                        echo "<option value=\"".$_COOKIE["classificacao"]."\">".$classific."";
                        echo "<option disabled>-----";
                      }
                      ?>
                      <option value="0">Sem Erro</option>
                      <option value="1">Erro de Si</option>
                      <option value="2">Erro de Projeto</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-5">
                <div class="form-group">
                  <label>Sistema</label>
                  <div class="input-group">
                    <input type="text" name="Sistema" value="<?php if(isset($_COOKIE["Sistema"])) { echo $_COOKIE["Sistema"]; } ?>" class="form-control" placeholder="Sistema">
                  </div>
                  <span class="validation Sistema text-danger small"></span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-5">
                <div class="form-group">
                  <label>Cliente Disse</label>
                  <div class="input-group">
                    <input type="text" name="disseCliente" value="<?php if(isset($_COOKIE["disseCliente"])) { echo $_COOKIE["disseCliente"]; } ?>" class="form-control" placeholder="Cliente Disse">
                  </div>
                  <span class="validation disseCliente text-danger small"></span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-2">
                <div class="form-group">
                  <label>Interpretações</label>
                  <div class="input-group">
                    <input type="number" name="qtInterpret" value="1" class="form-control" placeholder="Quantidade">
                  </div>
                  <span class="validation qtInterpret text-danger small"></span>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-5">
                <div class="form-group">
                  <label>SI enviou</label>
                  <div class="input-group">
                    <select type="text" name="envioSi" class="form-control" placeholder="Nome" data-live-search="true">
                      <?php
                        if(isset($_COOKIE["envioSi"])) {
                          echo "<option value=\"".$_COOKIE["envioSi"]."\">".$_COOKIE["envioSi"]."";
                          echo "<option disabled>-----";
                        }
						
                      foreach ($viewData['respostas'] as $key => $value) {
                        ?>
                        <option value="<?= $value->apelido; ?>"><?= $value->apelido; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-5">
                <div class="form-group">
                  <label>Certo era</label>
                  <div class="input-group">
                    <select type="text" name="correto" class="form-control" placeholder="Nome" data-live-search="true">
					
					<?php
                        if(isset($_COOKIE["correto"])) {
                          echo "<option value=\"".$_COOKIE["correto"]."\">".$_COOKIE["correto"]."";
                          echo "<option disabled>-----";
                        }
						
                      foreach ($viewData['respostas'] as $key => $value) {
                        ?>
                        <option value="<?= $value->apelido; ?>"><?= $value->apelido; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-2">
                <div class="form-group">
                  <label>Vácuo</label>
                  <div class="input-group">
                    <input type="text" value="<?php if(isset($_COOKIE["vacuo"])) { echo $_COOKIE["vacuo"]; } else { echo "00:00:00"; } ?>" maxlength="8" OnKeyPress="formatar('##:##:##', this)" autocomplete="off" value="00:00:00" name="vacuo" class="form-control" placeholder="00:00:00">
                    </div>
                    <span class="validation vacuo text-danger small"></span>
                  </div>
                </div>
				
                <input type="hidden" name="status" value="0" maxlength="8">
                <input type="hidden" name="mtDerivacao" value="0" maxlength="8">
                
				<div class="col-12 col-md-6 col-lg-3">
                    <div class="form-group">
                      <label>Erro Grave?</label>
                      <div class="input-group">
                        <select type="text" name="inErroGrave" class="form-control">
                          <option value="n">Não</option>
                          <option value="s">Sim</option>
                        </select>
                      </div>
                    </div>
                  </div>
              
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label>Trello</label>
                    <div class="input-group">
                      <input type="text"  value="<?php if(isset($_COOKIE["trello"])) { echo $_COOKIE["trello"]; } ?>" name="trello" class="form-control" placeholder="Trello">
                    </div>
                    <span class="validation trello text-danger small"></span>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                  <div class="form-group">
                    <label>Matricula</label>
                    <div class="input-group">
                      <input type="text" value="<?php if(isset($_COOKIE["matricula"])) { echo $_COOKIE["matricula"]; } ?>" name="matricula" class="form-control" placeholder="matricula">
                    </div>
                    <span class="validation matricula text-danger small"></span>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-12">
                  <div class="form-group">
                    <label>Observações</label>
                    <div class="input-group">
                      <input type="text"  value="<?php if(isset($_COOKIE["observacao"])) { echo $_COOKIE["observacao"]; } ?>" name="observacao" class="form-control" placeholder="Observações">
                    </div>
                    <span class="validation observacao text-danger small"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <?php echo btnAjaxForm("Incluir", "btn btn-primary mr-1") ?>
          </div>
        </form>
        <div class="card callout callout-info">
          <div class="card-header">
            Ultimos registros
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><font size=2>Date</font></th>
                    <th><font size=2>SI</font></th>
                    <th><font size=2>Falha</font></th>
                    <th><font size=2>Cliente</font></th>
                    <th><font size=2>SI enviou</font></th>
                    <th><font size=2>Correto</font></th>
                    <th><font size=2>Observações</font></th>
                    <th><font size=2>Opções</font></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  if($viewData['registroAuditoria']){
                    foreach ($viewData['registroAuditoria'] as $key => $value) {

                      if ($value->classificacao == 0){
                        $falha="Sem Erro";
                      }elseif ($value->classificacao == 1){
                        $falha="Erro de SI";
                      }elseif ($value->classificacao == 2){
                        $falha="Erro de Projeto";
                      }

                      echo "<tr><form method=\"POST\" action=\"" . base_url("/auditoria/deletarRegistro/" . cryptId($value->idAuditoria) . ""). "\">";
                      echo "<td>" . $value->{'date'} . "</td>";
                      echo "<td>" . $value->nmCompleto . "</td>";
                      echo "<td>" . $falha . "</td>";
                      echo "<td>" . $value->disseCliente . "</td>";
                      echo "<td>" . $value->envioSi . "</td>";
                      echo "<td>" . $value->correto . "</td>";
                      echo "<td>" . $value->observacao . "</td>";
                      echo "<td><button action=\"submit\" class=\"btn btn-danger btn-xs\"><span class=\"fa fa-trash\"></span></button></td></form></tr>";
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
