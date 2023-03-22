<?php
class UserSession extends Model
{
  protected $connection = 'db2';
  protected $table = "user_session";
  public $rules = [];
  public $messages = [];

  public function validSession(){

    if(!Session::has('auth')){
      redirect("/login");
    }

    $userId = $this->find('idUsuario', '=', Session::get('auth')['idUsuario']);

    if($userId && (Session::get('token')['sessionToken'] != $userId->sessionToken)){
      $dataForm = [
        'idUsuario' => Session::get('auth')['idUsuario'],
        'blocked_until' => date("Y-m-d H:i:s", strtotime("+".app('app_time_blocked')."minutes"))
      ];

      $userBlocked = new UserBlocked;
      $userIdBlocked = $userBlocked->find('idUsuario', '=', Session::get('auth')['idUsuario']);

      if($userIdBlocked){
        $userBlocked->update($dataForm, 'idUsuario', $userIdBlocked->idUsuario);
      }else{
        $userBlocked->insert($dataForm);
      }

      $dataFormSession = ['sessionToken' => ''];

      $this->update($dataFormSession, 'idUsuario', Session::get('auth')['idUsuario']);

      $email = new Email;
      $assunto = 'Bloqueamos seu acesso no sistema!';
      $mensagem = $email->templateBlockedAccess(Session::get('auth')['nmCompleto'], $dataForm['blocked_until']);
      $remetenteNome = app('app_name');
      $remetenteEmail = mailer('mail_emaildestinatario');
      $destinoNome = Session::get('auth')['nmCompleto'];
      $destinoEmail = Session::get('auth')['user_email'];
      $email->createEmail($assunto,$mensagem,$remetenteNome,$remetenteEmail,$destinoNome,$destinoEmail);
      $email->sendMail();

      Session::destroy('auth');
      Session::flashWarning("Usuario ja se encontra logado em outra aba ou navegador.");

      redirect("/login");
    }

  }
  
  public function validSessionLogin(){
	  
		if(!Session::has('auth')){
		  header("Location: https://localhost/Embrasystem/?app=".$_SERVER["HTTP_HOST"] . "/Auditoria/");
		} else {
			header("Location: https://localhost/Auditoria/home/index");
		}
    }
}
