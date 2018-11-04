<?php
require_once "../class/Calidad.php";

							$codigo=$_POST["employee_id"];
					     $misCalidad = new Calidad();
                         $catego = $misCalidad->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         echo '
                        <div class="table-responsive">  
          				 <table class="table table-bordered">
                        <tr>
                         	<td> N°</td>
                           <td>P'.$row['id_reporte_calidad'].'</td>
                        </tr>
                        <tr>
                        <td>Cliente:</td>
                        <td>'.$row['cliente'].'</td>
                        </tr>
                        <tr>
                        	<td> Pais: </td>
                           <td>'.$row["pais"].'</td>
                          <input type="hidden" name="id" id="id" value="'.$row['id_reporte_calidad'].'"/>  
                                                  
                        </tr>
                        <tr>
                        <td>Mes/año:</td>
                        <td>'.$row['mes'].'/'.$row['anio'].'</td>
                        </tr>
                        <tr>
                        <td>Instalado por:</td>
                        <td>'.$row['instalado_por'].'</td>
                        </tr>
                        <tr>
                        <td>Codigo de serie:</td>
                        <td>'.$row['codigo_serie'].'</td>
                        </tr>
                        <tr>
                        <td>tecnologia:</td>
                        <td>'.$row['tecnologia'].'</td>
                        </tr>
                        <tr>
                        <td>Modelo:</td>
                        <td>'.$row['modelo'].'</td>
                        </tr>
                        <tr>
                        <td>Error al instalar?:</td>
                        <td>'.$row['error_instalar'].'</td>
                        </tr>
                          </table>
                          </div>
                         ';
                       }
                     
                     

?>