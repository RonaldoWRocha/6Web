<?php
class Respostas extends Model
{
  protected $table = "cadrespostas";
  public $rules = [
	'nmPonto' => 'required',
	'nome' => 'required',
	'apelido' => 'required',
	'texto' => 'required'
  ];
  public $messages = [];
}
