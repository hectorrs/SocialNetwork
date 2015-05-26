<section>
	<div id="ImagenLogin">
		<img src="/img/imagen-registro-fondo.png" height="500px" width="auto" />
	</div>
	<div id ="derechaLogin">
		<div id="formularioLogin">
			<?php echo $this->Form->create('Usuario'); ?>
			<p><?php echo $this->Form->input('nombreCompleto', array('label' => (__('NOMBRE COMPLETO')))); ?></p>
			
			<div class="separacionVerticalFormularios"></div>
			<p><?php echo $this->Form->input('username', array('label' => (__('ALIAS')))); ?></p>
			<div class="separacionVerticalFormularios"></div>
			<?php echo $this->Form->input('password', array('label' => 'CONTRASEÑA','type'=>'password')); ?>
			<div class="separacionVerticalFormularios"></div>
			<?php echo $this->Form->input('passVerify', array('label' => 'REPITA CONTRASEÑA','type'=>'password')); ?>
			<div class="separacionVerticalFormularios"></div>
			<?php echo $this->Form->end(__('REGISTRARSE')); ?>
		</div>
	</div>
</section>