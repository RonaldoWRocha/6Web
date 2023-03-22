<?php

class apiController extends Controller
{

  public function apontamentos($idUsuario)
  {
	$apontamentos = new Apontamentos;
	$bind = ['id' => $idUsuario];
    $data['apontamentos'] = $apontamentos->findAll("WHERE idUsuario = :id", $bind);

    echo json_encode($data['apontamentos']);
  }

}
