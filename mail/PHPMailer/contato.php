<?php

/*captura os dados do form*/
$nome_post = $_POST['name'];
$email_post = $_POST['email'];
$mensagem_post = $_POST['message'];

/*dados de recebimento*/
$destinatarios = 'contato.manolo@hotmail.com ';
$nomeDestinatario = 'Contato - Site';
$usuario = 'contato.manolo@hotmail.com ';
$senha = 'e18900207d2584a1';

/*abaixo as veriaveis principais, que devem conter em seu formulario*/
$nomeRemetente = $nome_post;
$assunto = 'Contato Site';
$mensagem = 'Nome: '.$nome_post.'<br>Email: '.$email_post.'<br>Mensagem: '.$mensagem_post;


/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/

require "PHPMailerAutoload.php";

$To = $destinatarios;
$Subject = $assunto;
$Message = nl2br($mensagem);

$Host = 'smtp-mail.outlook.com';
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
    $mensagemRetorno = "
        <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
<br />
        <div class=\"container\">
            <div class=\"alert alert-success\" role=\"alert\">E-mail enviado com sucesso!</div>
        </div> 
    ";
}

echo $mensagemRetorno;

?>