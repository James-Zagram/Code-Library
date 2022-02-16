<?php

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

    $ID_usuario = $_POST["usuario"];
    $fecha = $_POST["fecha"];
    $quincena = $_POST["quincena"];

    if(isset($_FILES['file']['name'])){

       $filename = $_FILES['file']['name'];
       $tamaño = $_FILES['file']['size'];

       function crear_nombre(){
         $nombre = uniqid().".pdf";

         if(file_exists("../../documentos/".$nombre)){
            crear_nombre();
         }else{
           return $nombre;
         }

       }

       $nombre_final = crear_nombre();

       $location = "../../documentos/".$nombre_final;
       $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
       $imageFileType = strtolower($imageFileType);

       $valid_extensions = array("pdf");

       if(in_array(strtolower($imageFileType), $valid_extensions)) {

         if($tamaño < 4089446.4){
           if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
             $item->ID_usuario = $ID_usuario;
             $item->fecha = $fecha;
             $item->quincena = $quincena;
             $item->direccion = "documentos/".$nombre_final;;

             $resultado = $item->insertar_nomina();

             if ($resultado == "code_snake") {
               echo "code_snake";
             }else{
               echo "code_ok";
             }
           }else {
             echo "code_snake";
           }
         }else {
           echo "code_golem";
         }
       }else{
         echo "code_file";
       }
    }

 ?>
