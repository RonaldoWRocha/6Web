<?php
class Motivos extends Model
{
  protected $table = "cadmotivotransf";
  public $rules = [
	'nmMotivo' => 'required',
	'idSetor' => 'int'
  ];
  public $messages = [];
}
