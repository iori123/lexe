<?php



$categorias = ControladorCategorias::ctrMostrarCategorias(null,null);
$totalCat = count($categorias);

$subcategorias = ControladorSubCategorias::ctrMostrarSubCategorias(null,null);
$totalSubCat = count($subcategorias);

$productos = ControladorArticulos::ctrMostrarTotalArticulos("id");
$totalProductos = count($productos);

?>



<!--===========================================================================-->

<!--===========================================================================-->


<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">

  <!-- small box -->
  <div class="small-box bg-red">

    <!-- inner -->
    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>

    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">

      <i class="ion ion-pie-graph"></i>

    </div>
    <!-- icon -->

    <a href="productos" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>

  </div>
  <!-- small box -->

</div>
<!-- col -->
<!-- col -->
<div class="col-lg-3 col-xs-6">

  <!-- small box -->
  <div class="small-box bg-yellow">

    <!-- inner -->
    <div class="inner">

      <h3><?php echo number_format($totalCat); ?></h3>

      <p>CATEGORIAS</p>

    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">

      <i class="ion ion-pie-graph"></i>

    </div>
    <!-- icon -->

    <a href="categorias" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>

  </div>
  <!-- small box -->

</div>
<!-- col -->
<!-- col -->
<div class="col-lg-3 col-xs-6">

  <!-- small box -->
  <div class="small-box bg-green">

    <!-- inner -->
    <div class="inner">

      <h3><?php echo number_format($totalSubCat); ?></h3>

      <p>SUBCATEGORIAS</p>

    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">

      <i class="ion ion-pie-graph"></i>

    </div>
    <!-- icon -->

    <a href="subcategorias" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>

  </div>
  <!-- small box -->

</div>
<!-- col -->