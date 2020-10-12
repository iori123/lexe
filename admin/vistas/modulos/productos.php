<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor Articulos
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Articulos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArticulo">

          Agregar Articulo

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablaArticulos" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Titulo</th>
              <th>Imagen Principal</th>
              <th>categoria</th>
              <th>subcategoria</th>
              <th>Estado</th>
              <th>Precio</th>
              <th>Acciones</th>

            </tr>

          </thead>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Articulo
======================================-->

<div id="modalAgregarArticulo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">


      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Articulo</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg validarArticulo tituloArticulo" placeholder="Ingresar título Articulo">

            </div>

          </div>

          <!--=====================================
            ENTRADA PARA LA RUTA DEL Articulo
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-link"></i></span>

              <input type="text" class="form-control input-lg rutaArticulo" placeholder="Ruta url del Articulo" readonly>

            </div>

          </div>


          <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarCategoria">

                <option value="">Selecionar categoría</option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                }

                ?>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

          <div class="form-group  entradaSubcategoria" style="display:none">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarSubCategoria">

              </select>

            </div>

          </div>


          <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

          <div class="form-group">

            <div class="panel">SUBIR FOTO PRINCIPAL DEL Articulo</div>

            <input type="file" class="fotoPrincipal">

            <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/Articulos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

          </div>

          <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

          <div class="form-group row">

            <!-- PRECIO -->

            <div class="col-md-4 col-xs-12">

              <div class="panel">PRECIO</div>

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg precio" value="0"min="0" step="any">

              </div>

            </div>



          </div>

        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="button" class="btn btn-primary guardarArticulo">Guardar Articulo</button>

      </div>

      <!-- </form> -->

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR Articulo
======================================-->

<div id="modalEditarArticulo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Articulo</h4>

      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!--=====================================
            ENTRADA PARA EL TÍTULO
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg validarArticulo tituloArticulo">

              <input type="hidden" class="idArticulo">

            </div>

          </div>
          <!--=====================================
            AGREGAR CATEGORÍA
            ======================================-->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarCategoria">

                <option class="optionEditarCategoria"></option>

                <?php

                $item = null;
                $valor = null;

                $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                foreach ($categorias as $key => $value) {

                  echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';
                }

                ?>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR SUBCATEGORÍA
            ======================================-->

          <div class="form-group entradaSubcategoria">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg seleccionarSubCategoria">

                <option class="optionEditarSubCategoria"></option>

              </select>

            </div>

          </div>

          <!--=====================================
            AGREGAR FOTO DE MULTIMEDIA
            ======================================-->

          <div class="form-group">

            <div class="panel">Imagen del Producto</div>

            <input type="file" class="fotoPrincipal">
            <input type="hidden" class="antiguaFotoPrincipal">

            <p class="help-block">Tamaño recomendado 400px * 450px <br> Peso máximo de la foto 2MB</p>

            <img src="vistas/img/Articulos/default/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">

          </div>

          <!--=====================================
            AGREGAR PRECIO, PESO Y ENTREGA
            ======================================-->

          <div class="form-group row">

            <!-- PRECIO -->

            <div class="col-md-4 col-xs-12">

              <div class="panel">PRECIO</div>

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="number" class="form-control input-lg precio" min="0" step="any">

              </div>

            </div>


          </div>

        </div>

      </div>

      <!--=====================================
        PIE DEL MODAL
        ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="button" class="btn btn-primary guardarCambiosArticulo">Guardar cambios</button>

      </div>

    </div>

  </div>

</div>

<?php

$eliminarArticulo = new ControladorArticulos();
$eliminarArticulo->ctrEliminarArticulo();

?>