<!doctype html>
<?php
   include('site/Controllers/AuditoriaController.php');
   
   
   $message = '';
   if (isset($_SESSION['erro'])) {
   if ($_SESSION['erro'] == 1) {
   $message = "AVISO: O tempo de pausa não pode ser maior que o tempo total de trabalho!";
   }
   }
   if (isset($_SESSION['erro'])) {
   if ($_SESSION['erro'] == 2) {
   $message = "AVISO: A data nao pode ser superior a date de hoje!";
   }
   }
   
   $nmPagina = "Ranking";
   
   if ($_POST){
   	$_SESSION['auditoriaSetor'] = $_POST['auditoriaSetor'];
   }
   
   include 'layout/layout-base.php';
   ?>
<div class="row">
   <div class="col-12 mt-3">
      <div class="nav-tabs-responsive">
         <div class="card callout callout-info">
            <div class="card-header">
               Ranking dos SI's com mais erros
            </div>
            <div class="card-body">
            <div class="table-responsive">
               <table id="example" class="table table-striped table-bordered">
                  <table id="auditoria1" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th><font size=2>Nome</font></th>
                              <th><font size=2>Setor</font></th>
                              <th><font size=2>Qt</font></th>
                           </tr>
                        </thead>
						<tbody>
                           <?php
                              $resultadorec = rankingGrafico();
                              while ($rowret = mysqli_fetch_assoc($resultadorec)) {
									
								$nome = explode(" ", $rowret['nmCompleto']);
                                  echo "<tr>";
                                  echo "<td>". $rowret['nmSetor'] ."</td>";
                                  echo "<td>". $nome[0]." ".$nome[1] ."</td>";
                                  echo "<td>". $rowret['classificacao'] ."</td></tr>";
                              }
                              ?>
                        </tbody>
					</table>
               </table>
            </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   include 'layout/layout-footer.php';
   ?>