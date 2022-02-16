
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

    <!-- <div class="container" id="navbar">

    </div> -->

    <div class="container">
      <div class="row pt-4">
      </div>
    </div>

    <div class="container pt-5">
      <div class="row" style="text-align: center">
        <a href="index.html" class="" style=""><img class="img-fluid logo_navbar" src="imagenes/bsystem-logo.svg"  style="width: 215px"></a>
        <p style="color: black; font-size: 1.6rem" class="pt-5">Verificación de correo</p>
      </div>

      <div class="row pt-5" id="div_resultados">
        <p id="texto_mostrar" style="text-align: center; font-size: 2rem" ></p>
        <p id="texto_redireccionar" style="visibility: hidden; text-align: center; font-size: 2rem">Será redireccionado</p>
      </div>
    </div>





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

  </body>

  <script>
  $(function(){
    $("#footer").load("footer.html");
  });

  // verificacion.php?JzTsJ=corporativo@bsystems.com.mx&qgEgh=$2y$10$YSl0I.bc3jMP9zJyogIxW.gAtjuZLMZ5EYke7epEKb6TXB8l8f9TS

  var url = new URL(window.location.href);
  var correo = url.searchParams.get("JzTsJ");
  var hash = url.searchParams.get("qgEgh");
  // console.log(correo, hash);

  if (correo == null || hash == null) {
    window.location = "login.php";
  }

  $.ajax({
    data:  {"correo": correo, "verificar": hash}, //datos que se envian a traves de ajax
    url:   'REST/api/verificar.php', //archivo que recibe la peticion
    type:  'post', //método de envio
    success: function(data) {

      var data = data.replace(/(\r\n|\n|\r)/gm, "");

      if (data == "code_snake" || data == "code_feather"  || data == "code_enter") {
        $("#texto_mostrar").text("Ocurrió un error, intente de nuevo más tarde");
      }
      if (data == "code_boot") {
        $("#texto_mostrar").text("Este correo ya se encuentra verificado");
        $("#texto_redireccionar").css("visibility", "visible");

        //agregar redireccionado
      }
      if (data == "code_cat") {
        $("#texto_mostrar").text("Enlace de verificación expirado, inicie sesión para generar uno nuevo");

      }
      if (data == "code_ok") {
        $("#texto_mostrar").text("Verificación de correo exitosa");
        $("#texto_redireccionar").css("visibility", "visible");;

        window.setTimeout(function(){ window.location.href = "login.php";}, 3000);
      }

    }
  });


  //quita error al presionar un input
  $("input").click(function() {
    $("#error_login").css("visibility", "hidden");
  });

  </script>


</html>
