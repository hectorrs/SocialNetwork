<?php
	class LikesController extends AppController{
		public function add(){
			if($this->request->is('post')){
				$num = $this->Like->query("SELECT * FROM LIKES WHERE USUARIOS_ID='".AuthComponent::user('id')."' and POSTS_ID='".$this->request->data['posts_id']."'");
					
					if(sizeof($num) == 0){
					$this->Like->save($this->request->data);
					}
			}
			
			$this->redirect(array('controller'=> 'Posts', 'action'=>'index')) ;	
		}
		
	}
?>