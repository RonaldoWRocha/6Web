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
   
   $nmPagina = "Dashboard";
   
   include 'layout/layout-base.php';
   
   ?>
<!-- START: Card Data-->
<div class="row">
   <div class="col-12 mt-4">
      <div class="card callout callout-info">
         <div class="card-header">
            <h6 class="card-title">Auditações</h6>
         </div>
         <div class="card-content">
            <div class="card-body">
               <div class="row">
                  <div class="col-12 col-lg-8">
                     <div class="form-group">
                        <p class="text-muted text-center">
                           Qt diária
                        </p>
                        <div id="chart_div" style="width: 100%;"></div>
                     </div>
                  </div>
				  <div class="col-12 col-lg-4">
                     <div class="form-group">
                        <p class="text-muted text-center">
                           Acertos/Erros
                        </p>
                        <div id="piechart" style="width: 100%;"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END: Card DATA-->
<!-- START: Card Data-->
<div class="row">
   <div class="col-6 mt-6">
      <div class="card callout callout-info">
         <div class="card-header  justify-content-between align-items-center">
            <h4 class="card-title">Ranking de erros</h4>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-lg-12">
                  <div class="form-group">
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
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="col-6 mt-6">
      <div class="card callout callout-info">
         <div class="card-header  justify-content-between align-items-center">
            <h4 class="card-title">Fraseologias/Erros</h4>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-lg-12">
                  <div class="form-group">
                     <table id="auditoria2" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th><font size=2>Setor</font></th>
                              <th><font size=2>Fraseologia</font></th>
                              <th><font size=2>Qt</font></th>
                           </tr>
                        </thead>
						<tbody>
                           <?php
                              $resultadorec = recFraseologiaErro();
                              while ($rowret = mysqli_fetch_assoc($resultadorec)) {
                              
                                  echo "<tr>";
                                  echo "<td>". $rowret['nmSetor'] ."</td>";
                                  echo "<td>". $rowret['fraseologia'] ."</td>";
                                  echo "<td>". $rowret['quantidade'] ."</td></tr>";
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
</div>
<!-- END: Card DATA-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Mes', 'Dias', 'Valor'],
   
   <?php
      $resultadorec = recAuditoriaMeses();
      while ($rowret = mysqli_fetch_assoc($resultadorec)) {
      
      if ($rowret['data'] == 1){
      $mes = "Jan";
      } elseif ($rowret['data'] == 2){
      $mes = "Fev";
      } elseif ($rowret['data'] == 3){
      $mes = "Mar";
      } elseif ($rowret['data'] == 4){
      $mes = "Abr";
      } elseif ($rowret['data'] == 5){
      $mes = "Mai";
      } elseif ($rowret['data'] == 6){
      $mes = "Jun";
      } elseif ($rowret['data'] == 7){
      $mes = "Jul";
      } elseif ($rowret['data'] == 8){
      $mes = "Ago";
      } elseif ($rowret['data'] == 9){
      $mes = "Set";
      } elseif ($rowret['data'] == 10){
      $mes = "Out";
      } elseif ($rowret['data'] == 11){
      $mes = "Nov";
      } elseif ($rowret['data'] == 12){
      $mes = "Dez";
      }
      
      echo "['". $rowret['data'] ."'," . $rowret['dias'] . "," . $rowret['dias'] . "],";
      
      }
      ?>
     ]);
   
     var options = {
       title: '',
       hAxis: {title: 'Periodo',  titleTextStyle: {color: '#333'}},
       vAxis: {minValue: 0}
     };
   
     var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   }
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
	   var data = google.visualization.arrayToDataTable([
	  ['Task', 'Hours per Day'],
		<?php
      $resultadorec = recAuditoriaPizza();
      $rowret = mysqli_fetch_assoc($resultadorec); 
		$erro = $rowret['erro'];
		$acerto = $rowret['acerto'];
      ?>
       
          ['Acertos',      <?php echo $acerto; ?>],
		  ['Erros',     <?php echo $erro; ?>]
        ]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<?php
   include 'layout/layout-footer.php';
   ?>