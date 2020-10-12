<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Rellene los Datos de su empresa
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Información Empresarial</li>

        </ol>

    </section>

    <section class="content">

        <div class="row">

            <div class="col-md-9 col-xs-12">

                <?php

                $comercio = ControladorComercio::ctrSeleccionarComercio();

                ?>

                <div class="box">

                    <div class="box-header">

                        <h3 class="box-title">INFORMACIÓN EMPRESARIAL</h3>



                    </div>

                    <div class="box-body formularioInformacion">


                        <div class="form-group">

                            <label for="usr">Teléfono</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input id="telefono" type="tel" placeholder="Ingrese su telefono de contacto" class="form-control cambioInformacion" value="<?php echo $comercio["telefono"]; ?>">

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="usr">Dirección:</label>

                            <div class="input-group">

                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker"></i></span>
                                <input id="direccion" type="text" class="form-control cambioInformacion" placeholder="Direccion de la Empresa" value="<?php echo $comercio["direccion"]; ?>">

                            </div>

                        </div>


                        <div class="form-group">

                            <label for="usr">Distrito</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map"></i></span>

                                <select class="form-control cambioInformacion" id="distrito" value="">
                                    <option value="">
                                        <?php
                                        echo ($comercio["distrito"] == "") ? 'Seleccione Distrito' : $comercio["distrito"] ?>

                                    </option>
                                    <option value="ANCON">ANCON</option>
                                    <option value="ATE">ATE</option>
                                    <option value="BARRANCO">BARRANCO</option>
                                    <option value="BREÑA">BREÑA</option>
                                    <option value="CARABAYLLO">CARABAYLLO</option>
                                    <option value="CHACLACAYO">CHACLACAYO</option>
                                    <option value="CHORRILLOS">CHORRILLOS</option>
                                    <option value="CIENEGUILLA">CIENEGUILLA</option>
                                    <option value="COMAS">COMAS</option>
                                    <option value="EL AGUSTINO">EL AGUSTINO</option>
                                    <option value="INDEPENDENCIA">INDEPENDENCIA</option>
                                    <option value="JESUS AGUSTINO">JESUS MARIA</option>
                                    <option value="LA MOLINA">LA MOLINA</option>
                                    <option value="LA VICTORIA">LA VICTORIA</option>
                                    <option value="LIMA">LIMA</option>
                                    <option value="LINCE">LINCE</option>
                                    <option value="LOS AGUSTINO">LOS OLIVOS</option>
                                    <option value="LURIGANCHO">LURIGANCHO</option>
                                    <option value="LURIN">LURIN</option>
                                    <option value="MAGDALENA DEL MAR">MAGDALENA DEL MAR</option>
                                    <option value="MIRAFLORES">MIRAFLORES</option>
                                    <option value="PACHACAMAC">PACHACAMAC</option>
                                    <option value="PUCUSANA">PUCUSANA</option>
                                    <option value="PUEBLO LIBRE">PUEBLO LIBRE</option>
                                    <option value="PUENTE PIEDRA">PUENTE PIEDRA</option>
                                    <option value="PUNTA HERMOSA">PUNTA HERMOSA</option>
                                    <option value="RIMAC">RIMAC</option>
                                    <option value="SAN BORJA">SAN BORJA</option>
                                    <option value="SAN ISIDRO">SAN ISIDRO</option>
                                    <option value="SAN JUAN DE LURIGANCHO">SAN JUAN DE LURIGANCHO</option>
                                    <option value="SAN JUAN DE MIRAFLORES">SAN JUAN DE MIRAFLORES</option>
                                    <option value="SAN LUIS ">SAN LUIS</option>
                                    <option value="SAN MARTIN DE PORRES">SAN MARTIN DE PORRES</option>
                                    <option value="SAN MIGUEL">SAN MIGUEL</option>
                                    <option value="SANTA ANITA">SANTA ANITA</option>
                                    <option value="SANTIAGO DE SURCO">SANTIAGO DE SURCO</option>
                                    <option value="SURQUILLO">SURQUILLO</option>
                                    <option value="VILLA EL SALVADOR">VILLA EL SALVADOR</option>
                                    <option value="VILLA MARIA DEL TRIUNFO">VILLA MARIA DEL TRIUNFO</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="usr">Correo Empresarial</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input id="correo" type=" text" class="form-control cambioInformacion" value="<?php echo $comercio["correo"]; ?>">

                            </div>

                        </div>





                    </div>

                    <div class="box-footer">

                        <button type="button" id="guardarInformacion" class="btn btn-primary pull-right">Guardar</button>

                    </div>

                </div>
            </div>

        </div>

    </section>

</div>