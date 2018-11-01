<?php
require_once "../class/FormularioRetorno.php";

							$codigo=$_POST["employee_id"];
					     $misFormularioRetorno = new FormularioRetorno();
                         $catego = $misFormularioRetorno->selectALLONE($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>'.$row['id_form_retorno'].'</td>
                        </tr>
                        <tr>
                        <td>Sales Order:</td>
                        <td>'.$row['sales_order'].'</td>
                        </tr>
                         <tr>
                        <td>CLiente:</td>
                        <td>'.$row['cliente_nombre'].'</td>
                        </tr>
                         <tr>
                        <td>Garantia:</td>
                        <td>'.$row['warranty_status'].'</td>
                        </tr>
                         <tr>
                        <td> Fecha:</td>
                        <td>'.$row['fecha'].'</td>
                        </tr>
                        <tr>
                        	<td> Comentario: </td>
                           <td>'.$row["comentario"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_form_retorno'].'"/>  
                                                  
                        </tr>
                         <tr>
                        <td>Estado:</td>
                        <td>'.$row['estado'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>