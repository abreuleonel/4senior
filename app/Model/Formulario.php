<?php 
class Formulario extends AppModel {
	public $useTable = 'formularios';
	
	
	public $validate = array(
			'nome' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							'message' => 'Você precisa preencher o campo "Nome"',
							'required' => true,
					)
			)
	);
	
}