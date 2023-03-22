<?php
class Auditoria extends Model
{
  protected $table = "cadauditoria";
  public $rules = [
		"idSetor" => "required",
		"date" => "required",
		"idUsuario" => "required",
		"tpm" => "",
		"classificacao" => "",
		"Sistema" => "",
		"disseCliente" => "",
		"qtInterpret" => "int",
		"envioSi" => "",
		"correto" => "",
		"vacuo" => "",
		"status" => "",
		"mtDerivacao" => "",
		"trello" => "",
		"matricula" => "int",
		"observacao" => "",
        "inErroGrave" => "",
		"idAuditor" => "required"
  ];
  public $messages = [];
}
