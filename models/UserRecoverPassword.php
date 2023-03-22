<?php
class UserRecoverPassword extends Model
{
	protected $connection = 'db2';
  protected $table = "user_recover";
  public $rules = [];
  public $messages = [];
}
