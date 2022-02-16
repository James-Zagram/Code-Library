<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/nomina.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Nomina($db);

    $item->ID_usuario = $_SESSION['usuario'];
    // $contraseña_post = $_POST["contraseña"];

    if ($_POST["seleccion"] == 1) {
      $resultado = $item->get_nomina_reciente();

      if ($resultado == "code_dog") {
        // code...
        echo $resultado;
        return;
      }
      if ($resultado == "code_snake") {
        // code...
        echo $resultado;
        return;
      }

      echo json_encode($resultado);
    }
    if ($_POST["seleccion"] == 2) {
      $resultado = $item->get_all_nominas();

      if ($resultado == "code_dog") {
        // code...
        echo $resultado;
        return;
      }
      if ($resultado == "code_snake") {
        // code...
        echo $resultado;
        return;
      }

      echo json_encode($resultado);
      // echo json_decode(json_encode($resultado[0]), true);
    }


?>
