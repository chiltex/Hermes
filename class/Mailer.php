<?php
set_time_limit(500);
include '../vendors/PHPMailer/PHPMailerAutoload.php';
require '../vendors/PHPMailer1/src/Exception.php';
require '../vendors/PHPMailer1/src/PHPMailer.php';
require '../vendors/PHPMailer1/src/SMTP.php';
	
	class Mailer
	{
		private $_asunto;
		private $_mensaje;
		private $_archivo;
		private $_usuario;
        private $_jefe;
        private $_nombre_usuario;
        private $_fecha;
        private $_cc1;
        private $_cc2;
        private $_cc3;



		public function __construct($asunto, $mensaje, $archivo,$usuario,$jefe,$cc1,$cc2,$cc3,$nombre_usuario,$fecha)
		{
			$this->_asunto = $asunto;
			$this->_mensaje = $mensaje;
			$this->_archivo = $archivo;
			$this->_usuario = $usuario;
			$this->_jefe = $jefe;
			$this->_nombre_usuario = $nombre_usuario;
			$this->_fecha = $fecha;
			$this->_cc1 = $cc1;
			$this->_cc2 = $cc2;
			$this->_cc3 = $cc3;
		}
		
		//
		//++
		//+++++
		//		METODOS GETTERS
		//+++++
		//++
		//
		
		public function dameMensaje(){
			return $this->_mensaje;
		}
	
		public function dameAsunto(){
			return $this->_asunto;
		}
		
		//
		//++
		//+++++
		//		METODOS NORMALES
		//+++++
		//++
		//
		
		
		public function solicitarAcceso(){
			//postmaster@localhost
		  	//postmaster@localhost
		  	$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ugueto.luis19@gmail.com';                 // SMTP username
			$mail->Password = 'LuisUgueto...';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->From = 'saravis.upta@gmail.com';
			$mail->FromName = 'APP SARAVIS';
			//$email = "blink242@outlook.com";
			//$email1 = "codefuentes@outlook.com";
			$email2 = "saravis.upta@gmail.com";
			//$mail->addAddress($email);         // Add attachments
			//$mail->addAddress($email1);
			$mail->addAddress('ugueto.luis19@gmail.com');         // Add attachments
			//$mail->addAddress($this->_correo);
			    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = ''.$this->_asunto;
			$mail->Body    = '<h1 style="color:red;">Un usuario quiere tener acceso a la aplicacion con el correo: '.$this->_correo.' <br>Y ha dejado este mensaje: '.$this->_mensaje.'</h1>';
		    if(!$mail->send())
		    {
		    	echo 0;
				/*echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>";*/
		    }
		    else
		    {
		    	echo 1;
		    	/*
		    	echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>"; */
		    }
		}
		/*public function enviarCertificado()
		{
			
			$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->CharSet = "UTF-8"; 
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ugueto.luis19@gmail.com';                 // SMTP username
			$mail->Password = 'LuisUgueto...';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->From = 'saravis.upta@gmail.com';
			$mail->FromName = 'APP SARAVIS';
			//$email = "blink242@outlook.com";
			//$email1 = "codefuentes@outlook.com";
			//$mail->addAddress($email);         // Add attachments
			//$mail->addAddress($email1);
                           // Set email format to HTML
			$mail->IsHTML(true);
			$mail->Subject = ''.$this->_asunto;
			$mail->Body    = ''.$this->_mensaje;
			$mail->addAddress($this->_correo);
        	$mail->AddAttachment('recursos/Certificado.pdf', 'Certificado.pdf');
			    // Optional name
	
	     	$id_usuario = $_SESSION['session']['id'];
		  
		    $id = $this->_idEdicion;
			if(!$mail->send()) {
				echo "<script>
						alert('Certificado no Enviado.');
						window.location='?ctrl=documento&acc=envCert';
					</script>";
			} else {
				echo "<script>
						alert('Certificado Enviado.');
						window.location='?ctrl=documento&acc=envCert';
					</script>";
			}
		}*/
		public function enviarCorreo()
		{
			//postmaster@localhost
		  	$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jhosuegarciastarkand@gmail.com';                 // SMTP username
			$mail->Password = 'jhougar96';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			

			//CABECERA DE CORREO




			$mail->SetFrom('hermes.soporte@gmail.com','Eduardo Garcia');
			$mail->FromName = 'APP HERMES INTERNATIONAL';
			//$email = "blink242@outlook.com";
			//$email1 = "codefuentes@outlook.com";
			//$email2 = "saravis.upta@gmail.com";
			$mail->addAddress($this->_usuario,$this->_nombre_usuario);
			if ($this->_cc3!="N/A") {
				# code...
				$mail->addAddress($this->_cc3);
			}
			
			$mail->addCC($this->_jefe);
			$mail->addAddress($this->_cc1);
			$mail->addAddress($this->_cc2);
			        // Add attachments
			//$mail->addAddress($email1);
			//$mail->addAddress($this->_correo);
			    // Optional name

			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = ''.$this->_asunto;
			$mail->Body    = '<h3 style="color:red;">Este correo fue generado automaticamente desde nuestra aplicacion, por favor no responder a este correo.</h3><p> A continuacion se anexa el reporte tecnico del trabajo realiza la fecha: '.$fecha.'. Gracias por preferirnos</p>';
	     	// $id_usuario = $_SESSION['session']['id'];
		    // $mensaje = new contactoPersistencia();
		    // $mensaje = $mensaje->registrarMensaje($id_usuario, $this->_asunto, $this->_mensaje);
		    $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Hermes/enviados/'.$this->_archivo, 'Fichatenicafinal.pdf');
		    if(!$mail->send())
		    {
		    	return 0;
		    	/* echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				/*echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>";*/
		    }
		    else
		    {
		    	return 1;
		    	/*
		    	echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>"; */
		    }
			
		}	
		public function enviarCorreoCalidad()
		{
			//postmaster@localhost
		  	$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jhosuegarciastarkand@gmail.com';                 // SMTP username
			$mail->Password = 'jhougar96';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			

			//CABECERA DE CORREO




			$mail->SetFrom('hermes.soporte@gmail.com','Eduardo Garcia');
			$mail->FromName = 'APP HERMES INTERNATIONAL';
			//$email = "blink242@outlook.com";
			//$email1 = "codefuentes@outlook.com";
			//$email2 = "saravis.upta@gmail.com";
			$mail->addAddress($this->_usuario,$this->_nombre_usuario);
			$mail->addCC($this->_jefe);
			$mail->addCC($this->_cc1);
			$mail->addCC($this->_cc2);
			        // Add attachments
			//$mail->addAddress($email1);
			//$mail->addAddress($this->_correo);
			    // Optional name

			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = ''.$this->_asunto;
			$mail->Body    = '<h3 style="color:red;">Este correo fue generado automaticamente desde nuestra aplicacion, por favor no responder a este correo.</h3><p> A continuacion se anexa el reporte de calidad del trabajo realizado. Gracias por preferirnos</p>';
	     	// $id_usuario = $_SESSION['session']['id'];
		    // $mensaje = new contactoPersistencia();
		    // $mensaje = $mensaje->registrarMensaje($id_usuario, $this->_asunto, $this->_mensaje);
		    $mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Hermes/enviados/calidad/'.$this->_archivo, 'ReporteCalidad.pdf');
		    if(!$mail->send())
		    {
		    	return 0;
		    	/* echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				/*echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>";*/
		    }
		    else
		    {
		    	return 1;
		    	/*
		    	echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>"; */
		    }
			
		}	
		public function enviarCorreoTicket()
		{
			//postmaster@localhost
		  	$mail = new PHPMailer();
			
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jhosuegarciastarkand@gmail.com';                 // SMTP username
			$mail->Password = 'jhougar96';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			

			//CABECERA DE CORREO




			$mail->SetFrom('info.hermes@sistemashermesgt.com','Eduardo Garcia');
			$mail->FromName = 'APP HERMES INTERNATIONAL';
			//$email = "blink242@outlook.com";
			//$email1 = "codefuentes@outlook.com";
			//$email2 = "saravis.upta@gmail.com";
			$mail->addAddress($this->_usuario,$this->_nombre_usuario);
			/*$mail->addCC($this->_jefe);
			$mail->addCC($this->_cc1);
			$mail->addCC($this->_cc2);*/
			        // Add attachments
			//$mail->addAddress($email1);
			//$mail->addAddress($this->_correo);
			    // Optional name

			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = ''.$this->_asunto;
			$mail->Body    = '<h3 style="color:red;">Este correo fue generado automaticamente desde nuestra aplicacion, por favor no responder a este correo.</h3><p> Se le asignado el siguiente Ticket:</p></br>'.$this->_mensaje;
	     	// $id_usuario = $_SESSION['session']['id'];
		    // $mensaje = new contactoPersistencia();
		    // $mensaje = $mensaje->registrarMensaje($id_usuario, $this->_asunto, $this->_mensaje);
		    //$mail->AddAttachment($_SERVER['DOCUMENT_ROOT'].'/Hermes/enviados/calidad/'.$this->_archivo, 'ReporteCalidad.pdf');
		    if(!$mail->send())
		    {
		    	return 0;
		    	/* echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
				/*echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>";*/
		    }
		    else
		    {
		    	return 1;
		    	/*
		    	echo "<script>
						alert('Enviando mensaje...');
						window.location='?';
					</script>"; */
		    }
			
		}	

	}	