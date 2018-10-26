<?php

if (isset($_SESSION['id_tipo_usuario'])) {
 $codigo= $_SESSION['id_tipo_usuario']; 
}else{
   echo '
              <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">ERROR:</span>
                Porfavor inicie sesion.

                                    <a href="../index.php" class="btn btn-danger">Iniciar Sesion</a>
           
                </div>';
}

?>
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>General</h3>
                     <?php 
                      require_once "../class/Permisos.php";
                          $misPermisoss = new Permisos();
                         $catego = $misPermisoss->selectOne($codigo);
                          foreach ((array)$catego as $row) {

                     ?>
                    <ul class="nav side-menu">
                        <?php 
                        if ($row['campo_a']!=NULL && $row['campo_b']!= NULL && $row['campo_o']!= NULL ) {
                          ?>
                      <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>
                           <li><a href="../listas/Permisos.php">Permisos</a></li>
                        </ul>
                      </li>
                      <?php 
                         } elseif ($row['campo_a']!=NULL && $row['campo_b']== NULL && $row['campo_o']!= NULL ){  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="../listas/Permisos.php">Permisos</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_a']!=NULL && $row['campo_b']!= NULL && $row['campo_o']== NULL) {  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Usuarios.php">Usuarios</a></li>
                           <li><a href="../listas/TipoUsuario.php">Tipos de Usuarios</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_a']!=NULL && $row['campo_b']== NULL && $row['campo_o']== NULL) {  ?>
                         <li><a><i class="fa fa-home"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Usuarios.php">Usuarios</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_c']!=NULL && $row['campo_d']!= NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/clientes.php">Clientes</a></li>
                          <li><a href="../listas/lista_categorias.php">Categorias</a></li>
                          <li><a href="../listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_c']!=NULL && $row['campo_d']== NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/clientes.php">Clientes</a></li>
                          <li><a href="../listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_c']!=NULL && $row['campo_d']!= NULL && $row['campo_e']== NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/clientes.php">Clientes</a></li>
                          <li><a href="../listas/lista_categorias.php">Categorias</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_c']==NULL && $row['campo_d']!= NULL && $row['campo_e']!= NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                      
                          <li><a href="../listas/lista_categorias.php">Categorias</a></li>
                          <li><a href="../listas/contactos.php?id=''&nombre=Seleccione un Cliente">Contactos</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_c']!=NULL && $row['campo_d']== NULL && $row['campo_e']== NULL) {  ?>
                       <li><a><i class="fa fa-edit"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/clientes.php">Clientes</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_f']!=NULL && $row['campo_g']!= NULL && $row['campo_h']!= NULL && $row['campo_i']!= NULL) {  ?>
                       <li><a><i class="fa fa-desktop"></i> Productos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                         <li><a href="../listas/lista_grupo_producto.php">Grupo de Productos</a></li>
                          <li><a href="../listas/Productos.php">Productos</a></li>
                          <li><a href="../listas/lista_TipoMaquina.php">Tipo Maquina</a></li>
                          <li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>
                          <li><a href="../listas/Repuestos.php">Repuestos</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_f']==NULL && $row['campo_g']!= NULL && $row['campo_h']!= NULL && $row['campo_i']!= NULL) {  ?>
                       <li><a><i class="fa fa-desktop"></i> Productos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                         
                          <li><a href="../listas/Productos.php">Productos</a></li>
                          <li><a href="../listas/lista_TipoMaquina.php">Tipo Maquina</a></li>
                          <li><a href="../listas/Cliente_Producto.php?cliente=0&nombre=nada&producto=0">Productos de Clientes</a></li>
                          <li><a href="../listas/Repuestos.php">Repuestos</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_j']!=NULL) {  ?>
                         <li><a><i class="fa fa-table"></i> Tickets <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Tickets.php?cliente=0&nombre=N/A&codigo_serie=0000&producto=N/A&id_producto=0">Ticket</a></li>
                      </ul>
                      </li>
                      <?php 
                        }if ($row['campo_k']!=NULL && $row['campo_l']!= NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Gestion.php">Gestion</a></li>
                          <li><a href="../listas/TipoGestion.php">Tipo de Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        } elseif ($row['campo_k']!=NULL && $row['campo_l']== NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/Gestion.php">Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        }elseif ($row['campo_k']==NULL && $row['campo_l']!= NULL) {  ?>
                         <li><a><i class="fa fa-bar-chart-o"></i> Gestiones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="../listas/TipoGestion.php">Tipo de Gestion</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_m']!=NULL) {  ?>
                         <li><a><i class="fa fa-clone"></i>Fichas Tecnicas <span class="fa fa-chevron-down"></span></a>
                      
                        <ul class="nav child_menu">
                          <li><a href="../views/saveFT.php?cliente=0&id_producto=0&producto=N/A&codigo_serie=0000&nombre=N/A">Ficha Tecnica</a></li>
                          <li><a href="../listas/FichaTecnca.php">Fichas Tecnica</a></li>
                        </ul>
                      </li>
                      <?php 
                        }if ($row['campo_n']!=NULL) {  ?>
                         <li><a><i class="glyphicon glyphicon-tags"></i>         Tareas <span class="fa fa-chevron-down"></span></a>
                      
                        <ul class="nav child_menu">
                         <li><a href="../indexAdmin.php?id=0&nombre=Seleccione%20un%20Tecnico">Tareas</a></li>
                        </ul>
                      </li>
                      <?php 
                        }
                       ?>                     
                       </ul>
                    <?php 
                    } ?>
                  </div>
                  
    
                </div>