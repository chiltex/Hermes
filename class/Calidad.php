<?php 
require_once "../config/conexion.php";
/**
 * 
 */
class Calidad extends Conexion
{
 private $id_reporte_calidad;
 private $cliente;
 private $pais;
 private $anio;
 private $mes;
 private $instalado_por;
 private $codigo_serie;
 private $tecnologia;
 private $modelo;
 private $error_instalar;

 public function __construct()
	{
		  parent::__construct(); //Llamada al constructor de la clase padre

        $this->tecnologia = "";
        $this->cliente = "";
        $this->pais = "";
        $this->anio="";
        $this->mes="";
        $this->instalado_por="";
        $this->codigo_serie="";
        $this->tecnologia="";
        $this->modelo="";
        $this->error_instalar="";
    }

 public function getTecnologia() {
        return $this->tecnologia;
    }

    public function setTecnologia($tecnologia) {
        $this->tecnologia = $tecnologia;
    }
    
    public function getCliente() {
        return $this->cliente;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getPais() {
        return $this->pais;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }

    public function getAnio() {
        return $this->anio;
    }

    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }
    public function getInstalado_por() {
        return $this->instalado_por;
    }

    public function setInstalado_por($instalado_por) {
        $this->instalado_por = $instalado_por;
    }
    public function getCodigo_serie() {
        return $this->codigo_serie;
    }

    public function setCodigo_serie($codigo_serie) {
        $this->codigo_serie = $codigo_serie;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    public function getError_instalar() {
        return $this->error_instalar;
    }

    public function setError_instalar($error_instalar) {
        $this->error_instalar = $error_instalar;
    }
        public function getId_reporte_calidad() {
        return $this->id_reporte_calidad;
    }

    public function setId_reporte_calidad($id_reporte_calidad) {
        $this->id_reporte_calidad = $id_reporte_calidad;
    }
//------------------------------------------------------------------------
     public function save()
    {
    	$query="INSERT INTO calidad(id_reporte_calidad, cliente, pais,anio,mes, instalado_por, codigo_serie, tecnologia, modelo, error_instalar)
    			values(NULL,
    			'".$this->cliente."',
    			'".$this->pais."',
                '".$this->anio."',
                '".$this->mes."',
    			'".$this->instalado_por."',
    			'".$this->codigo_serie."',
    			'".$this->tecnologia."',
    			'".$this->modelo."',
    			'".$this->error_instalar."');";
    	$save=$this->db->query($query);
    	if ($save==true) {
            return true;
        }else {
            
            return false;
        }   
    }
    public function update()
    {
        $query="UPDATE calidad SET cliente='".$this->cliente."',pais='".$this->pais."',anio='".$this->anio."',mes='".$this->mes."',instalado_por='".$this->instalado_por."',codigo_serie='".$this->codigo_serie."',tecnologia='".$this->tecnologia."',modelo='".$this->modelo."',error_instalar='".$this->error_instalar."' WHERE id_reporte_calidad='".$this->id_reporte_calidad."'";
        $update=$this->db->query($query);
        if ($update==true) {
            return true;
        }else {
            return false;
        }  
    }
    public function delete()
    {
       $query="DELETE FROM calidad WHERE id_reporte_calidad='".$this->id_reporte_calidad."'"; 
       $delete=$this->db->query($query);
       if ($delete == true) {
        return true;
       }else{
        return false;
       }

    }
       public function selectALL()
    {
        $query="SELECT * FROM calidad";
        $selectall=$this->db->query($query);
        $ListClientes=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListClientes;
    }
     public function selectOne($codigo)
    {
        $query="SELECT * FROM calidad WHERE id_reporte_calidad='".$codigo."'";
        $selectall=$this->db->query($query);
        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
        return $ListCliente;
    }

}

 ?>