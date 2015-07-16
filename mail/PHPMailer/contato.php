<?php

/*captura os dados do form*/
$nome_post = $_POST['name'];
$email_post = $_POST['email'];
$mensagem_post = $_POST['message'];

/*dados de recebimento*/
$destinatarios = 'bruno.marsilio@hotmail.com';
$nomeDestinatario = 'Bruno Mars';
$usuario = 'bruno.marsilio@gmail.com';
$senha = '1H0z9f4e';

/*abaixo as veriaveis principais, que devem conter em seu formulario*/
$nomeRemetente = $nome_post;
$assunto = 'Contato Site';
$mensagem = nl2br('E-mail: '.$email_post.' '.$mensagem_post);


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

include_once("class.phpmailer.php");

$To = $destinatarios;
$Subject = $assunto;
$Message = $mensagem;

$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
$Username = $usuario;
$Password = $senha;
$Port = "587";

$mail = new PHPMailer();
$body = $Message;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $nomeDestinatario);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To, "");

if(!$mail->Send()) {
    $mensagemRetorno = ($mail->ErrorInfo);
} else {
    $mensagemRetorno = 'E-mail enviado com sucesso!';
}

echo $mensagemRetorno;

?>