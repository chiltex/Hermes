<?php
require_once "../config/conexion.php";

class Ticket extends Conexion
{
		 private $id_ticket;
		 private $descripcion;
		 private $estado;
		 private $id_cliente;
		 private $id_contacto;
		 private $id_producto;
		 private $id_usuario;
		 private $id_tipo_gestion;
		 private $id_ficha_tecnica;
		 private $solucion;
		 private $urgente;

		  public function __construct()
			{
				 parent::__construct(); //Llamada al constructor de la clase padre

		        $this->id_ticket = "";
		        $this->descripcion="";
		        $this->estado=""; 
		        $this->id_cliente ="";
		        $this->id_contacto="";
		        $this->id_producto ="";
		        $this->id_usuario="";
		        $this->id_tipo_gestion ="";
		        $this->id_ficha_tecnica ="";
		        $this->solucion="";  
		        $this->urgente=""; 
		    }
		public function getId_ticket() {
		        return $this->id_ticket;
		    }
		    public function setId_ticket($id) {
		        $this->id_ticket = $id;
		    }
		    public function getDescripcion() {
		        return $this->id_descripcion;
		    }

		    public function setDescripcion($descripcion) {
		        $this->descripcion = $descripcion;
		    }
		   public function getEstado() {
		        return $this->estado;
		    }

		    public function setEstado($estado) {
		        $this->estado = $estado;
		    }
		    public function getId_cliente() {
		        return $this->id_cliente;
		    }

		    public function setId_cliente($id_cliente) {
		        $this->id_cliente = $id_cliente;
		    }
		    public function getId_contacto() {
		        return $this->id_contacto;
		    }

		    public function setId_contacto($id_contacto) {
		        $this->id_contacto = $id_contacto;
		    }
		     public function getId_producto() {
		        return $this->id_producto;
		    }

		    public function setId_producto($id_producto) {
		        $this->id_producto = $id_producto;
		    }
		     public function getId_usuario() {
		        return $this->id_usuario;
		    }

		    public function setId_usuario($id_usuario) {
		        $this->id_usuario = $id_usuario;
		    }  
		    public function getId_gestion() {
		        return $this->id_gestion;
		    }

		    public function setId_tipo_gestion($id_tipo_gestion) {
		        $this->id_tipo_gestion = $id_tipo_gestion;
		    }
			public function getId_ficha_tecnica() {
		        return $this->id_ficha_tecnica;
		    }

		    public function setId_ficha_tecnica($id_ficha_tecnica) {
		        $this->id_ficha_tecnica = $id_ficha_tecnica;
		    }
		    public function getSolucion() {
		        return $this->solucion;
		    }

		    public function setSolucion($solucion) {
		        $this->solucion = $solucion;
		    }
		    public function getUrgente() {
		        return $this->urgente;
		    }

		    public function setUrgente($urgente) {
		        $this->urgente = $urgente;
		    }

		
		    //----------------funciones------------------------

			public function update()
		    {
		        $query="UPDATE ticket SET descripcion='".$this->descripcion."',estado='".$this->estado."',id_usuario='".$this->id_usuario."',id_tipo_gestion='".$this->id_tipo_gestion."', id_ficha_tecnica='".$this->id_ficha_tecnica."',Solucion='".$this->solucion."', urgente='".$this->urgente."' WHERE id_ticket='".$this->id_ticket."'";
		        $update=$this->db->query($query);
		        if ($update==true) {
		            return true;
		        }else {
		            return false;
		        }  
		    }
			 public function save()
		    {
		    	$query="INSERT INTO ticket (id_ticket, descripcion, estado, id_cliente, id_contacto, id_producto, id_usuario, id_tipo_gestion, id_ficha_tecnica,Solucion,urgente)
		    			values(NULL,
		    			'".$this->descripcion."',
		    			'".$this->estado."',
		    			'".$this->id_cliente."',
		    			'".$this->id_contacto."',
		    			'".$this->id_producto."',
		    			'".$this->id_usuario."',
		    			'".$this->id_tipo_gestion."',
		    			NULL,
		    			'".$this->solucion."',
		    			'".$this->urgente."');";
		    	$save=$this->db->query($query);
		    	if ($save==true) {
		            return true;
		        }else {
		            
		            return false;
		        }   
		    }
		    public function delete()
		    {
		       $query="DELETE FROM ticket WHERE id_ticket='".$this->id_ticket."'"; 
		       $delete=$this->db->query($query);
		       if ($delete == true) {
		        return true;
		       }else{
		        return false;
		       }

		    } 
		         public function selectALL()
		    {
		        $query="SELECT * FROM ticket ORDER BY urgente DESC";
		        $selectall=$this->db->query($query);
		        $ListTickets=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListTickets;
		    }
		     public function selectOne($codigo)
		    {
		        $query="SELECT * FROM ticket WHERE id_ticket='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListTicket=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListTicket;
		    }     
		    public function selectOneU($codigo)
		    {
		        $query="SELECT * FROM usuario WHERE id_usuario='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListUusa=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListUusa;
			}
			 public function selectOneDU($codigo)
			    {
			        $query="SELECT * FROM usuario WHERE id_usuario!='".$codigo."'";
			        $selectall=$this->db->query($query);
			        $ListUusa=$selectall->fetch_all(MYSQLI_ASSOC);
			      return $ListUusa;
				}  
		     public function selectOneG($codigo)
		    {
		        $query="SELECT * FROM gestion WHERE id_gestion='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListGestion=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListGestion;
			}
			    public function selectOneC($codigo)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
			   public function selectOneCC($codigo,$contacto)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."' AND id_contacto='".$contacto."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
			   public function selectOneDC($codigo,$contacto)
		    {
		        $query="SELECT * FROM contactos WHERE id_cliente='".$codigo."' AND id_contacto!='".$contacto."'";
		        $selectall=$this->db->query($query);
		        $ListContactos=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListContactos;
			}
			 public function selectOneDG($codigo)
			    {
			        $query="SELECT * FROM gestion WHERE id_gestion!='".$codigo."'";
			        $selectall=$this->db->query($query);
			        $ListCont=$selectall->fetch_all(MYSQLI_ASSOC);
			      return $ListCont;
				} 
		public function selectOneTG($codigo)
		    {
		        $query="SELECT tg.*,g.nombre as gestions FROM tipo_gestion tg INNER JOIN gestion g on g.id_gestion= tg.id_gestion WHERE tg.id_tipo_gestion='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListTG=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListTG;
			}

			 public function selectOneDTG($codigo)
			    {
			        $query="SELECT * FROM tipo_gestion WHERE id_tipo_gestion!='".$codigo."'";
			        $selectall=$this->db->query($query);
			        $ListDG=$selectall->fetch_all(MYSQLI_ASSOC);
			      return $ListDG;
				} 
			public function selectOneG1($codigo)
		    {
		        $query="SELECT * FROM gestion WHERE id_gestion='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListCliente;
			}
			public function selectOneTecnicos()
		    {
		        $query="SELECT * FROM usuarios WHERE id_tipo_usuario=2";
		        $selectall=$this->db->query($query);
		        $ListCliente=$selectall->fetch_all(MYSQLI_ASSOC);
		      return $ListCliente;
			}
			     public function selectALLFT($codigo)
		    {
		        $query="SELECT * FROM ficha_tecnica WHERE id_producto='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListFicha;
		    }
		    public function selectFT($codigo)
		    {
		        $query="SELECT * FROM ficha_tecnica WHERE id_ficha_tecnica='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListFicha;
		    }
		     public function selectDFT($codigo)
		    {
		        $query="SELECT * FROM ficha_tecnica WHERE id_ficha_tecnica!='".$codigo."'";
		        $selectall=$this->db->query($query);
		        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListFicha;
		    }
		    public function selectPr($codigo,$cliente)
		    {
		         $query="SELECT P.nombre,P.codigo_serie, CP.id_cliente_producto,CP.id_producto FROM productos P INNER JOIN cliente_producto CP on CP.id_producto = P.id_producto WHERE CP.id_producto='".$codigo."' AND CP.id_cliente='".$cliente."'";
		        $selectall=$this->db->query($query);
		        $ListFicha=$selectall->fetch_all(MYSQLI_ASSOC);
		        return $ListFicha;
		    }




		  
		    
}//end class
?>