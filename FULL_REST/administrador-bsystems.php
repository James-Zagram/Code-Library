<?php
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

if(isset($_SESSION['administrador'])){

  if($_SESSION['administrador'] == "null"){
    header('Location: index.html');
  }

}else{
  header('Location: index.html');
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="initial-scale=1.0 , minimum-scale=1.0 , maximum-scale=1.0" />
    <meta charset="utf-8">
    <title>Bsystems: Administrador</title>
    <link rel="icon" href="imagenes/logo/head.svg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" ></script>


    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/datatables.min.js"></script>


    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/b-2.1.1/datatables.min.js"></script> -->


    <link href="css/style.css" rel="stylesheet" type="text/css">

  </head>

  <style>

  .opciones_menu{
    font-size: 1.5rem;
    margin: 0;
    color: white;
    cursor: pointer;
    margin-top: 1rem;
  }
  .opciones_menu:hover{
    color: black;
  }

  .seleccion_menu{
    font-size: 1.7rem;
    text-decoration: underline;
  }

  .titulo_inicio{
    font-size: 1.6rem;
    text-align: center;
  }

  .borde_usuario{
    border-left: 7px solid #2c3f91;
  }

  .nomina_activa{
    border-left: 7px solid #30db58;
  }

  .nomina_pasada{
    border-left: 7px solid #fff45e;
  }


  a {
    font-family: 'tamil sangam';
  }

  .boton_entrar{
    width: 200px;
    background: #2c3f91;
    color: white;
    font-size: 1.4rem;
    border: none;
    height: 50px;
    border-radius: 10px;
    font-weight: bold;
  }

  .boton_entrar:disabled{
    background: #4e5c9b;
  }


  #div_nominas{
    height: 80%;
  }

  #div_pagination{
    height: 10%;
  }

  .boton_descargar{
    width: 200px;
    background: transparent;
    color: #2c3f91;
    font-size: 1.3rem;
    border: 1px solid #2c3f91;
    height: 45px;
    border-radius: 10px;
    font-weight: bold;
  }

  .boton_descargar:hover{
    background: #2c3f91;
    color: white;
  }

  /* DATATABLE STYLE */


  tr{
    height: 65px;
  }
  table.dataTable {
    border-spacing: 0px 1rem;
    font-family: tamil sangam;
    font-size: 1.3rem;
  }
  .odd, .even{
    background-color: white !important;
  }
  .dataTables_wrapper .dataTables_filter input, .dataTables_wrapper .dataTables_length select{
    background: white;
  }
  .dataTables_filter label{
    font-family: tamil sangam;
    font-size: 1.2rem
  }

  .dataTables_length label{
    font-family: tamil sangam;
    font-size: 1.2rem;
  }

  .dataTables_info, .dataTables_paginate{
    font-family: tamil sangam;
    font-size: 1.2rem;
  }
  .div_table{
    padding-right: 3rem;
    padding-left: 3rem;
  }

  .eliminar{
    color:red;
    margin:0;
    cursor: pointer;
    font-weight: bold;
  }

  .eliminar:hover{
    color:#a92929;
  }

  /* .sorting_1{
    background-color: white;
  } */

    @media only screen and (max-width: 992px) {

      .dtr-control:before{
        margin-top: -13px!important;
        background-color: #2c3f91 !important;
      }


    }


    @media only screen and (max-width: 768px) {

      .bordes_nominas{
        border: none !important;
      }

      #div_nominas{
        height: 92%;
      }
      #div_pagination{
        height: 5%;
      }

    }

    @media only screen and (max-width: 576px) {

      .div_table{
        padding-right: 0rem;
        padding-left: 0rem;
      }
    }


  </style>

  <body style="background: #d0dee5;">

    <!-- <div class="container" id="navbar">

    </div> -->

    <div class="container-fluid" style="height: 100vh">
      <div class="row" style="background: #2c3f91; min-height: 10%;">

        <div class="col-9" style="align-self: center;">
          <div class="row">
            <div class="col-lg-4" style="align-self: center;">
              <img src="imagenes/bsystem-logo-blanco.svg" alt="" style="width: 190px; padding-top: 1rem; padding-bottom: 1rem;">
            </div>
            <div class="col-lg-8" style="align-self: center;">
              <!-- <p style="color: #dedede; margin: 0" id="correo_usuario"></p>
              <p style="color: #dedede; margin: 0" id="nombre_usuario"></p> -->
            </div>
          </div>
        </div>

        <div class="col-3" style="align-self: center;text-align: right; padding-right: 3rem;">
          <a href="#" style="width: 100px; place-self: center; color: white; font-size: 1.4rem" id="boton_salir">Salir</a>
        </div>
      </div>

      <div class="row" style="height: 90%">

        <div class="col-md-12" style="">

          <div class="container-fluid" id="div_inicio" style="padding-bottom: 3rem">
            <div class="row" style="justify-content: center; padding-top: 10%">
              <img src="imagenes/bsystem-icono-index.png" alt="" style="width: 300px">
              <p class="titulo_inicio pt-5">Sistema de nómina | <span style="font-weight: bold">Administrador</span></p>
            </div>
            <div class="row" style="justify-content: center; padding-top: 2rem">
              <button type="button" name="button" onclick="cambiar_div(2)" class="boton_entrar">Entrar</button>
            </div>

            <div class="" id="nomina_inicio">

            </div>

          </div>

          <div class="container-fluid g-0 h-100" id="div_nomina" style="display: none">

            <div class="py-5 div_table">

              <table id="div_nominas" class="display responsive">
                <thead>
                    <tr>
                        <th class="">Nombre</th>
                        <th class="min-tablet-p" style="text-align: center;">Correo</th>
                        <th class="min-tablet-l" style="text-align: center;"></th>
                        <th class="min-desktop"></th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody> -->
              </table>

            </div>

          </div>

          <div class="pb-5 div_table" id="div_usuario" style="display: none">

            <div class="row py-5">
              <div class="col-md-12" style=" text-align: right;">
                <button style="color: #0d6efd; font-size: 1.5rem; border: none; background: none;font-family: 'tamil sangam';" class="regresar">← Regresar</button>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p style="font-size: 1.3rem" id="nombre_usuario"></p>
                  <p style="font-size: 1.3rem" id="correo_usuario"></p>
                </div>
              </div>

              <div class="row pb-3" style="border-bottom: 2px solid #b9b9b9">
                <div class="col-md-4">
                  <button type="button" name="button" class="boton_descargar" style="width: auto" id="cambiar_contraseña">Cambiar contraseña</button>
                </div>

                <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Ingrese nueva contraseña" style="visibility: hidden; height: 100%; font-size: 1.2rem; font-family: tamil sangam" id="input_contraseña"></input>
                </div>

                <div class="col-md-2" style="text-align: center;">
                  <button type="button" name="button" class="boton_entrar" style="width: 120px; visibility: hidden;" id="boton_guardar_contraseña">Guardar</button>
                </div>
                <div class="col-md-2" style="text-align: center;">
                  <button type="button" name="button" class="boton_descargar" style="width: 120px; visibility: hidden;" id="boton_cancelar_contraseña">Cancelar</button>
                </div>

              </div>

              <div class="row pt-3" style="">

                <input type="file" name="" value="" style="display: none" id="input_archivo">

                <div class="col-md-4">
                  <select class="form-control" name="" style="height: 100%; font-size: 1.2rem; font-family: tamil sangam" id="select_quincena">
                    <option value="null" disabled selected>Seleccione quincena...</option>
                    <option value="Primera Quincena">Primera Quincena</option>
                    <option value="Segunda Quincena">Segunda Quincena</option>
                  </select>
                </div>

                <div class="col-md-4">
                  <input type="date" name="" value="" class="form-control" style="height: 100%; font-size: 1.2rem; font-family: tamil sangam" id="input_fecha">
                </div>

                <div class="col-md-4" style="display: flex">
                  <button type="button" name="button" class="boton_entrar" id="boton_agregar" style="min-width: 230px; width: auto" disabled>Agregar nomina</button>
                  <p style="margin: 0; align-self: self-end; margin-left: 5px"> Max. 4MB </p>
                  <p style="margin: 0; font-size: 2rem; margin-left: 1rem; visibility: hidden" class="check_archivo">✔</p>
                  <div class="spinner-border text-dark" role="status" style="display: none">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>

              </div>

              <div class="row" style="height: 35px">
                <div class="col-md-8">

                </div>
                <div class="col-md-4" style="align-self: center;">
                  <p style="margin: 0; font-size: 1.2rem; color: red" id="error_subir"></p>
                </div>
              </div>

            </div>

            <table id="tabla_usuario" class="display responsive">
                <thead>
                    <tr>
                        <th class="" style="border-left: none">Quincena</th>
                        <th class="min-tablet-p" style="text-align: center;">Mes</th>
                        <th class="min-tablet-l" style="text-align: center;">Fecha</th>
                        <th class="min-desktop"></th>
                        <th class="min-desktop"></th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                    </tr>
                    <tr>
                        <td>Row 2 Data 1</td>
                        <td>Row 2 Data 2</td>
                    </tr>
                </tbody> -->
            </table>

          </div>

        </div>

      </div>
    </div>


  </body>

  <script>

    var ID_usuario = 0;

    function cambiar_div(numero){
      $(".opciones_menu").removeClass("seleccion_menu");

      if (numero == 1) {
        $("#div_inicio").show();
        $("#div_nomina").hide();

        $("#menu_inicio").addClass("seleccion_menu");

      }
      if (numero == 2) {
        obtener_usuarios();

        $("#div_inicio").hide();
        $("#div_nomina").show();

        $("#menu_nominas").addClass("seleccion_menu");
      }

    }

    var inicio = false;

    function obtener_usuarios(){

      if (inicio == false) {
        $.ajax({
          data:  {"seleccion": 1},
          url:   'REST/api/administrador.php',
          type:  'post',
          success: function(data) {
            var data = data.replace(/(\r\n|\n|\r)/gm, "");

            console.log(data);

            if (data == "code_snake") {
              console.log(data);
              return;
            }
            crear_primer_array(JSON.parse(data));
          }
        });
      }

    }

    var array_nominas = [];

    function crear_primer_array(data){

      var table = $('#div_nominas').DataTable( {
          data: data,
          "order": [[ 1, "desc" ]],
          "orderClasses": false,
          "autoWidth": false,
          "responsive": {
            "breakpoints": [
              { name: 'desktop',  width: Infinity },
              { name: 'tablet-l', width: 992 },
              { name: 'tablet-p', width: 768 },
              { name: 'mobile-l', width: 576 },
              { name: 'mobile-p', width: 480 }
            ]
          },
          // "responsive": true,
          "language": {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
          },
          "columns" : [
             { "data" : "nombre", className: 'borde_usuario'},
             { "data" : "correo" },
             { "targets": -1, "data": null, "defaultContent": "<button class='boton_descargar'>Nomina</button>", "orderable": false, "width": "250px", "text-align": "center" },
         ],
         "createdRow": function( row, data, dataIndex){
            $('th:eq(0)').css('border-left', "none");

            $(row).find('td:eq(0)').css("border-right", "2px solid #dedede").css("padding-left","3rem");
            $(row).find('td:eq(1)').css('text-align', 'center').css("border-right", "2px solid #dedede");
            $(row).find('td:eq(2)').css('text-align', 'center').css("border-right", "2px solid #dedede");

            // if (dataIndex == 0) {
            //   $(row).find('td:eq(0)').addClass('nomina_activa').removeClass("nomina_pasada");
            // }
          }

      });

      $('#div_nominas tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        // console.log(data.ID);
        console.log(data.nombre);
        // window.open(data.ID, '_blank');
        $("#nombre_usuario").text("Usuario: " + data.nombre);
        $("#correo_usuario").text("Correo: " + data.correo);
        ID_usuario = parseInt(data.ID);
        mostrar_nomina(data.ID);
      } );
    }

    var table_usuario;

    function mostrar_nomina(id_usuario){
      $(".check_archivo").css("visibility", "hidden");


      var numero = parseInt(id_usuario)

      $.ajax({
        data:  {"seleccion": 2, "ID_usuario": numero},
        url:   'REST/api/administrador.php',
        type:  'post',
        success: function(data) {
          var data = data.replace(/(\r\n|\n|\r)/gm, "");

          if (data == "code_snake") {
            return;
          }
          crear_usuario(JSON.parse(data));
        }
      });

      $("#div_nomina").hide();
      $("#div_usuario").show();

      function crear_usuario(data){

        data = agregar_mes(data);

        if ( ! $.fn.DataTable.isDataTable( '#tabla_usuario' ) ) {


          table_usuario = $('#tabla_usuario').DataTable( {
              data: data,
              "order": [[ 2, "desc" ]],
              "orderClasses": false,
              "autoWidth": false,
              "responsive": {
                "breakpoints": [
                  { name: 'desktop',  width: Infinity },
                  { name: 'tablet-l', width: 992 },
                  { name: 'tablet-p', width: 768 },
                  { name: 'mobile-l', width: 576 },
                  { name: 'mobile-p', width: 480 }
                ]
              },
              // "responsive": true,
              "language": {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
              },
              "columns" : [
                 { "data" : "quincena", className: 'nomina_pasada'},
                 { "data" : "mes" },
                 { "data" : "fecha" },
                 { "targets": 3, "data": null, "defaultContent": "<p class='eliminar'>Eliminar</p>", "orderable": false },
                 { "targets": -1, "data": null, "defaultContent": "<button class='boton_descargar'>Descargar</button>", "orderable": false, "width": "250px", "text-align": "center" },
             ],
             "createdRow": function( row, data, dataIndex){
                $('th:eq(0)').css('border-left', "none");

                $(row).find('td:eq(0)').css("border-right", "2px solid #dedede").css("padding-left","3rem");
                $(row).find('td:eq(1)').css('text-align', 'center').css("border-right", "2px solid #dedede");
                $(row).find('td:eq(2)').css('text-align', 'center').css("border-right", "2px solid #dedede");
                $(row).find('td:eq(3)').css('text-align', 'center').css("border-right", "2px solid #dedede");
                $(row).find('td:eq(4)').css('text-align', 'center').css("font-size", "1.5rem");

                if (dataIndex == 0) {
                  $(row).find('td:eq(0)').addClass('nomina_activa').removeClass("nomina_pasada");
                }
              }

          });


        }else{
          table_usuario.clear().draw();
          table_usuario.rows.add(data); // Add new data
          table_usuario.columns.adjust().draw(); // Redraw the DataTable
        }

        $('#tabla_usuario tbody').on( 'click', 'p', function () {
          var data = table_usuario.row( $(this).parents('tr') ).data();
          eliminar_nomina(data.ID, table_usuario.row($(this).parents('tr')));
        } );

        $('#tabla_usuario tbody').on( 'click', 'button', function () {
          var data = table_usuario.row( $(this).parents('tr') ).data();
          window.open(data.direccion, '_blank');
        } );

      }

    }

    $("#boton_agregar").click(function () {
      $("#input_archivo").click();
      $("#error_subir").text("");
    });

    $("#select_quincena").change(function () {
      if ($("#input_fecha").val() != "") {
        $("#boton_agregar").prop( "disabled", false );
      }
    });

    $("#input_fecha").change(function () {
      if ($("#select_quincena").val() != null) {
        $("#boton_agregar").prop( "disabled", false );
      }
    });

    $('#input_archivo').change(function(){

      if($('#input_archivo').val() != ""){

        var fd = new FormData();
        var files = $('#input_archivo')[0].files;
        var tamaño = $('#input_archivo')[0].files[0].size;


        if(files.length > 0 ){

          if (tamaño < 4089446.4) {

            $(".spinner-border").show();

            $(".regresar").prop( "disabled", true );
            $("#select_quincena").prop("disabled", true)
            $("#input_fecha").prop("disabled", true)
            $("#boton_agregar").prop( "disabled", true );


            fd.append('file',files[0]);
            fd.append('usuario', ID_usuario);
            fd.append('quincena', $("#select_quincena").val());
            fd.append('fecha', $("#input_fecha").val());

             $.ajax({
              data:  fd, //datos que se envian a traves de ajax
              url:   'REST/api/subir.php', //archivo que recibe la peticion
              type:  'post', //método de envio
              contentType: false,
              processData: false,
               success: function(datos) {
                 var data = data.replace(/(\r\n|\n|\r)/gm, "");

                 if (datos == "code_file") {
                   $("#error_subir").text("Solo archivos .pdf");
                 }
                 if (datos == "code_golem") {
                   $("#error_subir").text("Archivo demasiado grande");
                 }
                 if (datos == "code_snake") {
                   $("#error_subir").text("Ocurrió un error, intente más tarde");
                 }
                 if (datos == "code_ok") {

                   restaurar();

                   $.ajax({
                     data:  {"seleccion": 2, "ID_usuario": ID_usuario},
                     url:   'REST/api/administrador.php',
                     type:  'post',
                     success: function(data) {
                       var data = data.replace(/(\r\n|\n|\r)/gm, "");

                       if (data == "code_snake") {
                         return;
                       }
                       recargar_usuario(JSON.parse(data));
                     }
                   });

                 }

               }
            });

          }else{
            console.log("local");
            $("#error_subir").text("Archivo demasiado grande");
          }

        }else{
          restaurar();
          $("#error_subir").text("Ocurrió un error, intente más tarde");
        }

      }

    });

    function eliminar_nomina(ID_nomina, row){
      if (confirm("Esta acción no se puede deshacer") == true) {

        $.ajax({
          data:  {"seleccion": 3, "ID_nomina": ID_nomina},
          url:   'REST/api/administrador.php',
          type:  'post',
          success: function(data) {
            var data = data.replace(/(\r\n|\n|\r)/gm, "");

            if (data == "code_snake") {
              alert("Ocurrió un error, intente de nuevo más tarde");
            }else{
              row.remove().draw();
              alert("Exito");
            }
          }
        });

      }
    }

    function recargar_usuario(data){

      data = agregar_mes(data);

      table_usuario.clear().draw();
      table_usuario.rows.add(data); // Add new data
      table_usuario.columns.adjust().draw(); // Redraw the DataTable


      $('#tabla_usuario tbody').on( 'click', 'button', function () {
        var data = table_usuario.row( $(this).parents('tr') ).data();
        window.open(data.direccion, '_blank');
      } );
    }

    function restaurar(){
      $(".spinner-border").hide();
      $(".check_archivo").css("visibility", "visible");
      $(".regresar").prop( "disabled", false );
      $('#select_quincena').prop('selectedIndex',0);
      $('#input_fecha').val("");
      $("#boton_agregar").prop( "disabled", true );
      $("#select_quincena").prop("disabled", false)
      $("#input_fecha").prop("disabled", false)

      $("#cambiar_contraseña").prop("disabled", false);
      $("#input_contraseña").val("").css("visibility", "hidden");
      $("#boton_guardar_contraseña").css("visibility", "hidden");
      $("#boton_cancelar_contraseña").css("visibility", "hidden");
    }

    function agregar_mes(data){

      for (var i = 0; i < Object.keys(data).length; i++) {

        mes = data[i].fecha[5] + data[i].fecha[6];

        switch (mes) {
          case "01":
            mes = "Enero";
            break;
          case "02":
            mes = "Febrero";
            break;
          case "03":
            mes = "Marzo";
            break;
          case "04":
            mes = "Abril";
            break;
          case "05":
            mes = "Mayo";
            break;
          case "06":
            mes = "Junio";
            break;
          case "07":
            mes = "Julio";
            break;
          case "08":
            mes = "Agosto";
            break;
          case "09":
            mes = "Septiembre";
            break;
          case "10":
            mes = "Octubre";
            break;
          case "11":
            mes = "Noviembre";
            break;
          case '12':
            mes = "Diciembre";
            break;
        }

        data[i].mes = mes;

      }

      return data;
    }

    $("#cambiar_contraseña").click(function() {
      $("#cambiar_contraseña").prop("disabled", true);
      $("#input_contraseña").val("").css("visibility", "visible");
      $("#boton_guardar_contraseña").css("visibility", "visible");
      $("#boton_cancelar_contraseña").css("visibility", "visible");
    });

    $("#boton_cancelar_contraseña").click(function() {
      $("#cambiar_contraseña").prop("disabled", false);
      $("#input_contraseña").val("").css("visibility", "hidden");
      $("#boton_guardar_contraseña").css("visibility", "hidden");
      $("#boton_cancelar_contraseña").css("visibility", "hidden");
    });

    $("#boton_guardar_contraseña").click(function (){
      var contraseña = $("#input_contraseña").val();

      if (contraseña != "") {

        $.ajax({
          data:  {"seleccion": 4, "contraseña": contraseña, "ID_usuario": ID_usuario},
          url:   'REST/api/administrador.php',
          type:  'post',
          success: function(data) {
            var data = data.replace(/(\r\n|\n|\r)/gm, "");

            if (data == "code_snake") {
              alert("Ocurrió un error, intente de nuevo más tarde");
            }else{
              $("#cambiar_contraseña").prop("disabled", false);
              $("#input_contraseña").val("").css("visibility", "hidden");
              $("#boton_guardar_contraseña").css("visibility", "hidden");
              $("#boton_cancelar_contraseña").css("visibility", "hidden");

              alert("Exito");
            }
          }
        });

      }else{
        alert("Campo de contraseña obligatorio");
      }
    });

    $(".regresar").click(function() {
      $("#div_nomina").show();
      $("#div_usuario").hide();
      restaurar();
    });

    $("#boton_salir").click(function(){

      $.ajax({
        url:   'REST/session/close.php',
        success: function() {
          window.location.href = "login.php";
        }
      });

    });

  </script>


</html>
