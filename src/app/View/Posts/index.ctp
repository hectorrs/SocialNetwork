<div id="espacioBotonesPrincipales">
	<nav>
		<label>
			<div class="botonMenuPrincipal">
				<img src="/img/taza.png"/>
				<?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios', 'action' => 'index'))); ?>
				<?php echo $this->Form->end((__('Buscar Amigos'))); ?>
			</div>
		</label>
	
		<label>
			<div class="botonMenuPrincipal">
				<img src="/img/taza.png"/>
					<form action="/Solicitudes/index" method="post">
						<input type="submit" name="solicitudes_amistad" value="Solicitudes de Amistad">
					</form>
			</div>
		</label>
	
		<label>
			<div class="botonMenuPrincipal">
				<img src="/img/taza.png"/>
				<?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios', 'action' => 'logout'))); ?>
				<?php echo $this->Form->end((__('Cerrar Sesión'))); ?>
			</div>
		</label>
	</nav>
</div>
<div id="imagenLogueadoIzquierda">
	<img src="/img/imagenMuroLateral.png"/>
</div>
<div id="cuerpoPagina">
	<section>
		<div class="cuerpoTextArea">
			<p><?php print_r(AuthComponent::user('username'))?></p>
			<?php echo $this->Form->create('Post',array('controller' => 'Posts','action' => 'add'));?>
					<?php echo $this->Form->input((__('texto')), array('type' => 'text','label'=>'','placeholder'=>'nuevo Post ...'));?>
					<?php echo $this->Form->input((__('usuarios_id')), array('type' => 'hidden','value' =>AuthComponent::user('id')));?>
			<div class="publicarPost">
							<div class="Megusta">
					<?php echo $this->Form->end((__('Publicar')));?>
					
				</div>
			</div>
		</div>
	</section>
	<div class="espacioVerticalPost">
	</div>
    <?php
	
	foreach($posts as $post){
		
		?>
	 <section>
		<div class="cuerpoTextArea">
			 <div class="fecha" ><p><?php echo $post['p']['fecha_post'];?></p></div>
            <p><?php echo $post['u']['username']?></p>
           
			<textarea rows="5" cols="30" readonly><?php echo $post['p']['texto'] ?>
			</textarea >
			<div class="Megusta">
				
                <form action = "../Likes/add" method="post">
					<strong><input type="submit" name="megusta" value="<?php echo __('Me gusta'); ?>"></input></strong>
					<?php echo $post[0]['numLike'] .' '. __('Me gusta') ?>
					<?php echo $this->Form->input('usuarios_id', array('type' => 'hidden','value' =>AuthComponent::user('id')));?>
					<?php echo $this->Form->input('posts_id', array('type' => 'hidden','value' => $post['p']['id']));?>
			
                </form>
			</div>
         
		</div>
	</section>
    <?php
	}
	?>
	</div>

<div id="imagenLogueadoDerecha">
	<img src="/img/imagenMuroLateral.png" />
</div>