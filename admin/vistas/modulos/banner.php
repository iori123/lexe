<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor marcas banner
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">edición de marcas</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarBanner">

          Agregar Banner de marca

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaBanners" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Categoría</th>
              <th>Estado</th>

              <th>Portada</th>

              <th>Acciones</th>

            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarBanner" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar banner</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA MARCA
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarBanner tituloBanner" placeholder="Ingresar Banner" name="tituloBanner" required>

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaBanner" placeholder="Ruta url para la categoría" name="rutaBanner" readonly required>

              </div>

            </div>


            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada" name="fotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/cabeceras/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar banner</button>

        </div>

      </form>

      <?php


      $crearBanner = new ControladorBanner();
      $crearBanner->ctrCrearBanner();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarBanner" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar banner</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg validarBanner tituloBanner" placeholder="Ingresar Banner" name="editarTituloBanner" required>

                <input type="hidden" class="editarIdBanner" name="editarIdBanner">

              </div>

            </div>

            <!--=====================================
            ENTRADA PARA LA RUTA DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-link"></i></span>

                <input type="text" class="form-control input-lg rutaBanner" placeholder="Ruta url para la marca" name="rutaBanner" readonly required>

              </div>

            </div>




            <!--=====================================
            ENTRADA PARA SUBIR FOTO DE PORTADA
            ======================================-->

            <div class="form-group">

              <div class="panel">SUBIR FOTO PORTADA</div>

              <input type="file" class="fotoPortada" name="fotoPortada">
              <input type="hidden" class="antiguaFotoPortada" name="antiguaFotoPortada">

              <p class="help-block">Tamaño recomendado 1280px * 720px <br> Peso máximo de la foto 2MB</p>

              <img src="vistas/img/banner/default/default.jpg" class="img-thumbnail previsualizarPortada" width="100%">

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios </button>

        </div>

      </form>

      <?php


      $editarBanner = new ControladorBanner();
      $editarBanner->ctrEditarBanner();

      ?>

    </div>

  </div>

</div>

<?php


$eliminarBanner = new ControladorBanner();
$eliminarBanner->ctrEliminarBanner();

?>


<!--=====================================
BLOQUEO DE LA TECLA ENTER
======================================-->

<script>
  $(document).keydown(function(e) {

    if (e.keyCode == 13) {

      e.preventDefault();

    }

  })
</script>