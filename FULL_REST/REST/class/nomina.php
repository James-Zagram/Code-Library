<?php
    class Nomina{

        // Connection
        private $conn;

        // Table
        private $db_table = "nominas";

        // Columns
        public $id;
        public $name;
        public $email;
        public $age;
        public $designation;
        public $created;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function get_all_nominas(){
            $sqlQuery = "SELECT ID, quincena, fecha, direccion FROM " . $this->db_table . " WHERE ID_usuario = ".$this->ID_usuario." ORDER BY fecha DESC";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();

            if ($stmt->execute()) {
              $dataRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
              return $dataRow;
            }else {
              return "code_snake";
            }

        }

        // CREATE
        public function get_nomina_reciente(){
          $sqlQuery = "SELECT ID, quincena, fecha, direccion FROM ". $this->db_table ." WHERE ID_usuario = ? ORDER BY fecha DESC";

          $stmt = $this->conn->prepare($sqlQuery);

          $stmt->bindParam(1, $this->ID_usuario);

          if($stmt->execute()){
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dataRow != null) {

              // $this->ID = $dataRow['ID'];
              $this->quincena = $dataRow['quincena'];
              $this->fecha = $dataRow['fecha'];
              $this->direccion = $dataRow['direccion'];

              return array($this->fecha, $this->direccion, $this->quincena);
            }else{
              return "code_dog";
            }
          }else{
            // $ahora =  $stmt->errorInfo();
            // return $ahora[2];
            return "code_snake";
          }
        }

        public function insertar_nomina(){

            $sqlQuery = "INSERT INTO ".$this->db_table." SET ID = NULL, ID_usuario = :ID_usuario, quincena = :quincena, fecha = :fecha, direccion = :direccion";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->ID_usuario=htmlspecialchars(strip_tags($this->ID_usuario));
            $this->quincena=htmlspecialchars(strip_tags($this->quincena));
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->direccion=htmlspecialchars(strip_tags($this->direccion));


            // bind data
            $stmt->bindParam(":ID_usuario", $this->ID_usuario);
            $stmt->bindParam(":quincena", $this->quincena);
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":direccion", $this->direccion);

            if($stmt->execute()){
               return "code_ok";
            }else{
              // $ahora =  $stmt->errorCode();
              //
              // return $ahora;

              return "code_snake";
            }

        }

        // DELETE
        function borrar_nomina(){
          $sqlQuery = "SELECT direccion FROM ". $this->db_table ." WHERE ID = ?";
          $stmt = $this->conn->prepare($sqlQuery);

          $stmt->bindParam(1, $this->ID_nomina);

          if($stmt->execute()){
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dataRow != null) {

              $this->direccion = $dataRow['direccion'];

              $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE ID = ?";
              $stmt = $this->conn->prepare($sqlQuery);

              $this->ID_nomina=htmlspecialchars(strip_tags($this->ID_nomina));

              $stmt->bindParam(1, $this->ID_nomina);

              if($stmt->execute()){

                if (unlink("../../".$this->direccion)) {
                  return "code_ok";
                }
                else {
                  return "code_snake";
                }

              }else{
                return "code_snake";
              }

            }else{
              return "code_snake";
            }
          }else{
            // $ahora =  $stmt->errorInfo();
            // return $ahora[2];
            return "code_snake";
          }


        }

    }
?>
