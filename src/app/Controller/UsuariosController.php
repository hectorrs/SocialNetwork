<?php
	class UsuariosController extends AppController{
		// helpers
		public $helpers = array('Html', 'Form');
		
		public $paginate;
		
		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('add', 'logout', 'login');
			
			/*$this->paginate = array(
			'limit' => 9,
			'order'=> array('Usuario.nombreCompleto' => 'asc'),
			'conditions' => array("Usuario.username !=" => AuthComponent::user('username'))
			);*/
			//$this->paginate = array('Modelo');
		}
				
		// iniciar sesión
		public function login(){
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				}
				$this->Session->setFlash(__('Usuario o contraseña incorrectos.'));
				return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
			
			} 
		}
		
		// cerrar sesión
		public function logout(){
			return $this->redirect($this->Auth->logout());
		}
		
		// registrarse
		public function add(){
			if($this->request->is('post')){
				$num = $this->Usuario->query("SELECT * FROM USUARIOS WHERE USERNAME = '".$this->request->data["Usuario"]["username"]."'");
				if(sizeof($num) == 0){
					if($this->request->data["Usuario"]["password"] == $this->request->data["Usuario"]["passVerify"]){
						if($this->Usuario->save($this->request->data)){
							$this->Session->setFlash('Usuario registrado');
							return ($this->redirect(array('controller' => 'pages', 'action' => 'home')));	
						}
					}else{
						$this->Session->setFlash('Las contraseñas no son iguales');
					}
				}else{
					$this->Session->setFlash('El usuario ya existe');
				}
			}
			
			
		}
		
		// modificar perfil
		public function edit($id = null){
			$this->Usuario->id = $id;
			if($this->request->is('get')){
				$this->request->data = $this->Usuario->read();
			}else{
				if($this->Usuario->save($this->request->data)){
					$this->Session->setFlash('El usuario ' . $this->request->data['Usuario']['alias'] . ' ha sido guardado');
					$this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash('No se ha podido guardar');	
				}
			}
		}
		
		// darse de baja
		public function delete($id){
			if($this->request->is('get')){
				throw new MethodNotAllowedException();
			}else{
				if($this->Usuario->delete($id)){
					$this->Session->setFlash('Usuario eliminado');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
		
		public function index(){
			
			$this->set('posts', $this->Usuario->query("select * from usuarios where id!='".AuthComponent::user('id')."' and id not in (select solicitado_id from amigos where solicitante_id='".AuthComponent::user('id')."' union select solicitante_id from amigos where solicitado_id='".AuthComponent::user('id')."')"));
			//$this->set('posts', $this->paginate());
		}
	
		
	}
?>