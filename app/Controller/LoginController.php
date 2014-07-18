<?php
class LoginController extends AppController {
	public $uses = array('Usuario');
	
	public function beforeFilter() {
		$this->Auth->allow('index');
		parent::beforeFilter();
	}
	
	public function index() {
		if($this->Session->read('Auth.User')) $this->redirect(array('controller' => 'home', 'action' => 'dash'));
	}
		
	public function dash() {
		$this->Auth->user();
	}
}