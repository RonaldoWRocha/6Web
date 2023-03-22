<?php
/*
* Função que retorna a box de mensagens do Ajax
*/

if (!function_exists('ValidaModulos')) {

	function ValidaModulos($array)
	{
		/*
		* Recebe um array com os modulos permitidos.
		* Verifica se o usuario tem aquele modulo,
		* se ele tiver o sistema vai ter criado uma sessao pro modulo no loginController.
		*/
		foreach ($array as $key) {
			if(isset(Session::get('modulos')[$key])){
				return true;
			}
		}
		redirect('/error/unauthorized');
		exit();

	}
}
if (!function_exists('ValidaModulosValue')) {

	function ValidaModulosValue($array)
	{
		/*
		* Recebe um array com os modulos permitidos.
		* Verifica se o usuario tem aquele modulo e a permissao,
		* se ele tiver o sistema vai ter criado uma sessao pro modulo no loginController.
		*/

		foreach ($array as $key => $chave) {
			foreach ($chave as $value => $valor) {
				if(Session::get('modulos')[$value] == $valor){
					$dados = Session::get('modulos')[$value] == $valor;
					return true;
				}
			}
		}
		redirect('/error/unauthorized');
		exit();

	}
}
