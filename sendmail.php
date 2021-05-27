<?php
include "PHPMailer/PHPMailerAutoload.php";
header("Access-Control-Allow-Origin: *");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        $mail = new PHPMailer();
        $mail->IsSMTP(); 
        $mail->Host = "smtp.dummer.srv.br"; 
        $mail->Port = 587;  
        $mail->SMTPAuth = true; 
        $mail->Username = 'roger@dummer.srv.br'; 
        $mail->Password = 'Verde14'; 
        $mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) ); 
        $mail->From = "roger@dummer.srv.br";
        $mail->FromName = "Novo Site Dummer Tecnologia"; 
        $mail->AddAddress('roger@dummer.srv.br', 'Roger');
        $mail->IsHTML(false);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = "Mensagem de contato do site"; 
        $mail->Body = "Nome: ".$nome."\nE-mail: ".$email."\nMensagem: ".$msg."\n";
        $enviado = $mail->Send();
        if ($enviado){
            echo json_encode("Ok");
        } else {
            echo json_encode("NOk");
        }
?>