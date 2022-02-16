<?php
    class Usuarios{

        // Connection
        private $conn;

        // Table
        private $db_table = "usuarios";

        // Columns
        public $id;
        public $nombre;
        public $correo;
        public $contraseña;
        public $verificado;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function get_usuarios(){
          $sqlQuery = "SELECT ID, nombre, correo FROM " . $this->db_table . " WHERE verificado = 1 ORDER BY correo DESC";
          $stmt = $this->conn->prepare($sqlQuery);

          if ($stmt->execute()) {
            $dataRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
          }else{
            return "code_snake";
          }


          return $dataRow;
        }

        public function get_nombre(){
          $sqlQuery = "SELECT nombre, correo FROM  ". $this->db_table ." WHERE ID = ". $this->ID ."";

          $stmt = $this->conn->prepare($sqlQuery);

          if ($stmt->execute()) {
            // code...
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dataRow != null) {
              $this->nombre = $dataRow['nombre'];
              $this->correo = $dataRow['correo'];

              return array($this->nombre, $this->correo);
            }else{
              return "code_feather";
            }

          }else{
            return "code_snake";
          }
        }

        public function get_usuario_login(){
            $sqlQuery = "SELECT ID, nombre, correo, contrasena, verificado FROM  ". $this->db_table ." WHERE correo = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->correo);



            if ($stmt->execute()) {
              // code...
              $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($dataRow != null) {
                $this->id = $dataRow['ID'];
                $this->nombre = $dataRow['nombre'];
                $this->correo = $dataRow['correo'];
                $this->contraseña = $dataRow['contrasena'];
                $this->verificado = $dataRow['verificado'];
              }else{
                return "code_feather";
              }

            }else{
              return "code_snake";
            }



        }

        public function registro_usuario(){

            $sqlQuery = "INSERT INTO ".$this->db_table." SET ID = NULL, nombre = :nombre, correo = :correo, contrasena = :contrasena, verificado = :verificado";

            $stmt = $this->conn->prepare($sqlQuery);

            // sanitize
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->correo=htmlspecialchars(strip_tags($this->correo));
            $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
            $this->verificado=htmlspecialchars(strip_tags($this->verificado));

            if (!strstr($this->correo, '@bsystems.com.mx')) {
              return "code_fake";
            }

            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":correo", $this->correo);
            $stmt->bindParam(":contrasena", $this->contrasena);
            $stmt->bindParam(":verificado", $this->verificado);

            if($stmt->execute()){
               return "code_ok";
            }else{
              $ahora =  $stmt->errorCode();

              if ($ahora == "23000") {
                return "code_cell";
              }else{
                // $ahora =  $stmt->errorInfo();
                // return $ahora[2];
                return "code_enter";
              }


            }

        }

        public function reenvio_usuario(){
          $sqlQuery = "SELECT correo, verificado FROM ". $this->db_table ." WHERE correo = ?";

          $stmt = $this->conn->prepare($sqlQuery);

          $stmt->bindParam(1, $this->correo);

          if($stmt->execute()){
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dataRow != null) {

              $this->correo = $dataRow['correo'];
              $this->verificado = $dataRow['verificado'];
              // echo $this->correo;

              if ($this->verificado == 1) {
                return "code_boot";
              }else{
                return "code_ok";
              }
              // return $this->correo;

            }else{
              return "code_feather";
            }
          }else{
            return "code_snake";
          }
        }

        // READ single
        public function verificar(){
            $sqlQuery = "SELECT correo, verificado FROM ". $this->db_table ." WHERE correo = ?";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->correo);

            if($stmt->execute()){
              $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

              if ($dataRow != null) {

                $this->correo = $dataRow['correo'];
                $this->verificado = $dataRow['verificado'];

                // echo $this->correo;

                if ($this->verificado == 1) {
                  return "code_boot";
                }else{
                  if ($this->verificado == $this->verificar) {

                    $sqlQuery = "UPDATE ". $this->db_table ." SET verificado = 1 WHERE correo = '". $this->correo ."'";
                    $stmt = $this->conn->prepare($sqlQuery);

                    if($stmt->execute()){
                      return "code_ok";
                    }else{
                      // $ahora =  $stmt->errorInfo();
                      // return $ahora[2];
                      return "code_enter";
                    }

                  }else{
                    return "code_cat";
                  }
                }
                // return $this->correo;

              }else{
                return "code_feather";
              }
            }else{
              return "code_snake";
            }
        }

        public function cambiar_contraseña(){
            $sqlQuery = "UPDATE ". $this->db_table ." SET contrasena = :contrasena WHERE ID = :ID_usuario";

            $stmt = $this->conn->prepare($sqlQuery);

            // $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
            // $this->ID_usuario=htmlspecialchars(strip_tags($this->ID_usuario));

            // bind data
            $stmt->bindParam(":contrasena", $this->contrasena);
            $stmt->bindParam(":ID_usuario", $this->ID_usuario);

            if($stmt->execute()){
               return "code_ok";
            }else {
              return "code_snake";
            }
        }



    }
?>
