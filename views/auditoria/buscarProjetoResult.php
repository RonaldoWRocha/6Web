
<div class="callout">
  <h5 style="padding-top: 16px;margin-bottom: 0px;"><b><?= Session::get('registroSetor')['nmSetor']; ?>  | De:</b> <?= Session::get('registroSetor')['dtInicial']; ?>  <b>até:</b> <?= Session::get('registroSetor')['dtFinal']; ?> </b></h5>
</div>   
<div class="row">
  <div class="col-12 mt-4">
    <div class="card callout callout-info">
      <div class="card-header">
        <h4 class="card-title">Auditações</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <p class="text-muted text-center">
                  Qt diária
                </p>
                <div id="chart_div" style="width: 100%;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="form-group">
                <p class="text-muted text-center">
                  Dates
                </p>
                <div id="piechart" style="width: 100%;"></div>
              </div>
            </div>
            <div class="col-12 col-lg-3">
              <div class="form-group">
                <p class="text-muted text-center">
                  Interações
                </p>
                <div id="piechartErros" style="width: 100%;"></div>
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
        <h4 class="card-title">Ranking de erros por Projeto</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <table id="auditoria1" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><font size=2>Nome</font></th>
                    <th><font size=2>Int</font></th>
                    <th><font size=2>Er</font></th>
                    <th><font size=2>Ac</font></th>
                    <th><font size=2>Gr</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($viewData['rankingerrossetor']){
                    foreach ($viewData['rankingerrossetor'] as $key => $value) {

                      echo "<tr>";
                      echo "<td>" . $value->nmCompleto . "</td>";
                      echo "<td>" . $value->qtInterpret . "</td>";
                      echo "<td>" . $value->qtErro . "</td>";
                      echo "<td>" . $value->qtAcertos . "</td>";
                      echo "<td>" . $value->qtErroGrave . "</td></tr>";
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
                  if($viewData['recFraseologiaErrosi']){
                    foreach ($viewData['recFraseologiaErrosi'] as $key => $value) {

                      echo "<tr>";
                      echo "<td>" . $value->nmSetor . "</td>";
                      echo "<td>" . $value->envioSi . "</td>";
                      echo "<td>" . $value->qtErro . "</td></tr>";
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
  <div class="col-12 mt-12">
    <div class="card callout callout-info">
      <div class="card-header  justify-content-between align-items-center">
        <h4 class="card-title">Ultimos Registros</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <table id="auditoria" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th><font size=2>Data/Hora</font></th>
                    <th><font size=2>Date</font></th>
                    <th><font size=2>SI</font></th>
                    <th><font size=2>Cliente Disse</font></th>
                    <th><font size=2>Eu enviei</font></th>
                    <th><font size=2>Certo era</font></th>
                    <th><font size=2>Classificacao</font></th>
                    <th><font size=2>Int</font></th>
                    <th><font size=2>Trello</font></th>
                    <th><font size=2>Vacuo</font></th>
                    <th><font size=2>Observacao</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if($viewData['registrosSi']){
                    foreach ($viewData['registrosSi'] as $key => $value) {

                      if ($value->classificacao == 0){
                        $classf = "Sem Erro";
                      }elseif ($value->classificacao == 1){
                        $classf = "Erro de Si";
                      }elseif ($value->classificacao == 2){
                        $classf = "Erro de Projeto";
                      }

                      echo "<tr>";
                      echo "<td>" . $value->dataHora . "</td>";
                      echo "<td>" . $value->{'date'} . "</td>";
                      echo "<td>" . $value->nmCompleto . "</td>";
                      echo "<td>" . $value->disseCliente . "</td>";
                      echo "<td>" . $value->envioSi . "</td>";
                      echo "<td>" . $value->correto . "</td>";
                      echo "<td>" . $classf . "</td>";
                      echo "<td>" . $value->qtInterpret . "</td>";
                      echo "<td>" . $value->trello . "</td>";
                      echo "<td>" . $value->vacuo . "</td>";
                      echo "<td>" . $value->observacao . "</td></tr>";
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
</div>
<!-- END: Card DATA-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Mes', 'Acertos', 'Erros'],

    <?php
    if($viewData['registrosSiGrafico']){
      foreach ($viewData['registrosSiGrafico'] as $key => $value) {

        if ($value->mes == 1){
          $mes = "Jan";
        } elseif ($value->mes == 2){
          $mes = "Fev";
        } elseif ($value->mes == 3){
          $mes = "Mar";
        } elseif ($value->mes == 4){
          $mes = "Abr";
        } elseif ($value->mes == 5){
          $mes = "Mai";
        } elseif ($value->mes == 6){
          $mes = "Jun";
        } elseif ($value->mes == 7){
          $mes = "Jul";
        } elseif ($value->mes == 8){
          $mes = "Ago";
        } elseif ($value->mes == 9){
          $mes = "Set";
        } elseif ($value->mes == 10){
          $mes = "Out";
        } elseif ($value->mes == 11){
          $mes = "Nov";
        } elseif ($value->mes == 12){
          $mes = "Dez";
        }

        echo "['". $value->data ."'," . $value->acertos . ", " . $value->erros . "],";

      }
    }
    ?>
  ]);

  var options = {
    title: '',
    hAxis: {title: 'Datas',  titleTextStyle: {color: '#333'}},
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
    $erro = $viewData['registrosSiPizzaErros'][0]->erros;
    $acerto = $viewData['registrosSiPizzaDates'][0]->dates;
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
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Task', 'Hours per Day'],
    <?php
    $erro = $viewData['registrosSiPizzaInt'][0]->intErro;
    $Interacaoes = $viewData['registrosSiPizzaIntAcertos'][0]->intAcertos;
    ?>

    ['Acertos',      <?php echo $Interacaoes; ?>],
    ['Erros',     <?php echo $erro; ?>]
  ]);

  var options = {
    title: ''
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechartErros'));

  chart.draw(data, options);
}
</script>
