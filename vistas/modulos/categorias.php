<div id="main_content">

    <div class="left_content">
        <div class="title_box style1">Marcas</div>
        <p>&nbsp;</p>
        <ul class="left_menu">
            <li class="odd">
                <table width="200" border="0">
                <?php  
                $marcas = ControladorProductos::ctrMostrarBanner();
                foreach ($marcas as $key => $value) {
                    if($marcas != null){
                        
                            echo '<tr>
                                <td><img src="'.$server.$value['imagen'].'" width="150" height="76" /></td>
                            </tr>' ;
                        
                    }
                
                }
                    
                    ?>
                </table>
            </li>
        </ul>
        <div class="border_box"></div>
    </div>
    <div class="center_content">
        
        <?php
        $subcategorias = ControladorProductos::ctrMostrarSubCategorias('id_categoria', $categoria['id']);
        echo '<div class="oferta">
            <img src="' . $server . $categoria['imagen'] . '" width="518" height="155" />
        </div>';

        foreach ($subcategorias as $key => $value) {
            if ($value["estado"] != 0) {
                echo '<div class="center_title_bar">' . $value['subcategoria'] . '</div>';
                
                $ordenar = "id";
                $modo = "DESC";
                $base = 0;
                $tope = 100;

                $productos = ControladorProductos::ctrMostrarProductos($ordenar, 'id_subcategoria', $value['id'], $base, $tope, $modo);
                foreach ($productos as $key => $value) {
                    if ($value['estado'] != 0) {

                        echo '
                        <div class="prod_box">
                            <div class="center_prod_box">
                                <div class="product_title"><a href="#">' . $value['titulo'] . '</a></div>
                                <div class="product_img"><a href="#"></a><img src="' . $server . $value['portada'] . '" width="157" height="127" /></div>
                                <div class="prod_price"><span class="reduce">S/' . $value['precio'] . '</span> <span class="price">. S/'.$value['precio'] .' </span></div>
                            </div>
                        </div>
                        ';
                    }
                }
               
            }
        }

        ?>
    </div>




</div>