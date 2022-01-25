<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



class Home extends Controller{


    function __construct(){

        parent::__construct();
    }


    // cargar login 
public function render(){
    session_start();

	if (isset($_SESSION['usuario']) and !empty($_SESSION['usuario'])) {
	    $this->verifyLoginUser($_SESSION['usuario']);
	}else{

		// no esta logeado entncs verifica si quiere entrar
		if (isset($_POST['iniciosesion'])) {
			// verifica si estan vacios los campos

			if (!empty($_POST['email']) AND
		        !empty($_POST['password'])) {
				// si no estan vacion entncs metelos en un array

				$datos = [

					'email'   => $_POST['email'],
					'password' => $_POST['password']

				];
				// verifica si estan en la tabla users

				if ($this->model->login($datos)) {
					// si encontro un registro se lo trae e inicia session
					$_SESSION['usuario'] = $this->model->login($datos);
					// ver que tipo de usuario es
                    $this->verifyLoginUser($_SESSION['usuario']);




                    // echo "<pre>";
                    // var_dump($_SESSION['usuario']);
                    // echo "<pre>";
					//$this->view->mensajeexito = 'Inicio Exitoso, bienvenido!';
				    //$this->view->render('home/login');
				    //header('location:'.constant('URL').'admin');
				}else{
					//si no hay un usuario asi
				   $this->view->mensajeerror = 
				   'Ops..! Tus Datos son Incorrectos!';
		           $this->view->render('home/login');
				} 
			}else{
			$this->view->mensajeerror = 'Ops! Tus campos estan vacios!';
		    $this->view->render('home/login');
			}

		}else{
        
		$this->view->render('home/login');
		}
	}

}



public function verifyLoginUser($datos){

    if ($datos[0]["rol_user"]== 1) {
        header('location:'.constant('URL').'admin');
    }else if ($datos[0]["rol_user"]== 2) {
        header('location:'.constant('URL').'tech');
    }else if ($datos[0]["rol_user"]== 3) {
        header('location:'.constant('URL').'user');
    }
    
}



public function logout(){
    session_start();
    unset($_SESSION['usuario']);
    //session_destroy();
    header('location:'.constant('URL'));
}



































public function cotizar(){
    if (isset($_POST['name']) and isset($_POST['email'])) {
        if (!empty($_POST['name']) and !empty($_POST['email'])) {

            $datos = [
                'name'       => $_POST['name'],
                'email'      => $_POST['email']
            ];
            //var_dump($datos);
            $this->sendmail($datos);        
        }else{header('location:'.constant('URL'));}
    }else{header('location:'.constant('URL'));}
} 







public function sendmail($datos){

  // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    //Configuraciones de servidor
    //$mail->SMTPDebug = 2;                                 // Habilitar salida de depuración detallada
    $mail->isSMTP();                                      // Configurar el remitente para usar SMTP
    $mail->Host = 'smtp.hostinger.com';                  // Especificar servidores SMTP principales y de respaldo
    $mail->SMTPAuth = true;                               // Habilitar autenticación SMTP
    $mail->Username = 'services@rokettoagency.com';             // Nombre usuario SMTP
    $mail->Password = 'D1ann3h3';                           // Contraseña SMTP
    $mail->SMTPSecure = 'ssl';                            // Habilitar encriptación SSL, TLS también es aceptado con el puerto 587
    $mail->Port = 465;                                    // TCP puerto para conectarse

    //Recipients
    $mail->setFrom('services@rokettoagency.com', "rokettoagency");
    //$mail->addAddress('victororopezaaob@gmail.com', 'rokettoagency');     // Add a recipient

    $mail->addAddress('info@rokettoagency.com', 'rokettoagency');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('flightschooldivision@helicopterospersonales.com', 'Helicopteros Personales');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('public/send/video.mp4');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Servicios Roketto';
    $mail->Body    = "<strong>Nombre:</strong> ".$datos['name']."<br>
                      <strong>Correo:</strong> ".$datos['email']."<br>";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


    $mail->send();
    header('location:'.constant('URL').'home?code=success');

} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('location:'.constant('URL').'home?code=denied');
}
}






}?>