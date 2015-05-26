<section>
    <div id="ImagenLogin">
        <img src="/img/imagen-registro-fondo.png" />
    </div>
</section>
<section>
    <div id ="derechaLogin">
        <div id="formularioLogin">
        	<?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->create('Usuario', array('url' => array('controller' => 'usuarios', 'action' => 'login'))); ?>
            <?php echo $this->Form->input('username', array('label' => (__('USUARIO')))); ?>
            <div class="separacionVerticalFormularios"></div>
            <?php echo $this->Form->input('password', array('label' => (__('CONTRASEÑA')),'type' => 'password')); ?>
            <div class="separacionVerticalFormularios"></div>
            <?php echo $this->Form->end((__('ENTRAR'))); ?>						
            <div class="separacionVerticalFormularios"></div>
            <?php echo $this->Html->link((__('REGÍSTRATE')), '/Usuarios/add', array('class' => 'button')); ?>
        </div>
    </div>
</section>