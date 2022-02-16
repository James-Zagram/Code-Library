<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/usuario.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Usuarios($db);

    // $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->correo = $_POST["correo"];
    $contraseña_post = $_POST["contraseña"];

    $resultado = $item->get_usuario_login();

    if($resultado != "code_feather"){

      $hash = password_verify($contraseña_post, $item->contraseña);

      if ($hash != null) {

        if(!empty($item->id)){

          if ($item->verificado == 1) {
            $_SESSION['usuario'] = $item->id;
            echo "code_ok";
          }else{
            echo "code_shoe";
          }

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
