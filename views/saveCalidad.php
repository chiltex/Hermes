<form method="post" id="insert_form" action="../controller/CalidadControlador.php?accion=guardar">  
      <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
                                  <label for="first-name">Cliente <span class="required">*</span>
                                  </label>
              <div>
                                        <input type='text' name="cliente" id="cliente" required class="form-control" />
                                        
                                    
              </div>
            </div>
            <div class="form-group">
                                  <label  for="first-name">Pais <span class="required">*</span>
                                  </label>
              <div>
                   <input type='text' name="pais" id="pais" required class="form-control" />
                                        
              </div>
              </div>
            <div class="form-group">
                                  <label  for="first-name">Mes <span class="required">*</span>
                                  </label>
              <div >
                   <select id="mes" name="mes" class="form-control ">
                                              <option value="Enero">Enero</option>
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
                                              <option value="Diciembre" >Diciembre</option>                               
                   </select>
          </div>                            
              </div>
              <div class="form-group">
                                  <label for="first-name">Año <span class="required">*</span>
                                  </label>
              
            
              <div class="hero-unit">
                <input  type="number" name="anio"  id="anio" min="1990" value="1990" step="1" required class="form-control">
            </div> 
              </div>
            <div class="form-group">
                                  <label for="first-name">Instalado por: <span class="required">*</span>
                                  </label>
              <div >
                 <input type='text' name="instalado_por" id="instalado_por" required class="form-control" />
                                        
                                    
              </div>
            </div>
            <div class="form-group">
                                  <label for="first-name">Codigo serial: <span class="required">*</span>
                                  </label>
              <div >
                 <input type='text' name="codigo_serie" id="codigo_serie" required class="form-control" />
                                        
                                    
              </div>
            </div>
            <div class="form-group">
                                  <label for="first-name">Tecnologia: <span class="required">*</span>
                                  </label>
              <div >
                 
                       <input type="radio" name="tecnologia" id="tecnologia" value="CIJ" /><strong> CIJ</strong><br>
                      <input type="radio" name="tecnologia" id="tecnologia" value="TTO" /><strong> TTO</strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LASER" /><strong> LASER </strong><br>  
                       <input type="radio" name="tecnologia" id="tecnologia" value="LCM" /><strong> LCM </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="LPA" /><strong> LPA </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="TIJ" /><strong> TIJ </strong><br> 
                       <input type="radio" name="tecnologia" id="tecnologia" value="Grafica" /><strong> Grafica </strong><br>
                       <input type="radio" name="tecnologia" id="tecnologia" value="otro" /><strong> Otro </strong><br>                         
                        
                            <input type='text' name="otro" id="otro" class="form-control" />            
              </div>
            </div>
            <div class="form-group">
                                  <label for="first-name">Modelo: <span class="required">*</span>
                                  </label>
              <div >
                 <input type='text' name="modelo" id="modelo" required class="form-control" />
                                        
                                    
              </div>
            </div>
            <div class="form-group">
                                  <label for="first-name">Error al instalar? <span class="required">*</span>
                                  </label>
              <div>
                    <select id="error_instalar" name="error_instalar" class="form-control ">
                                              <option value="Si">Si</option>
                                              <option value="No">No</option>                             
                   </select>                    
                                    
              </div>
            </div>
            </div>
            </div>


       <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="hidden" name="guardar" id="guardar" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form> 
                      <!-- PLUGINS DATE-->
     <script src="https://code.jquery.com/jquery-2.0.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
       