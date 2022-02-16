<?php
    class Administrador{
        // Connection
        private $conn;
        // Table
        private $db_table = "administrador";

        // Columns
        public $id;
        public $correo;
        public $contraseña;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        public function get_administrador_login(){
            $sqlQuery = "SELECT ID, correo, contrasena FROM  ". $this->db_table ." WHERE correo = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->correo);

            if ($stmt->execute()) {
              // code...
              $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($dataRow != null) {
                $this->id = $dataRow['ID'];
                $this->correo = $dataRow['correo'];
                $this->contraseña = $dataRow['contrasena'];
              }else{
                return "code_feather";
              }

            }else{
              return "code_snake";
            }
        }

    }
?>
