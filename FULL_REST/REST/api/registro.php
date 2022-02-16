<?php
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/usuario.php';
    // include_once '../../enviar_correo/registro.php'

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../enviar_correo/PHPMailer/src/Exception.php';
    require '../../enviar_correo/PHPMailer/src/PHPMailer.php';
    require '../../enviar_correo/PHPMailer/src/SMTP.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Usuarios($db);

    // $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->nombre = $_POST["nombre"];
    $item->correo = $_POST["correo"];
    $item->contrasena = password_hash($_POST["contraseña"],PASSWORD_DEFAULT);
    $item->verificado = password_hash($_POST["correo"],PASSWORD_DEFAULT);

    $resultado = $item->registro_usuario();

    if ($resultado == "code_ok") {


      //Load Composer's autoloader
      // require 'vendor/autoload.php';

      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true);

      $nombre = $item->nombre;
      $correo = $item->correo;
      $hash = $item->verificado;

        $cuerpo_correo = '

        Gracias por registrarse <br><br>

        Nombre: '.$nombre.'<br>
        Correo: '.$correo.'<br><br>
        Para poder utilizar la plataforma es necesario que active su cuenta mediante el siguente enlace. <br><br>

        <a href="https://www.bsystems.com.mx/verificacion.php?JzTsJ='.$correo.'&qgEgh='.$hash.'">Activar cuenta</a>

        ';


        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.bsystems.com.mx';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'noreply@bsystems.com.mx';                     //SMTP username
            $mail->Password   = 'Qt#uN%fp*9&O';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom('noreply@bsystems.com.mx', 'Verificación de correo');
            $mail->addAddress($correo);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verificación de correo Bsystems';
            $mail->Body    = $cuerpo_correo;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            echo "code_ok";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
    if ($resultado == "code_cell") {
      echo $resultado;
    }
    if ($resultado == "code_enter") {
      echo $resultado;
    }

    // if($item->correo != null){
    //
    //   $verificado = password_verify($contraseña_post, $item->contraseña);
    //
    //   if ($verificado != null) {
    //
    //     if(!empty($item->id)){
    //       session_start();
    //       $_SESSION['usuario'] = $item->id;
    //       echo "code_ok";
    //     }else{
    //       echo "code_clown";
    //     }
    //
    //   }else{
    //     echo "code_shoe";
    //   }
    //
    // }
    // else{
    //   echo "code_feather";
    // }
?>
