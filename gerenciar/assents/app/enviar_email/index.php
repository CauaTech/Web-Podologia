<?php 
$int = 3;
if ($int == 0) {
	$flow = "./";
}elseif ($int == 1) {
	$flow = "../";
}elseif ($int == 2) {
	$flow = "../../";
}elseif ($int == 3) {
	$flow = "../../../";
}elseif ($int == 4) {
	$flow = "../../../../";
}elseif ($int == 5) {
	$flow = "../../../../../";
}elseif ($int == 6) {
	$flow = "../../../../../../";
}
?>

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
include($flow.'assents/app/head.php');
if (!isset($_POST['body']) && empty($_GET['body'])) {
    header('Location: '.$flow);
}

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;                      //Enable verbose debug output
    $mail->isMail();                                            //Send using SMTP
    $mail->CharSet = "utf-8";// set charset to utf8
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
    
    $mail->Host = '';
    $mail->Port = 465;//
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );                                //Enable SMTP authentication
    $mail->Username   = 'noreply@stackplugin.shop';                     //SMTP username
    $mail->Password   = 'S3zkekk187ye';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('noreply@stackplugin.shop', 'StackPlugin Register');
    $mail->addAddress(''.$email);             //Name is optional

    $body = '<center><img src="https://stackplugin.shop/assents/img/logo/Logo.png" width="130px"><hr><p>Muito obrigado por se registrar na StackPlugins.<br>Seja muito bem-vindo '.$usernick.'</p><br><br><a href="https://stackplugin.shop/register/?token='.$token.'">Confirmar Conta</a><hr></center>';

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Register StackPlugin Confirmar';
    $mail->Body    = $body;



    $mail->send();
    header('Location: ../?sucesso');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>