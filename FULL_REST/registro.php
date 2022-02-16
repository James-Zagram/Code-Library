<?php
session_start();
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

    <link href="css/style.css" rel="stylesheet" type="text/css">

  </head>

  <style>

    .boton_login{
      width: 100%;
      background: #2c3f91;
      color: white;
      font-size: 1.4rem;
      border: none;
      height: 50px;
      border-radius: 10px;
      font-weight: bold;
    }

    .div_input{
      width: 451px
    }

    .div_boton{
      width: 240px;
    }


    @media only screen and (max-width: 992px) {

    }


    @media only screen and (max-width: 768px) {

    }

    @media only screen and (max-width: 576px) {
      .div_input{
        width: 100%
      }

      .div_boton{
        width: 100%
      }
    }

  </style>

  <body style="background: #d0dee5; overflow-x: hidden">

    <!-- <div class="container" id="navbar">

    </div> -->

    <div class="container">
      <div class="row pt-4">
      </div>
    </div>

    <div class="container pt-5" >
      <div class="row" style="text-align: center">
        <a href="index.html" class="" style=""><img class="img-fluid logo_navbar" src="imagenes/bsystem-logo.svg"  style="width: 215px"></a>
        <p style="color: black; font-size: 1.6rem" class="pt-5">Registro</p>
      </div>

      <div class="" id="div_formulario">
        <div class="row pt-5" style="justify-content: center">
          <div class="col-lg-5 div_input">
            <input type="text" class="form-control" name="" value="" placeholder="Nombre completo" style="height: 45px ; background: rgb(255,255,255, 0.7)" id="nombre">
          </div>
        </div>

        <div class="row pt-5" style="justify-content: center">
          <div class="col-lg-5 div_input">
            <input type="text" class="form-control" name="" value="" placeholder="Correo electrónico" style="height: 45px ; background: rgb(255,255,255, 0.7)" id="correo">
          </div>
        </div>

        <div class="row pt-3" style="justify-content: center">
          <div class="col-lg-5 div_input">
            <input type="password" class="form-control" name="" value="" placeholder="Contraseña" style="height: 45px; background: rgb(255,255,255, 0.7)" id="contraseña">
          </div>
        </div>

        <div class="row pt-3" style="text-align: center;">
          <p style="color: red; font-size: 1.2rem; visibility: hidden; margin: 0" id="error_correo">Correo invalido</p>
          <p style="color: red; font-size: 1.2rem; display: none; margin: 0" id="correo_bsystems">Solo correos @bsystems.com</p>
          <p style="color: red; font-size: 1.2rem; display: none; margin: 0" id="error_campos">Llene todos los campos</p>
          <p style="color: red; font-size: 1.2rem; display: none; margin: 0" id="error_duplicado">Correo ya registrado</p>
          <p style="color: red; font-size: 1.2rem; display: none; margin: 0" id="error_general">Error. Intente de nuevo más tarde</p>
        </div>

        <div class="row pt-3" style="justify-content: center">
          <div class="col-md-2 div_boton">
            <button type="button" name="button" class="boton_login" id="boton_registro">Registrarse</button>
          </div>
        </div>

        <div class="row pt-3" style="justify-content: center">
          <a href="login.php" style="text-align: center">Iniciar Sesión</a>
        </div>
      </div>

      <div class="" id="div_gracias" style="display: none">
        <p style="text-align: center;font-size: 2rem; padding-top: 2rem;">Gracias por registrarse</p>
        <p style="text-align: center;font-size: 2rem; padding-top: 2rem;">será redirecionado</p>
      </div>


    </div>

    <!-- Qt#uN%fp*9&O -->





    <style>
    .copyright{
      color: #444444 !important;
      font-size: 0.8rem;
      margin: 0;
    }

    .logo_footer{
      opacity: 0.6;
      width: 65px;
    }

    </style>

    <div class="container-fluid fondo_footer" style="height: 100%; margin-top: 2%">

      <div class="row" style="min-height: 180px;">

        <div class="" style="display: flex; justify-content: center">
          <img src="imagenes/iconos/bsystem-negro.svg" alt="" class="logo_footer me-3">
          <div class=" div_texto_footer" style="align-self: center;">
            <p class="copyright">Copyright © B-SYSTEMS.</p>
            <p class="copyright">® Todos los derechos reservados.</p>
          </div>

        </div>

            <div class="col-6 div_logo_footer" style="align-self: center; text-align:right; width: 46%;">
            </div>


      </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="justify-content: center;">
          <div class="spinner-border text-light" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
      </div>
    </div>

  </body>

  <script>
  $(function(){
    $("#footer").load("footer.html");
  });

  $("#boton_registro").click(function() {

    // if($("#contenedor_spinner").is(":visible")){
    //   console.log("activado");
    //   return;
    // }
    //
    // $("#boton_enviar_modal").hide();
    // $("#contenedor_spinner").show();

    // $("#correo").prop('disabled', true);
    // $("#contraseña").prop('disabled', true);

    var nombre = $("#nombre").val();
    var correo = $("#correo").val();
    var contraseña = $("#contraseña").val();

    var temporal = [false, false, false];

    if(nombre != ""){
      temporal[0] = true;
    }else{
      $("#error_campos").show();
    }

    if(contraseña != ""){
      temporal[1] = true;
    }else{
      $("#error_campos").show();
    }

    if(correo != ""){
      if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(correo)){
        if (correo.includes("@bsystems.com.mx")) {
          temporal[2] = true;
        }else{
          $("#correo_bsystems").show();
        }
      }else{
        $("#error_correo").css("visibility", "visible");
      }
    }else{
      $("#error_campos").show();
    }

    if(temporal.indexOf(false) == -1){

      $("#exampleModal").modal("show");

      $.ajax({
        data:  {"nombre": nombre, "correo": correo, "contraseña": contraseña}, //datos que se envian a traves de ajax
        url:   'REST/api/registro.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success: function(data) {


          setTimeout(function(){ $("#exampleModal").modal("hide"); }, 1000);

          var data = data.replace(/(\r\n|\n|\r)/gm, "");

          if (data == "code_cell") {
            $("#error_duplicado").show();
          }
          if (data == "code_enter" || data == "code_fake") {
            $("#error_general").show();
          }
          if (data == "code_ok") {
            setTimeout(function(){
              $("#div_formulario").hide();
              $("#div_gracias").show();
          }, 500);

            window.setTimeout(function(){ window.location.href = "login.php";}, 3000);

          }


        }
      });

    }

  });

  //quita error al presionar un input
  $("input").click(function() {
    $("#error_campos").hide();
  });

  $("#correo").click(function() {
    $("#correo_bsystems").hide();
    $("#error_duplicado").hide();
    $("#error_general").hide();
    $("#error_correo").css("visibility", "hidden");
  });

  </script>


</html>
