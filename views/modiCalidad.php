   <form role="form" action="../controller/CalidadControlador.php?accion=modificar" method="post">
              <div class="box-body">
<?php 
require_once "../class/Calidad.php";


         
							$codigo=$_POST["employee_id"];
					     $misCalidad = new Calidad();
                         $catego = $misCalidad->selectOne($codigo);
                        
                           # code...
                         
                         foreach ((array)$catego as $row) {
                         		echo '
                 <div class="form-group">
                  <label for="codigo">N°</label>
                  <input type="text" class="form-control" readonly value="'.$codigo.'" id="id" name="id">
                </div>
                <div class="form-group">
                  <label for="codigo">Cliente</label>
                  <input type="text" class="form-control" value="'.$row["cliente"].'" id="cliente" name="cliente">
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Descripcion</label>
                  <input type="text" class="form-control" required="" value="'.$row["pais"].'" id="pais" name="pais" placeholder="Nombre">
                </div>
                  
                <div class="form-group">
                  <label for="nombre">Mes</label>
                   <select id="mes" name="mes" class="form-control ">
                ';
                  if ($row['mes']=="Enero") {
                    echo '
                                              <option value="Enero" selected>Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Febrero") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero" selected>Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Marzo") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo" selected>Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option>  
                                              <option value="Octubre">Octubre</option> 
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Abril") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" selected>Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option>  
                                              <option value="Octubre">Octubre</option> 
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Mayo") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo" selected>Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Junio") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" >Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio"selected>Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Julio") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" >Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio"selected>Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option>  
                                              <option value="Octubre">Octubre</option> 
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }
                  elseif ($row['mes']=="Agosto") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto" selected>Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Septiembre") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril">Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre" selected>Septiembre</option>  
                                              <option value="Octubre">Octubre</option> 
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Octubre") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" selected>Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre" selected>Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Noviembre") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" selected>Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre" selected>Noviembre</option> 
                                              <option value="Diciembre">Diciembre</option>      

                                  ';
                  }elseif ($row['mes']=="Diciembre") {
                    echo '
                                              <option value="Enero">Enero</option>
                                              <option value="Febrero">Febrero</option>
                                              <option value="Marzo">Marzo</option>
                                              <option value="Abril" selected>Abril</option> 
                                              <option value="Mayo">Mayo</option>
                                              <option value="Junio">Junio</option>
                                              <option value="Julio">Julio</option> 
                                              <option value="Agosto">Agosto</option>
                                              <option value="Septiembre">Septiembre</option> 
                                              <option value="Octubre">Octubre</option>  
                                              <option value="Noviembre">Noviembre</option> 
                                              <option value="Diciembre" selected>Diciembre</option>      

                                  ';
                  }

                  echo '
                  </select>
                    </div>
                  <div class="form-group">
                  <label for="nombre">Año</label>
                 <input  type="number" name="anio"  id="anio" min="1990" value="'.$row['anio'].'" step="1" required class="form-control">
                </div>
                <div class="form-group">
                  <label for="codigo">Instalado por:</label>
                  <input type="text" class="form-control" value="'.$row["instalado_por"].'" id="instalado_por" name="instalado_por">
                </div>
                 <div class="form-group">
                  <label for="codigo">Codigo Serial:</label>
                  <input type="text" class="form-control" value="'.$row["codigo_serie"].'" id="codigo_serie" name="codigo_serie">
                </div>
                 <div class="form-group">
                  <label for="codigo">Instalado por:</label>               
                  ';
                  if ($row['tecnologia']=="CIJ") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ" checked /><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="TTO") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" checked /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="LASER") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" checked/><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="LCM") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER"/><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" checked /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="LPA") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO"/><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" checked /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="TIJ") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" checked /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']=="Grafica") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO"/><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" checked /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" /> ';
                  }elseif ($row['tecnologia']!="TTO" && $row['tecnologia']!="CIJ"  && $row['tecnologia']!="LASER" && $row['tecnologia']!="LCM" && $row['tecnologia']!="LPA" && $row['tecnologia']!="TIJ" && $row['tecnologia']!="Grafica") {
                   echo ' <input type="radio" name="tecnologia" id="tecnologia" value="CIJ"/><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO"/><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro"  checked /><strong> Otro </strong><br>                         
                        
                            <input type="text" name="otro" id="otro" class="form-control" value="'.$row['tecnologia'].'"/> ';
                  }
                  echo '
                 </div>
                 <div class="form-group">
                  <label for="codigo">Modelo:</label>
                  <input type="text" class="form-control" value="'.$row["modelo"].'" id="modelo" name="modelo">
                </div>
                <div class="form-group">
                  <label for="codigo">Error al instalar?:</label>
               <select id="error_instalar" name="error_instalar" class="form-control ">
                 ';
                 if ($row['error_instalar']=="Si") {
                 echo '    <option value="Si" selected>Si</option>
                            <option value="No">No</option>';
                 }else{
                 echo '    <option value="Si">Si</option>
                            <option value="No" selected>No</option>';
                  
                 }

                 echo '
                 </select>
                  </div>
                 ';

                         }


 ?>
 </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Guardar" >
                <input type="button" class="btn btn-danger" onClick="location.href = '../listas/lista_Calidad.php'" name="cancel" value="Cancelar" >
              </div>
            </form>