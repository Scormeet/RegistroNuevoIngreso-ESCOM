<?php
require './PHPMailer.php';
require './SMTP.php';

$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

$body = 'Cuerpo del correo de prueba';

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = 'tucorreo@gmail.com';
$mail->Password   = 'tuclave';
$mail->SetFrom('tucorreo@gmail.com', "juliocpiro");
$mail->AddReplyTo('no-reply@mycomp.com','no-reply');
$mail->Subject    = 'Correo de prueba PHPMailer';
$mail->MsgHTML($body);
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$mail->AddAddress('net_medina@hotmail.com', 'Gianni');
$mail->send();
?>