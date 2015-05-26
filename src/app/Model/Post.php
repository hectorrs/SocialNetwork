<?php
	class Post extends AppModel{
		// validación de los campos del post
		public $validate = array(
			'texto' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'message' => 'Introduzca el texto del post'
				)
			)			
		);
		
		// relación entre post y usuario. Varios posts son tenidos por un usuario (N:1)
		public $belongsTo = array(
			'Es_tenido_por' => array(
				'className' => 'Usuario',
				'foreignKey' => 'usuario_id'
			)
		);
	}
?>