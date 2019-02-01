   <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../controller/UsuarioControlador.php?accion=contraAll" method="post">
                   <?php 
                   $id_usuario1 = $_POST['employee_id'];
                    ?>
                   
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"><span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                   
                                    <?php 
                                    echo '<input type="hidden" id="id_usuario" name="id_usuario" value="'.$id_usuario1.'">';
                                     ?>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nueva Contraseña <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="nueva_contra" name="nueva_contra"  class="form-control col-md-7 col-xs-12">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirmar Contraseña <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" id="confirmar" name="confirmar"  class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="confirmado" name="confirmado"  class="form-control col-md-7 col-xs-12">

                                  </div>
                              </div>
                              <div class="alert alert-warning" role="alert">
                               <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <center>  <span class="sr-only">Alerta:</span><p id="mensaje">Los campos deben coincidir</p></center>
                                   </div><div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Ingresar</button>
                            </div>
                      </div>

                       </form>

<script >
 $(document).ready(function () {
    $("#confirmar").keyup(function () {

        var contra1 = $("#nueva_contra").val();

        var contra2 = $(this).val();
        if (contra2 == contra1) {
          $( "#mensaje" ).text( "Los campos coinciden" );

        $("#confirmado").val(contra1);
        }else{
           $( "#mensaje" ).text( "Los campos no coinciden" );
        }
    });
});</script>