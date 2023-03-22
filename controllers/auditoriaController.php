<?php

class auditoriaController extends Controller
{

  /**
  * Construtor da classe
  */
  public function __construct()
  {
    parent::__construct();

    $userSession = new UserSession;
    $userSession->validSession();

  }

  /**
  * Exibe uma listagem do recurso
  *
  * @return View
  */
  public function auditar()
  {
    $data = [];
    $data["title"] = "Selecione o setor";
    ValidaModulos(['modAuditoria']);
	
	$registros = new Setores;
	$bind = ['a' => 'S'];
    $data['setores'] = $registros->findAll("WHERE atendimento = :a", $bind);

    $this->loadTemplate("auditoria/selectProjAudt", $data);
  }
  
  public function aprimoramento()
  {
    $data = [];
    $data["title"] = "Aprimoramento";
    ValidaModulos(['modAuditoria']);

    $this->loadTemplate("home/index", $data);
  }
  
  public function produtividade()
  {
    $data = [];
    $data["title"] = "Aprimoramento";
    ValidaModulos(['modAuditoria']);

    $this->loadTemplate("home/index", $data);
  }

  public function configuracoes()
  {
    $data = [];
    $data["title"] = "Configuracoes";
    ValidaModulos(['modAuditoria']);
	
	$registros = new Setores;
	$bind = ['a' => 'S'];
    $data['setores'] = $registros->findAll("WHERE atendimento = :a", $bind);

    $this->loadTemplate("auditoria/configuracoes", $data);
  }
  
  public function redirectAbrirConfig()
  {
	$dados = cryptId($this->request->post('configProjeto'));
    redirect("/auditoria/abrirConfig/".$dados);
  }

  public function abrirConfig($id)
  {
    $data = [];
    $data["title"] = "Configuracoes";
    ValidaModulos(['modAuditoria']);
	
	$idProjeto = decryptId($id);
	Session::set('selectProj', [
      'id' => $idProjeto
    ]);
	
	$bind = ['id' => $idProjeto];
	
	$respostas = new Respostas;
	$data['respostas'] = $respostas->findAll("WHERE idSetor = :id", $bind);
	
	$motivos = new Motivos;
	$data['motivos'] = $motivos->findAll("WHERE idSetor = :id", $bind);

    $this->loadTemplate("auditoria/abrirConfig", $data);
  }
  
  public function BuscarSi()
  {
    $data = [];
    $data["title"] = "Selecione o Si";
    ValidaModulos(['modAuditoria']);
	
	$registros = new UserPersonal;
	$query1 = "SELECT * FROM `user_personal` ORDER BY `nmCompleto` ASC";
    $data['usuarios'] = $registros->fullQuery($query1);

    $this->loadTemplate("auditoria/buscarSi", $data);
  }
  
  public function redirectRegistroSi()
  {
	  Session::set('setSetor', [
		  'id' => '',
		  'nome' => ''
		]);
		
	$dados = cryptId($this->request->post('registroUsuario').";".$this->request->post('dtInicial').";".$this->request->post('dtFinal'));
    redirect("/auditoria/registrosSi/".$dados);
  }
  
  public function mudarSetor()
  {
	  $exp = explode(";", $this->request->post('setSetor'));
	 Session::set('setSetor', [
      'id' => $exp[0],
      'nome' => $exp[1]
    ]);
	
	
	redirect("/auditoria/registrosSi/".cryptId(Session::get('registroSi')['dados']));
  }
  
  public function registrosSi($dados)
  {
    $data = [];
    ValidaModulos(['modAuditoria']);
	
	$decript = decryptId($dados);
	$exp = explode(";", $decript);
	//dd($exp);
	$data["title"] = $exp[1];
	
	Session::set('registroSi', [
      'idUsuario' => $exp[0],
      'nmUsuario' => $exp[1],
      'dtInicial' => $exp[2],
	  'dtFinal' => $exp[3],
	  'dados' => $decript
    ]);
	
	$condicao1= "";
	$condicao2= "";
	if(Session::get('setSetor')['id'] != ''){
		$condicao1 = "AND A.idSetor =".Session::get('setSetor')['id'];
		$condicao2 = "AND idSetor =".Session::get('setSetor')['id'];
	} 
	
	$auditoria = new Auditoria;
	$query = "SELECT SUM(A.classificacao = 1) AS qtErro, SUM(A.inErroGrave = 's') AS qtErroGrave, SUM(A.classificacao = 0) AS qtAcertos, SUM(A.qtInterpret) AS qtInterpret, D.nmCompleto, C.nmSetor FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.`idUsuario` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao1." GROUP BY A.`idUsuario`";
    $data['rankingerrossi'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(A.classificacao) AS qtErro,A.envioSi, D.nmCompleto, C.nmSetor FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.classificacao = 1 AND A.`idUsuario` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao1." GROUP BY A.`envioSi`";
    $data['recFraseologiaErrosi'] = $auditoria->fullQuery($query);
	
	$query = "SELECT * FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.classificacao = 1 AND A.`idUsuario` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao1."";
    $data['registrosSi'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(classificacao = 1) AS erros, SUM(classificacao = 0) AS acertos, MONTH(STR_TO_DATE(date, '%d/%m/%Y')) AS mes, STR_TO_DATE(date, '%d/%m/%Y') AS data FROM `cadauditoria` WHERE `idUsuario` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao2." GROUP BY STR_TO_DATE(date, '%d/%m/%Y') ORDER BY STR_TO_DATE(date, '%d/%m/%Y') ASC LIMIT 10";
    $data['registrosSiGrafico'] = $auditoria->fullQuery($query);
	
	$query = "SELECT COUNT(distinct date) AS erros FROM `cadauditoria` WHERE classificacao = 1 AND `idUsuario` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao2." ";
    $data['registrosSiPizzaErros'] = $auditoria->fullQuery($query);
	
	$query = "SELECT COUNT(distinct date) AS dates FROM `cadauditoria` WHERE classificacao = 0 AND `idUsuario` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao2." ";
    $data['registrosSiPizzaDates'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(qtInterpret) AS intErro FROM `cadauditoria` WHERE classificacao = 1 AND `idUsuario` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao2." ";
    $data['registrosSiPizzaInt'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(qtInterpret) AS intAcertos FROM `cadauditoria` WHERE classificacao = 0 AND `idUsuario` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' ".$condicao2." ";
    $data['registrosSiPizzaIntAcertos'] = $auditoria->fullQuery($query);
	
	$query = "SELECT B.idSetor, B.nmSetor FROM `cadauditoria` A INNER JOIN embrasystem.`setores` B ON A.`idSetor` = B.`idSetor` WHERE A.`idUsuario` ='" . $exp[0] . "' AND  date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' GROUP BY A.idSetor";
    $data['setoressi'] = $auditoria->fullQuery($query);

    $this->loadTemplate("auditoria/buscarSiResult", $data);
  }
  
  public function BuscarProjeto()
  {
    $data = [];
    $data["title"] = "Selecione o Setor";
    ValidaModulos(['modAuditoria']);
	
	$registros = new Setores;
	$bind = ['a' => 'S'];
    $data['setores'] = $registros->findAll("WHERE atendimento = :a", $bind);

    $this->loadTemplate("auditoria/buscarProjeto", $data);
  }
  
  public function redirectRegistroSetor()
  {
	$dados = cryptId($this->request->post('registroSetor').";".$this->request->post('dtInicial').";".$this->request->post('dtFinal'));
    redirect("/auditoria/registrosSetor/".$dados);
  }
  
  public function registrosSetor($dados)
  {
    $data = [];
    ValidaModulos(['modAuditoria']);
	
	$exp = explode(";", decryptId($dados));
	$data["title"] = $exp[1];
	
	Session::set('registroSetor', [
      'idSetor' => $exp[0],
      'nmSetor' => $exp[1],
      'dtInicial' => $exp[2],
	  'dtFinal' => $exp[3]
    ]);
	
	$auditoria = new Auditoria;
	$query = "SELECT SUM(A.classificacao = 1) AS qtErro, SUM(A.classificacao = 0) AS qtAcertos, SUM(A.inErroGrave = 's') AS qtErroGrave, SUM(A.qtInterpret) AS qtInterpret, D.nmCompleto, C.nmSetor FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.`idSetor` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' GROUP BY A.`idUsuario`";
    $data['rankingerrossetor'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(A.classificacao) AS qtErro,A.envioSi, D.nmCompleto, C.nmSetor FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.classificacao = 1 AND A.`idSetor` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' GROUP BY A.`envioSi`";
    $data['recFraseologiaErrosi'] = $auditoria->fullQuery($query);
	
	$query = "SELECT * FROM `cadauditoria` A INNER JOIN embrasystem.`user_security` B ON A.`idUsuario` = B.`idUsuario` INNER JOIN embrasystem.`setores` C ON A.`idSetor` = C.`idSetor` INNER JOIN embrasystem.`user_personal` D ON B.`idUsuario` = D.`idUsuario` WHERE A.`idSetor` ='" . $exp[0] . "' AND date(A.`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "'";
    $data['registrosSi'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(classificacao = 1) AS erros, SUM(classificacao = 0) AS acertos, MONTH(STR_TO_DATE(date, '%d/%m/%Y')) AS mes, STR_TO_DATE(date, '%d/%m/%Y') AS data, observacao FROM `cadauditoria` WHERE `idSetor` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "' GROUP BY STR_TO_DATE(date, '%d/%m/%Y') ORDER BY STR_TO_DATE(date, '%d/%m/%Y') ASC LIMIT 10";
    $data['registrosSiGrafico'] = $auditoria->fullQuery($query);
	
	$query = "SELECT COUNT(distinct date) AS erros FROM `cadauditoria` WHERE classificacao = 1 AND `idSetor` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "'";
    $data['registrosSiPizzaErros'] = $auditoria->fullQuery($query);
	
	$query = "SELECT COUNT(distinct date) AS dates FROM `cadauditoria` WHERE  classificacao = 0 AND `idSetor` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "'";
    $data['registrosSiPizzaDates'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(qtInterpret) AS intErro FROM `cadauditoria` WHERE classificacao = 1 AND `idSetor` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "'";
    $data['registrosSiPizzaInt'] = $auditoria->fullQuery($query);
	
	$query = "SELECT SUM(qtInterpret) AS intAcertos FROM `cadauditoria` WHERE classificacao = 0 AND `idSetor` ='" . $exp[0] . "' AND  date(`dataHora`) BETWEEN '" . $exp[2] . "' AND '" . $exp[3] . "'";
    $data['registrosSiPizzaIntAcertos'] = $auditoria->fullQuery($query);

    $this->loadTemplate("auditoria/buscarProjetoResult", $data);
  }
  
  public function redirectRegistro()
  {
	$auditoriaSetor = cryptId($this->request->post('auditoriaSetor'));
    redirect("/auditoria/iniciaRegistro/".$auditoriaSetor);
  }
  
  public function iniciaRegistro($dados)
  {
    $data = [];
    $data["title"] = "Iniciar Registro";
    ValidaModulos(['modAuditoria']);
	
	$decript = decryptId($dados);
	$dados = explode(";", $decript);
	if ($dados[2] == 0) {
		$tipo = "Ativo";
	} elseif ($dados[2] == 1) {
		$tipo = "Receptivo";
	} elseif ($dados[2] == 2) {
		$tipo = "Chat";
	} elseif ($dados[2] == 3) {
		$tipo = "TicketController";
	} elseif ($dados[2] == 4) {
		$tipo = "Outro";
	} 
	
	Session::set('auditar', [
      'idSetor' => $dados[0],
      'nmSetor' => $dados[1],
      'tipo' => $tipo,
	  'chave' => $decript
    ]);
	
	$infousuario = new UserPersonal;
	$query1 = "SELECT * FROM embrasystem.`user_sectors` A INNER JOIN embrasystem.`Setores` B ON A.`idSetor` = B.idSetor INNER JOIN embrasystem.`user_personal` C ON A.`idUsuario` = C.`idUsuario` WHERE A.`idSetor` ='" . $dados[0] . "' OR A.`idSecSetor` ='" . $dados[0] . "' ORDER BY C.`nmCompleto` ASC";
    $data['infousuario'] = $infousuario->fullQuery($query1);
	
	$respostas = new Respostas;
	$query2 = "SELECT * FROM `cadrespostas` WHERE `idSetor` =". $dados[0];
    $data['respostas'] = $respostas->fullQuery($query2);
	
	$motivos = new Motivos;
	$query3 = "SELECT * FROM `cadmotivotransf` WHERE `idSetor` =". $dados[0];
    $data['motivos'] = $respostas->fullQuery($query3);
	
	$registroAuditoria = new Auditoria;
	$query4 = "SELECT * FROM cadAuditoria A LEFT JOIN embrasystem.user_personal B ON A.idUsuario = B.idUsuario WHERE A.`idSetor` =". $dados[0] ." ORDER BY A.dataHora DESC LIMIT 200" ;
    $data['registroAuditoria'] = $respostas->fullQuery($query4);
	
	if ($dados[2] == 3){
		$this->loadTemplate("auditoria/auditarEmail", $data);
	} else {
		$this->loadTemplate("auditoria/auditar", $data);
	}
  }
  
  public function registrar()
  {
	$data = [];
    $this->request->csrfValid();

    $validation = new Validation;
    $Auditoria = new Auditoria;
	
	$exp = explode(";", $this->request->post('idUsuario'));
	
	if(!empty($this->request->post('lembreme'))){  
		setcookie ("date",$this->request->post('date'),time()+ (10 * 365 * 24 * 60 * 60));   
		setcookie ("idUsuario",$this->request->post('idUsuario'),time()+ (10 * 365 * 24 * 60 * 60));   
		setcookie ("nmCompleto",$exp[1],time()+ (10 * 365 * 24 * 60 * 60));   
		setcookie ("Sistema",$this->request->post('Sistema'),time()+ (10 * 365 * 24 * 60 * 60));  
		setcookie ("qtInterpret",$this->request->post('qtInterpret'),time()+ (10 * 365 * 24 * 60 * 60)); 
		setcookie ("envioSi",$this->request->post('envioSi'),time()+ (10 * 365 * 24 * 60 * 60)); 
		setcookie ("correto",$this->request->post('correto'),time()+ (10 * 365 * 24 * 60 * 60)); 
	   }else{  
		if(isset($_COOKIE["Sistema"])){  
		 setcookie ("Sistema","");
		 setcookie ("date","");
		 setcookie ("idUsuario","");
		 setcookie ("nmCompleto","");
		 setcookie ("qtInterpret","");
		 setcookie ("envioSi","");
		 setcookie ("correto","");
	   }
	  }
	  
    $dataForm = $this->request->except(['_token', 'lembreme', 'idUsuario']);
    $dataForm['idUsuario'] = $exp[0];
	
    $validation->validate($Auditoria->rules, $dataForm, $Auditoria->messages);

    if($validation->hasError()){
      $data['return'] = $validation->messages('separated');
      echo json_encode($data);
      exit;
    }

    $cadastrar = $Auditoria->insert($dataForm);
	$data['return'] = Alert::AjaxSuccess("Cadastro Efetuado com Sucesso!");
    $data['redirect'] = Alert::AjaxRedirect("/auditoria/iniciaRegistro/".cryptId(session::get('auditar')['chave']) , '800');
    echo json_encode($data);
    exit();
  }
  
  public function deletarRegistro($id)
  {
    $data = [];
    $idRegistro = decryptId($id);

    $auditoria = new Auditoria;
    $deletar = $auditoria->delete('idAuditoria', $idRegistro, '=');

    session::flashSuccess("Deletado com sucesso!");
    redirect("/auditoria/iniciaRegistro/". cryptId(session::get('auditar')['chave']));
  }
  
  public function cadMotivo()
  {
    $data = [];
	$validation = new Validation;
	$motivos = new Motivos;
    $dataForm = $this->request->except(['_token']);
    $validation->validate($motivos->rules, $dataForm, $motivos->messages);

    if($validation->hasError()){
      $data['return'] = $validation->messages('separated');
      echo json_encode($data);
      exit;
    }

    $cadastrar = $motivos->insert($dataForm);
	$data['return'] = Alert::AjaxSuccess("Cadastro Efetuado com Sucesso!");
    $data['redirect'] = Alert::AjaxRedirect("/auditoria/abrirConfig/".cryptId(session::get('selectProj')['id']) , '800');
    echo json_encode($data);
    exit();
  }
  
  public function cadRespostas()
  {
    $data = [];
	$validation = new Validation;
	$respostas = new Respostas;
    $dataForm = $this->request->except(['_token']);
    $validation->validate($respostas->rules, $dataForm, $respostas->messages);

    if($validation->hasError()){
      $data['return'] = $validation->messages('separated');
      echo json_encode($data);
      exit;
    }

    $cadastrar = $respostas->insert($dataForm);
	$data['return'] = Alert::AjaxSuccess("Cadastro Efetuado com Sucesso!");
    $data['redirect'] = Alert::AjaxRedirect("/auditoria/abrirConfig/".cryptId(session::get('selectProj')['id']) , '800');
    echo json_encode($data);
    exit();
  }
  
  public function deletarMotivo($id)
  {
    $data = [];
    $id = decryptId($id);

    $motivos = new Motivos;
    $deletar = $motivos->delete('idMotivos', $id, '=');

    session::flashSuccess("Deletado com sucesso!");
    redirect("/auditoria/abrirConfig/". cryptId(session::get('selectProj')['id']));
  }
  
  public function deletarRespostas($id)
  {
    $data = [];
    $id = decryptId($id);

    $respostas = new Respostas;
    $deletar = $respostas->delete('idRespostas', $id, '=');

    session::flashSuccess("Deletado com sucesso!");
    redirect("/auditoria/abrirConfig/". cryptId(session::get('selectProj')['id']));
  }
  
  public function enviarRespostas()
  {

    try {
      $upload = new Upload();
      $upload->set()
	  ->txt()
	  ->csv()
      ->path("repository/arquivos/")
      ->moveFile("arquivo");

      if(!$upload->getErros()){
        $nome = $upload->getNameFile();
        $lerRespostas = LerRespostas($nome);

        if ($lerRespostas == "OK"){
		  session::flashSuccess("Respostas inserido com sucesso!");
          redirect("/auditoria/abrirConfig/". cryptId(session::get('selectProj')['id']));
        } else {
		  session::flashDanger("Aconteceu algum erro! Procure o suporte embrasystem.");
          redirect("/auditoria/abrirConfig/". cryptId(session::get('selectProj')['id']));
        }

      }else{
        echo $upload->getErros();
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}
