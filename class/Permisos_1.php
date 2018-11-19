<?php
require_once "config/conexion.php";
/**
 * 
 */
class Permisos extends Conexion
{
	private $id_permiso;
	private $id_tipo_usuario;
	private $campo_a;
    private $campo_b;
    private $campo_c;
    private $campo_d;
    private $campo_e;
    private $campo_f;
    private $campo_g;
    private $campo_h;
    private $campo_i;
    private $campo_j;
    private $campo_k;
    private $campo_l;
    private $campo_m;
    private $campo_n;
    private $campo_o;
    private $campo_p;
    private $campo_q;


	
	public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->id_permiso = "";
        $this->id_tipo_usuario = "";
        $this->campo_a = "";
        $this->campo_b = "";
        $this->campo_c = "";
        $this->campo_d = "";
        $this->campo_e = "";
        $this->campo_f = "";
        $this->campo_g = "";
        $this->campo_h = "";
        $this->campo_i = "";
        $this->campo_j = "";
        $this->campo_k = "";
        $this->campo_l = "";
        $this->campo_m = "";
        $this->campo_n = "";
        $this->campo_o = "";
        $this->campo_p = "";
        $this->campo_q = "";
	}
 	public function getId_permiso() {
        return $this->id_permiso;
    }

    public function setId_permiso($id) {
        $this->id_permiso = $id;
    }
    
    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    public function getCampo_a() {
        return $this->campo_a;
    }

    public function setCampo_a($campo_a) {
        $this->campo_a = $campo_a;
    }

    public function getCampo_b() {
        return $this->campo_b;
    }

    public function setCampo_b($campo_b) {
        $this->campo_b = $campo_b;
    }

    public function getCampo_c() {
        return $this->campo_c;
    }

    public function setCampo_c($campo_c) {
        $this->campo_c = $campo_c;
    }

    public function getCampo_d() {
        return $this->campo_d;
    }

    public function setCampo_d($campo_d) {
        $this->campo_d = $campo_d;
    }

    public function getCampo_e() {
        return $this->campo_a;
    }

    public function setCampo_e($campo_e) {
        $this->campo_e = $campo_e;
    }

    public function getCampo_f() {
        return $this->campo_a;
    }

    public function setCampo_f($campo_f) {
        $this->campo_f = $campo_f;
    }
     public function getCampo_g() {
        return $this->campo_a;
    }

    public function setCampo_g($campo_g) {
        $this->campo_g = $campo_g;
    }

    public function getCampo_h() {
        return $this->campo_h;
    }

    public function setCampo_h($campo_h) {
        $this->campo_h = $campo_h;
    }

    public function getCampo_i() {
        return $this->campo_a;
    }

    public function setCampo_i($campo_i) {
        $this->campo_i = $campo_i;
    }

    public function getCampo_j() {
        return $this->campo_a;
    }

    public function setCampo_j($campo_j) {
        $this->campo_j = $campo_j;
    }

    public function getCampo_k() {
        return $this->campo_k;
    }

    public function setCampo_k($campo_k) {
        $this->campo_k = $campo_k;
    }

    public function getCampo_l() {
        return $this->campo_l;
    }

    public function setCampo_l($campo_l) {
        $this->campo_l = $campo_l;
    }

    public function getCampo_m() {
        return $this->campo_m;
    }

    public function setCampo_m($campo_m) {
        $this->campo_m = $campo_m;
    }

    public function getCampo_n() {
        return $this->campo_n;
    }

    public function setCampo_n($campo_n) {
        $this->campo_n = $campo_n;
    }

    public function getCampo_o() {
        return $this->campo_o;
    }

    public function setCampo_o($campo_o) {
        $this->campo_o = $campo_o;
    }

    public function getCampo_p() {
        return $this->campo_p;
    }

    public function setCampo_p($campo_p) {
        $this->campo_p = $campo_p;
    }
    public function setCampo_q($campo_q) {
        $this->campo_q = $campo_q;
    }
     public function getCampo_q() {
        return $this->campo_q;
    }

    //FUNCIONES-------------------------------------------------

    public function save()
    {
    	$query="INSERT INTO permisos(id_permiso, id_tipo_usuario, campo_a, campo_b, campo_c, campo_d, campo_e, campo_f, campo_g, campo_h, campo_i, campo_j, campo_k, campo_l, campo_m, campo_n, campo_o, campo_p)
    			values(NULL,
    			'".$this->id_tipo_usuario."',
    			'".$this->campo_a."',
                '".$this->campo_b."',
                '".$this->campo_c."',
                '".$this->campo_d."',
                '".$this->campo_e."',
                '".$this->campo_f."',
                '".$this->campo_g."',
                '".$this->campo_h."',
                '".$this->campo_i."',
                '".$this->campo_j."',
                '".$this->campo_k."',
                '".$this->campo_l."',
                '".$this->campo_m."',
                '".$this->campo_n."',
                '".$this->campo_o."',
                '".$this->campo_p."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE permisos SET campo_a='".$this->campo_a."',campo_b='".$this->campo_b."',campo_c='".$this->campo_c."',campo_d='".$this->campo_d."',campo_e='".$this->campo_e."',campo_f='".$this->campo_f."',campo_g='".$this->campo_g."',campo_h='".$this->campo_h."',campo_i='".$this->campo_i."',campo_j='".$this->campo_j."',campo_k='".$this->campo_k."',campo_l='".$this->campo_l."',campo_m='".$this->campo_m."',campo_n='".$this->campo_n."',campo_o='".$this->campo_o."',campo_p='".$this->campo_p."',campo_q='".$this->campo_q."' WHERE id_permiso='".$this->id_permiso."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM permisos WHERE id_permiso='".$this->id_permiso."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
    public function selectALL()
    {
        $query="SELECT * FROM permisos";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
     public function selectOne($codigo)
    {
        $query="SELECT p.*, tu.nombre FROM permisos p INNER JOIN tipo_usuario tu ON p.id_tipo_usuario = tu.id_tipo_usuario WHERE id_permiso='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
      public function selectALL1()
    {
        $query=" SELECT p.*, tu.nombre FROM permisos p INNER JOIN tipo_usuario tu ON p.id_tipo_usuario = tu.id_tipo_usuario";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }
   public function selectOneP($codigo)
    {
        $query="SELECT p.*, tu.nombre FROM permisos p INNER JOIN tipo_usuario tu ON p.id_tipo_usuario = tu.id_tipo_usuario WHERE id_permiso='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCategoria=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCategoria;
    }

     public function selectAllTipUsuario()
    {
        $query="SELECT * FROM tipo_usuario";
        $selectall=$this->db->query($query);
        $ListTC=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTC;
    } 
    public function selectAllTipUsuarioD($codigo)
    {
        $query="SELECT * FROM tipo_usuario WHERE id_tipo_usuario !='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListTC=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTC;
    }
     public function selectAllTipUsuario1($codigo)
    {
        $query="SELECT * FROM tipo_usuario WHERE id_tipo_usuario ='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListTC=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListTC;
    }
}//fin clase
?>