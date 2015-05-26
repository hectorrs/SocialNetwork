<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

	class Usuario extends AppModel{	
		// validación de los campos del usuario
		public $validate = array(
			'nombreCompleto' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Introduzca el nombre de usuario'
				)
			),
			'username' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Introduzca el alias'
				)
			),
			'password' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Introduzca la contraseña'
				)
			)
		);
		
		// relación entre usuario y post. Un usuario tiene varios posts (1:N)
		public $hasMany = array(
			'Tiene' => array( // Tiene = nombre de la relación
				'className' => 'Post',
				'foreignKey' => 'id',
				'dependent' => true // Cuando elimina un usuario, también elimina los posts relacionados con él.
			)
		);
		
		public function beforeSave($options = array()) {
			if (isset($this->data[$this->alias]['password'])) {
				$passwordHasher = new BlowfishPasswordHasher();
				$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
				);
			}
			return true;
		}
	}
?>