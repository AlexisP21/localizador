<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
require './PHPMailer/Exception.php';

function limpiarTexto($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato, ENT_QUOTES, "UTF-8");
    return $dato;
}

$nombre = limpiarTexto ($_POST['nombre'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$mensaje = limpiarTexto ($_POST['mensaje'] ?? '');

if (empty($nombre) || empty($email) || empty($mensaje)) {
    exit('Todos los campos son obligatorios');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('El correo eletrónico no es válido');
}

$msg = new PHPMailer\PHPMailer\PHPMailer();

try{
    $msg -> isSMTP();
    $msg -> Host = 'smtp.gmail.com';
    $msg -> SMTPAuth = true;
    $msg -> Username = 'alexispj1231.rios@gmail.com';
    $msg -> Password = 'yfkrfszdjbhqavoy';
    $msg -> Port = '587';
    
    $msg -> setFrom('alexispj1231.rios@gmail.com', 'Formulario Prueba');
    $msg -> addReplyTo($_POST['email'], $_POST['nombre']);
    $msg -> addAddress('alepruebitas004@gmail.com');

    $msg -> isHTML(false);
    $msg -> Subject = 'Tema de Prueba';
    $msg -> Body = "Nombre: $nombre\nEmail: $email\nMensaje: \n$mensaje";

    $msg -> send();
    echo 'Mensaje Enviado!';

} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$msg -> ErrorInfo}";
}

header("Location:index.html");

?>