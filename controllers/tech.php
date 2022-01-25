<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



class Tech extends Controller{


    function __construct(){
        session_start();
        if ($_SESSION['usuario'][0]['rol_user'] != 2) {header('location:'.constant('URL'));}
        parent::__construct();
    }

    public function render(){
        $this->view->render('tech/index');
    }

    public function asignations(){

        $this->view->asignaciones = $this->model->getAsign($_SESSION['usuario'][0]['id_user']);
        $this->view->render('tech/asignations');
    }

    public function asigprogress(){
    
        if (isset($_POST['settec'])) {
           
            if (!empty($_POST['maintenance']) AND 
                !empty($_POST['progress_maintenance']) ) {

                $datos = [
                    'maintenance'  => $_POST['maintenance'],
                    'progress_maintenance' => $_POST['progress_maintenance']
                ];

                if ($this->model->updateProgress($datos)) {
                    header('location:'.constant('URL')."tech/asignations?success= Progreso actualizado");
                }else{
                    header('location:'.constant('URL')."tech/asignations?error= Error");  

                }
            }else{
                header('location:'.constant('URL')."tech/asignations?error= Coloca un progreso disponible");
            }
        }else{
            header('location:'.constant('URL')."tech/asignations");

        }

        
    }

    public function asigdetails($id=NULL){
        $id = $id[0];
        $this->view->tecnicoData = $this->model->getTechData($id);
        $this->view->equipmentData = $this->model->getEquipMainData($id);
        $this->view->render('tech/asigdetails');
    }


    public function equipoDead($e){

        $this->model->deadEquipment($e[0]);
       header('location:'.constant('URL').'tech/asigdetails/'.$_GET['main'].'?success=Equipo Marcado como Dañado');



    }


    









    

















}?>