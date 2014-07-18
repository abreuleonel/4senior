<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $components = array(
			'Session',
			'Auth' => array(
					'userModel' => 'Usuario',
					'loginAction' => array(
							'controller' => 'login',
							'action' => 'index',
					),
					'authenticate' => array(
							'Form' => array(
									'userModel' => 'Usuario',
									'fields' => array(
											'password' => 'senha',
											'username' => 'login'
									))),
					'authError' => 'Você não tem acesso!',
			)
	);
	
	public function formataErros(array $erros) {
		$result = array();
		
		foreach($erros as $k => $v) {
			$result[] = end($erros[$k]);
		}
		
		return $result;
	}
}
