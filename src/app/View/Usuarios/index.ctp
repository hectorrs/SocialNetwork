<div id="espacioBotonesPrincipales">
	<nav>
		<label>
			<div class="botonMenuPrincipal">
				<img src="/img/taza.png"/>
				<?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios', 'action' => 'index'))); ?>
				<?php echo $this->Form->end(__('Buscar Amigos')); ?>
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
				<?php echo $this->Form->end(__('Cerrar Sesión')); ?>
			</div>
		</label>
	</nav>
</div>
<div id="imagenLogueadoIzquierda">
	<img src="/img/imagenMuroLateral.png"/>
</div>
<div id="cuerpoPagina">
	<section>
		
		<h1 align="center" style="text-decoration:underline ">Lista de Usuarios</h1>
		
	
	<?php foreach ($posts as $post): ?>
    	<div class="contenedorUsuario">
			<span>
		<?php 
		
			echo $post['usuarios']['username']; 
		?>
		</span>
			 
			<?php echo $this->Form->create('Solicitud',array('controller'=>'Solicitudes','action'=>'add'));?>
			<?php echo $this->Form->input('solicitante_id',array('type'=>'hidden','value'=> AuthComponent::user('id')))?>
			<?php echo $this->Form->input('solicitado_id',array('type'=>'hidden','value' => $post['usuarios']['id']));?>
			<?php echo $this->Form->input('estado',array('type'=>'hidden','value' => 'pendiente'))?>
			<?php echo $this->Form->end(__('enviar solicitud'));?>
			
		</div>
    <?php endforeach; ?>
			
	</table>
	
</div>	
<div id="imagenLogueadoDerecha">
	<img src="/img/imagenMuroLateral.png" />
</div>