<?php

class loginController extends Controller
{
	
  public function index(){
	if(Session::get('auth')){
		header("Location: https://localhost/Auditoria/home/index");
		exit();
	}
	  
	$userSession = new UserSession;
    $userSession->validSessionLogin();
	
  }

  public function logout(){
    Session::destroy('auth');
    redirect("/login/index");
  }

}
