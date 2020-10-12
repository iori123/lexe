
<div id="header">
	<div align="left">
		<a href="<?php echo $url ; ?>"></a><a href="<?php echo $url ; ?>">
		<img src="<?php echo $server .$plantilla['logo']; ?>" width="729" height="135" border="0" /></a>
	</div>
</div>

<div id="menu_tab">
	<ul class="menu">
		<li><a href="<?php echo $url ; ?>" class="nav"> INICIO </a></li>
		<li class="divider"></li>
		<?php
		$item = null;
		$valor = null;
		$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
		foreach ($categorias as $key => $value) {
			if ($value["estado"] != 0) {
				echo
					'<li>
						<a href="' . $value['ruta'] . '" class="nav">
						' . $value['categoria'] . '
						</a>
					</li>
					<li class="divider"></li>';
			}
		}
		?>

	</ul>
</div>
<div class="crumb_navigation"></div>