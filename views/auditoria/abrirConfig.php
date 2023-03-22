<div class="row">
  <div class="col-12 mt-3">
    <div class="nav-tabs-responsive">
      <div class="card callout callout-info">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a href="#derivacao" class="nav-link active" data-toggle="tab">
              <i class="fa fa-address-book-o mr-2"></i>
              Motivos de derivação
            </a>
          </li>
          <li class="nav-item">
            <a href="#account" class="nav-link" data-toggle="tab">
              <i class="fa fa-address-book-o mr-2"></i>
              Respostas
            </a>
          </li>
          <li class="nav-item">
            <a href="#equipamento" class="nav-link" data-toggle="tab">
              <i class="fa fa-laptop mr-2"></i>
              Geral
            </a>
          </li>
        </ul>
        <div id="tabContent" class="tab-content">
          <div id="account" class="tab-pane show">
            <a href="#account-collapse" class="nav-link-collapse" data-toggle="collapse">
              <i class="fa fa-address-book-o mr-2"></i>
              Respostas
            </a>
            <div id="account-collapse" class="collapse show" data-parent="#tabContent">
              <div class="card-body">
                <center>
                  <p>
                    <h5>
                      Selecione o arquivo contendo apenas  <span style="color: red"><b>o Respostas</b></span>. e em seguida clique em carregar.<br><br>
                    </center>
                    <form method="POST" action="<?php echo base_url("/auditoria/enviarRespostas") ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-10 col-md-12 col-lg-10">
                          <input type="file" name="arquivo" class="form-control" multiple="">
                        </div>
                        <div class="col-2 col-md-12 col-lg-2">
                          <button class="btn btn-primary">Enviar</button>
                        </div>
                      </div>
                    </form>
                    <br>
                    <div class="col-12">
                       <form method="post" <?php echo ajaxForm("/auditoria/cadRespostas") ?>>
                        <div class="row">
						<input type="hidden" name="idSetor" value="<?= session::get('selectProj')['id'] ?>">
                          <div class="col-12 col-md-12 col-lg-4">
                            <label for="inputPassword4">Ponto</label>
                            <input type="text" name="nmPonto" class="form-control" placeholder="Ponto">
							<span class="validation nmPonto text-danger small"></span>
                          </div>
                          <div class="col-12 col-md-12 col-lg-4">
                            <label for="inputPassword4">Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome">
							<span class="validation nome text-danger small"></span>
                          </div>
                          <div class="col-12 col-md-12 col-lg-4">
                            <label for="inputPassword4">Apelido</label>
                            <input type="text" name="apelido" class="form-control" placeholder="Apelido">
							<span class="validation apelido text-danger small"></span>
                          </div>
                          <div class="col-12 col-md-12 col-lg-12">
                            <label for="inputPassword4">Texto</label>
                            <input type="text" name="texto" class="form-control" placeholder="Texto">
							<span class="validation texto text-danger small"></span>
                          </div>
                        </div>
                        <br>
                        <?php echo btnAjaxForm("Incluir", "btn btn-primary mr-1") ?>
                      </form>
                    </div>
                    <br><br>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><font size=2>Ponto</font></th>
                              <th><font size=2>Nome</font></th>
                              <th><font size=2>Apelido</font></th>
                              <th><font size=2>Texto</font></th>
                              <th><font size=2>Ação</font></th>
                            </tr>
                          </thead>
                          <tbody>
						  
						  <?php
						  if($viewData['respostas']){
							foreach ($viewData['respostas'] as $key => $value) {

							  echo "<tr><form method=\"POST\" action=\"" . base_url("/auditoria/deletarRespostas/" . cryptId($value->idRespostas) . ""). "\">";
							  echo "<td>" . $value->nmPonto . "</td>";
							  echo "<td>" . $value->nome . "</td>";
							  echo "<td>" . $value->apelido . "</td>";
							  echo "<td>" . $value->texto . "</td>";
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
              <div id="derivacao" class="tab-pane show active">
                <a href="#derivacao-collapse" class="nav-link-collapse" data-toggle="collapse">
                  <i class="fa fa-address-book-o mr-2"></i>
                  Motivo de derivação
                </a>
                <div id="derivacao-collapse" class="collapse show" data-parent="#tabContent">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <form method="post" <?php echo ajaxForm("/auditoria/cadMotivo") ?>>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputPassword4">Motivo</label>
                              <input type="text" name="nmMotivo" class="form-control" placeholder="Escreva o motivo">
							  <input type="hidden" name="idSetor" value="<?= session::get('selectProj')['id'] ?>">
							  <span class="validation nmMotivo text-danger small"></span>
                            </div>
                          </div>
                          <?php echo btnAjaxForm("Incluir", "btn btn-primary mr-1") ?>
                        </form>
                      </div>
                    </div>
                    <br><br>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th><font size=2>id</font></th>
                              <th><font size=2>Motivo</font></th>
                              <th><font size=2>Ação</font></th>
                            </tr>
                          </thead>
                          <tbody>
						  <?php
						  if($viewData['motivos']){
							foreach ($viewData['motivos'] as $key => $value) {

							  echo "<tr><form method=\"POST\" action=\"" . base_url("/auditoria/deletarMotivo/" . cryptId($value->idMotivos) . ""). "\">";
							  echo "<td>" . $value->idMotivos . "</td>";
							  echo "<td>" . $value->nmMotivo . "</td>";
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
              <div id="equipamento" class="tab-pane">
                <a href="#equipamento-collapse" class="nav-link-collapse" data-toggle="collapse">
                  <i class="fa fa-laptop mr-2"></i>
                  Geral
                </a>
                <div id="equipamento-collapse" class="collapse" data-parent="#tabContent">
                  <div class="card-body">
                    <div class="row">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
