<!--=====================================
MENU
======================================-->

<ul class="sidebar-menu">

  <li class="active"><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
  <?php
  if ($_SESSION["perfil"] == "administrador") {
    echo '
  <li class="treeview">

    <a href="#">
      <i class="fa fa-th"></i>
      <span>Configuracion del sitio</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>

    <ul class="treeview-menu">

      <li><a href="visual"><i class="fa fa-circle-o"></i>Diseño</a></li>

    </ul>

  </li>';
  }
  ?>
  <?php



  ?>

  <li><a href="banner"><i class="fa fa-edit"></i> <span>marcas | banners</span></a></li>


  <li><a href="categorias"><i class="fa fa-th"></i> Categorías</a></li>
  <li><a href="subcategorias"><i class="fa fa-th"></i> Subcategorías</a></li>

  <li><a href="productos"><i class="fa fa-product-hunt"></i> <span>Productos</span></a></li>






  <?php

  if ($_SESSION["perfil"] == "administrador") {

    echo '<li><a href="perfiles"><i class="fa fa-key"></i> <span>Gestor Perfiles</span></a></li>';
  }

  ?>

</ul>