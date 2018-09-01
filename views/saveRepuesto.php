<form id="insert_form" data-parsley-validate class="form-horizontal form-label-left" action="../controller/RepuestosControlador.php?accion=guardar" method="post">
    
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Repuesto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripcion <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                               <input type="text" id="descripcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>                          
                                                    
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo Serie <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="codigo_serie" name="codigo_serie" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                              </div>
                          
                          
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                          </div>
</form>