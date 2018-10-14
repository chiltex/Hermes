<?php
require_once "../class/Permisos.php";

$accion=$_GET['accion'];

if ($accion=="modificar") {
    $id_Permisos =$_POST['id'];
    $id_tipo_usuario=$_POST['id_tipo_usuario']; 
  if (isset($_POST['campo_a'])) {
  $campo_a=$_POST['campo_a'];
    }else{
        $campo_a=NULL;
   }if (isset($_POST['campo_b'])) {
  $campo_b=$_POST['campo_b'];
    }else{
        $campo_b=NULL;
   }
   if (isset($_POST['campo_c'])) {
  $campo_c=$_POST['campo_c'];
    }else{
        $campo_c=NULL;
   }
   if (isset($_POST['campo_d'])) {
  $campo_d=$_POST['campo_d'];
    }else{
        $campo_d=NULL;
   }
   if (isset($_POST['campo_e'])) {
  $campo_e=$_POST['campo_e'];
    }else{
        $campo_e=NULL;
   }
   if (isset($_POST['campo_f'])) {
  $campo_f=$_POST['campo_f'];
    }else{
        $campo_f=NULL;
   }
   if (isset($_POST['campo_g'])) {
  $campo_g=$_POST['campo_g'];
    }else{
        $campo_g=NULL;
   }
   if (isset($_POST['campo_h'])) {
  $campo_h=$_POST['campo_h'];
    }else{
        $campo_h=NULL;
   }
   if (isset($_POST['campo_i'])) {
  $campo_i=$_POST['campo_i'];
    }else{
        $campo_i=NULL;
   }
   if (isset($_POST['campo_j'])) {
  $campo_j=$_POST['campo_j'];
    }else{
        $campo_j=NULL;
   }
   if (isset($_POST['campo_k'])) {
  $campo_k=$_POST['campo_k'];
    }else{
        $campo_k=NULL;
   }
   if (isset($_POST['campo_l'])) {
  $campo_l=$_POST['campo_l'];
    }else{
        $campo_l=NULL;
   }
   if (isset($_POST['campo_m'])) {
  $campo_m=$_POST['campo_m'];
    }else{
        $campo_m=NULL;
   }
   if (isset($_POST['campo_n'])) {
  $campo_n=$_POST['campo_n'];
    }else{
        $campo_n=NULL;
   }
   if (isset($_POST['campo_o'])) {
  $campo_o=$_POST['campo_o'];
    }else{
        $campo_o=NULL;
   }
   if (isset($_POST['campo_p'])) {
  $campo_p=$_POST['campo_p'];
    }else{
        $campo_p=NULL;
   }
    $Permisos = new Permisos();
    $Permisos->setId_tipo_usuario($id_tipo_usuario);
    $Permisos->setCampo_a($campo_a);
    $Permisos->setCampo_b($campo_b);
    $Permisos->setCampo_c($campo_c);
    $Permisos->setCampo_d($campo_d);
    $Permisos->setCampo_e($campo_e);
    $Permisos->setCampo_f($campo_f);
    $Permisos->setCampo_g($campo_g);
    $Permisos->setCampo_h($campo_h);
    $Permisos->setCampo_i($campo_i);
    $Permisos->setCampo_j($campo_j);
    $Permisos->setCampo_k($campo_k);
    $Permisos->setCampo_l($campo_l);
    $Permisos->setCampo_m($campo_m);
    $Permisos->setCampo_n($campo_n);
    $Permisos->setCampo_o($campo_o);
    $Permisos->setCampo_p($campo_p);
    $Permisos->setId_permiso($id_Permisos);
    $update=$Permisos->update();
    if ($update==true) {
        header('Location: ../listas/Permisos.php?success=correcto');
        # code...
    }else{
        header('Location: ../listas/Permisos.php?error=incorrecto');
    }

}
elseif ($accion=="eliminar") {
    $id_Permisos =$_GET['id'];
    $Permisos = new Permisos();
    $Permisos->setId_Permisos($id_Permisos);
    $delete=$Permisos->delete();
    if ($delete==true) {
        header('Location: ../listas/Permisos.php?success=correcto');
        # code...
    }else{
        header('Location: ../listas/Permisos.php?error=incorrecto');
    }
}
elseif ($accion=="guardar") 
{
    $id_tipo_usuario=$_POST['id_tipo_usuario'];
    if (isset($_POST['campo_a'])) {
  $campo_a=$_POST['campo_a'];
    }else{
        $campo_a=NULL;
   }if (isset($_POST['campo_b'])) {
  $campo_b=$_POST['campo_b'];
    }else{
        $campo_b=NULL;
   }
   if (isset($_POST['campo_c'])) {
  $campo_c=$_POST['campo_c'];
    }else{
        $campo_c=NULL;
   }
   if (isset($_POST['campo_d'])) {
  $campo_d=$_POST['campo_d'];
    }else{
        $campo_d=NULL;
   }
   if (isset($_POST['campo_e'])) {
  $campo_e=$_POST['campo_e'];
    }else{
        $campo_e=NULL;
   }
   if (isset($_POST['campo_f'])) {
  $campo_f=$_POST['campo_f'];
    }else{
        $campo_f=NULL;
   }
   if (isset($_POST['campo_g'])) {
  $campo_g=$_POST['campo_g'];
    }else{
        $campo_g=NULL;
   }
   if (isset($_POST['campo_h'])) {
  $campo_h=$_POST['campo_h'];
    }else{
        $campo_h=NULL;
   }
   if (isset($_POST['campo_i'])) {
  $campo_i=$_POST['campo_i'];
    }else{
        $campo_i=NULL;
   }
   if (isset($_POST['campo_j'])) {
  $campo_j=$_POST['campo_j'];
    }else{
        $campo_j=NULL;
   }
   if (isset($_POST['campo_k'])) {
  $campo_k=$_POST['campo_k'];
    }else{
        $campo_k=NULL;
   }
   if (isset($_POST['campo_l'])) {
  $campo_l=$_POST['campo_l'];
    }else{
        $campo_l=NULL;
   }
   if (isset($_POST['campo_m'])) {
  $campo_m=$_POST['campo_m'];
    }else{
        $campo_m=NULL;
   }
   if (isset($_POST['campo_n'])) {
  $campo_n=$_POST['campo_n'];
    }else{
        $campo_n=NULL;
   }
   if (isset($_POST['campo_o'])) {
  $campo_o=$_POST['campo_o'];
    }else{
        $campo_o=NULL;
   }
   if (isset($_POST['campo_p'])) {
  $campo_p=$_POST['campo_p'];
    }else{
        $campo_p=NULL;
   }
    # code...
    $Permisos = new Permisos();
    $Permisos->setId_tipo_usuario($id_tipo_usuario);
    $Permisos->setCampo_a($campo_a);
    $Permisos->setCampo_b($campo_b);
    $Permisos->setCampo_c($campo_c);
    $Permisos->setCampo_d($campo_d);
    $Permisos->setCampo_e($campo_e);
    $Permisos->setCampo_f($campo_f);
    $Permisos->setCampo_g($campo_g);
    $Permisos->setCampo_h($campo_h);
    $Permisos->setCampo_i($campo_i);
    $Permisos->setCampo_j($campo_j);
    $Permisos->setCampo_k($campo_k);
    $Permisos->setCampo_l($campo_l);
    $Permisos->setCampo_m($campo_m);
    $Permisos->setCampo_n($campo_n);
    $Permisos->setCampo_o($campo_o);
    $Permisos->setCampo_p($campo_p);
    $save=$Permisos->save();
    if ($save==true) {
        header('Location: ../listas/Permisos.php?success=correcto');
        # code...
    }
    else{
        header('Location: ../listas/Permisos.php?error=incorrecto');
    }
}

?>