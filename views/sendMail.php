<form id="insert_form" data-parsley-validate class="form-horizontal form-label-left" action="../controller/pdf.php?accion=enviar" method="post">
    <?php 
      require_once "../class/FichaTenica.php";
                                  $codigo=$_POST["employee_id"];

                                  $bandera=$_POST["bandera"];
                         $miFichaT = new FichaTecnica();
                         $ft = $miFichaT->selectOne($codigo);
                         foreach ($ft as $key ) {
                              $id_contacto = $key['id_contacto'];
                         }
                         require_once "../class/Contactos.php";

            
               $miContacto = new Contactos();
                         $contac = $miContacto->selectOne($id_contacto);
                        
                           # code...
                         
                         foreach ((array)$contac as $row) {

                                  ?>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Contacto <span class="required">*</span>
                            </label>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <?php 
                              echo '<input type="text" id="nombre" name="nombre" required="required" readonly="true" value="'.$row['nombre'].'" class="form-control col-md-7 col-xs-12">
                              ';
                               ?>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo de Contacto <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php 
                              echo '<input type="text" id="destino" name="destino" required="required"  value="'.$row['correo'].'" class="form-control col-md-7 col-xs-12">
                                <input type="hidden" name="id_ft" id="id_ft" value="'.$codigo.'"/>
                                 <input type="hidden" name="bandera" id="bandera" value="'.$bandera.'"/>    
                              ';
                               ?></div>
                          </div>
                          <?php 
                           
                          } ?>

                                                    
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Enviar Copia a jefe: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select  id="id_usuario" onchange="mostrarInfo(this.value)" name="id_usuario" class="form-control ">
                                 <?php 
                         require_once "../class/Usuario.php";
                         $misTU = new Usuario();
                         $tc = $misTU->selectAllJ();
                        
                           # code...
                         
                         foreach ((array)$tc as $row) {
                         echo '
                          <option value="'.$row["id_usuario"].'">'.$row["nombre"].'</option>
                         ';
                       }
                     
                     
                         ?>
                                  
                              </select>
                               </div>
                              </div>
                              <div class="form-group">
                              <div id="datos"></div>
                          </div>
                          
                          
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                             
                              <button type="submit" class="btn btn-success">Enviar</button>
                            </div>
                          </div>
</form>
<script >
     function mostrarInfo(cod){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("datos").innerHTML=xmlhttp.responseText;
    }else{ 
  document.getElementById("datos").innerHTML='Cargando...';
    }
  }
xmlhttp.open("POST","../views/Mailss.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("cod_banda="+cod);

};

</script>