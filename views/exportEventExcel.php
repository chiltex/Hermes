<form method="post" id="insert_form" action="controller/exportar.php">  
                          <label>Seleccione el mes:</label>  
                          <select id="mes" name="mes" class="form-control col-md-7 col-xs-12">
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                          </select>
                          
                          <input type="hidden" name="accion" id="events_mensuales" />  
                          <input type="submit" name="insert" id="insert" value="Exportar" class="btn btn-success" />  
                     </form>  