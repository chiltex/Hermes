<?php 
  require_once "../class/FichaTenica.php";
  						 $codigo=$_POST["employee_id"];
                         $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);

                    foreach ($ft as $key) {
                    	echo'
                    	 <div class="table-responsive">  
          				 <table class="table table-bordered">
          				 '; 
                   echo '
                          <tr>
                           <td>Ficha Tecnica N°: </td>
                           <td>'.$key['id_ficha_tecnica'].'</td>
                          </tr>
                           <tr>
                           <td>Cliente: </td>
                           <td>'.$key["clie"].'</td>
                           </tr>
                           <tr>
                           <td>Contacto: </td>
                           <td>'.$key["contac"].'</td>
                           </tr>
                           <tr>
                           <td>Producto: </td>
                           <td>'.$key["prod"].'</td>
                           </tr>

                           <tr>
                           <td>Descripcion Producto: </td>
                           <td>'.$key["descripcion"].'</td>
                           </tr>
                           <tr>
                           <td>Falla: </td>
                           <td>'.$key["falla"].'</td>
                           </tr>
                           <tr>
                           <td>Solucion: </td>
                           <td>'.$key["trabajo"].'</td>
                           </tr>
                            <tr>
                           <td>Firma Cliente <br><img src="../firmas/mi_firma_'.$key["firma_cliente"].'.png" width="75%" height="75%" border="1"> </td>
                           <td>Firma Tecnico <br><img src="../firmas/mi_firma_'.$key["firma_tecnico"].'.png" width="75%" height="75%" border="1"></td>
                           </tr>
						 </table>
          				 </div>
          				 ';
                	
                    
                }
?>