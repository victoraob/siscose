<?php 

class AdminModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
  }




  

public function getUserWhere($id){
    
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

public function updateUser($datos){

  $query= $this->db->connect()->prepare("UPDATE users SET name = :name, lastname = :lastname,email = :email, password = :password,phone = :phone WHERE id_user = :id");

  try {

    $query->execute([
      'name'     => $datos['name'],
      'lastname' => $datos['lastname'],
      'email'    => $datos['email'],
      'password' => $datos['password'],
      'phone'    => $datos['phone'],
      'id'       => $datos['id']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }
  
  
}//FIN update.




  public function getUsersTools(){
    $items = [];

    try {

     $query = $this->db->connect()->query("SELECT * FROM users INNER JOIN rols INNER JOIN departaments WHERE users.rol_user=rols.id_rols AND users.description_user=departaments.id_dep");

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


public function getTecnicosAvailables(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM users INNER JOIN departaments INNER JOIN rols WHERE users.rol_user = rols.id_rols AND users.description_user = departaments.id_dep AND users.rol_user = 2");

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





public function getTecnicosAvailablesold(){

  $items = [];
  //$aidi = $id;

  $query = $this->db->connect()->prepare("SELECT * FROM users INNER JOIN departaments INNER JOIN rols WHERE users.rol_user = rols.id_rols AND users.description_user = departaments.id_dep AND users.rol_user = 2");

  try {

      // $query->execute(['id' => $id]);


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




public function getSolicitudesTools(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM desk INNER JOIN users INNER JOIN departaments INNER JOIN rols WHERE users.id_user = desk.usuario_desk AND users.rol_user = rols.id_rols AND users.description_user = departaments.id_dep");

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

// <option selected ><?php  echo $this->tecniconame[0]['name']." ".$this->tecniconame[0]['lastname']; </option>



public function getRolsTools(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM rols ");

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





public function getDepartamentsTools(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM departaments WHERE id_dep != 1 AND id_dep !=2;");

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


/************************* registrar *****************************/





public function regisUsers($datos){

  try {

          $query 
          = $this->db->connect()
          ->prepare('INSERT INTO users(name,lastname,email,password,phone,rol_user,description_user)VALUES (:name,:lastname,:email,:password,:phone,:rol,:departament)');


          $query->execute([
            'name'      =>$datos['name'],
            'lastname'    =>$datos['lastname'],
            'email'       =>$datos['email'],
            'password'    =>$datos['password'],
            'phone'   =>$datos['phone'],
            'rol'       =>$datos['rol'],
            'departament'       =>$datos['departament']
          ]);
          return true;
          
      } catch (PDOException $e) {
          #echo "Ya existe esa Matricula";
          return false;
          
      }
}

public function insertDepart($datos){

  try {

          $query 
          = $this->db->connect()
          ->prepare('INSERT INTO departaments(name_dep,description_dep)VALUES (:name,:description)');
          $query->execute([
            'name' => $datos['name'],
            'description' => $datos['description']
          ]);
          return true;
          
      } catch (PDOException $e) {
          #echo "Ya existe esa Matricula";
          return false;
          
      }
}
















/********** METODO PARA EDITAR *************/

public function updateTecnico($datos){

  $query= $this->db->connect()->prepare("UPDATE desk SET tecnico_desk = :td,date_asignation = now() WHERE id_desk = :id ");

  try {

    $query->execute([
      'td' => $datos['tecnico'],
      'id'       => $datos['desk']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }
  
  
}//FIN update.



/********************************************************************************
 *   FUNCIONES PARA EQUIPOS DEL INVENTARIO
****************************************************************************** */



public function saveEquipmentComputer($datos){

  try {

          $query 
          = $this->db->connect()
          ->prepare('INSERT INTO equipment_computer(code_equipcomp,
          model_equipcomp, marca_equipcomp,color_equipcomp,qrcode_equipcomp,type_equipcomp,status_equipcomp,departament_equipcomp)VALUES (:code_equipcomp,
          :model_equipcomp,:marca_equipcomp,:color_equipcomp,:qrcode_equipcomp,:type_equipcomp,:status_equipcomp,:departament_equipcomp)');


          $query->execute([
            'code_equipcomp' =>        $datos["code_equipcomp"],
            'model_equipcomp' =>       $datos["model_equipcomp"],
            'marca_equipcomp' =>       $datos["marca_equipcomp"],
            'color_equipcomp' =>       $datos["color_equipcomp"],
            'qrcode_equipcomp' =>      $datos["qrcode_equipcomp"],
            'type_equipcomp' =>        $datos["type_equipcomp"],
            'status_equipcomp' =>      $datos["status_equipcomp"],
            'departament_equipcomp' => $datos["departament_equipcomp"]
          ]);


          return true;
          
      } catch (PDOException $e) { return false; }
}



public function saveEquipmentType($datos){

  try {

          $query 
          = $this->db->connect()
          ->prepare('INSERT INTO equipment_type(name_equipmenttype)VALUES (:name_equipmenttype)');
          $query->execute([
            'name_equipmenttype' => $datos['name_equipmenttype']
          ]);
          return true;
          
      } catch (PDOException $e) {
          #echo "Ya existe esa Matricula";
          return false;
          
      }
}



public function getEquipmentType(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM equipment_type");

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



public function getEquipmentComputer(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM `equipment_computer` as ec INNER JOIN equipment_type as et INNER JOIN status_equipment as se INNER JOIN departaments as dep WHERE ec.type_equipcomp = et.id_equipmenttype AND ec.status_equipcomp = se.id_statusequip AND ec.departament_equipcomp = dep.id_dep");

      while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
          $items = $row;
      }
      return $items;
      return true;
      
  } catch (PDOException $e) {

      return [];
      return false;
      
  }
}//FIN READ  ;


public function getEquipmentComputerWhere($id){
    
  $items = [];
  $aidi = $id;

  $query = $this->db->connect()->prepare("SELECT * FROM `equipment_computer` as ec INNER JOIN equipment_type as et INNER JOIN status_equipment as se INNER JOIN departaments as dep WHERE ec.type_equipcomp = et.id_equipmenttype AND ec.status_equipcomp = se.id_statusequip AND ec.departament_equipcomp = dep.id_dep AND ec.id_equipcomp = :id");

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



public function getEquipmentComputerWhereCode($code){
    
  $items = [];

  $query = $this->db->connect()->prepare("SELECT * FROM `equipment_computer` as ec INNER JOIN equipment_type as et INNER JOIN status_equipment as se INNER JOIN departaments as dep WHERE ec.type_equipcomp = et.id_equipmenttype AND ec.status_equipcomp = se.id_statusequip AND ec.departament_equipcomp = dep.id_dep AND ec.code_equipcomp  = :code");

  try {
      $query->execute(
          ['code' => $code]
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


public function getStatusEquipment(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM status_equipment");

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



public function getDepartaments(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM departaments WHERE id_dep !=1 AND id_dep !=2");

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


public function saveDepartamentEquipcomp($datos){

    $query= $this->db->connect()->prepare("UPDATE equipment_computer SET departament_equipcomp = :dep WHERE id_equipcomp = :id ");

    try {

      $query->execute([
        'dep'     => $datos['dep'],
        'id'       => $datos['id']
        
      ]);

      return true;
      
    } catch (PDOException $e) {
      return false;
      
    }
    
    
}








/********************************************************************************
 *   FUNCIONES PARA SOLICITUDES DE EQUIPOS
****************************************************************************** */



public function getSolicitudesPending(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT COUNT(request_equipment.id_request) FROM request_equipment INNER JOIN status_request INNER JOIN users INNER JOIN departaments WHERE status_request.id_statusreques = request_equipment.status_request AND request_equipment.user_request = users.id_user AND users.description_user = departaments.id_dep AND request_equipment.status_request =1");

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


public function getSolicitudes(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM request_equipment  INNER JOIN status_request INNER JOIN users INNER JOIN departaments WHERE status_request.id_statusreques = request_equipment.status_request AND request_equipment.user_request = users.id_user AND users.description_user = departaments.id_dep ORDER BY request_equipment.id_request DESC");

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


public function getSolicitudesUsesssr($id){
    
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


public function getStatusRequest(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM status_request");

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


public function updateStatusRequest($datos){

  $query= $this->db->connect()->prepare("UPDATE request_equipment SET status_request = :statusreques WHERE id_request = :id");

  try {

    $query->execute([
      'statusreques' => $datos['statusreques'],
      'id' => $datos['id']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }
  
  
}//FIN update.






/**************************************************************************
 * 
 * 
 *     MANTENIMIENTO
 * 
 *
 ****************************************************************************/


public function getMaintenanceEquipment(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM maintenance_equipment INNER JOIN equipment_computer INNER JOIN equipment_type INNER JOIN status_equipment INNER JOIN departaments WHERE maintenance_equipment.equip_maintenance = equipment_computer.id_equipcomp AND equipment_computer.type_equipcomp = equipment_type.id_equipmenttype AND equipment_computer.status_equipcomp = status_equipment.id_statusequip AND equipment_computer.departament_equipcomp = departaments.id_dep  ORDER BY maintenance_equipment.id_maintenance DESC ");

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



public function getTechAll(){
  $items = [];

  try {

   $query = $this->db->connect()->query("SELECT * FROM users INNER JOIN rols INNER JOIN departaments WHERE users.rol_user=rols.id_rols AND users.description_user=departaments.id_dep AND users.rol_user = 2");

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


public function updateTecnicoMaint($datos){

  $query= $this->db->connect()->prepare("UPDATE maintenance_equipment SET tecnico_maintenance = :tecnico, date_asignation = NOW()  WHERE id_maintenance = :id_mant");

  try {

    $query->execute([
      'id_mant' => $datos['id_mant'],
      'tecnico' => $datos['tecnico']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }
  
  
}//FIN update.


public function getTechData($id){
    
  $items = [];
  $aidi = $id;

  $query = $this->db->connect()->prepare("SELECT * FROM maintenance_equipment INNER JOIN users WHERE users.id_user=maintenance_equipment.tecnico_maintenance AND maintenance_equipment.id_maintenance  = :id");

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


public function getEquipMainData($id){
    
  $items = [];
  $aidi = $id;

  $query = $this->db->connect()->prepare("SELECT * FROM maintenance_equipment INNER JOIN equipment_computer INNER JOIN equipment_type INNER JOIN status_equipment INNER JOIN departaments WHERE maintenance_equipment.equip_maintenance = equipment_computer.id_equipcomp AND equipment_computer.type_equipcomp = equipment_type.id_equipmenttype AND equipment_computer.status_equipcomp = status_equipment.id_statusequip AND equipment_computer.departament_equipcomp = departaments.id_dep AND maintenance_equipment.id_maintenance  = :id  ORDER BY maintenance_equipment.id_maintenance DESC ");

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







public function updateEquip($datos){

  $query= $this->db->connect()->prepare("UPDATE equipment_computer SET code_equipcomp=:code_equipcomp, model_equipcomp=:model_equipcomp, marca_equipcomp=:marca_equipcomp, color_equipcomp=:color_equipcomp, type_equipcomp=:type_equipcomp  WHERE id_equipcomp = :id ");

  try {

    $query->execute([
      'code_equipcomp' => $datos["code_equipcomp"],
      'model_equipcomp' => $datos["model_equipcomp"],
      'marca_equipcomp' => $datos["marca_equipcomp"],
      'color_equipcomp' => $datos["color_equipcomp"],
      'type_equipcomp' => $datos["type_equipcomp"],
      'id'    => $datos['id']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }
  
  
}




public function updateDepart($datos){

  
  $query= $this->db->connect()->prepare("UPDATE departaments SET name_dep=:name_dep, description_dep=:description_dep WHERE id_dep = :id ");

  try {

    $query->execute([
      'name_dep' => $datos["name"],
      'description_dep' => $datos["description"],
      'id'    => $datos['id']
      
    ]);

    return true;
    
  } catch (PDOException $e) {
    return false;
    
  }

}











public function getConsult($desde,$hasta){

  $items = [];
  
   $query = $this->db->connect()->query("SELECT * FROM `equipment_computer` as ec INNER JOIN equipment_type as et INNER JOIN status_equipment as se INNER JOIN departaments as dep WHERE ec.type_equipcomp = et.id_equipmenttype AND ec.status_equipcomp = se.id_statusequip AND ec.departament_equipcomp = dep.id_dep AND ec.create_equipcomp BETWEEN '$desde' and '$hasta' ORDER BY id_equipcomp DESC;");
 
  try {

      while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
          $items = $row;
      }

      return $items;
      return true;
      
  } catch (PDOException $e) {
      return [];
      return false;
  }



}














































}
?>