<?php
	class PostsController extends AppController{
		// muro
		public function index(){
	
		
		/*	$this->set('posts',$this->Post->query("select p.texto,p.fecha_post, u.username from posts p, usuarios u where u.id = p.usuarios_id and (p.usuarios_id ='".AuthComponent::user('id')."' OR (
p.usuarios_id IN (
select solicitado_id from amigos where solicitante_id='".AuthComponent::user('id')."' union select solicitante_id from amigos where solicitado_id='".AuthComponent::user('id')."'))) order by fecha_post desc"));
*/		
		
		$this->set('posts',$this->Post->query(" select p.id,p.texto,p.fecha_post, u.username,(select count(posts_id)-1 from likes where posts_id = p.id)as numLike from posts p, usuarios u,likes l where u.id = p.usuarios_id and p.id=l.posts_id   and (p.usuarios_id ='".AuthComponent::user('id')."' OR (p.usuarios_id IN (select solicitado_id from amigos where solicitante_id='".AuthComponent::user('id')."' union select solicitante_id from amigos where solicitado_id='".AuthComponent::user('id')."'))) group by p.id order by fecha_post desc "));
		
		
	/*facer conculta*/	
		}
		
		public function add() {
		print_r($this->request->data);
        if ($this->request->is('post')) {
            $this->Post->create();
			    
			if ($this->Post->save($this->request->data)) {
                $this->Post->query("insert into likes(usuarios_id,posts_id)values('".AuthComponent::user('id')."',(select max(id) from posts where usuarios_id='".AuthComponent::user('id')."'))");
				$this->Session->setFlash(__('Your post has been saved.'));
                 return ($this->redirect(array('controller' => 'Posts', 'action' => 'index')));
            }else{
				$this->Session->setFlash(__('Unable to add your post.'));
				
			}
		}
    }
		
		
		
		//eliminar un post
		public function delete(){
			if($this->request->is('get')){
				throw new MethodNotAllowedException();
			}else{
				if($this->Post->delete($id)){
					$this->Session->setFlash('Post eliminado');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}
?>