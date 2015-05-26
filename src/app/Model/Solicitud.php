<?php
	class Solicitud extends AppModel{
		public $validate = array(
			'estado' => array(
				'required' => array(
					'rule' => array('notEmpty'),
				)
			)
		);
	}
?>