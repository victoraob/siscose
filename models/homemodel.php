<?php 

class HomeModel extends Model
{
  
  function __construct()
  {
    parent::__construct();
  }




  public function login($datos){

    $users = [];

    $query 
    = $this->db->connect()
    ->prepare("SELECT * FROM `users` INNER JOIN rols  INNER JOIN departaments WHERE users.rol_user=rols.id_rols AND 
    users.description_user=departaments.id_dep AND email = :user AND password =:pass");

    try {

      $query->execute([
        'user' => $datos['email'],
        'pass'  => $datos['password']

      ]);

      while($row = $query->FETCHALL(PDO::FETCH_ASSOC)) {
        $users = $row;
      }
      
      return $users;
      return true;

    } catch (PDOException $e) {
      return false;     
    }

  }




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







  

  



















































/********** METODO PARA CREAR *************/

  public function create($datos){  

        try {

            $query 
            = $this->db->connect()
            ->prepare('INSERT INTO test(tema,pregunta,estrategia)VALUES (:tema,:pregunta,:estrategia)');
                            
            $query->execute([

                'tema'        => $datos['tema'],
                'pregunta'    => $datos['pregunta'],
                'estrategia'  => $datos['estrategia']
            ]);
            return true;
            
        } catch (PDOException $e) {
            #echo "Ya existe ese email";
            return false;
            
        }   
    }//FIN CREATE



/********** METODO PARA MOSTRAR *************/

    public function read(){
        $items = [];

        try {

         $query = $this->db->connect()->query("SELECT * FROM users");

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

    public function getByID($id){

        $items = [];
        $aidi = $id;

        $query = $this->db->connect()->prepare("SELECT * FROM users WHERE id_user=:id");

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












}//FIN HOMEMODEL


?>