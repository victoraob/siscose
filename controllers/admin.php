<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require "vendor/phpqrcode/qrlib.php"; 
include_once 'controllers/home.php';

//

class Admin extends Controller{

    protected $homecontroller;

    function __construct(){
        session_start();
        if ($_SESSION['usuario'][0]['rol_user'] != 1) {header('location:'.constant('URL'));}
        $this->homecontroller = new Home;
        parent::__construct();

        //$this->getTool();
       
        
    }

   

    public function render(){
        $this->getTool();
        $this->view->render('dashboard/index'); 
    }


    public function users(){
        $this->getTool();
        $this->view->departaments = $this->model->getDepartamentsTools();
        $this->view->rols = $this->model->getRolsTools();
        $this->view->usuarios = $this->model->getUsersTools();
        $this->view->render('dashboard/users'); 
    }


    public function editUser($ide){
        $this->getTool();
        $id = $ide[0];
        $this->view->usuario = $this->model->getUserWhere($id);
        $this->view->render('dashboard/edituser');

    }

    public function updateUser(){
        $this->getTool();
        if (isset($_POST['update'])) {

            if (!empty($_POST['name']) AND
                    !empty($_POST['lastname']) AND
                    !empty($_POST['email']) AND
                    !empty($_POST['password']) AND
                    !empty($_POST['phone']) AND  
                    !empty($_POST['id'])) {
    
                    $datos = [
    
                        'name'      => $_POST['name'],
                        'lastname'    => $_POST['lastname'],
                        'email'       => $_POST['email'],
                        'password'    => $_POST['password'],
                        'id'    => $_POST['id'],
                        'phone'   => $_POST['phone']
    
                    ];
    
                    if ($this->model->updateUser($datos)) {
                        $sms = 'Usuario actualizado correctamente';
                        $this->view->mensaje = $sms;
                        $id = $datos['id'];
                        $this->view->usuario = $this->model->getUserWhere($id);
                        $this->view->render('dashboard/edituser');
                    }else{
                        header('location:'.constant('URL').'admin/users');
                    }
    
                }else{
                    header('location:'.constant('URL').'admin/users');
                }
        }else{
            header('location:'.constant('URL').'admin/users');
        }
    }




























    public function equipos(){
        $this->getTool();
        $this->view->solicitudes = $this->model->getSolicitudesTools();
        $this->view->tecnicos = $this->model->getTecnicosAvailables();
        $this->view->render('dashboard/equipos'); 
    }


    public function techOfDesk(){
        $this->getTool();
        if (isset($_POST['settec'])) {
           
            if (!empty($_POST['desk']) AND !empty($_POST['tecnico']) ) {

                $datos = [
                    'desk'         => $_POST['desk'],
                    'tecnico'      => $_POST['tecnico']
                ];

                if ($this->model->updateTecnico($datos)) {
                    $this->view->solicitudes = $this->model->getSolicitudesTools();
                    $this->view->tecnicos = $this->model->getTecnicosAvailables();
                    $this->view->render('dashboard/equipos'); 
                }else{
                    $this->view->solicitudes = $this->model->getSolicitudesTools();
        $this->view->tecnicos = $this->model->getTecnicosAvailables();
        $this->view->render('dashboard/equipos');                 

                }
            }else{
                $this->view->solicitudes = $this->model->getSolicitudesTools();
        $this->view->tecnicos = $this->model->getTecnicosAvailables();
        $this->view->render('dashboard/equipos'); 
            }
        }else{
            $this->view->solicitudes = $this->model->getSolicitudesTools();
            $this->view->tecnicos = $this->model->getTecnicosAvailables();
            $this->view->render('dashboard/equipos'); 

        }

    }






    public function setDepartaments(){
        $this->getTool();

        if (isset($_POST['registrar'])) {
           
            if (!empty($_POST['name']) AND !empty($_POST['description']) ) {

                $datos = [
                    'name'         => $_POST['name'],
                    'description'  => $_POST['description']
                ];

                if ($this->model->insertDepart($datos)) {
                    $sms = "EL departamento fue creado con exito";
                    $this->cargarDataUsers($sms,"alert-success");
                }else{
                    $sms = "No es posible realizar su peticion, contacte a soporte";
                    $this->cargarDataUsers($sms,"alert-warning");                   

                }
            }else{
                $sms = "Verifique, hay campos vacios al registrar un departamento";
                $this->cargarDataUsers($sms,"alert-warning");
            }
        }else{
            $this->cargarDataUsers();

        }

    }



    function registro(){
        $this->getTool();
    
            if (isset($_POST['registrar'])) {
               
    
                if (!empty($_POST['name']) AND
                    !empty($_POST['lastname']) AND
                    !empty($_POST['email']) AND
                    !empty($_POST['password']) AND
                    !empty($_POST['phone']) AND
                    !empty($_POST['rol']) AND
                    !empty($_POST['departament']) ) {
    
                    $datos = [
    
                        'name'      => $_POST['name'],
                        'lastname'    => $_POST['lastname'],
                        'email'       => $_POST['email'],
                        'password'    => $_POST['password'],
                        'phone'   => $_POST['phone'],
                        'rol'       => $_POST['rol'],
                        'departament'       => $_POST['departament']
    
                    ];
    
                    if ($this->model->regisUsers($datos)) {
                        $sms = 'Registro de usuario, exitoso';
                        $this->cargarDataUsers($sms,"alert-success");
                    }else{
    
                        // $sms = 'Ops..! El correo del usuario ya esta registrado!';
                        // $this->cargarDataUsers($sms,"alert-warning");
                    }
    
                }else{
                    $sms = 'Ops! verifica que los campos no esten vacios!';
                    $this->cargarDataUsers($sms,"alert-warning");
                }

               // var_dump($_POST);
            }else{
                $this->cargarDataUsers();
            }
    
        
        }




        public function cargarDataUsers($sms = null,$claseStyle=null){
            
            $this->view->mensajeerror = $sms;
            $this->view->claseStyle = $claseStyle;
            $this->view->departaments = $this->model->getDepartamentsTools();
            $this->view->rols = $this->model->getRolsTools();
            $this->view->usuarios = $this->model->getUsersTools();
            $this->view->render('dashboard/users');

        }

        public function reportes(){
            $this->view->render('dashboard/reporte');
            
        }


/********************************************************************************
 *   FUNCIONES PARA EQUIPOS DEL INVENTARIO
****************************************************************************** */

    public function inventario(){
        $this->getTool();
        if (isset($_POST['addForm'])) {
            switch ($_POST['addForm']){
                case 'newtype':

                    if (!empty($_POST['name_equipmenttype'])) {
                        $datos=['name_equipmenttype' => $_POST['name_equipmenttype']];
                        if ($this->model->saveEquipmentType($datos)) {
                            $this->view->success = "' ".$_POST['name_equipmenttype']." ' Registrado con exito!";
                            $this->loadViewInventario();
                            $this->view->render('dashboard/inventario');
                        }else{
                            $this->view->error =  "El equipo que intentas registrar ya existe";
                            $this->loadViewInventario();
                            $this->view->render('dashboard/inventario');
                        }
                    }else{
                        $this->view->error =  "Verifica que todos los campos al agregar un tipo de equipo no esten ' VACIOS '";
                        $this->loadViewInventario();
                        $this->view->render('dashboard/inventario');
                    }



                    
                break;

                case 'newequip':
                    if (!empty($_POST['code_equipcomp']) AND 
                        !empty($_POST['model_equipcomp']) AND 
                        !empty($_POST['marca_equipcomp']) AND 
                        !empty($_POST['color_equipcomp']) AND 
                        !empty($_POST['type_equipcomp'])){


                        $datos=[
                            'code_equipcomp' => $_POST["code_equipcomp"],
                            'model_equipcomp' => $_POST["model_equipcomp"],
                            'marca_equipcomp' => $_POST["marca_equipcomp"],
                            'color_equipcomp' => $_POST["color_equipcomp"],
                            'qrcode_equipcomp' => $_POST["code_equipcomp"].".png",
                            'type_equipcomp' => $_POST["type_equipcomp"],
                            'status_equipcomp' => 1,
                            'departament_equipcomp' => 1
                        ];

                        if ($this->model->saveEquipmentComputer($datos)) {
                            $equip = $this->model->getEquipmentComputerWhereCode($datos['code_equipcomp']);
                            $this->generateqr($equip);
                            $this->view->success = "Equipo ' ".$equip[0]['name_equipmenttype']." ' Registrado con exito!";
                            $this->loadViewInventario();
                            $this->view->render('dashboard/inventario');

                        }else{
                            $this->view->error =  "El equipo que intentas registrar ya existe";
                            $this->loadViewInventario();
                            $this->view->render('dashboard/inventario');
                        }
                    }else{
                        $this->view->error =  "Verifica que todos los campos al agregar un nuevo equipo no esten' VACIOS '";
                        $this->loadViewInventario();
                        $this->view->render('dashboard/inventario');
                    }

                 


                    
                break;
                
                default:
                   $this->loadViewInventario();
                   $this->view->render('dashboard/inventario');
                break;
            }
        } else {

            $this->loadViewInventario();
            $this->view->render('dashboard/inventario');
        }
    }

    public function loadViewInventario(){
        $this->getTool();
        $this->view->equipmentType = $this->model->getEquipmentType();
        $this->view->equipmentComputer = $this->model->getEquipmentComputer();
    }

    public function idetails($id = null){
        $this->getTool();
        $this->view->equipDetails = $this->model->getEquipmentComputerWhere($id[0]);
        $this->view->StatusEquipment = $this->model->getStatusEquipment();

        $this->view->departaments = $this->model->getDepartaments();
        $this->view->render('dashboard/idetails');
    }

    public function setDepartament(){
        $this->getTool();

        if (isset($_POST['asig'])) {

            if (!empty($_POST['dep'])) {
                $datos = [ 'dep' =>$_POST['dep'],'id' =>$_POST['id'] ];
                $this->model->saveDepartamentEquipcomp($datos); 
                header('location:'.constant('URL')."admin/idetails/".$datos['id']."?success=Departamento Asignado con Exito");
            }else{
                header('location:'.constant('URL')."admin/idetails/".$_POST['id']."?error= Debe elegir algun departamento valido");

            }
        }else{
            header('location:'.constant('URL')."admin/inventario");
        }

        // var_dump($datos);
        // die();
        
        $this->view->StatusEquipment = $this->model->getStatusEquipment();

        $this->view->departaments = $this->model->getDepartaments();
        $this->view->render('dashboard/idetails');
    }

    public function generateqr($datos){
        $this->getTool();

        $qr = 
        "EQUIPO: ".$datos[0]['name_equipmenttype'].
        " | CODIGO: ".$datos[0]['code_equipcomp'].
        " | MODELO: ".$datos[0]['model_equipcomp'].
        " | MARCA: ".$datos[0]['marca_equipcomp'].
        " | COLOR: ".$datos[0]['color_equipcomp'];


        //Declaramos una carpeta temporal para guardar la imagenes generadas
        $dir = 'public/images/qrcodes/';
        //Si no existe la carpeta la creamos
        if (!file_exists($dir)) mkdir($dir);
        //Declaramos la ruta y nombre del archivo a generar
        $filename =  $dir.$datos[0]['qrcode_equipcomp'];
        //Parametros de Configuración
        $tamaño = 10; //Tamaño de Pixel
        $level = 'M'; //Precisión Baja
        $framSize = 3; //Tamaño en blanco
        $contenido = $qr; //Texto
        //Enviamos los parametros a la Función para generar código QR 
        QRcode::png($contenido, $filename, $level, $tamaño, $framSize);

    }

    public function reportInventario(){
        $this->getTool();
        $this->loadViewInventario();
        $this->view->render('dashboard/reportInventario');
    }

    public function reportEquipDetails($id = null){
        $this->getTool();
        $this->view->equipDetails = $this->model->getEquipmentComputerWhere($id[0]);
        $this->view->render('dashboard/reportEquipDetails');
    }



/********************************************************************************
 *   FUNCIONES PARA SOLICITUDES DE EQUIPOS
****************************************************************************** */


public function solicitudes(){
    if (isset($_POST['statusreques']) ) {
        if (!empty($_POST['statusreques'])) {

            $datos = ['id' => $_POST['id'],'statusreques' => $_POST['statusreques']];
            if ($this->model->updateStatusRequest($datos)) {
             $this->getTool();
            $this->view->solicitudes = $this->model->getSolicitudes();
            $this->view->StatusRequest = $this->model->getStatusRequest();
            $this->view->StatusRequest = $this->model->getStatusRequest();
            $this->view->success = "Cambio exitoso";
            $this->view->render('dashboard/solicitudes');
            }else{
                $this->getTool();
                $this->view->solicitudes = $this->model->getSolicitudes();
                $this->view->StatusRequest = $this->model->getStatusRequest();
                $this->view->StatusRequest = $this->model->getStatusRequest();
                $this->view->error = "Woops, ocurrio un problema";
                $this->view->render('dashboard/solicitudes');
            }

        }else{
            $this->getTool();
            $this->view->solicitudes = $this->model->getSolicitudes();
            $this->view->StatusRequest = $this->model->getStatusRequest();
            $this->view->StatusRequest = $this->model->getStatusRequest();
            $this->view->error = "selecciona una opcion valida";
            $this->view->render('dashboard/solicitudes');
        } 
    }else{
        $this->getTool();
        $this->view->solicitudes = $this->model->getSolicitudes();
        $this->view->StatusRequest = $this->model->getStatusRequest();
        $this->view->StatusRequest = $this->model->getStatusRequest();
        $this->view->render('dashboard/solicitudes');
    }
            
}



public function getTool(){
    $this->view->SolicitudesPending = $this->model->getSolicitudesPending();
}
    
    

/********************************************************************************
 *   FUNCIONES PARA SERVICIO TECNICO
****************************************************************************** */





public function mantenimiento(){
    $id = $_SESSION['usuario'][0]["id_dep"];
    $this->getTool();
    $this->view->mainEquipment=$this->model->getMaintenanceEquipment($id);
    $this->view->TechAll = $this->model->getTechAll(); 
    $this->view->render('dashboard/mantenimiento');
}


public function addtech(){


    $this->getTool();

        if (isset($_POST['send'])) {

            if (!empty($_POST['maintenance']) AND !empty($_POST['tecnico'])) {
                $datos = ['id_mant' =>$_POST['maintenance'],
                          'tecnico' =>$_POST['tecnico']];

                $this->model->updateTecnicoMaint($datos); 
                header('location:'.constant('URL')."admin/mantenimiento/?success=Tecnico Asignado con Exito");
            }else{
                header('location:'.constant('URL')."admin/mantenimiento/?error= Debe elegir algun tecnico valido");

            }
        }else{
            header('location:'.constant('URL')."admin/mantenimiento");
        }

        // var_dump($datos);
        // die();
        
        $this->view->StatusEquipment = $this->model->getStatusEquipment();

        $this->view->departaments = $this->model->getDepartaments();
        $this->view->render('dashboard/idetails');

    
    var_dump($_POST);
}





// public function maindetails(){
//     $this->getTool();

//     if (isset($_POST['asig'])) {

//         if (!empty($_POST['dep'])) {
//             $datos = [ 'dep' =>$_POST['dep'],'id' =>$_POST['id'] ];
//             $this->model->saveDepartamentEquipcomp($datos); 
//             header('location:'.constant('URL')."admin/idetails/".$datos['id']."?success=Departamento Asignado con Exito");
//         }else{
//             header('location:'.constant('URL')."admin/idetails/".$_POST['id']."?error= Debe elegir algun departamento valido");

//         }
//     }else{
//         header('location:'.constant('URL')."admin/inventario");
//     }

//     // var_dump($datos);
//     // die();
    
//     $this->view->StatusEquipment = $this->model->getStatusEquipment();

//     $this->view->departaments = $this->model->getDepartaments();
//     $this->view->render('dashboard/idetails');
// }



public function maindetails($id = NULL){

    $id = $id[0];
    $this->getTool();

    $this->view->tecnicoData = $this->model->getTechData($id);
    $this->view->equipmentData = $this->model->getEquipMainData($id);
    $this->view->render('dashboard/maindetails');
    
}






public function departamentos(){
    $this->getTool();

    if (isset($_POST['update'])) {

        if (!empty($_POST['name']) AND !empty($_POST['description']) ) {

            $datos = [
                'name'         => $_POST['name'],
                'description'  => $_POST['description'],
                'id'  => $_POST['id']
                
            ];

            if ($this->model->updateDepart($datos)) {
                    $this->view->mensajeerror = "EL departamento fue actualizado con exito";
                    $this->view->claseStyle = "alert-success";
                    $this->view->departaments = $this->model->getDepartamentsTools();
                    $this->view->render('dashboard/departamentos');


            }else{
                $this->view->mensajeerror =  "No es posible realizar su peticion, contacte a soporte";
                $this->view->claseStyle = "alert-warning";
                $this->view->departaments = $this->model->getDepartamentsTools();
                $this->view->render('dashboard/departamentos');

            }

        }else{
            $this->view->mensajeerror =  "Verifique, hay campos vacios al actualizar un departamento";
            $this->view->claseStyle = "alert-warning";
            $this->view->departaments = $this->model->getDepartamentsTools();
            $this->view->render('dashboard/departamentos');
        }

       
    }else{
        $this->view->departaments = $this->model->getDepartamentsTools();
        $this->view->render('dashboard/departamentos');
    }

    
}


public function editarEquipo($ide){
    $this->getTool();
    $id = $ide[0];

    $this->view->equipmentType = $this->model->getEquipmentType();
    $this->view->equipo =$this->model->getEquipmentComputerWhere($id);
    $this->view->render('dashboard/editEquipo');
}

public function updateEquipo(){
    $this->getTool();
    if (isset($_POST['update'])) {

        if (!empty($_POST['code_equipcomp']) AND
                !empty($_POST['model_equipcomp']) AND
                !empty($_POST['marca_equipcomp']) AND
                !empty($_POST['color_equipcomp']) AND
                !empty($_POST['type_equipcomp']) AND  
                !empty($_POST['id'])) {

                $datos = [

                    'code_equipcomp' => $_POST["code_equipcomp"],
                    'model_equipcomp' => $_POST["model_equipcomp"],
                    'marca_equipcomp' => $_POST["marca_equipcomp"],
                    'color_equipcomp' => $_POST["color_equipcomp"],
                    'type_equipcomp' => $_POST["type_equipcomp"],
                    'id'    => $_POST['id']

                ];

                if ($this->model->updateEquip($datos)) {
                    $sms = 'Equipo actualizado correctamente';
                    $this->view->mensaje = $sms;
                    $id = $datos['id'];
                    header('location:'.constant('URL').'admin/editarEquipo/'.$id);
                }else{

                   // echo "aquiun";
                    header('location:'.constant('URL').'admin/inventario');
                }

            }else{
                //echo "aqui vacio";
                header('location:'.constant('URL').'admin/inventario');
            }
    }else{
        header('location:'.constant('URL').'admin/inventario');
    }
}



















}?>