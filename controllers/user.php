<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



class User extends Controller{


    function __construct(){
        session_start();
        if ($_SESSION['usuario'][0]['rol_user'] != 3) {header('location:'.constant('URL'));}
        parent::__construct();
    }


public function render(){
        $this->view->render('users/index');
}

public function process(){
        $this->view->solicitudes = $this->model->getSolicitudesUser($_SESSION["usuario"][0]["id_user"]);
        $this->view->render('users/process');
}

public function notifications(){
        $this->view->render('users/notifications');
}

public function progressdetails($id){

        $aidi = $id[0];
        $this->view->details = $this->model->getDetailsProcess($aidi,$_SESSION["usuario"][0]["id_user"]);
        if ($this->view->details[0]['tecnico_desk'] == null) {
           $this->view->tecnico = null ;
        }else{
            $this->view->tecnico = $this->model->getTecnico($this->view->details[0]['tecnico_desk']); 
        }
        
        $this->view->render('users/details');
}

public function setSolicitud(){


        if (isset($_POST['registrar'])) {
               
    
            if (!empty($_POST['equipo']) AND
                !empty($_POST['description']) ) {
    
                $datos = [
                    'code'       => $this->generarCodigo(10),
                    'equipo'      => $_POST['equipo'],
                    'description'    => $_POST['description'],
                    'usuario'    =>  $_SESSION["usuario"][0]["id_user"]
                ];
    
                if ($this->model->regisSolicitud($datos)) {
                    $sms = 'Registro de usuario, exitoso';
                    $this->cargarDataUsers($sms,"alert-success");
                }

            }else{
                $sms = 'Ops! verifica que los campos no esten vacios!';
                $this->cargarDataUsers($sms,"alert-warning");
            }
    
        }else{
            $this->cargarDataUsers();
        }

}

    
 public function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return strtoupper($key);
}


public function cargarDataUsers($sms = null, $claseStyle = null){

    $this->view->mensajeerror = $sms;
    $this->view->claseStyle = $claseStyle;
    $this->view->solicitudes = $this->model->getSolicitudesUser($_SESSION["usuario"][0]["id_user"]);
    // $this->view->rols = $this->model->getRolsTools();
    // $this->view->usuarios = $this->model->getUsersTools();
    $this->view->render('users/process');
}


/******************************************************
********** SOLICITUDES *******************************
******************************************************/

public function solicitudes(){
    $aidi = $_SESSION['usuario'][0]['id_user'];

    if (isset($_POST['newequip'])) {
        if (!empty($_POST['descrip_request'])) {
           $datos = [
               'descrip_request' => $_POST['descrip_request'],
               'status_request'  => 1,
               'user_request'  => $_SESSION['usuario'][0]['id_user'],
               'name_dep'  => $_SESSION['usuario'][0]['name_dep']
           ];
           if ($this->model->setSolicitud($datos)) {
              $this->view->solicitudes = $this->model->getSolicitudesUser($aidi);
               $this->view->success = "Solicitud realizada con exito!";
               $this->view->render('users/solicitudes');
           }else{
            $this->view->solicitudes = $this->model->getSolicitudesUser($aidi);
            $this->view->error = "Error, comuniquese con servicio tecnico";
            $this->view->render('users/solicitudes');
           }
        }else{
            $this->view->solicitudes = $this->model->getSolicitudesUser($aidi);
            $this->view->error = "Debe escribir detalles para procesar la solicitud";
            $this->view->render('users/solicitudes');
        }
    }else{
        $this->view->solicitudes = $this->model->getSolicitudesUser($aidi);
       // $this->view->success = "modulo de solicitudes";
        $this->view->render('users/solicitudes');
    }
    
}



/******************************************************
********** EQUIPOS *******************************
******************************************************/


public function equipos(){
     

    $id = $_SESSION['usuario'][0]["id_dep"];
    $this->view->equipmentComputer = $this->model->getEquipmentComputerUser($id);
    $this->view->render('users/equipos');

}




public function mantenimiento(){
    
    


    $id = $_SESSION['usuario'][0]["id_dep"];

    if (isset($_POST['mante'])) {
        if (!empty($_POST['equipcomp']) AND !empty($_POST['description'])) {
          

            $datos = [
                'equip_maintenance'     => $_POST['equipcomp'],
                'descri_maintenance'    => $_POST['description'],
                'depart_maintenance'    => $_SESSION['usuario'][0]['id_dep'],
                'tecnico_maintenance'  => NULL,
                'date_asignation'      => NULL,
                'progress_maintenance'  => 0,
             ];
           
            
           if ($this->model->setMaintenanceEquipment($datos)) {

               $this->view->success = "Equipo enviado a mantenimiento ! podra ver el progreso de su estado en la lista, sea paciente!";
               $this->view->equipmentComputer =$this->model->getEquipmentComputerUser($id);
            $this->view->mainEquipment=$this->model->getMaintenanceEquipment($id);

            $equipo = [
                'status_equipcomp' => 3,
                'id' => $datos['equip_maintenance']
            ];
            $this->model->updateStatusEquipment($equipo);
            $this->view->render('users/mantenimiento');




           }else{
            $this->view->error = "Error, comuniquese con servicio tecnico";
            $this->view->equipmentComputer =$this->model->getEquipmentComputerUser($id);
            $this->view->mainEquipment=$this->model->getMaintenanceEquipment($id);
            $this->view->render('users/mantenimiento');
           }

        }else{
            $this->view->error = "Por favor incluya el equipo y describa la falla ! hay datos no muy claro";
            $this->view->equipmentComputer =$this->model->getEquipmentComputerUser($id);
            $this->view->mainEquipment=$this->model->getMaintenanceEquipment($id);
            $this->view->render('users/mantenimiento');
        }
    }else{
        $this->view->equipmentComputer =$this->model->getEquipmentComputerUser($id);
        $this->view->mainEquipment=$this->model->getMaintenanceEquipment($id);
        $this->view->render('users/mantenimiento');
    }
}









    

}?>