<?php
	$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<?php			
		$dir = "";
			switch($_SERVER["REQUEST_URI"]){
				case '/Solicitudes/index':
					$dir="../Posts/index";
					break;
				case'/usuarios':
					$dir="/Posts/index";
					break;
				}
            ?>
 
    <a href="<?php echo $dir; ?>">
    <div id="Cabecera">
        <div id="container">
            <div class="ImagenCabeceraIzquierda">
                <img src="/img/imagen-registro-título.png"/>
            </div>
             	<strong>SOCIAL COFFEE</strong> 
            <div class="ImagenCabeceraDerecha">
                <img src="/img/imagen-registro-título.png"/>
            </div>
        </div>
    </div>
    </a>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('auth'); ?>
	<?php echo $this->fetch('content'); ?>
    <footer>
        <div id="pie">
            <h1> SSR Corporation &copy; 2014 </h1>
        </div>
    </footer>
</body>
</html>