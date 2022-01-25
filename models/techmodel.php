
<?php 

class TechModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
  }



  
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


  
public function getAsignOLD(){
    $items = [];
  
    try {
  
     $query = $this->db->connect()->query("SELECT * FROM desk INNER JOIN users INNER JOIN departaments INNER JOIN rols WHERE users.id_user = desk.usuario_desk AND users.rol_user = rols.id_rols AND users.description_user = departaments.id_dep AND tecnico_desk = ");
  
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


public function getAsign($id){
    
    $items = [];
    $aidi = $id;
  
    $query = $this->db->connect()->prepare("SELECT * FROM maintenance_equipment INNER JOIN equipment_computer INNER JOIN equipment_type INNER JOIN status_equipment INNER JOIN departaments WHERE maintenance_equipment.equip_maintenance = equipment_computer.id_equipcomp AND equipment_computer.type_equipcomp = equipment_type.id_equipmenttype AND equipment_computer.status_equipcomp = status_equipment.id_statusequip AND equipment_computer.departament_equipcomp = departaments.id_dep AND maintenance_equipment.tecnico_maintenance = :id  ORDER BY maintenance_equipment.id_maintenance DESC");
  
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


public function updateProgress($datos){

    $query= $this->db->connect()->prepare("UPDATE maintenance_equipment SET progress_maintenance  = :progress_maintenance WHERE id_maintenance = :maintenance ");
  
    try {
  
      $query->execute([
        'progress_maintenance' => $datos['progress_maintenance'],
        'maintenance' => $datos['maintenance']
        
      ]);
  
      return true;
      
    } catch (PDOException $e) {
      return false;
      
    }
    
    
}//FIN update.



public function deadEquipment($e){

    $query= $this->db->connect()->prepare("UPDATE equipment_computer SET status_equipcomp = 2 WHERE id_equipcomp = :id_equipcomp ");
  
    try {
  
      $query->execute([
        'id_equipcomp' => $e
      ]);
  
      return true;
      
    } catch (PDOException $e) {
      return false;
      
    }
    
    
}//FIN update.




}//FIN HOMEMODEL
?>