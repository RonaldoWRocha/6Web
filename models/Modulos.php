<?php
class Modulos extends Model
{
	protected $connection = 'db2';
  protected $table = "modulos";
  public $rules = [
    "nmModulos" => "required|texto",
    "descricao" => "required"
  ];
  public $messages = [];
}
