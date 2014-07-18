<?php 
class Pergunta extends AppModel {
	public $useTable = 'perguntas';
	
	public $belongsTo = array(
		'TipoPergunta' => array(
			'className' => 'TipoPergunta',
			'foreignKey' => 'tipo_pergunta_id',
		)
	);
	
}