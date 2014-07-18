<?php 
class FormularioController extends AppController {
	public $uses = array(
					'Formulario',
					'TipoPergunta',
					'Pergunta');
	
	public function index() {
		$this->paginate = array('order' => array('Formulario.id' => 'DESC'),
								'limit' => 10);
		$forms = $this->paginate('Formulario');
		
		$this->set('forms', $forms);
	}
	
	public function form($id = null) {
		$form = array();
		$perguntas = array();
		
		if(!is_null($id)) {
			$form = $this->Formulario->find('first', array(
						'conditions' => array(
									'id' => $id,
								),
						));
			$perguntas = $this->Pergunta->find('all', array(
					'conditions' => array(
							'Pergunta.formulario_id' => $id
					),
					'order' => array('Pergunta.ordem')
			));
		}	
		
		$tipo_perguntas = $this->TipoPergunta->find('all');
		
		$this->set('js', array('/js/formulario_form.js'));
		
		$this->set('tipo_perguntas', $tipo_perguntas);
		$this->set('form', $form);
		$this->set('perguntas', $perguntas);
	}
	
	public function salva() { 
		$error = false;
		if(!$this->salvaFormulario($this->request->data['Formulario'])) $error = true;
			
		if(isset($this->request->data['Formulario']['id']) && isset($this->request->data['Pergunta']) && $error == false) {
			$this->salvaPerguntas($this->request->data);
		}
		
		if($error) {
			$id = (isset($this->request->data['Formulario']['id'])) ? $this->request->data['Formulario']['id'] : '';
				
			$this->redirect(array(
					'controller' => 'formulario',
					'action' => 'form',
					$id
			));
		}
		
		$this->redirect(array(
				'controller' => 'formulario',
				'action' => 'index'
		));
	}
	 
	private function salvaFormulario(array $data) {
		$this->Formulario->set($data);
		
		if ($this->Formulario->validates()) {
			if($this->Formulario->save($data)) {
				$this->Session->setFlash('Formulário Salvo com Sucesso!', 'default', array(
					'class' => 'label label-success'
				));
			}
			
			return true;
		} else {
			$errors = $this->formataErros($this->Formulario->invalidFields());
			$this->Session->setFlash(
					implode('<br />', $errors),
					'default',
					array('class' => 'label label-danger'));
			
			return false;
		}
	}
	
	private function salvaPerguntas(array $data) {
		$saveData = array();
		foreach($data['Pergunta'] as $k => $v) {
			$saveData = $v;
			$saveData['formulario_id'] = $data['Formulario']['id'];
			$this->Pergunta->saveAll($saveData);
		}
	}
}