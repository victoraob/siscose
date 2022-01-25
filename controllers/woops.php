<?php 


/**
 * 
 */
class Woops extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Woops No se Encontro la Pagina Solicitada";
        $this->view->render('home/404');
        #echo "Controlador Woops";
    }


    
}
?>