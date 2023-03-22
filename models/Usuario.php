<?php
class Usuario extends Model
{
	protected $connection = 'db2';
	protected $table = "usuarios";
	public $rules = [
	  "idUsuario" => "required|int",
	  "nmUsuario" => "required",
	  "cdSenha" => "required",
	  "user_email" => "required|email",
	  "cdTipo" => "required|int"
	  ];
	public $messages = [];
}
