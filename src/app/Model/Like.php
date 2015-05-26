<?php
	class Like extends AppModel{
		// validación de los campos del post
	
		
		// relación entre post y usuario. Varios posts son tenidos por un usuario (N:1)
		public $hasOne = array(
			'pertenece' => array(
				'className' => 'Post',
				'foreignKey' => 'posts_id'
			)
		);
	}
?>