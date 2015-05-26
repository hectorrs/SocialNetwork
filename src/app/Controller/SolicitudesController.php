<?php
	class SolicitudesController extends AppController{
	
	public $paginate;
		
		public function beforeFilter() {
			parent::beforeFilter();
			//$this->Auth->allow('add', 'logout', 'login');
			
			$this->paginate = array(
			'limit' => 9,
			//'order'=> array('Solicitudes.id' => 'des'),
			'conditions' => array("Solicitud.solicitado_id !=" => AuthComponent::user('id'), "Solicitud.estado =" =>'pendiente')
			);
		}
		
		public function index(){
			/*
			$this->set('posts', $this->Solicitud->find('all',array('conditions' => array('Solicitud.solicitado_id =' => AuthComponent::user('id'), 'Solicitud.estado =' =>'pendiente'))));
			$this->set('posts', $this->paginate());
		*/
		$this->set('posts',$this->Solicitud->query("SELECT S.ID ,S.SOLICITADO_ID,S.SOLICITANTE_ID, U.USERNAME FROM  USUARIOS U, SOLICITUDES S WHERE SOLICITADO_ID='".AuthComponent::user('id')."' AND U.ID = S.SOLICITANTE_ID AND S.ESTADO='PENDIENTE'"));
		
	
		
		}
	
		public function add(){
			if($this->request->is('post')){
				if($this->Solicitud->save($this->request->data)){
					$this->Session->setFlash(__('Solicitud enviada'));
					$this->redirect(array('controller'=> 'Usuarios', 'action'=>'index'));
				}else{
					$this->Session->setFlash(__('No ha sido posible crear la solicitud'));
				}
			}
		}
			
		public function aceptada($id){
				$this->Solicitud->id = $id; // This avoids the query performed by read()
				$this->Solicitud->saveField('estado', 'aceptada');
				$this->redirect(array('controller'=> 'Solicitudes', 'action'=>'index'));			
		}
	
		public function delete(){
			$this->Solicitud->delete($this->request->data['Solicitud']['id_solicitud']);
			$this->redirect(array('action'=>'index'));
		}
	}
?>