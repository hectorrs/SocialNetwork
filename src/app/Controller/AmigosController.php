<?php
	class AmigosController extends AppController{
		public function add(){
			if($this->request->is('post')){
				if($this->Amigo->save($this->request->data)){
					$this->Session->setFlash(__('Amigo almacenado'));
					$this->redirect(array('controller'=> 'Solicitudes', 'action'=>'aceptada',$this->request->data['Amigo']['id_solicitud'])) ;
				}else{
					$this->Session->setFlash(__('No ha sido posible crear amistad'));
					$this->redirect(array('controller'=> 'Solicitudes', 'action'=>'index'));
				}
			}
		}
	}
?>