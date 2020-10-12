<!--=====================================
USUARIOS
======================================-->

<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggle -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">

		<?php

		if ($_SESSION["foto"] == "") {

			echo '<img src="vistas/img/perfiles/default/anonymous.png" class="user-image" alt="User Image">';
		} else {

			echo '<img src="' . $_SESSION["foto"] . '" class="user-image" alt="User Image">';
		}


		?>

		<span class="hidden-xs"><?php echo $_SESSION["perfil"]; ?></span>

	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu" style="width: fit-content">


		<li class="user-footer">


			<div class="pull-right">
				<h4 style=""><?php echo $_SESSION["nombre"]; ?></h4>

				<a href="salir" class="btn btn-default btn-flat">Cerrar Sesion</a>

			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->