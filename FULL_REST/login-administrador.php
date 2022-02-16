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
      width: 170px;
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

    <div class="container" style="height: 30vh">
      <div class="row" style="text-align: center; height: 100%; place-content: center;">
        <a href="index.html" class="pt-5" style=""><img class="img-fluid logo_navbar" src="imagenes/bsystem-logo.svg"  style="width: 275px"></a>
        <p style="color: black; font-size: 1.3rem" class="pt-5">Inicio de sesión | <span style="font-weight: bold">Administrador</span></p>
      </div>
    </div>

    <div class="container" style="height: 50vh">

      <div class="row" id="div_formulario" style="height: 100%; place-content: center;">

        <div class="row" style="justify-content: center;align-content: center; height: 15%">
          <div class="col-lg-5 div_input">
            <input type="text" class="form-control" name="" value="" placeholder="Correo electrónico" style="height: 45px ; background: rgb(255,255,255, 0.7); text-align: center;" id="correo">
          </div>
        </div>

        <div class="row" style="justify-content: center;align-content: center; height: 15%">
          <div class="col-lg-5 div_input">
            <input type="password" class="form-control" name="" value="" placeholder="Contraseña" style="height: 45px; background: rgb(255,255,255, 0.7); text-align: center;" id="contraseña">
          </div>
        </div>

        <div class="row" style="text-align: center; height: auto">
          <p style="color: red; font-size: 1.2rem; visibility: hidden; margin: 0" id="error_login">Correo o contraseña invalidos</p>

          <div class="" id="div_verificacion" style="display: none;text-align: -webkit-center;">
            <p style="color: red; font-size: 1.2rem; margin: 0; " id="error_verificacion">Correo no verificado</p>
            <p style="color: #0d6efd; font-size: 1.2rem; margin: 0; text-decoration: underline; cursor: pointer; width: 300px" id="reenviar_enlace">Reenviar enlace de verificación</p>
          </div>
        </div>

        <div class="row" style="justify-content: center;align-content: center; height: 15%">
          <div class="col-md-2 div_boton">
            <button type="button" name="button" class="boton_login" id="boton_login">Entrar</button>
          </div>
        </div>

        <!-- <div class="row" style="justify-content: center; align-content: center; height: 10%">
          <a href="registro.php" style="text-align: center">Registrarse</a>
        </div> -->
      </div>


    </div>

    <style>
    .copyright{
      color: #444444 !important;
      font-size: 0.7rem;
      margin: 0;
    }

    .logo_footer{
      opacity: 0.6;
      width: 40px;
    }

    .columna_footer_1{
      width: 46%;
    }
    .columna_footer_2{
      width: 8%;
    }
    .columna_footer_3{
      width: 46%;
    }

    .copyright_1{
      text-align: right;
    }

    @media only screen and (max-width: 992px) {
      .div_extra{
        display: none;
      }

      .columna_footer_1{
        width: 100%;
      }
      .columna_footer_2{
        width: 100%;
      }
      .columna_footer_3{
        width: 100%;
      }

      .copyright_1, .copyright_2{
        text-align: center;
      }

      .fondo_footer{
        bottom: 10px !important;
      }
    }

    </style>

    <div class="container-fluid fondo_footer" style="height: 20vh;">

      <div class="row h-100">
        <div class="col-md-5 columna_footer_1" style="align-self: center;">
          <p class="copyright copyright_1" style="">Copyright © B-SYSTEMS.</p>
        </div>
        <div class="col-md-2 columna_footer_2" style="text-align: center; align-self: center; padding:0">
          <img src="imagenes/iconos/bsystem-negro.svg" alt="" class="logo_footer">
        </div>
        <div class="col-md-5 columna_footer_3" style="align-self: center;">
          <p class="copyright copyright_2">® Todos los derechos reservados.</p>
        </div>

      </div>

    </div>

  </body>

  <script>
  $(function(){
    $("#footer").load("footer.html");
  });

  $(".boton_login").click(function() {

    var correo = $("#correo").val();
    var contraseña = $("#contraseña").val();

    var temporal = [false, false];

    if(contraseña != ""){
      temporal[0] = true;
    }else{
      $("#error_login").css("visibility", "visible");
    }

    if(correo != ""){
      if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(correo)){
        temporal[1] = true;
      }else{
        $("#error_login").css("visibility", "visible");
      }
    }else{
      $("#error_login").css("visibility", "visible");
    }

    if(temporal.indexOf(false) == -1){

      console.log("entra");

      $.ajax({
        data:  {"correo": correo, "contraseña": contraseña}, //datos que se envian a traves de ajax
        url:   'REST/api/login-administrador.php', //archivo que recibe la peticion
        type:  'post', //método de envio
        success: function(data) {

          var data = data.replace(/(\r\n|\n|\r)/gm, "");

          console.log(data);

          if (data == "code_feather") {
            $("#error_login").css("visibility", "visible");
          }
          if (data == "code_nose") {
            $("#error_login").css("visibility", "visible");
          }
          if (data == "code_clown") {
            $("#error_login").css("visibility", "visible");
          }
          if (data == "code_shoe") {
            $("#div_verificacion").show();
          }
          if (data == "code_ok") {
            window.location.href = "administrador-bsystems.php";
          }


        }
      });

    }

  });


  //quita error al presionar un input
  $("input").click(function() {
    $("#error_login").css("visibility", "hidden");
    $("#div_verificacion").hide();
  });

  </script>


</html>
