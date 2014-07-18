<?php
class Usuario extends AppModel {
	public $useTable = 'usuarios';
	
	public function beforeSave($options) {
		if (isset($this->data[$this->alias]['password'])) 
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);

		return true;
	}
}

