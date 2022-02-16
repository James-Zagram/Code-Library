<?php
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/administrador.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Administrador($db);

    $item->correo = $_POST["correo"];
    $contraseña_post = $_POST["contraseña"];

    $resultado = $item->get_administrador_login();

    if($resultado != "code_feather"){

      $hash = password_verify($contraseña_post, $item->contraseña);

      if ($hash != null) {

        if(!empty($item->id)){
          session_start();
          $_SESSION['administrador'] = $item->id;
          echo "code_ok";
        }else{
          echo "code_clown";
        }

      }else{
        echo "code_nose";
      }

    }
    else{
      echo "code_feather";
    }
?>
