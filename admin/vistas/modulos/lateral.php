<!-- main-sidebar -->
<aside class="main-sidebar">

	<!-- sidebar -->
	<section class="sidebar" style="padding: 0 .5rem;">

		<div class="user-panel">
			<div class="pull-left image">
				<?php

				if ($_SESSION["foto"] == "") {

					echo '<img src="vistas/img/perfiles/default/anonymous.png" class="img-circle" alt="User Image">';
				} else {

					echo '<img src="' . $_SESSION["foto"] . '" class="img-circle" alt="User Image">';
				}


				?>
			</div>
			<div class="pull-left info">
				<p>
					<?php echo $_SESSION["nombre"]; ?>
				</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Bienvenido</a>
			</div>
		</div>
		<?php

		include "lateral/menu.php";

		?>

	</section>
	<!-- /.sidebar -->

</aside>
<!-- main-sidebar -->