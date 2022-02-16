<?php
    session_start();

    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/administrador.php';
    include_once '../class/usuario.php';
    include_once '../class/nomina.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Administrador($db);
    $item_2 = new Usuarios($db);
    $item_3 = new Nomina($db);

    $item->ID = $_SESSION['administrador'];

    if ($_POST["seleccion"] == 1) {
      $resultado = $item_2->get_usuarios();

      if ($resultado == "code_snake") {
        // code...
        echo $resultado;
        return;
      }

      echo json_encode($resultado);
      return;
    }
    if ($_POST["seleccion"] == 2) {
      $item_3->ID_usuario = $_POST["ID_usuario"];
      $resultado = $item_3->get_all_nominas();

      if ($resultado == "code_snake") {
        echo $resultado;
        return;
      }

      echo json_encode($resultado);
      return;

    }

    if ($_POST["seleccion"] == 3) {
      $item_3->ID_nomina = $_POST["ID_nomina"];
      $item_3->ID_usuario = $_POST["ID_usuario"];
      $resultado = $item_3->borrar_nomina();

      if ($resultado == "code_snake") {
        echo "code_snake";
      }else{
        echo $resultado;
        // echo "code_ok";
      }
    }

    if ($_POST["seleccion"] == 4) {
      $item_2->contrasena = password_hash($_POST["contraseña"],PASSWORD_DEFAULT);
      $resultado = $item_2->cambiar_contraseña();

      if ($resultado == "code_snake") {
        echo "code_snake";
      }else{
        echo "code_ok";
      }
    }

?>
