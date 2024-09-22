<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
class Contact extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }
    public function index()
    {
        $data['active'] = 'contact';
        $data['title'] = 'Contactos';
        $data['detail'] = 'Contáctenos';
        $this->views->getView("contact", $data);
    }

    public function enviarCorreo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = strClean($_POST['nombre']);
            $asunto = strClean($_POST['asunto']);
            $correo = strClean($_POST['correo']);
            $mensaje = strClean($_POST['mensaje']);
            if (
                empty($nombre) || empty($asunto)
                || empty($correo) || empty($mensaje)
            ) {
                $res = ['msg' => 'Todo los campos son requeridos', 'icono' => 'error'];
            } else {
                $empresa = $this->model->getEmpresa();
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                
                    $mail->isSMTP();                                       
                    $mail->Host       = HOST_SMTP;                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = USER_SMTP;              
                    $mail->Password   = CLAVE_SMTP;                              
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = PUERTO_SMTP;                                    

                    //Recipients
                    $mail->setFrom($correo, $nombre);
                    $mail->addAddress($empresa['correo'], $empresa['nombre']);

                    //Content
                    $mail->isHTML(true);                           
                    $mail->Subject = $asunto;
                    $mail->Body    = $mensaje;

                    $mail->send();
                    $res = ['msg' => 'Mensaje enviado', 'icono' => 'success'];
                } catch (Exception $e) {
                    $res = ['msg' => 'Error al enviar: ' . $e->getMessage(), 'icono' => 'error'];
                }
            }
        } else {
            $res = ['msg' => 'Error desconocido', 'icono' => 'error'];
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
