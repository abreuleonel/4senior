<?php 
class UsuarioController extends AppController {
	
	public function beforeFilter() {
		$this->Auth->allow('login');
		parent::beforeFilter();
	
	}
	
	public function login() {
		if(!empty($this->request->data)) {
			if($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Login inválido', 'default', array('class' => 'alert alert-error'));
				$this->redirect('/');
			}
		} else {
			$this->Session->setFlash('Erro no Formulário', 'default', array('class' => 'alert alert-error'));
			$this->redirect('/');
		}
	}
}