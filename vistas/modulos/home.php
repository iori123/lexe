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
            $item = null;
            $valor = null;
            $categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
            foreach ($categorias as $key => $value) {
                if ($value["estado"] != 0) {
                    $id_categoria = $value['id'];
                    $subcategorias = ControladorProductos::ctrMostrarSubCategorias('id_categoria',$id_categoria);

                    echo
                        ' <div class="center_title_bar">
                            <div align="center">'.$value['categoria'].'</div>
                        </div>
                        <table style="margin:0 auto;"width="200" border="0">
                            <tr style="display: flex ;flex-wrap:wrap; width:510px" >';
                         foreach($subcategorias as $key => $value){
                            if ($value["estado"] != 0) {
                            echo '<td>
                                <div align="center">
                                    <img src="'.$server.$value['imagen'].'" width="250" height="250" />
                                </div>
                            </td>';
                         }
                        }
                    echo '</tr>
                        </table>
                        <p>&nbsp;</p>
                        ';
                }
            }
        ?>    

     

  </div>