
<?php 

class UserModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
  }


/********** METODO PARA CREAR *************/

  public function regisSolicitud($datos){  

        try {

            $query 
            = $this->db->connect()
            ->prepare('INSERT INTO desk(code_desk,name_desk,description_desk,usuario_desk) VALUES (:code,:equipo,:description,:usuario)');
                            
            $query->execute([

                'code'         => $datos['code'],
                'equipo'       => $datos['equipo'],
                'description'  => $datos['description'],
                'usuario'      => $datos['usuario']
            ]);
            return true;
            
        } catch (PDOException $e) {
            #echo "Ya existe ese email";
            return false;
            
        }   
    }//FIN CREATE



/********** METODO PARA MOSTRAR *************/

    public function getSolicitudesdosOLD($id){
        $items = [];

        try {

         $query = $this->db->connect()->query("SELECT * FROM desk");

            while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                $items = $row;
            }
            return $items;
            return true;
            
        } catch (PDOException $e) {

            return [];
            return false;
            
        }
    }//FIN READ


/********** METODO PARA ELIMINAR *************/

   public function delete($id){

    $query 
        = $this->db->connect()
        ->prepare("DELETE  FROM users WHERE id_user = :id");

        try {

          $query->execute(['id' => $id]);

          return true;
          
        } catch (PDOException $e) {
          return false;
          
        }
  }// FIN DELETE


/********** METODO PARA OBTENER POR ID *************/

    public function getSolicitudesUserOLD($id){

        $items = [];
        $aidi = $id;

        $query = $this->db->connect()->prepare("SELECT * FROM `desk` WHERE usuario_desk = :id");

        try {

            $query->execute(['id' => $id]);


            while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                $items = $row;
            }

            return $items;
            return true;
            
        } catch (PDOException $e) {
            return [];
            return false;
        }
    }//FIN GetByID.


    public function getDetailsProcess($id,$user){

        // var_dump($id[0]);
        // var_dump($user);

        $items = [];
        $aidi = $id;

        $query = $this->db->connect()->prepare("SELECT * FROM desk INNER JOIN users INNER JOIN departaments INNER JOIN rols WHERE users.id_user = desk.usuario_desk AND users.rol_user = rols.id_rols AND users.description_user = departaments.id_dep AND id_desk = :id AND usuario_desk = :user");

        try {

            $query->execute(
                ['id' => $id,'user' => $user]
            );


            while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                $items = $row;
            }

            return $items;
            return true;
            
        } catch (PDOException $e) {
            return [];
            return false;
        }
    }//FIN GetByID. 



    public function getTecnico($id){
    
            $items = [];
            $aidi = $id;
    
            $query = $this->db->connect()->prepare("SELECT * FROM users INNER JOIN rols INNER JOIN departaments WHERE users.rol_user=rols.id_rols AND users.description_user=departaments.id_dep AND id_user = :id");
    
            try {
                $query->execute(
                    ['id' => $id]
                );
    
    
                while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
                    $items = $row;
                }
    
                return $items;
                return true;
                
            } catch (PDOException $e) {
                return [];
                return false;
            }
        }//FIN GetByID. 


/********** METODO PARA EDITAR *************/

    public function update($datos){

        $query= $this->db->connect()->prepare("UPDATE users SET name = :name,email = :email, password = :password WHERE id_user = :id ");

        try {

          $query->execute([
            'name'     => $datos['name'],
            'email'    => $datos['email'],
            'password' => $datos['password'],
            'id'       => $datos['id']
            
          ]);

          return true;
          
        } catch (PDOException $e) {
          return false;
          
        }
        
        
    }//FIN update.





/********************************************************************************
 ****************  SOLICITUDES  *******************************************************************************/

public function setSolicitud($datos){  

    try {

        $query 
        = $this->db->connect()
        ->prepare('INSERT INTO request_equipment(descrip_request,status_request,user_request) VALUES (:descrip_request,:status_request,:user_request)');
                        
        $query->execute([
            'descrip_request' => $datos['descrip_request'],
            'status_request'  => $datos['status_request'],
            'user_request'  => $datos['user_request']
        ]);
        return true;

        
    } catch (PDOException $e) {
        #echo "Ya existe ese email";
        return false;
        
    }   
}//FIN CREATE




public function getSolicitudes(){
    $items = [];
  
    try {
  
     $query = $this->db->connect()->query("SELECT * FROM request_equipment INNER JOIN status_request INNER JOIN users INNER JOIN departaments WHERE status_request.id_statusreques = request_equipment.status_request AND request_equipment.user_request = users.id_user AND users.description_user = departaments.id_dep");
  
        while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
            $items = $row;
        }
        return $items;
        return true;
        
    } catch (PDOException $e) {
  
        return [];
        return false;
        
    }
  }//FIN READ


  
  public function getSolicitudesUser($id){
    
    $items = [];
    $aidi = $id;

    $query = $this->db->connect()->prepare("SELECT * FROM request_equipment INNER JOIN status_request INNER JOIN users INNER JOIN departaments WHERE status_request.id_statusreques = request_equipment.status_request AND request_equipment.user_request = users.id_user AND users.description_user = departaments.id_dep AND users.id_user=:id");

    try {
        $query->execute(
            ['id' => $id]
        );


        while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
            $items = $row;
        }

        return $items;
        return true;
        
    } catch (PDOException $e) {
        return [];
        return false;
    }
}//FIN GetByID.









/***************************************************************
 * 
 *     EQUIPOSSSS
 *
 * ****************************************************************/


public function getEquipmentComputerUser($id){



    
    $items = [];
    $aidi = $id;
  
    $query = $this->db->connect()->prepare("SELECT * FROM equipment_computer as ec INNER JOIN equipment_type as et INNER JOIN status_equipment as se INNER JOIN departaments as dep WHERE ec.type_equipcomp = et.id_equipmenttype AND ec.status_equipcomp = se.id_statusequip AND ec.departament_equipcomp = dep.id_dep AND ec.departament_equipcomp = :id ORDER BY ec.id_equipcomp DESC ");
  
    try {
        $query->execute(
            ['id' => $id]
        );
  
  
        while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
            $items = $row;
        }
  
        return $items;
        return true;
        
    } catch (PDOException $e) {
        return [];
        return false;
    }
}//FIN GetByID. 
  



/*********************************************************************
 * 
 *    ENVIAR EQUIPOS A MANTENIMIENTO
 * 
 ********************************************************************/

public function setMaintenanceEquipment($datos){  

    try {

        $query 
        = $this->db->connect()
        ->prepare('INSERT INTO maintenance_equipment(equip_maintenance,descri_maintenance,depart_maintenance,tecnico_maintenance,date_asignation,progress_maintenance) VALUES (:equip_maintenance,:descri_maintenance,:depart_maintenance,:tecnico_maintenance,:date_asignation,:progress_maintenance)');
                        
        $query->execute([

            'equip_maintenance'     => $datos['equip_maintenance'],
            'descri_maintenance'    => $datos['descri_maintenance'],
            'depart_maintenance'    => $datos['depart_maintenance'],
            'tecnico_maintenance'   => $datos['tecnico_maintenance'],
            'date_asignation'       => $datos['date_asignation'],
            'progress_maintenance'  => $datos['progress_maintenance']
        ]);
        return true;
        
    } catch (PDOException $e) {
        #echo "Ya existe ese email";
        return false;
        
    }   
}//FIN CREATE

// SELECT * FROM maintenance_equipment
// INNER JOIN equipment_computer 
// INNER JOIN equipment_type
// INNER JOIN status_equipment
// INNER JOIN departaments
// WHERE maintenance_equipment.equip_maintenance = equipment_computer.id_equipcomp 
// AND equipment_computer.type_equipcomp = equipment_type.id_equipmenttype 
// AND equipment_computer.status_equipcomp  = status_equipment.id_statusequip
// AND equipment_computer.departament_equipcomp = departaments.id_dep
// AND maintenance_equipment.depart_maintenance = 7;


public function getMaintenanceEquipment($id){
    
    $items = [];
    $aidi = $id;
  
    $query = $this->db->connect()->prepare("SELECT * FROM maintenance_equipment INNER JOIN equipment_computer INNER JOIN equipment_type INNER JOIN status_equipment INNER JOIN departaments WHERE maintenance_equipment.equip_maintenance = equipment_computer.id_equipcomp AND equipment_computer.type_equipcomp = equipment_type.id_equipmenttype AND equipment_computer.status_equipcomp = status_equipment.id_statusequip AND equipment_computer.departament_equipcomp = departaments.id_dep AND maintenance_equipment.depart_maintenance = :id ORDER BY maintenance_equipment.id_maintenance DESC ");
  
    try {
        $query->execute(
            ['id' => $id]
        );
  
  
        while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
            $items = $row;
        }
  
        return $items;
        return true;
        
    } catch (PDOException $e) {
        return [];
        return false;
    }
}//FIN GetByID.






public function updateStatusEquipment($datos){

    $query= $this->db->connect()->prepare("UPDATE equipment_computer SET status_equipcomp = :status_equipcomp WHERE id_equipcomp = :id ");

    try {

      $query->execute([
        'status_equipcomp'     => $datos['status_equipcomp'],
        'id'       => $datos['id']
        
      ]);

      return true;
      
    } catch (PDOException $e) {
      return false;
      
    }
    
    
}//FIN update.
































































}//FIN HOMEMODEL
?>