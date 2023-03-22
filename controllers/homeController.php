<?php

class homeController extends Controller
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
  public function index()
  {
	$data = [];
    $data["title"] = "Home";
	
	ValidaModulos(['modAuditoria']);

    $this->loadTemplate("home/index", $data);
  }

}
