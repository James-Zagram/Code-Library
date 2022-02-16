<?php
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

if(isset($_SESSION['usuario'])){

  if($_SESSION['usuario'] == "null"){
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
    <title>Bsystems</title>
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

  .div_item_nomina{
    background: white;
     box-shadow: 0px 1px 10px 2px #d3d3d3;
     height: 55px;
     border-left: 7px solid black;
  }

  .nomina_activa{
    border-left: 7px solid #30db58;
  }

  .nomina_pasada{
    border-left: 7px solid #fff45e;
  }

  .texto_item_nomina{
    margin: 0;
    font-size: 1.3rem;
    text-align: center;
  }

  .boton_nominas_menu{
    border: none;
    background: none;
    font-family: tamil sangam;
    font-size: 1.2rem;
  }

  a {
    font-family: 'tamil sangam';
  }

  .pag_no_display{
    display: none;
  }
  .pag_display{
    display: block;
  }
  .div_nominas_pagination{
    display: none;
  }

  .page{
    padding: 0.375rem 0.75rem;
    position: relative;
    display: block;
    color: #0d6efd;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #dee2e6;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }

  .pagination_selection{
    background: #858585;
    color: white;
  }

  .page-link:focus{
    background: #858585;
    color: white;
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

  .barra_blanca{
    height: 60px;
    background: white;
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

  /* .sorting_1{
    background-color: white;
  } */

    @media only screen and (max-width: 992px) {

      .barra_blanca_col_1{
        width: 25%;
      }
      .barra_blanca_col_2{
        width: 25%;
      }
      .barra_blanca_col_3{
        width: 25%;
      }
      .barra_blanca_col_4{
        width: 25%;
      }
      .dtr-control:before{
        margin-top: -13px!important;
        background-color: #2c3f91 !important;
      }


    }


    @media only screen and (max-width: 768px) {

      .div_item_nomina{
         height: 175px;
      }

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

      .barra_blanca_col_1{
        width: 50%;
      }
      .barra_blanca_col_2{
        width: 50%;
      }
      .barra_blanca_col_3{
        width: 50%;
      }
      .barra_blanca_col_4{
        width: 50%;
      }
      .barra_blanca{
        height: auto;
      }
      .div_table{
        padding-right: 0rem;
        padding-left: 0rem;
      }
    }


    .color_offcanvas{
      background-color: rgb(46, 72, 149, 0.95) !important;
    }

    .bullet_nosotros {
      width: 150px;
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
              <p style="color: #dedede; margin: 0" id="correo_usuario"></p>
              <p style="color: #dedede; margin: 0" id="nombre_usuario"></p>
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
            <div class="row" style="justify-content: center; padding-top: 3rem">
              <img src="imagenes/bsystem-icono-index.png" alt="" style="width: 300px">
              <p class="titulo_inicio pt-5">Sistema de nómina | <span style="font-weight: bold">Usuario</span></p>
            </div>
            <div class="row" style="justify-content: center; padding-top: 4rem">
              <button type="button" name="button" onclick="cambiar_div(2)" class="boton_entrar">Entrar</button>
            </div>
            <p style="padding-top:2rem">Nomina más reciente</p>

            <div class="" id="nomina_inicio">

            </div>

          </div>

          <div class="container-fluid g-0 h-100" id="div_nomina" style="display: none">

            <div class="py-5 div_table">

              <table id="div_nominas" class="display responsive">
                  <thead>
                      <tr>
                          <th class="">Quincena</th>
                          <th class="min-tablet-p" style="text-align: center;">Mes</th>
                          <th class="min-tablet-l" style="text-align: center;">Fecha</th>
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
    </div>


  </body>

  <script>

    $.ajax({
      url:   'REST/api/usuario.php',
      success: function(data) {
        poner_datos(JSON.parse(data));
      }
    });

    $.ajax({
      data:  {"seleccion": 1},
      url:   'REST/api/nomina.php',
      type:  'post',
      success: function(data) {

        var data = data.replace(/(\r\n|\n|\r)/gm, "");

        if (data == "code_snake") {
          console.log(data);
          return;
        }
        if (data == "code_dog") {
          console.log(data);
          return;
        }
        crear_nomina_inicio(JSON.parse(data));
      }
    });

    function poner_datos(data){
      $("#correo_usuario").text(data[0]);
      $("#nombre_usuario").text(data[1]);
    }

    function crear_nomina_inicio(data){

      mes = data[0][5] + data[0][6];

      switch (mes) {
        case "001":
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
        case "12":
          mes = "Diciembre";
      }

      var nomina = `
      <div class="row div_item_nomina nomina_activa" id="nomina_inicio">

        <div class="col-md-3" style="align-self: center;">
          <p class="texto_item_nomina" style="text-align: center">` + data[2] + `</p>
        </div>
        <div class="col-md-3 bordes_nominas" style="align-self: center;border-left: 2px solid #dedede; ">
          <p class="texto_item_nomina" style="text-align: center;">` + mes + `</p>
        </div>
        <div class="col-md-3 bordes_nominas" style="align-self: center;border-right: 2px solid #dedede;border-left: 2px solid #dedede; ">
          <p class="texto_item_nomina" style="text-align: center;">` + data[0] + `</p>
        </div>
        <div class="col-md-3" style="align-self: center;text-align: center;">
          <a class="texto_item_nomina" href="` + data[1] + `">Descargar</a>
        </div>

      </div>
      `
      $("#nomina_inicio").append(nomina);
    }


    function cambiar_div(numero){
      $(".opciones_menu").removeClass("seleccion_menu");

      if (numero == 1) {
        $("#div_inicio").show();
        $("#div_nomina").hide();

        $("#menu_inicio").addClass("seleccion_menu");

      }
      if (numero == 2) {
        obtener_nominas();

        $("#div_inicio").hide();
        $("#div_nomina").show();

        $("#menu_nominas").addClass("seleccion_menu");
      }

    }

    var inicio = false;

    function obtener_nominas(){

      if (inicio == false) {
        $.ajax({
          data:  {"seleccion": 2},
          url:   'REST/api/nomina.php',
          type:  'post',
          success: function(data) {
            var data = data.replace(/(\r\n|\n|\r)/gm, "");

            if (data == "code_snake") {
              console.log(data);
              return;
            }
            if (data == "code_dog") {
              console.log(data);
              return;
            }


            crear_primer_array(JSON.parse(data));
          }
        });
      }

    }

    // var array_nominas = [];
    //
    function crear_primer_array(data){

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

        // array_nominas.push([data[i].quincena, mes, data[i].fecha, data[i].direccion]);
      }

      console.log(data);

      // border-left: 7px solid black;

      var table = $('#div_nominas').DataTable( {
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
             { "targets": -1, "data": null, "defaultContent": "<button class='boton_descargar'>Descargar</button>", "orderable": false, "width": "250px", "text-align": "center" },
         ],
         "createdRow": function( row, data, dataIndex){
            $('th:eq(0)').css('border-left', "none");

            $(row).find('td:eq(0)').css("border-right", "2px solid #dedede").css("padding-left","3rem");
            $(row).find('td:eq(1)').css('text-align', 'center').css("border-right", "2px solid #dedede");
            $(row).find('td:eq(2)').css('text-align', 'center').css("border-right", "2px solid #dedede");
            $(row).find('td:eq(3)').css('text-align', 'center').css("font-size", "1.5rem");

            if (dataIndex == 0) {
              $(row).find('td:eq(0)').addClass('nomina_activa').removeClass("nomina_pasada");
            }
          }

      });

      $('#div_nominas tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data.direccion);
        window.open(data.direccion, '_blank');
      } );
    }

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
