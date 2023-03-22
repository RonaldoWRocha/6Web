<?php
class UserModulos extends Model
{
	protected $connection = 'db2';
  protected $table = "user_modulos";
  public $rules = [
    "idModulos" => "required|int",
    "grupo" => "required|int"
  ];
  public $messages = [];
}
