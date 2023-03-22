<div class="row">
   <div class="col-12 mt-3">
      <div class="nav-tabs-responsive">
         <form method="POST" action="/auditoria/redirectAbrirConfig" enctype="multipart/form-data">
            <div class="card callout callout-info">
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-md-6 col-lg-12">
                        <div class="form-group">
                           <label>Selecione o projeto</label>
                           <div class="input-group">
                              <select type="text" name="configProjeto" class="form-control" placeholder="projeto">
                                 <?php
								  foreach ($viewData['setores'] as $key => $value) {
									?>
									<option value="<?= $value->idSetor; ?>"><?= $value->nmSetor; ?></option>
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
               <button action="submit" class="btn btn-primary mr-1">Abrir Projeto</button> 
            </div>
         </form>
      </div>
   </div>
</div>