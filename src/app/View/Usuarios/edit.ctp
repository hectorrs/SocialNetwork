<div id="ImagenLogin">
    <img src="/img/imagen-registro-fondo.png" height="500px" width="auto" />
</div>
<div id ="derechaRegistro">
    <div id="formularioRegistro">
		<?php echo $this->Form->create('Usuario', array('action' => 'edit')); ?>
		<?php echo $this->Form->input('nombreCompleto', array('label' => (__('Nombre')))); ?>
        <div class="separacionVerticalFormularios"></div>
        <?php echo $this->Form->input('username', array('label' => (__('Alias')))); ?>
        <div class="separacionVerticalFormularios"></div>
        <?php echo $this->Form->input('password', array('label' => (__('Contraseña')))); ?>
        <div class="separacionVerticalFormularios"></div>
        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
        <?php echo $this->Form->end(__('GUARDAR')); ?>
	</div>
</div>