<?php
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
    $item->verificar = $_POST["verificar"];

    $resultado = $item->verificar();

    echo $resultado;

    //$2y$10$YSl0I.bc3jMP9zJyogIxW.gAtjuZLMZ5EYke7epEKb6TXB8l8f9TS

?>
