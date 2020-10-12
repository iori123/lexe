<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">

    <h1>
      Tablero
      <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Estadisticas</li>

    </ol>

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">

    <!-- row -->
    <div class="row">

      <?php

      if ($_SESSION["perfil"] == "administrador") {

        include "inicio/cajas-superiores.php";
      }

      ?>

    </div>
   
  </section>
  <!-- content -->

</div>
<!-- content-wrapper -->